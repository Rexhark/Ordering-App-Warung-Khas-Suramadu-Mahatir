<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Tag;
use App\Models\Category;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function index(){
        $makanan = Food::all();
        return view('pages.makanan', compact(['makanan']))->with('type_menu','makanan');
    }
    public function indexCategory(Category $category){
        $food = Food::where('category_id',$category->id)->get();
        return view('pages.makanan-kategori', compact(['food','category']))->with('type_menu','makanan');
    }
    public function indexDetail(Food $food){
        return view('pages.detail-makanan', compact(['food']))->with('type_menu','makanan');
    }
    public function indexEdit(Food $food){
        $kategori = Category::all();
        return view('pages.edit-makanan', compact(['food','kategori']))->with('type_menu','makanan');
    }
    public function indexTambah(){
        $kategori = Category::all();
        return view('pages.tambah-makanan', compact(['kategori']))->with('type_menu','makanan');
    }
    public function tambahMakanan(Request $request){
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'kategori' => 'required',
            'tag' => 'required|max:255',
            'price' => 'required|integer',
            'description' => 'required',
            'image' => 'image|file'
        ]);

        if($request->file('image')){
            $validateData['image'] = $request->file('image')->store('food'); 
        } else {
            $validateData['image'] = 'default/food.png';
        }

        $new = new Food;
        $new->name = $request->name;
        $new->category_id = $request->kategori;
        $new->slug = preg_replace('/\s+/','-',strtolower($request->name));
        $new->image = $validateData['image'];
        $new->description = $request->description;
        $new->price = $request->price;
        $new->save();

        $daftarTag = explode(',',$request->tag);

        $tagId = [];
        foreach($daftarTag as $tag){
            $t = Tag::firstOrCreate(['name'=>$tag]);
            if($t){
                $tagId[] = $t->id;
            }
        }

        $food = Food::where('slug',$new->slug)->first();

        if($food->tag()->sync($tagId)){
            return redirect('dashboard/makanan')->with('success','Makanan berhasil ditambahkan!');
        }
    }
    public function edit(Food $food, Request $request){
        $validateData = $request->validate([
            'name' => 'required',
            'kategori' => 'required',
            'price' => 'required|integer',
            'description' => 'required',
            'image' => 'image|file'
        ]);

        if($request->file('image')){
            $validateData['image'] = $request->file('image')->store('profil'); 
        } else {
            $validateData['image'] = $request->image_lama;
        }

        $food = Food::find($request->id);
        $food->name = $request->name;
        $food->category_id = $request->kategori;
        $food->price = $request->price;
        $food->description = $request->description;
        $food->image = $validateData['image'];
        $food->save();

        if($request->tag == null || strip_tags($request->tag) == ''){
            return redirect('dashboard/makanan/'.$food->slug)->with('success','Makanan berhasil diedit!');
        } else {
            $daftarTag = explode(',',$request->tag);
    
            $tagId = [];
            foreach($daftarTag as $tag){
                $t = Tag::firstOrCreate(['name'=>$tag]);
                if($t){
                    $tagId[] = $t->id;
                }
            }
    
            $f = Food::where('slug',$food->slug)->first();
    
            if($f->tag()->sync($tagId)){
                return redirect('dashboard/makanan/'.$food->slug)->with('success','Makanan berhasil diedit!');
            }
        }
    }
    public function hapus(Request $request){
        $makanan = Food::find($request->id);
        $makanan->tag()->detach();
        $makanan->delete();
        return redirect('dashboard/makanan')->with('success','Data makanan berhasil dihapus!');
    }
    public function like(Food $food){
        ++$food->favorite;
        $food->save();
        return back();
    }
}

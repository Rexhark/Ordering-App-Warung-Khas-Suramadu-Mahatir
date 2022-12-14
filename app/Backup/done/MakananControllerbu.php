<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Makanan;
use App\Models\Kategori;
use Conner\Tagging\Taggable;
use Illuminate\Http\Request;

class MakananController extends Controller
{
    public function index(){
        return view('pages.makanan')->with('type_menu','makanan');
    }
    public function indexTambah(){
        $kategori = Kategori::all();
        return view('pages.tambah-makanan', compact(['kategori']))->with('type_menu','makanan');
    }
    public function tambahMakanan(Request $request){

        $new = new Makanan;
        $new->name = $request->name;
        $new->kategori_id = $request->kategori;
        $new->slug = preg_replace('/\s+/','-',strtolower($request->name));
        $new->image = $request->image;
        $new->description = $request->description;
        $new->price = $request->price;

        $daftarTag = explode(',',$request->tag);

        $tagId = [];
        foreach($daftarTag as $tag){
            $t = Tag::firstOrCreate(['name'=>$tag]);
            if($t){
                array_push($tagId,$t->id);
            }
        }
        $tes = Makanan::first();
        dd($tes,$tes->kategori,$tes->kategori->name);


    }
}

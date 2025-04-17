<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function indexTambah(){
        return view('pages.tambah-kategori')->with('type_menu','components');
    }
    public function indexEdit(Category $kategori){
        return view('pages.edit-kategori', compact(['kategori']))->with('type_menu','components');
    }
    public function index(){
        $categoryByDate = Category::orderBy('created_at', 'DESC')->get();
        $categoryByMostUsed = Category::withCount('food')->orderByDesc('food_count')->get();
        return view('pages.kategori', compact(['categoryByDate','categoryByMostUsed']))->with('type_menu','components');
    }
    public function tambahKategori(Request $request){
        $validateData = $request->validate([
            'name' => 'required|unique:kategori|max:255'
        ]);

        $new = new Category;
        $new->name =$validateData['name'];
        $new->description = $request->description;
        $new->save();

        return redirect('dashboard/kategori')->with('success','Akun berhasil dibuat!');
    }
    public function edit(Request $request){
        
        $validateData = $request->validate([
            'name' => 'required',
        ]);

        $user = Category::find($request->id);
        $user->name = $validateData['name'];
        $user->description = $request->description;
        $user->save();
        
        return redirect('dashboard/kategori')->with('success','Data berhasil diedit!');

    }
    public function hapus(Request $request){
        $category = Category::find($request->id);
        $category->delete();
        return redirect('dashboard/kategori')->with('success','Data berhasil dihapus!');
    }
}

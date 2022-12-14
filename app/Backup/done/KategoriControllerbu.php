<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function indexTambah(){
        return view('pages.tambah-kategori')->with('type_menu','components');
    }
    public function indexEdit(Kategori $kategori){
        return view('pages.edit-kategori', compact(['kategori']))->with('type_menu','components');
    }
    public function index(){
        $categoryByDate = Kategori::orderBy('created_at', 'DESC')->get();
        // $categoryByMostUsed = Category::withCount('makanan')->get();
        return view('pages.kategori', compact(['categoryByDate']))->with('type_menu','components');
    }
    public function tambahKategori(Request $request){
        $validateData = $request->validate([
            'name' => 'required|unique:kategori|max:255'
        ]);

        $new = new Kategori;
        $new->name =$validateData['name'];
        $new->description = $request->description;
        $new->save();

        return redirect('dashboard/kategori')->with('success','Akun berhasil dibuat!');
    }
    public function edit(Request $request){
        
        $validateData = $request->validate([
            'name' => 'required',
        ]);

        $user = Kategori::find($request->id);
        $user->name = $validateData['name'];
        $user->description = $request->description;
        $user->save();
        
        return redirect('dashboard/kategori')->with('success','Data berhasil diedit!');

    }
    public function hapus(Request $request){
        $user = Kategori::find($request->id);
        $user->delete();
        return redirect('dashboard/kategori')->with('success','Data berhasil dihapus!');
    }
}

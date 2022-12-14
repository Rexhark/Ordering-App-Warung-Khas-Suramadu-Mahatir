<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function indexTambah(){
        return view('pages.tambah-tag')->with('type_menu','components');
    }
    public function indexEdit(Tag $tag){
        return view('pages.edit-tag', compact(['tag']))->with('type_menu','components');
    }
    public function index(){
        $tagByDate = Tag::orderBy('created_at', 'DESC')->get();
        // $tagByMostUsed = Tag::withCount('makanan')->get();
        return view('pages.tag', compact(['tagByDate']))->with('type_menu','components');
    }
    public function tambahTag(Request $request){
        $validateData = $request->validate([
            'name' => 'required|unique:tag|max:255'
        ]);

        $new = new Tag;
        $new->name =$validateData['name'];
        $new->description = $request->description;
        $new->save();

        return redirect('dashboard/tag')->with('success','Akun berhasil dibuat!');
    }
    public function edit(Request $request){
        
        $validateData = $request->validate([
            'name' => 'required',
        ]);

        $user = Tag::find($request->id);
        $user->name = $validateData['name'];
        $user->description = $request->description;
        $user->save();
        
        return redirect('dashboard/tag')->with('success','Data berhasil diedit!');

    }
    public function hapus(Request $request){
        $user = Tag::find($request->id);
        $user->delete();
        return redirect('dashboard/tag')->with('success','Data berhasil dihapus!');
    }
}

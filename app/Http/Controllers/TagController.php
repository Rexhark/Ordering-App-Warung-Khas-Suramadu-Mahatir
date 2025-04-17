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
        $tagByMostUsed = Tag::withCount('food')->orderByDesc('food_count')->get();
        return view('pages.tag', compact(['tagByDate','tagByMostUsed']))->with('type_menu','components');
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

        $tag = Tag::find($request->id);
        $tag->name = $validateData['name'];
        $tag->description = $request->description;
        $tag->save();
        
        return redirect('dashboard/tag')->with('success','Tag berhasil diedit!');

    }
    public function hapus(Request $request){
        $tag = Tag::find($request->id);
        $tag->food()->detach();
        $tag->delete();
        return redirect('dashboard/tag')->with('success','Data berhasil dihapus!');
    }
}

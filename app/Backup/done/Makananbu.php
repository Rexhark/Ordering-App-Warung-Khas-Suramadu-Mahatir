<?php

namespace App\Models;

use App\Http\Controllers\TagController;
use App\Http\Controllers\KategoriController;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Makanan extends Model
{
    use HasFactory;
    protected $table = 'makanan';

    public function kategori(){
        return $this->belongsTo(KategoriController::class);
    }
    public function tag(){
        return $this->belongsToMany(TagController::class,'makanan_tag','makanan_id','tag_id');
    }
}

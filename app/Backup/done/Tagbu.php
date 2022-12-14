<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\MakananController;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;
    protected $table = 'tag';
    protected $fillable = [
        'name',
        'description'
    ];
    
    public function makanan(){
        return $this->belongsToMany(MakananController::class,'makanan_tag','tag_id','makanan_id');
    }
}

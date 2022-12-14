<?php

namespace App\Models;

use App\Models\Makanan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kategori extends Model
{
    use HasFactory;
    protected $table = 'kategori';

    public function makanan(){
        return $this->hasMany(Makanan::class);
    }
}

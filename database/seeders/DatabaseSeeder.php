<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Food;
use App\Models\User;
use App\Models\Category;
use Database\Factories\FoodTagFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(3)->create();
        
        $kategori = ['Gado-Gado','Soto','Nasi Campur','Nasi Kuning','Nasi Pecel','Nasi Ayam Crispy','Minuman'];
        foreach ($kategori as $k){
            Category::create([
                'name' => $k,
                'description' => 'Ini deskripsi kategori'
            ]);
        }
        
        $tag = ['gado','soto','campur','kuning','pecel','crispy','minuman'];
        foreach ($tag as $t){
            Tag::create([
                'name' => $t,
                'description' => 'Ini deskripsi kategori'
            ]);
        }

        for($i=1;$i<=37;$i++){
            if($i<5){
                DB::table('food_tag')->insert([
                        'food_id' => $i,
                        'tag_id' => '1',
                ]);
            } elseif ($i<8) {
                DB::table('food_tag')->insert([
                        'food_id' => $i,
                        'tag_id' => '2',
                ]);
            } elseif ($i<16) {
                DB::table('food_tag')->insert([
                        'food_id' => $i,
                        'tag_id' => '3',
                ]);
            } elseif ($i<24) {
                DB::table('food_tag')->insert([
                        'food_id' => $i,
                        'tag_id' => '4',
                ]);
            } elseif ($i<32) {
                DB::table('food_tag')->insert([
                        'food_id' => $i,
                        'tag_id' => '5',
                ]);
            } elseif ($i<36) {
                DB::table('food_tag')->insert([
                        'food_id' => $i,
                        'tag_id' => '6',
                ]);
            } else {
                DB::table('food_tag')->insert([
                        'food_id' => $i,
                        'tag_id' => '7',
                ]);
            }
        }
        
        // 4,7,15,23,31,35,37
        // Gado-Gado
            Food::create([
                'name' => 'Gado-Gado Biasa',
                'category_id' => 1,
                'slug' => 'gado-gado-biasa',
                'image' => 'food/gado-gado.jpg',
                'description' => 'Ini gado-gado biasa',
                'price' => 11000,
                'favorite' => 26,
                'ordered' => 42
            ]);
            Food::create([
                'name' => 'Gado-Gado Telur',
                'category_id' => 1,
                'slug' => 'gado-gado-telur',
                'image' => 'food/gado-gado.jpg',
                'description' => 'Ini gado-gado telur',
                'price' => 13000,
                'favorite' => 35,
                'ordered' => 65
            ]);
            Food::create([
                'name' => 'Gado-Gado Nasi',
                'category_id' => 1,
                'slug' => 'gado-gado-nasi',
                'image' => 'food/gado-gado.jpg',
                'description' => 'Ini gado-gado nasi',
                'price' => 14000,
                'favorite' => 24,
                'ordered' => 34
            ]);
            Food::create([
                'name' => 'Gado-Gado Jumbo',
                'category_id' => 1,
                'slug' => 'gado-gado-jumbo',
                'image' => 'food/gado-gado.jpg',
                'description' => 'Ini gado-gado jumbo',
                'price' => 16000,
                'favorite' => 53,
                'ordered' => 40
            ]);

        // Soto
            Food::create([
                'name' => 'Soto Ayam Biasa',
                'category_id' => 2,
                'slug' => 'soto-ayam-biasa',
                'image' => 'food/soto.jpg',
                'description' => 'Ini soto ayam biasa',
                'price' => 11000,
                'favorite' => 43,
                'ordered' =>64
            ]);
            Food::create([
                'name' => 'Soto Ayam Lontong',
                'category_id' => 2,
                'slug' => 'soto-ayam-lontong',
                'image' => 'food/soto.jpg',
                'description' => 'Ini soto ayam lontong',
                'price' => 14000,
                'favorite' => 31,
                'ordered' =>44
            ]);
            Food::create([
                'name' => 'Soto Ayam Nasi',
                'category_id' => 2,
                'slug' => 'soto-ayam-nasi',
                'image' => 'food/soto.jpg',
                'description' => 'Ini soto ayam nasi',
                'price' => 15000,
                'favorite' => 12,
                'ordered' =>32
            ]);

        // Nasi Campur
            Food::create([
                'name' => 'Nasi Campur Telur',
                'category_id' => 3,
                'slug' => 'nasi-campur-telur',
                'image' => 'food/nasi-campur.jpg',
                'description' => 'Ini nasi campur telur',
                'price' => 11000,
                'favorite' => 32,
                'ordered' => 42
            ]);
            Food::create([
                'name' => 'Nasi Campur Ayam',
                'category_id' => 3,
                'slug' => 'nasi-campur-ayam',
                'image' => 'food/nasi-campur.jpg',
                'description' => 'Ini nasi campur ayam',
                'price' => 13000,
                'favorite' => 21,
                'ordered' => 33
            ]);
            Food::create([
                'name' => 'Nasi Campur Ayam Telur',
                'category_id' => 3,
                'slug' => 'nasi-campur-ayam-telur',
                'image' => 'food/nasi-campur.jpg',
                'description' => 'Ini nasi campur ayam telur',
                'price' => 16000,
                'favorite' => 46,
                'ordered' => 63
            ]);
            Food::create([
                'name' => 'Nasi Campur Daging',
                'category_id' => 3,
                'slug' => 'nasi-campur-daging',
                'image' => 'food/nasi-campur.jpg',
                'description' => 'Ini nasi campur daging',
                'price' => 14000,
                'favorite' => 52,
                'ordered' => 65
            ]);
            Food::create([
                'name' => 'Nasi Campur Daging Telur',
                'category_id' => 3,
                'slug' => 'nasi-campur-daging-telur',
                'image' => 'food/nasi-campur.jpg',
                'description' => 'Ini nasi campur daging telur',
                'price' => 17000,
                'favorite' => 54,
                'ordered' => 57
            ]);
            Food::create([
                'name' => 'Nasi Campur Daging Ayam',
                'category_id' => 3,
                'slug' => 'nasi-campur-daging-ayam',
                'image' => 'food/nasi-campur.jpg',
                'description' => 'Ini nasi campur daging ayam',
                'price' => 18000,
                'favorite' => 75,
                'ordered' => 79
            ]);
            Food::create([
                'name' => 'Nasi Campur Daging Ayam Telur',
                'category_id' => 3,
                'slug' => 'nasi-campur-daging-ayam-telur',
                'image' => 'food/nasi-campur.jpg',
                'description' => 'Ini nasi campur daging ayam telur',
                'price' => 23000,
                'favorite' => 64,
                'ordered' => 74
            ]);
            Food::create([
                'name' => 'Nasi Campur Ikan',
                'category_id' => 3,
                'slug' => 'nasi-campur-daging-ikan',
                'image' => 'food/nasi-campur.jpg',
                'description' => 'Ini nasi campur ikan',
                'price' => 14000,
                'favorite' => 23,
                'ordered' => 42
            ]);
        
        // Nasi Kuning
            Food::create([
                'name' => 'Nasi Kuning Telur',
                'category_id' => 4,
                'slug' => 'nasi-kuning-telur',
                'image' => 'food/nasi-kuning.jpg',
                'description' => 'Ini nasi kuning telur',
                'price' => 11000,
                'favorite' => 53,
                'ordered' => 75
            ]);
            Food::create([
                'name' => 'Nasi Kuning Ayam',
                'category_id' => 4,
                'slug' => 'nasi-kuning-ayam',
                'image' => 'food/nasi-kuning.jpg',
                'description' => 'Ini nasi kuning ayam',
                'price' => 13000,
                'favorite' => 42,
                'ordered' => 74
            ]);
            Food::create([
                'name' => 'Nasi Kuning Ayam Telur',
                'category_id' => 4,
                'slug' => 'nasi-kuning-ayam-telur',
                'image' => 'food/nasi-kuning.jpg',
                'description' => 'Ini nasi kuning ayam telur',
                'price' => 16000,
                'favorite' => 32,
                'ordered' => 45
            ]);
            Food::create([
                'name' => 'Nasi Kuning Daging',
                'category_id' => 4,
                'slug' => 'nasi-kuning-daging',
                'image' => 'food/nasi-kuning.jpg',
                'description' => 'Ini nasi kuning daging',
                'price' => 14000,
                'favorite' => 21,
                'ordered' => 40
            ]);
            Food::create([
                'name' => 'Nasi Kuning Daging Telur',
                'category_id' => 4,
                'slug' => 'nasi-kuning-daging-telur',
                'image' => 'food/nasi-kuning.jpg',
                'description' => 'Ini nasi kuning daging telur',
                'price' => 17000,
                'favorite' => 54,
                'ordered' => 62
            ]);
            Food::create([
                'name' => 'Nasi Kuning Daging Ayam',
                'category_id' => 4,
                'slug' => 'nasi-kuning-daging-ayam',
                'image' => 'food/nasi-kuning.jpg',
                'description' => 'Ini nasi kuning daging ayam',
                'price' => 18000,
                'favorite' => 54,
                'ordered' => 55
            ]);
            Food::create([
                'name' => 'Nasi Kuning Daging Ayam Telur',
                'category_id' => 4,
                'slug' => 'nasi-kuning-daging-ayam-telur',
                'image' => 'food/nasi-kuning.jpg',
                'description' => 'Ini nasi kuning daging ayam telur',
                'price' => 23000,
                'favorite' => 22,
                'ordered' => 43
            ]);
            Food::create([
                'name' => 'Nasi Kuning Ikan',
                'category_id' => 4,
                'slug' => 'nasi-kuning-daging-ikan',
                'image' => 'food/nasi-kuning.jpg',
                'description' => 'Ini nasi kuning ikan',
                'price' => 14000,
                'favorite' => 21,
                'ordered' => 54
            ]);

        // Nasi Pecel
            Food::create([
                'name' => 'Nasi Pecel Telur',
                'category_id' => 5,
                'slug' => 'nasi-pecel-telur',
                'image' => 'food/nasi-pecel.jpg',
                'description' => 'Ini nasi pecel telur',
                'price' => 11000,
                'favorite' => 32,
                'ordered' => 51
            ]);
            Food::create([
                'name' => 'Nasi Pecel Ayam',
                'category_id' => 5,
                'slug' => 'nasi-pecel-ayam',
                'image' => 'food/nasi-pecel.jpg',
                'description' => 'Ini nasi pecel ayam',
                'price' => 13000,
                'favorite' => 22,
                'ordered' => 65
            ]);
            Food::create([
                'name' => 'Nasi Pecel Ayam Telur',
                'category_id' => 5,
                'slug' => 'nasi-pecel-ayam-telur',
                'image' => 'food/nasi-pecel.jpg',
                'description' => 'Ini nasi pecel ayam telur',
                'price' => 16000,
                'favorite' => 22,
                'ordered' => 64
            ]);
            Food::create([
                'name' => 'Nasi Pecel Daging',
                'category_id' => 5,
                'slug' => 'nasi-pecel-daging',
                'image' => 'food/nasi-pecel.jpg',
                'description' => 'Ini nasi pecel daging',
                'price' => 14000,
                'favorite' => 53,
                'ordered' => 66
            ]);
            Food::create([
                'name' => 'Nasi Pecel Daging Telur',
                'category_id' => 5,
                'slug' => 'nasi-pecel-daging-telur',
                'image' => 'food/nasi-pecel.jpg',
                'description' => 'Ini nasi pecel daging telur',
                'price' => 17000,
                'favorite' => 33,
                'ordered' => 44
            ]);
            Food::create([
                'name' => 'Nasi Pecel Daging Ayam',
                'category_id' => 5,
                'slug' => 'nasi-pecel-daging-ayam',
                'image' => 'food/nasi-pecel.jpg',
                'description' => 'Ini nasi pecel daging ayam',
                'price' => 18000,
                'favorite' => 25,
                'ordered' => 64
            ]);
            Food::create([
                'name' => 'Nasi Pecel Daging Ayam Telur',
                'category_id' => 5,
                'slug' => 'nasi-pecel-daging-ayam-telur',
                'image' => 'food/nasi-pecel.jpg',
                'description' => 'Ini nasi pecel daging ayam telur',
                'price' => 23000,
                'favorite' => 22,
                'ordered' => 32
            ]);
            Food::create([
                'name' => 'Nasi Pecel Ikan',
                'category_id' => 5,
                'slug' => 'nasi-pecel-daging-ikan',
                'image' => 'food/nasi-pecel.jpg',
                'description' => 'Ini nasi pecel ikan',
                'price' => 14000,
                'favorite' => 19,
                'ordered' => 51
            ]);

        // Nasi Ayam Crispy
            Food::create([
                'name' => 'Nasi Ayam Crispy',
                'category_id' => 6,
                'slug' => 'nasi-ayam-crispy',
                'image' => 'food/nasi-ayam-crispy.jpg',
                'description' => 'Ini nasi ayam crispy',
                'price' => 14000,
                'favorite' => 67,
                'ordered' => 97
            ]);
            Food::create([
                'name' => 'Nasi Campur Ayam Crispy',
                'category_id' => 6,
                'slug' => 'nasi-campur-ayam-crispy',
                'image' => 'food/nasi-ayam-crispy.jpg',
                'description' => 'Ini nasi campur ayam crispy',
                'price' => 16000,
                'favorite' => 55,
                'ordered' => 74
            ]);
            Food::create([
                'name' => 'Nasi Pecel Ayam Crispy',
                'category_id' => 6,
                'slug' => 'nasi-pecel-ayam-crispy',
                'image' => 'food/nasi-ayam-crispy.jpg',
                'description' => 'Ini nasi pecel ayam crispy',
                'price' => 16000,
                'favorite' => 35,
                'ordered' => 53
            ]);
            Food::create([
                'name' => 'Nasi Kuning Ayam Crispy',
                'category_id' => 6,
                'slug' => 'nasi-kuning-ayam-crispy',
                'image' => 'food/nasi-ayam-crispy.jpg',
                'description' => 'Ini nasi kuning ayam crispy',
                'price' => 16000,
                'favorite' => 64,
                'ordered' => 78
            ]);

        // Minuman
            Food::create([
                'name' => 'Es Teh',
                'category_id' => 7,
                'slug' => 'es-teh',
                'image' => 'food/minuman.jpg',
                'description' => 'Ini minuman',
                'price' => 5000,
                'favorite' => 53,
                'ordered' => 86
            ]);
            Food::create([
                'name' => 'Teh Panas',
                'category_id' => 7,
                'slug' => 'teh-panas',
                'image' => 'food/minuman.jpg',
                'description' => 'Ini minuman',
                'price' => 5000,
                'favorite' => 53,
                'ordered' => 66
            ]);

        // 
        
        
        // Akun
        User::create([
            'name' => 'Fitrah Ramadhan',
            'username' => 'Rexhark',
            'email' => 'fitrah@gmail.com',
            'biography' => 'Ini bio Fitrah',
            'password' => bcrypt('Fitrah123'),
            'image' => "default/avatar-1.png",
            'role' => 'admin'
        ]);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}

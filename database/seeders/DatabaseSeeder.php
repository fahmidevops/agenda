<?php

namespace Database\Seeders;

use App\Models\Agenda;
use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\Category;
use App\Models\Komponen;
use App\Models\Staff;
use \App\Models\Post;
use App\Models\Type;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'komponen_id' => 1,
            'name' => 'Fahmi',
            'username' => 'fahmibo',
            'password' => bcrypt('password'),
            'email' => 'fahmi@gmail.com',
            'telp' => '085220753670',
            'is_admin' => '1'
        ]);

        // User::create([
        //     'name' => 'Fitri',
        //     'email' => 'fitri@gmail.com',
        //     'password' => bcrypt('password')
        // ]);
        User::factory(5)->create();

        Komponen::create([
            'name' => 'DITTEKDA',
        ]);
        Komponen::create([
            'name' => 'DITHANLAN',
        ]);
        Komponen::create([
            'name' => 'BIRUMAS',
        ]);

        Type::create([
            'name' => 'Undangan',
        ]);
        Type::create([
            'name' => 'Program Rutin',
        ]);

        Staff::create([
            'komponen_id' => 1,
            'name' => 'Mahyuzar M.Si',
            'position' => 'Direktur',
            'level' => '2',
            'email' => 'mahyuzar@bkkbn.go.id',
            'telp' => ''
        ]);

        Staff::create([
            'komponen_id' => 2,
            'name' => 'Baihaqi',
            'position' => 'Pranata Komputer Ahli Madya',
            'level' => '3',
            'email' => 'tes@bkkbn.go.id',
            'telp' => ''
        ]);

        Staff::create([
            'komponen_id' => 3,
            'name' => 'Rezky',
            'position' => 'Pranata Komputer Ahli Madya',
            'level' => '3',
            'email' => 'tes2@bkkbn.go.id',
            'telp' => ''
        ]);

        // Category::create([
        //     'name' => 'Web Programming',
        //     'slug' => 'web-programming'
        // ]);

        // Category::create([
        //     'name' => 'Networking',
        //     'slug' => 'Networking'
        // ]);

        // Category::create([
        //     'name' => 'Personal',
        //     'slug' => 'personal'
        // ]);



        // Post::factory(20)->create();
        // Agenda::factory(20)->create();
        Agenda::create([
            'user_id' => 1,
            'staff_id' => 1,
            'type_id' => 1,
            'date' => '2022-09-01',
            'time' => '12:12',
            'title' => 'Rapat percepatan penurunan stunting',
            'slug' => 'Rapat-percepatan-penurunan-stunting',
            'location' => 'hotel aston jakarta',
            'komponen' => 'BIHUKOR',
            'description' => 'Rapat penurunan stunting tahun 2022',
        ]);

        Agenda::create([
            'user_id' => 2,
            'staff_id' => 2,
            'type_id' => 2,
            'date' => '2022-09-01',
            'time' => '12:12',
            'title' => 'Rapat Dashboard PK',
            'slug' => 'Rapat-Dashboard-PK',
            'location' => 'hotel fave jakarta',
            'komponen' => 'BIRUM',
            'description' => 'Rapat penting',
        ]);

        Agenda::create([
            'user_id' => 1,
            'staff_id' => 3,
            'type_id' => 1,
            'date' => '2022-09-01',
            'time' => '12:12',
            'title' => 'Rapat TMP2K Kominfo',
            'slug' => 'Rapat-TMP2K-Kominfo',
            'location' => 'hotel bali jakarta',
            'komponen' => 'BIREN',
            'description' => 'rapat tetap',
        ]);
    }
}

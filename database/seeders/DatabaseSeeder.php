<?php

namespace Database\Seeders;

use App\Models\ComponentParent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
        ]);
        $data = [
            [
                'id' => 1,
                'title' => 'Anasayfa'
            ],
            [
                'id' => 2,
                'title' => 'Konaklama'
            ],
            [
                'id' => 3,
                'title' => 'Restaurant & Bar'
            ],
            [
                'id' => 4,
                'title' => 'Havuz & Plaj'
            ],
            [
                'id' => 5,
                'title' => 'Eğlence & Aktivite'
            ],
            [
                'id' => 6,
                'title' => 'Spa & Wellness'
            ],
            [
                'id' => 7,
                'title' => 'Toplantı & Davet'
            ],
            [
                'id' => 8,
                'title' => 'Multimedya'
            ],
            [
                'id' => 9,
                'title' => 'Kurumsal'
            ],
            [
                'id' => 10,
                'title' => 'İletişim'
            ],

        ];
        $upload = ComponentParent::insert($data);
    }
}

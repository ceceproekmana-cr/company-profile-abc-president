<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\News;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        // Kosongkan tabel dulu biar tidak double data
        News::truncate();

        // Insert data
        News::insert([
            [
                'title' => 'Achievment 2025',
                'content' => 'ABC President Indonesia has been recognized as the Winner of Indonesia Best Companies in Creating Leaders from Within 2025, an award presented by SWA Media Group in collaboration with NBO (Nusantara Business Objective)',
                'image' => 'achievment.png',
                'date' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'NEW! NU CHoco Hazeltea #FixEnak',
                'content' => 'Follow your tongue and taste the indulging creaminess of NU Choco Hazeltea.',
                'image' => 'baru_cocohazeltea.png',
                'date' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
               'title' => 'Fusion Selera Pedas with Indonesian Traditional Food',
                'content' => 'In collaboration with local influencer. Boengkoes Network, MI ABC Selera Pedas has founda new hidden gem!.',
                'image' => 'influencer.png',
                'date' => now(),
                'created_at' => now(),
                'updated_at' => now(), 
            ],
        ]);
    }
}
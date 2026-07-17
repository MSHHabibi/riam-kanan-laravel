<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Category;
use App\Models\Destination;
use App\Models\Boat;
use App\Models\Island;
use App\Models\Facility;
use App\Models\Gallery;
use App\Models\Review;
use App\Models\Setting;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@riamkanan.test',
            'password' => Hash::make('password'),
            'role' => 'admin'
        ]);

        $user = User::create([
            'name' => 'User Wisatawan',
            'email' => 'user@riamkanan.test',
            'password' => Hash::make('password'),
            'role' => 'user'
        ]);

        $cats = [];

        foreach (['Pulau', 'Camping', 'Kuliner', 'Wisata Alam', 'Kelotok'] as $c) {
            $cats[$c] = Category::create([
                'name' => $c,
                'slug' => Str::slug($c),
                'icon' => 'fa-map'
            ]);
        }

        $destinations = [
            [
                'name' => 'Pulau Pinus',
                'category' => 'Pulau',
                'location' => 'Aranio, Banjar',
                'description' => 'Pulau Pinus merupakan destinasi wisata populer di kawasan Waduk Riam Kanan dengan pemandangan danau, pepohonan hijau, dan suasana alam yang sejuk.',
                'latitude' => -3.5363855119834304,
                'longitude' => 115.0541691255276,
                'ticket_price' => 15000,
                'rating' => 4.6,
                'visitor_count' => 1200,
                'is_popular' => true,
            ],
            [
                'name' => 'Pulau Bekantan',
                'category' => 'Pulau',
                'location' => 'Aranio, Banjar',
                'description' => 'Pulau Bekantan menawarkan pengalaman wisata alam di tengah kawasan Waduk Riam Kanan dengan panorama air dan pulau-pulau kecil yang indah.',
                'latitude' => -3.5267361730852045,
                'longitude' => 115.0501579041152,
                'ticket_price' => 15000,
                'rating' => 4.7,
                'visitor_count' => 1050,
                'is_popular' => true,
            ],
            [
                'name' => 'ALIMPUNG ISLAND',
                'category' => 'Pulau',
                'location' => 'Aranio, Banjar',
                'description' => 'ALIMPUNG ISLAND adalah pulau wisata di kawasan Waduk Riam Kanan yang cocok untuk bersantai, berfoto, dan menikmati suasana alam.',
                'latitude' => -3.523722802143073,
                'longitude' => 115.01714940380721,
                'ticket_price' => 20000,
                'rating' => 4.8,
                'visitor_count' => 980,
                'is_popular' => true,
            ],
            [
                'name' => 'Danau Bukit Batu',
                'category' => 'Wisata Alam',
                'location' => 'Aranio, Banjar',
                'description' => 'Danau Bukit Batu menyajikan panorama danau dan perbukitan yang indah, cocok untuk menikmati pemandangan alam dan fotografi.',
                'latitude' => -3.5148321436816925,
                'longitude' => 115.07252610193439,
                'ticket_price' => 10000,
                'rating' => 4.6,
                'visitor_count' => 870,
                'is_popular' => true,
            ],
            [
                'name' => 'Air Terjun Mandin Tinggi',
                'category' => 'Wisata Alam',
                'location' => 'Aranio, Banjar',
                'description' => 'Air Terjun Mandin Tinggi merupakan destinasi air terjun dengan suasana alami, air yang segar, dan jalur wisata alam yang menarik.',
                'latitude' => -3.6240498594882977,
                'longitude' => 115.12183917982395,
                'ticket_price' => 10000,
                'rating' => 4.7,
                'visitor_count' => 760,
                'is_popular' => false,
            ],
            [
                'name' => 'Glamping Batu Laba',
                'category' => 'Camping',
                'location' => 'Aranio, Banjar',
                'description' => 'Glamping Batu Laba adalah area glamping dan camping yang cocok untuk menikmati suasana malam di kawasan wisata Riam Kanan.',
                'latitude' => -3.5226948550670003,
                'longitude' => 115.06466833319452,
                'ticket_price' => 25000,
                'rating' => 4.8,
                'visitor_count' => 890,
                'is_popular' => false,
            ],
        ];

        foreach ($destinations as $item) {
            $d = Destination::create([
                'category_id' => $cats[$item['category']]->id,
                'name' => $item['name'],
                'slug' => Str::slug($item['name']),
                'location' => $item['location'],
                'description' => $item['description'],
                'latitude' => $item['latitude'],
                'longitude' => $item['longitude'],
                'ticket_price' => $item['ticket_price'],
                'operational_hours' => '07.00 - 17.00 WITA',
                'rating' => $item['rating'],
                'visitor_count' => $item['visitor_count'],
                'is_popular' => $item['is_popular'],
            ]);

            Facility::create([
                'destination_id' => $d->id,
                'name' => 'Parkir',
                'icon' => 'fa-car'
            ]);

            Facility::create([
                'destination_id' => $d->id,
                'name' => 'Spot Foto',
                'icon' => 'fa-camera'
            ]);

            Gallery::create([
                'destination_id' => $d->id,
                'image' => 'placeholder.jpg',
                'caption' => $item['name']
            ]);

            Review::create([
                'user_id' => $user->id,
                'destination_id' => $d->id,
                'rating' => 5,
                'comment' => 'Tempatnya indah dan cocok untuk liburan keluarga.'
            ]);

            if ($item['category'] === 'Pulau') {
                Island::create([
                    'destination_id' => $d->id,
                    'name' => $item['name'],
                    'latitude' => $item['latitude'],
                    'longitude' => $item['longitude'],
                    'description' => 'Pulau wisata di kawasan Waduk Riam Kanan.',
                    'activities' => 'Foto, piknik, naik kelotok, menikmati pemandangan.'
                ]);
            }
        }

        foreach (['Kelotok Bintang', 'Kelotok Sejahtera', 'Kelotok Riam Indah'] as $i => $b) {
            Boat::create([
                'name' => $b,
                'price' => 500000 + $i * 250000,
                'capacity' => 10 + $i * 5,
                'phone' => '0812-3456-789' . $i,
                'status' => 'tersedia',
                'description' => 'Kelotok wisata untuk menjelajahi pulau-pulau di Waduk Riam Kanan.'
            ]);
        }

        Setting::create([
            'website_name' => 'Riam Kanan Explorer',
            'address' => 'Waduk Riam Kanan, Aranio, Banjar',
            'phone' => '0812-0000-0000',
            'email' => 'info@riamkanan.test'
        ]);
    }
}
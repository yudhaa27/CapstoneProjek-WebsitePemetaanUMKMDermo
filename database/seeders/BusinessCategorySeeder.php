<?php

namespace Database\Seeders;

use App\Models\BusinessCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BusinessCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Kuliner & Olahan Pangan',
                'description' => 'Makanan, minuman, jajanan pasar, oleh-oleh, dan produk olahan pangan.',
            ],
            [
                'name' => 'Kerajinan & Seni',
                'description' => 'Kerajinan tangan, souvenir, anyaman, konveksi, dan produk seni kreatif.',
            ],
            [
                'name' => 'Jasa & Pelayanan',
                'description' => 'Bengkel, jahit, laundry, potong rambut, reparasi, dan jasa perorangan.',
            ],
            [
                'name' => 'Perdagangan & Retail',
                'description' => 'Toko kelontong, warung kebutuhan pokok, pakaian, dan penjualan eceran.',
            ],
            [
                'name' => 'Pertanian & Peternakan',
                'description' => 'Bibit tanaman, hidroponik, budidaya ikan hias, dan peternakan skala mikro.',
            ],
        ];

        foreach ($categories as $cat) {
            BusinessCategory::updateOrCreate(
                ['slug' => Str::slug($cat['name'])],
                [
                    'name' => $cat['name'],
                    'description' => $cat['description'],
                ]
            );
        }
    }
}

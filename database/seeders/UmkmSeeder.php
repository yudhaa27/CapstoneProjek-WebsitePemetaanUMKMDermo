<?php

namespace Database\Seeders;

use App\Models\BusinessCategory;
use App\Models\Umkm;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UmkmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kuliner = BusinessCategory::where('slug', 'kuliner-olahan-pangan')->first();
        $kerajinan = BusinessCategory::where('slug', 'kerajinan-seni')->first();
        $jasa = BusinessCategory::where('slug', 'jasa-pelayanan')->first();
        $dagang = BusinessCategory::where('slug', 'perdagangan-retail')->first();

        $sampleUmkms = [
            [
                'name' => 'Tahu Kuning Asli Dermo Bu Siti',
                'category_id' => $kuliner?->id,
                'description' => 'Produksi tahu kuning khas Kediri dengan resep turun temurun, gurih tanpa pengawet buatan.',
                'address' => 'Jl. Dermo Permai No. 12, Kelurahan Dermo, Kec. Mojoroto, Kota Kediri',
                'latitude' => -7.803450,
                'longitude' => 111.986120,
                'business_scale' => 'kecil',
                'sales_channel' => 'gabungan',
                'public_phone' => '081234567890',
                'status' => 'published',
            ],
            [
                'name' => 'Warung Kopi & Nasi Pecel Dermo',
                'category_id' => $kuliner?->id,
                'description' => 'Menyediakan nasi pecel pincuk khas Kediri dan kopi tubruk racikan petani lereng Wilis.',
                'address' => 'Jl. Raya Dermo RT 02 / RW 01, Kelurahan Dermo, Kota Kediri',
                'latitude' => -7.804820,
                'longitude' => 111.984530,
                'business_scale' => 'mikro',
                'sales_channel' => 'offline',
                'public_phone' => '085678901234',
                'status' => 'published',
            ],
            [
                'name' => 'Kerajinan Anyaman Bambu "Dermo Creative"',
                'category_id' => $kerajinan?->id,
                'description' => 'Produksi besek, parcel, tudung saji, dan lampu hias dari bambu berkualitas tinggi.',
                'address' => 'Gg. Melati No. 4, RT 03 / RW 02, Kelurahan Dermo, Kota Kediri',
                'latitude' => -7.802100,
                'longitude' => 111.988200,
                'business_scale' => 'kecil',
                'sales_channel' => 'online',
                'public_phone' => '082198765432',
                'status' => 'published',
            ],
            [
                'name' => 'Dermo Motor Servis & Sparepart',
                'category_id' => $jasa?->id,
                'description' => 'Bengkel perawatan berkala, ganti oli, dan tune up sepeda motor injeksi maupun karburator.',
                'address' => 'Jl. Veteran No. 88 (Perbatasan Dermo), Kelurahan Dermo, Kota Kediri',
                'latitude' => -7.806120,
                'longitude' => 111.982900,
                'business_scale' => 'mikro',
                'sales_channel' => 'offline',
                'public_phone' => '087812349876',
                'status' => 'published',
            ],
            [
                'name' => 'Toko Kelontong Berkah 27',
                'category_id' => $dagang?->id,
                'description' => 'Grosir dan eceran sembako murah, gas elpiji, galon air mineral, dan kebutuhan harian.',
                'address' => 'Jl. Dermo Makmur RT 01 / RW 03, Kelurahan Dermo, Kota Kediri',
                'latitude' => -7.805500,
                'longitude' => 111.987400,
                'business_scale' => 'kecil',
                'sales_channel' => 'offline',
                'public_phone' => '081356789012',
                'status' => 'published',
            ],
            [
                'name' => 'Sambal Goreng & Teri Krispi "Mbok Dermo"',
                'category_id' => $kuliner?->id,
                'description' => 'Lauk kering siap saji kemasan toples & pouch untuk oleh-oleh dan kirim ke seluruh nusantara.',
                'address' => 'Perum Dermo Indah Blok C-5, Kelurahan Dermo, Kota Kediri',
                'latitude' => -7.801850,
                'longitude' => 111.985600,
                'business_scale' => 'mikro',
                'sales_channel' => 'gabungan',
                'public_phone' => '089678123456',
                'status' => 'published',
            ],
        ];

        foreach ($sampleUmkms as $data) {
            $slug = Str::slug($data['name']);
            Umkm::updateOrCreate(
                ['slug' => $slug],
                array_merge($data, ['slug' => $slug])
            );
        }
    }
}

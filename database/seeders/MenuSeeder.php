<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil id kategori berdasarkan nama (pastikan CategorySeeder sudah dijalankan)
        $catIds = Category::pluck('id', 'name'); // ['Makanan'=>1, 'Paket'=>2, ...]

        $menus = [
            // --- Makanan ---
            [
                'category' => 'Makanan',
                'name'     => 'Cobek Ayam Bakar',
                'price'    => 28000,
                'desc'     => 'Ayam bakar bumbu cobek, sambal terasi, lalapan.',
                'photo'    => 'Menus/CobekAyamBakar.jpg',
            ],
            [
                'category' => 'Makanan',
                'name'     => 'Cobek Lele Bakar',
                'price'    => 24000,
                'desc'     => 'Lele bakar dengan sambal cobek pedas dan lalapan segar.',
                'photo'    => 'Menus/CobekLeleBakar.jpg',
            ],
            [
                'category' => 'Makanan',
                'name'     => 'Cobek Ikan Nila Bakar',
                'price'    => 32000,
                'desc'     => 'Nila bakar, sambal cobek, lalapan, nikmat gurih.',
                'photo'    => 'Menus/CobekNilaBakar.jpg',
            ],
            [
                'category' => 'Makanan',
                'name'     => 'Cobek Ayam Goreng',
                'price'    => 27000,
                'desc'     => 'Ayam goreng tepung bumbu, sambal cobek, lalapan.',
                'photo'    => 'Menus/AyamGoreng.jpg',
            ],
            [
                'category' => 'Makanan',
                'name'     => 'Nasi Putih',
                'price'    => 6000,
                'desc'     => 'Nasi putih hangat.',
                'photo'    => 'Menus/NasiPutih.jpg',
            ],

            // --- Paket ---
            [
                'category' => 'Paket',
                'name'     => 'Paket Ayam Bakar + Nasi + Es Teh',
                'price'    => 35000,
                'desc'     => 'Ayam bakar + nasi putih + es teh manis.',
                'photo'    => 'Menus/CobekAyamBakar.jpg',
            ],
            [
                'category' => 'Paket',
                'name'     => 'Paket Lele Bakar + Nasi + Es Teh',
                'price'    => 32000,
                'desc'     => 'Lele bakar + nasi putih + es teh manis.',
                'photo'    => 'Menus/CobekLeleBakar.jpg',
            ],

            // --- Minuman ---
            [
                'category' => 'Minuman',
                'name'     => 'Es Teh Manis',
                'price'    => 7000,
                'desc'     => 'Teh manis dingin.',
                'photo'    => 'Menus/EsTehManis.jpg',
            ],
            [
                'category' => 'Minuman',
                'name'     => 'Teh Tawar Panas',
                'price'    => 5000,
                'desc'     => 'Teh tawar hangat.',
                'photo'    => 'Menus/TehTawarPanas.jpg',
            ],
            [
                'category' => 'Minuman',
                'name'     => 'Es Jeruk',
                'price'    => 9000,
                'desc'     => 'Jeruk segar dingin.',
                'photo'    => 'Menus/EsJeruk.jpg',
            ],

            // --- Tambahan ---
            [
                'category' => 'Tambahan',
                'name'     => 'Sambal Terasi',
                'price'    => 4000,
                'desc'     => 'Sambal terasi khas, pedas nikmat.',
                'photo'    => 'Menus/SambalTerasi.jpg',
            ],
            [
                'category' => 'Tambahan',
                'name'     => 'Tahu Tempe Goreng',
                'price'    => 10000,
                'desc'     => 'Tahu & tempe goreng 6 pcs.',
                'photo'    => 'Menus/TahuTempeGoreng.jpg',
            ],
            [
                'category' => 'Tambahan',
                'name'     => 'Lalapan',
                'price'    => 5000,
                'desc'     => 'Timun, kol, kemangi.',
                'photo'    => 'Menus/Lalapan.jpg',
            ],
        ];

        foreach ($menus as $m) {
            $categoryId = $catIds[$m['category']] ?? null;
            if (!$categoryId) {
                // Lewati jika kategori belum ada (harusnya ada dari CategorySeeder)
                continue;
            }

            Menu::UpdateOrCreate(
                ['category_id' => $categoryId, 'name' => $m['name']],
                [
                    'description' => $m['desc'],
                    'price'       => $m['price'],
                    'photo_path'   => $m['photo'],
                    'is_active'   => true,
                ]
            );
        }
    }
}

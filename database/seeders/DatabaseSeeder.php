<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Status;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = [
            [
                'nama' => 'Rifky',
                'username' => 'HanzzSama',
                'email' => 'admin@gmail.com',
                'role' => 'admin',
                'password' => bcrypt('123456'),
            ],
            [
                'nama' => 'Melynda',
                'username' => 'Wang Lin',
                'email' => 'anggota@gmail.com',
                'role' => 'anggota',
                'password' => bcrypt('123456'),
            ],
            [
                'nama' => 'Guard',
                'username' => 'Graymore',
                'email' => 'user@gmail.com',
                'role' => 'user',
                'password' => bcrypt('123456'),
            ],
        ];

        foreach ($users as $key => $user) {
            User::create($user);
        }

        $stories = [
            [
                'title' => 'ayam bakar',
                'type' => 'image',
                'original' => 'food1.jpeg'
            ],
            [
                'title' => 'ayam bakar',
                'type' => 'image',
                'original' => 'cover-profile-edit.jpeg'
            ],
            [
                'title' => 'video',
                'type' => 'video',
                'original' => 'video1.mp4'
            ],
        ];

        foreach ($stories as $story) {
            // Tentukan folder berdasarkan tipe
            $folder = $story['type'] === 'image' ? 'uploads/statusImg/' : 'uploads/statusVideo/';

            // Hash nama file
            $hashedName = Str::random(40) . '.' . pathinfo($story['original'], PATHINFO_EXTENSION);

            // Pastikan folder ada
            Storage::disk('public')->makeDirectory($folder);

            // Path asli di storage
            $sourcePath = storage_path('app/public/assets/' . $story['original']);

            // Path tujuan di storage (tanpa 'public/')
            $destinationPath = $folder . $hashedName;

            if (file_exists($sourcePath)) {
                // Salin file ke storage dengan nama hash
                Storage::disk('public')->put($destinationPath, file_get_contents($sourcePath));
                echo "✅ Berhasil menyalin: {$story['original']} → {$destinationPath}\n";
            } else {
                echo "⚠️ File {$story['original']} tidak ditemukan di storage/app/public/uploads/.\n";
                continue;
            }

            // Simpan ke database
            Status::create([
                'title' => $story['title'],
                'type' => $story['type'],
                'file_path' => 'storage/' . $destinationPath, // Path yang bisa diakses via URL
            ]);
        }
    }
}
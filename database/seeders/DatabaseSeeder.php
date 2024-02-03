<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        \App\Models\User::factory()->create([
            'id' => Str::uuid()->toString(),
            'username' => 'Admin',
            'password' => 'Admin',
        ]);

        DB::table('challenge_categories')->insert([
            'id' => 1,
            'name' => 'Cryptography',
            'description' => 'Cryptography is the practice and study of techniques for secure communication in the presence of third parties or adversaries. It involves various methods for encrypting and decrypting data to ensure its confidentiality, integrity, and authenticity.',
        ]);

        DB::table('challenges')->insert([
            'id' => Str::uuid()->toString(),
            'name' => 'rot13',
            'challenge_categories_id' => 1,
            'message' => 'Xnyvore{Grfgvat} \nAuthor : BosToken',
            'flag' => "Kaliber{Testing}",
            'value' => 500,
            'solver' => 0,
        ]);

        DB::table('challenges')->insert([
            'id' => Str::uuid()->toString(),
            'name' => 'base64',
            'challenge_categories_id' => 1,
            'message' => 'S2FsaWJlcntUZXN0aW5nfQ== \nAuthor : BosToken',
            'flag' => "Kaliber{Testing}",
            'value' => 500,
            'solver' => 0,
        ]);
    }
}

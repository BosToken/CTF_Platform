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
        $information_id = Str::uuid()->toString();
        $category_id = Str::uuid()->toString();
        $chall1_id = Str::uuid()->toString();
        $chall2_id = Str::uuid()->toString();
        $chall3_id = Str::uuid()->toString();
        $user_id = Str::uuid()->toString();
        $user2_id = Str::uuid()->toString();
        $user3_id = Str::uuid()->toString();
        $role1_id = Str::uuid()->toString();
        $role2_id = Str::uuid()->toString();

        \App\Models\User::factory()->create([
            'id' => $user_id,
            'username' => 'Admin',
            'password' => 'Admin',
        ]);

        \App\Models\User::factory()->create([
            'id' => $user2_id,
            'username' => 'BosToken',
            'name' => 'Faiz Diandra Maulana',
            'password' => 'BosToken',
        ]);

        \App\Models\User::factory()->create([
            'id' => $user3_id,
            'username' => 'moonap',
            'name' => 'Bimo Yudistira Ariel',
            'password' => 'moonap',
        ]);

        DB::table('challenge_categories')->insert([
            'id' => $category_id,
            'name' => 'Cryptography',
            'description' => 'Cryptography is the practice and study of techniques for secure communication in the presence of third parties or adversaries. It involves various methods for encrypting and decrypting data to ensure its confidentiality, integrity, and authenticity.',
        ]);

        
        DB::table('informations')->insert([
            'id' => $information_id,
            'information' => 'ARA 5.0',
            'description' => 'Ara adalah CTF',
        ]);

        DB::table('challenges')->insert([
            'id' => $chall1_id,
            'name' => 'rot13',
            'challenge_categories_id' => $category_id,
            'information_id' => $information_id,
            'message' => 'Xnyvore{Grfgvat} <br><br>Author : BosToken',
            'flag' => "Kaliber{Testing}",
            'value' => 500,
        ]);

        DB::table('challenges')->insert([
            'id' => $chall2_id,
            'name' => 'base64',
            'challenge_categories_id' => $category_id,
            'information_id' => $information_id,
            'message' => 'S2FsaWJlcntUZXN0aW5nfQ== <br><br>Author : BosToken',
            'flag' => "Kaliber{Testing}",
            'value' => 500,
        ]);
        
        DB::table('challenges')->insert([
            'id' => $chall3_id,
            'name' => 'c4esar',
            'challenge_categories_id' => $category_id,
            'information_id' => $information_id,
            'message' => 'Gwhexan{Paopejc} <br><br>Author : BosToken',
            'flag' => "Kaliber{Testing}",
            'value' => 500,
        ]);

        DB::table('challenges')->insert([
            'id' => Str::uuid()->toString(),
            'name' => 'vigener',
            'challenge_categories_id' => $category_id,
            'information_id' => $information_id,
            'message' => 'astaga:Kseiher{Lxsziny} <br><br>Author : BosToken',
            'flag' => "Kaliber{Testing}",
            'value' => 500,
        ]);

        DB::table('solvers')->insert([
            'id' => Str::uuid()->toString(),
            'user_id' => $user2_id,
            'challenge_id' => $chall1_id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('solvers')->insert([
            'id' => Str::uuid()->toString(),
            'user_id' => $user2_id,
            'challenge_id' => $chall2_id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('solvers')->insert([
            'id' => Str::uuid()->toString(),
            'user_id' => $user2_id,
            'challenge_id' => $chall3_id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('roles')->insert([
            'id' => $role1_id,
            'name' => "Admin",
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('roles')->insert([
            'id' => $role2_id,
            'name' => "User",
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('user_roles')->insert([
            'id' => Str::uuid()->toString(),
            'user_id' => $user_id,
            'role_id' => $role1_id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('user_roles')->insert([
            'id' => Str::uuid()->toString(),
            'user_id' => $user2_id,
            'role_id' => $role2_id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('user_roles')->insert([
            'id' => Str::uuid()->toString(),
            'user_id' => $user3_id,
            'role_id' => $role2_id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}

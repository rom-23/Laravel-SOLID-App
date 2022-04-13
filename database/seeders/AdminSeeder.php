<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * Class ArticleSeeder
 * @package Database\Seeders
 */
class AdminSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run(): void
    {

        User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'remember_token' => Str::random(10),
            'is_admin' => 1
        ]);
    }
}

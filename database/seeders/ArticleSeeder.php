<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Database\Seeder;

/**
 * Class ArticleSeeder
 * @package Database\Seeders
 */
class ArticleSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run(): void
    {

        Article::factory(5)->create();

    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;

/**
 * @extends Factory
 */
class ArticleFactory extends Factory
{

    /**
     * @return array
     */
    #[ArrayShape(['title' => "string", 'content' => "string"])]
    public function definition(): array
    {
        return [
            'title'=> $this->faker->sentence(),
            'content'=> $this->faker->sentence()
        ];
    }
}

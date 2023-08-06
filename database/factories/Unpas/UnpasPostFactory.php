<?php

namespace Database\Factories\Unpas;

use App\Models\Unpas\UnpasPost;
use Illuminate\Database\Eloquent\Factories\Factory;

class UnpasPostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UnpasPost::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
      return [
        'title' => $this->faker->sentence(mt_rand(2,8)),
        'slug' => $this->faker->slug(),
        'excerpt' => $this->faker->paragraph(),
        // 'body' => '<p>'.implode('</p><p>', $this->faker->paragraphs(mt_rand(5,10))).'</p>',
        'body' => collect($this->faker->paragraphs(mt_rand(5,10)))
                  ->map(fn($p) => "<p>$p</p>")
                  ->implode(''),
        'unpas_user_id' => mt_rand(1,3),
        'unpas_category_id' => mt_rand(1,2),
      ];
    }
}

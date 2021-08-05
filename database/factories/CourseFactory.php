<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Course;
use App\Models\User;
use App\Models\level;
use App\Models\Price;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Course::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // Generamos un slug, url-amigable

        $title = $this->faker->sentence();

        return [
            'title' => $this->faker->sentence(),
            'subtitle' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'status' => $this->faker->randomElement([Course::BORRADOR, Course::REVISION, Course::PUBLICADO]),
            'slug' => Str::slug('title'),
            'user_id' => 1,
            'level_id' => level::all()->random()->id,
            'category_id' => Category::all()->random()->id,
            'price_id' => Price::all()->random()->id,


        ];
    }
}

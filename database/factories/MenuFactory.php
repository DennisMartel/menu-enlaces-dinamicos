<?php

namespace Database\Factories;

use App\Models\Menu;
use Illuminate\Database\Eloquent\Factories\Factory;

class MenuFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Menu::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $factory->define(App\Menu::class, function (Faker\Generator $faker) {
            $name = $faker->name;
            $menus = App\Menu::all();
            return [
                'name' => $name,
                'slug' => str_slug($name),
                'parent' => (count($menus) > 0) ? $faker->randomElement($menus->pluck('id')->toArray()) : 0,
                'order' => 0
            ];
        });
    }
}

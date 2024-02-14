<?php

namespace Database\Factories;

use App\Models\Resource;
use Illuminate\Database\Eloquent\Factories\Factory;




class ResourceFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Resource::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => fake()->sentence,
            'link' => fake()->url,
            'id_user' => \App\Models\User::pluck('id')->random(),
            'id_type' => \App\Models\Type::pluck('id')->random(),
            'id_tag' => \App\Models\Tag::pluck('id')->random(),
        ];
    }
}

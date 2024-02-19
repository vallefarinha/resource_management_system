<?php

namespace Database\Factories;

use App\Models\Extra;
use Illuminate\Database\Eloquent\Factories\Factory;




/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Extra>
 */
class ExtraFactory extends Factory
{
    
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Extra::class;


    public function definition()
    {
        return [
            'extra_name' => fake()->sentence,
            'extra_link' => fake()->url,
            'id_tag' => \App\Models\Tag::pluck('id')->random(),
            'id_resource' => \App\Models\Resource::pluck('id')->random(),
        ];
    }
}





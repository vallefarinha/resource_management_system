<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Resource;
use App\Models\Type;
use App\Models\Tag;
use App\Models\Extra;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // // Crear instancias del modelo Type
        // Type::factory()->create(['type_name' => 'MasterClass']);
        // Type::factory()->create(['type_name' => 'Pill']);
        // Type::factory()->create(['type_name' => 'Transversal']);
        // Type::factory()->create(['type_name' => 'CodingLive']);

        // // Crear instancias del modelo Tag utilizando factory
        // Tag::factory()->create(['tag_name' => 'Introduction']);
        // Tag::factory()->create(['tag_name' => 'Functional & Technical Analysis']);
        // Tag::factory()->create(['tag_name' => 'Front-End']);
        // Tag::factory()->create(['tag_name' => 'QA']);
        // Tag::factory()->create(['tag_name' => 'Project Management']);
        // Tag::factory()->create(['tag_name' => 'Architecture']);

        // Crear 10 instancias aleatorias del modelo User
        User::factory(10)->create();
        Resource::factory(10)->create();
        Extra::factory(20)->create();

        // Crear 10 instancias aleatorias del modelo Resource
    }
}
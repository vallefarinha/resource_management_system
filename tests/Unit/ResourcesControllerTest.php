<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Http\Controllers\ResourcesController;

class ResourcesControllerTest extends TestCase
{

    public function test_extras_are_displayed_correctly(): void
    {
         // arrange o preparacion
         
        $response = $this->get('/extras');

        // Verificar que la solicitud fue exitosa
        $response->assertStatus(200);

        // Verificar que los extras se están mostrando en la vista
        foreach (Extra::all() as $extra) {
            $response->assertSee($extra->name);
            $response->assertSee((string)$extra->price);
         }
    }
}
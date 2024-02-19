<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateExtraTest extends TestCase
{
      /**
     * Priobar a crear un registro en  Extra
     */
    public function test_an_extra_resource_can_be_created(): void
    {
        // arrange o preparacion
        //creo un array con los datos que enviará un formulario de extra
        $extraData = [
            'extra_name' => 'name extra test',
            'extra_link' => 'sdfs',
            'id_tag'=> '1',
            'id_resource'=> '1'
        ];

        //act o actuar
        // vamos a mandar este forulario a una ruta store.extra de tipo post
        // la ruta para la prueba tiene que no existir
        $response = $this -> post('/resource/extra', $extraData);

        //assert o afirmar
        //302 significa que el rescurso si esta en una ubicacion
        //302 para probar post put patch para indicar que debe ser redirigido a otra paguina
        $response-> assertStatus (302);
        // esta otra validacion o assert espara probar que en la base de datos existe estoa tabla y datos
        $this->assertDatabaseHas ('extras', $extraData);
        
    }
}

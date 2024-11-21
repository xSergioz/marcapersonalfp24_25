<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ReconocimientoControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);

    $response = $this->get('/reconocimiento');
            $estudiante_id = [
                '1',
                '2',
                '3',
                '4',
                '5',
                '6',
                '7',
                '8',
                '9',
                '10',
            ];

            $response
            ->assertStatus(200)
            ->assertViewIs('reconocimiento.index')
            ->assertSeeTextInOrder($estudiante_id, $escaped = true);

        /**
         * proyectos show test.
         */
            $response = $this->get("/reconocimiento/show/1");

            $response
            ->assertStatus(200)
            ->assertViewIs('reconocimiento.show')
            ->assertSeeText('1', $escaped = true);

            $response = $this->get("/reconocimiento/show/2");

            $response
            ->assertSeeText('2', $escaped = true);

            $response = $this->get("/reconocimiento/show/A");
            $response->assertNotFound();

        /**
         * proyectos create test.
         */
            $value = 'Añadir Reconocimientos';
            $response = $this->get('/reconocimiento/create');

            $response
            ->assertStatus(200)
            ->assertViewIs('reconocimiento.create')
            ->assertSeeText($value, $escaped = true);

        /**
         * proyectos edit test.
         */
            $id = rand(1, 10);
            $value = "Modificar Reconocimiento";
            $response = $this->get("/reconocimiento/edit/$id");

            $response
            ->assertStatus(200)
            ->assertViewIs('reconocimiento.edit')
            ->assertSeeText($value, $escaped = true);

            $response = $this->get("/reconocimiento/edit/A");
            $response->assertNotFound();
    }
}

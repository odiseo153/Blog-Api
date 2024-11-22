<?php

use Tests\TestCase;
use App\Models\User;
use function Pest\Laravel\post;

pest()->extend(TestCase::class);

describe('Authentication', function () {

    beforeEach(function () {
        // Definir credenciales correctas e incorrectas en el contexto `$this`
        $this->credentials = [
            "email" => "odiseo@gmail.com",
            "password" => "12345"
        ];

        $this->badCredentials = [
            "email" => "odiseo@gmail.com",
            "password" => "1234567"
        ];
    });

    it('the user can authenticate', function () {
        // Intentar iniciar sesión con las credenciales correctas
        $response = $this->postJson('api/login', $this->credentials);
        $response->assertStatus(200);
    });

    it('the user cant authenticate with wrong credentials', function () {
        // Intentar iniciar sesión con las credenciales incorrectas
        $response = $this->postJson('api/login', $this->badCredentials);
        $response->assertStatus(401);
    });

    it('the user can get his data', function () {
        // Autenticarse con credenciales correctas para obtener el token
        $response = $this->postJson('api/login', $this->credentials);
        $token = $response->json('token');
    
        // Verificar que el usuario puede obtener sus datos con el token válido
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->getJson('api/me');
    
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'Authenticated' => [
                'id',
                'name',
                'role',
                'email',
                'email_verified_at',
                'created_at',
                'updated_at',
            ],
        ]);
    })
    ->depends('it the user can authenticate'); // Reutiliza el estado de la prueba de autenticación


  
});

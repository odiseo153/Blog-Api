<?php

use App\Models\User;
use Tests\TestCase;

pest()->extend(TestCase::class);

describe('User Model Tests', function () {

    it('can create a user using the factory', function () {
        $user = User::factory()->create();
        try {
            expect($user->exists)->toBeTrue();
        } finally {
            $user->delete();
        }
    });

    it('can fetch a user by ID', function () {
        $user = User::factory()->create();
        try {
            $response = $this->getJson('api/users/' . $user->id);
            $response->assertOk();
        } finally {
            $user->delete();
        }
    });

    /*
    it('can delete a user', function () {
        $user = User::factory()->create();
        try {
            $response = $this->deleteJson('api/users/' . $user->id);
            
            $response->assertStatus(200);
        } finally {
            
    }
});
*/

    it('can fetch all users', function () {
        $response = $this->getJson('api/users');
        $response->assertOk();
    });

});








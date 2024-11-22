<?php



arch('The userController has index , show')
    ->expect('App\Http\Controllers\UserController')
    ->toHaveMethods(['index', 'show']);

    dataset('numbers', [
        'positive numbers' => [1, 2, 3],
        'negative numbers' => [-1, -2, -3],
        'mixed numbers'    => [-1, 8, 7],
    ]);


    it('calculates the sum of two numbers', function ($a, $b, $expected) {
        expect($a + $b)->toBe($expected);
    })->with('numbers');





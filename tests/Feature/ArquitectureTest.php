<?php

use Tests\TestCase;


pest()->extend(TestCase::class);


Describe('Arquitectura Hexagonal User Feature', function () {

        arch('Tiene su Puerto')
        ->expect('App\User\Domain\Contracts')
        ->toBeInterface()
        ->toImplementNothing()
        ->toExtendNothing();

        arch('Tiene su Entity')
        ->expect('App\User\Domain\Entities')
        ->toBeClass()
        ->toUseNothing()
        ->toExtendNothing();


        arch('Tiene su crud en su Controller y extiende de BaseController')
        ->expect('App\User\Adapters\Controllers\UserController')
        ->toHaveMethod(['index','store','show'])
        ->toExtend('App\Shared\Controllers\BaseController');


        arch('El Puerto es usado en repositories y services y en el Provider')
        ->expect('App\User\Domain\Contracts\UserRepositoryPort')
        ->toOnlyBeUsedIn([
            'App\User\Adapters\Repositories'
            ,'App\User\Domain\Services'
            ,'App\User\UserServiceProvider'
        ]);


        arch('El Repositorio implementa el Puerto y hereda de BaseRepository')
        ->expect('App\User\Adapters\Repositories')
        ->toImplement(['App\User\Domain\Contracts\UserRepositoryPort'])
        ->toExtend('App\Shared\Repositories\BaseRepository');


    });








<?php


use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
        api: [
            __DIR__ . '/../routes/api.php',
            __DIR__ . '/../routes/posts.php',
            __DIR__ . '/../routes/users.php',
            __DIR__ . '/../routes/comments.php',
            __DIR__ . '/../routes/likes.php',
        ],
        
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (UniqueConstraintViolationException $e, Request $request) {
            $errorString = $e->getMessage();
            $duplicateKeyMessage = "Duplicate key";

            if (preg_match('/Key \((.*?)\)=/', $errorString, $matches)) {
                $keyName = $matches[1];
                $duplicateKeyMessage = "Duplicate key: $keyName";
            }

            return response()->json([
                'errors' => [
                    [
                        'status' => 409,
                        'message' => $duplicateKeyMessage,
                        'source' => $request->path()
                    ]
                ]
            ], 409);
        });

        $exceptions->render(function (ValidationException $e, Request $request) {
            foreach ($e->errors() as $key => $value) {
                foreach ($value as $message) {
                    $errors[] = [
                        'status' => 422,
                        'message' => $message,
                        'source' => $key
                    ];
                }
            }

            return response()->json([
                'errors' => $errors
            ], 422);
        });

        $exceptions->render(function (AuthenticationException $e, Request $request) {
            return response()->json([
                'errors' => [
                    [
                        'status' => 401,
                        'message' => 'Unauthenticated',
                        'source' => $request->path()
                    ]
                ]
            ], 401);
        });

        $exceptions->render(function (AuthorizationException $e, Request $request) {
            return response()->json([
                'errors' => [
                    [
                        'status' => 403,
                        'message' => 'Unauthorized',
                        'source' => $request->path()
                    ]
                ]
            ], 403);
        });

        $exceptions->render(function (MethodNotAllowedHttpException $e, Request $request) {
            return response()->json([
                'errors' => [
                    [
                        'status' => 405,
                        'message' => 'Method not allowed',
                        'source' => $request->path()
                    ]
                ]
            ], 405);
        });

        $exceptions->render(function (NotFoundHttpException $e, Request $request) {
            return response()->json([
                'errors' => [
                    [
                        'status' => 404,
                        'message' => 'Resource not found',
                        'source' => $request->path()
                    ]
                ]
            ], 404);
        });

        $exceptions->render(function (ModelNotFoundException $e, Request $request) {
            return response()->json([
                'errors' => [
                    [
                        'status' => 404,
                        'message' => 'Resource not found',
                        'source' => $request->path()
                    ]
                ]
            ], 404);
        });

        $exceptions->render(function (BadMethodCallException $e, Request $request) {
            return response()->json([
                'errors' => [
                    [
                        'status' => 405,
                        'message' => 'Bad method call',
                        'source' => $request->path()
                    ]
                ]
            ], 405);
        });

        $exceptions->render(function (QueryException $e, Request $request) {
            return response()->json([
                'errors' => [
                    [
                        'status' => 500,
                        'message' => $e->getMessage(),
                        'source' => $request->path()
                    ]
                ]
            ], 500);
        });

        $exceptions->render(function (HttpException $e, Request $request) {
            return response()->json([
                'errors' => [
                    [
                        'status' => $e->getStatusCode(),
                        'message' => $e->getMessage(),
                        'source' => $request->path()
                    ]
                ]
            ], $e->getStatusCode());
        });
    })
    ->create();

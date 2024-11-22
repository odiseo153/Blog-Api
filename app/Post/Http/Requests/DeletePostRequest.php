<?php

namespace App\Post\Http\Requests;

use App\Http\Requests\BaseRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class DeletePostRequest extends BaseRequest
{
    public function authorize(): bool
    {
        // Obtener el ID del post desde la entrada
        $postId = $this->route('id_post') ?? $this->input('id_post');
        
        // Verificar si el post pertenece al usuario autenticado
        $post = Post::find($postId);

        $IsValidated = $post && $post->user_id === Auth::id();
        Log::info($IsValidated);

        return true;
    }


    public function rules(): array
    {
        return [
            'id_post' => 'required|string|exists:posts,id',
        ];
    }


}







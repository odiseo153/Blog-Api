<?php

namespace App\Like\Http\Requests;

use App\Shared\Http\Requests\BaseFormRequest;

class CreateLikeRequest extends BaseFormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'post_id' => 'required|string|exists:posts,id',
            'user_id' => 'required|string||exists:users,id',
        ];
    }
}




<?php

namespace App\Post\Http\Requests;

use App\Models\Post;
use App\Http\Requests\BaseRequest;
use Illuminate\Support\Facades\Auth;

class CreatePostRequest extends BaseRequest
{
    public function authorize(): bool
    {
        $user = Auth::user();
        return $user->can('create', Post::class);
    } 

    public function validated($key = null, $default = null)
    {
        $validatedData = parent::validated();
        // Add user_id after validation
        $validatedData['user_id'] = $this->user()->id;

        return $validatedData;
    }



    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255|unique:posts,title',
            'content' => 'required|string|max:255',
            'category_id' => 'required|string|exists:categories,id'
        ];
    }


}







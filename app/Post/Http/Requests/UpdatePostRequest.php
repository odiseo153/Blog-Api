<?php

namespace App\Post\Http\Requests;

use App\Models\Post;
use App\Http\Requests\BaseRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class UpdatePostRequest extends BaseRequest
{
    public function authorize(): bool
    {
        $user = Auth::user();
        Log::info($user);
        //return $user->can('update', [$user,Post::class]);
        return true;
    } 


    public function rules(): array
    {
        return [
            'title' => 'string|max:255|unique:posts,title',
            'content' => 'string|max:255',
            'category_id' => 'string|exists:categories,id'
        ];
    }


}



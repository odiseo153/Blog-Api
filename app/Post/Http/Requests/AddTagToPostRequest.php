<?php

namespace App\Post\Http\Requests;

use App\Models\Post;
use App\Http\Requests\BaseRequest;
use Illuminate\Support\Facades\Auth;

class AddTagToPostRequest extends BaseRequest
{
    public function authorize(): bool
    {
        $user = Auth::user();
        return $user->can('update', [$user,Post::class]);
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
            'tag_id' => 'required|string|max:255|exists:posts,id',
            'post_id' => 'required|string|max:255|exists:posts,id'
        ];
    }


}







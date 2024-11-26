<?php

namespace App\Post\Http\Requests;

use App\Http\Requests\BaseRequest;


class AddTagToPostRequest extends BaseRequest
{
    public function authorize(): bool
    {
       // $user = Auth::user();
        //return $user->can('update', [$user,Post::class]);
        return true;
    } 


    public function rules(): array
    {
        return [
            'tag_id' => 'required|string|max:255|exists:tags,id',
            'post_id' => 'required|string|max:255|exists:posts,id'
        ];
    }


}







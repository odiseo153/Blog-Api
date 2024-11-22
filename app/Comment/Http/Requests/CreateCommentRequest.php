<?php

namespace App\Comment\Http\Requests;

use App\Http\Requests\BaseRequest;

class CreateCommentRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    } 

    public function validated($key = null, $default = null)
    {
        $validatedData = parent::validated();
        $validatedData['user_id'] = $this->user()->id;

        return $validatedData;
    }

    public function rules(): array
    {
        return [
            'content' => 'required|string|max:255',
            'post_id' => 'required|string|exists:posts,id',
            'parent_id' => 'string|exists:comments,id'
        ];
    }

}







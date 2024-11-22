<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends BaseRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */


    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'user_id' => 'required|exists:users,id', // Ensure the author exists in the users table
            'publish_date' => 'required|date', // Ensure it's a valid date
            'category_id' => 'required|exists:categories,id', // Ensure the category exists in the categories table
            'views_count' => 'nullable|integer|min:0', // Optional, must be a non-negative integer
            'like_count' => 'nullable|integer|min:0', // Optional, must be a non-negative integer
        ];
    }
}





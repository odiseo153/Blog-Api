<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BaseRequest extends FormRequest
{
    public function mappedAttributes()
    {
        $attributeMap = [
            'name' => 'name',
            
        ];

        $attributes = [];
        foreach ($attributeMap as $key => $attribute) {
            if ($this->has($key)) {
                $attributes[$attribute] = $this->input($key);
            }
        }

        return $attributes;
    }
}

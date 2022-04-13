<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array
     */
    #[ArrayShape(['name' => "string[]", 'image' => "string[]", 'description' => "string[]"])]
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'image' => ['required', 'image'],
            'description' => ['required']
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class MenuStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    #[ArrayShape(['name' => "string[]", 'description' => "string[]", 'price' => "string[]", 'image' => "string[]"])]
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'description' => ['required'],
            'price'=>['required'],
            'image' => ['required','image']
        ];
    }
}

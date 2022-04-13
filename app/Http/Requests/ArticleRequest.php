<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class ArticleRequest extends FormRequest
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
    #[ArrayShape(['title' => "string", 'content' => "string"])]
    public function rules(): array
    {
        return [
            'title'=>'required|min:6|max:150',
            'content'=>'required'
        ];
    }
}

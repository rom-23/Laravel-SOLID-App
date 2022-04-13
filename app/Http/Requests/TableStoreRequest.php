<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class TableStoreRequest extends FormRequest
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
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    #[ArrayShape(['name' => "string[]", 'guest_number' => "string[]", 'status' => "string[]", 'location' => "string[]"])]
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'guest_number' => ['required'],
            'status' => ['required'],
            'location' => ['required'],
        ];
    }
}

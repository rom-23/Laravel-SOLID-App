<?php

namespace App\Http\Validation;

use JetBrains\PhpStorm\ArrayShape;

/**
 * Class ReservationValidation
 * @package App\Http\Validation
 */
class ReservationValidation
{
    /**
     * @return string[][]
     */
    #[ArrayShape(['firstName' => "string[]", 'lastName' => "string[]", 'email' => "string[]", 'telNumber' => "string[]",
        'resDate' => "string[]", 'guestNumber' => "string[]", 'table_id' => "string[]"])]
    public function Rules(): array
    {
        return [
            'firstName' => ['required', 'string'],
            'lastName' => ['required', 'string'],
            'email' => ['required', 'string'],
            'telNumber' => ['required', 'string'],
            'resDate' => ['required', 'string'],
            'guestNumber' => ['required', 'string'],
            'table_id' => ['required', 'string'],

        ];
    }

    /**
     * @return string[]
     */
    #[ArrayShape(['firstName.required' => "string", 'lastName.required' => "string", 'email.required' => "string",
        'telNumber.required' => "string", 'resDate.required' => "string", 'guestNumber.required' => "string", 'table_id.required' => "string"])]
    public function Messages(): array
    {
        return [
            'firstName.required' => 'Need a firstname please',
            'lastName.required' => 'Need a lastname please',
            'email.required' => 'Need an email please',
            'telNumber.required' => 'Need a tel number please',
            'resDate.required' => 'Need a date please',
            'guestNumber.required' => 'Need a guest number please',
            'table_id.required' => 'Need a table please',
        ];
    }
}

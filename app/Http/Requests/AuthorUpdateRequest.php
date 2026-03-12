<?php

namespace App\Http\Requests;

use App\Data\Author\AuthorUpdateData;
use Illuminate\Foundation\Http\FormRequest;

class AuthorUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name'             => 'sometimes|string|max:255',
            'last_book_title'  => 'nullable|string|max:255',
        ];
    }

    /**
     * Get the validated data as a DTO.
     */
    public function toDTO(): AuthorUpdateData
    {
        return AuthorUpdateData::from($this->validated());
    }
}

<?php

namespace App\Http\Requests;

use App\Data\Author\AuthorIndexData;
use Illuminate\Foundation\Http\FormRequest;

class AuthorIndexRequest extends FormRequest
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
            'search' => 'nullable|string|max:255',
            'page'   => 'nullable|integer|min:1',
        ];
    }

    /**
     * Get the validated data as a DTO.
     */
    public function toDTO(): AuthorIndexData
    {
        return AuthorIndexData::from([
            'search'   => $this->query('search'),
            'page'     => $this->query('page', 1),
            'per_page' => 10,
        ]);
    }
}

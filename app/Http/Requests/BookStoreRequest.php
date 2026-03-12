<?php

namespace App\Http\Requests;

use App\Data\Book\BookStoreData;
use Illuminate\Foundation\Http\FormRequest;

class BookStoreRequest extends FormRequest
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
            'title'        => 'required|string|max:255',
            'description'  => 'nullable|string',
            'author_ids'   => 'required|array',
            'author_ids.*' => 'exists:authors,id'
        ];
    }

    /**
     * Get the validated data as a DTO.
     */
    public function toDTO(): BookStoreData
    {
        return BookStoreData::from($this->validated());
    }
}

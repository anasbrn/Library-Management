<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
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
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|max:30',
            'author' => 'required',
            'isbn' => 'required|min:13',
            'date_pub' => 'required|date',
            'num_pages' => 'required|integer',
            'collection' => 'required|string',
            'location' => 'required|string',
            'status' => 'required|string',
            'gender' => 'required',
        ];
    }
}

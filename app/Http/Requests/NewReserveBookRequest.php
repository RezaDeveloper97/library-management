<?php

namespace App\Http\Requests;

use App\Models\BookStock;
use Illuminate\Foundation\Http\FormRequest;

class NewReserveBookRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'book_stock_id' => 'required|integer|exists:book_stocks,id',
        ];
    }
}

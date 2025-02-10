<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilterBookStockRequest extends FormRequest
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
            'per_page' => 'integer|min:1',
            'book_id' => 'nullable|integer',
            'book_title' => 'nullable|string',
            'edition_id' => 'nullable|integer',
            'branch_id' => 'nullable|integer',
            'province_id' => 'nullable|integer',
            'city_id' => 'nullable|integer',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $bookId = $this->input('book_id');
            $bookTitle = $this->input('book_title');
            $provinceId = $this->input('province_id');
            $cityId = $this->input('city_id');
            $branchId = $this->input('branch_id');

            if (!is_null($bookId) && !is_null($bookTitle)) {
                $validator->errors()->add('book_id_or_title', 'error, which one, book_id or book_title');
            }

            if (!is_null($provinceId) && !is_null($cityId)) {
                $validator->errors()->add('province_id_or_city_id', 'error, which one, province_id or city_id');
            }

            if (!is_null($branchId) && (!is_null($provinceId) || !is_null($cityId))) {
                $validator->errors()->add('branch_or_location', 'error, which one, branchId or location');
            }
        });
    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        $response = response()->json([
            'status' => 'error',
            'message' => 'Validation errors occurred.',
            'errors' => $validator->errors(),
        ], 422);

        throw new \Illuminate\Validation\ValidationException($validator, $response);
    }
}

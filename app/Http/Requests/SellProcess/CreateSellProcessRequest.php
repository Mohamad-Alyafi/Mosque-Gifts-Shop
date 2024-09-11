<?php

namespace App\Http\Requests\SellProcess;

use Illuminate\Foundation\Http\FormRequest;

class CreateSellProcessRequest extends FormRequest
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
            'price' => ['required', 'integer'],
            'teacher_id' => ['required', 'exists:teachers,id'],
            'student_id' => ['required', 'exists:students,id'],
            'sell_point_id' => ['required', 'exists:sell_points,id'],
        ];
    }
}

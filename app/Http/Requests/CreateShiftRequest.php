<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateShiftRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "branch_id" => "required|exists:branches,id",
            "doctor_id" => "required",
            "day" => "required",
            "from" => "required",
            "to" => "required",
            "type" => "required",
            "duration" => "required_if:type,by_time",
            "max_reservation" => "required_if:type,by_number",

        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateDoctorRequest extends FormRequest
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


    private function authKeyRules() {
        // the nullable value should always be in index 1
        $rules = [
            "username"=>["string","nullable"],
            "email"=>["email","nullable"],
            "phone"=>["string","nullable"]
        ];
        $key = config('settings.doctor_auth','email');
        $rules[$key][1] = "required";
        return $rules;
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if (str_contains('doctors/create',request()->path()))
        {
            return [
                "name" => "required",
                "password" => "required | min:5",
                "speciality" => "required|exists:specialities,id",
            ]+$this->authKeyRules();
        }

        return [
                "name" => "required",
                "password" => "nullable | min:5",
                "speciality" => "required|exists:specialities,id",
        ]+$this->authKeyRules();
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplyRecruitmentRequest extends FormRequest
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
            'cv' => ['required', 'file'],
            'job_application' => ['required', 'file'],
            'working_time' => ['required', 'in:fulltime,unstable'],
            'id_frontside' => ['required', 'image'],
            'id_backside' => ['required', 'image'],
            'license_frontside' => ['required', 'image'],
            'license_backside' => ['required', 'image'],
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAppointmentRequest extends FormRequest
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
            'donor_name' => 'required',
            'donor_email' => 'required|email',
            'donor_contact' => 'required',
            'date' => 'required',
            'donation_type_id' => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'donation_type_id' => 'donation type',
        ];
    }
}

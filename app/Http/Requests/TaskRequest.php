<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class TaskRequest extends Request
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
            'tache' => 'required|min:5|max:20|alpha',
            'description' => 'required|min:5|max:30|alpha',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobRequest extends FormRequest
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
            'name' => 'required',
            'skill' => 'required',
            'amount' => 'required|numeric',
            'note' => 'required',
            'salary' => 'required',
            'level_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên Job ko đc để trống',
            'skill.required' => 'Kỹ năng không được để trống',
            'amount.required' => 'Số lượng không được để trống',
            'amount.numeric' => 'Số lượng phải là 1 số',
            'note.required' => 'Ghi chú không được để trống',
            'salary.required' => 'Mức lương không được để trống',
            'level_id.required' => 'Level không được để trống',
        ];
    }
}

<?php

namespace App\Http\Requests;

use App\Enums\ContactRoles;
use Auth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class JiriStoreRequest extends FormRequest
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
        $roles = implode(',', [ContactRoles::Evaluator->value, ContactRoles::Student->value]);

        $rules = [
            'name' => 'required|between:3,255',
            'starting_at' =>  'required|date_format:Y-m-d H:i',
            'contacts' => Rule::exists('contacts', 'id')->where('user_id', Auth::user()->id),
            'projects' => Rule::exists('projects', 'id')->where('user_id', Auth::user()->id),
        ];

        $request_data = $this->all();
        foreach ($request_data as $key => $value) {
             if(preg_match('/^role-\d+$/', $key)){
                 $rules[$key] = "in:$roles";
             }
        }

        return $rules;
    }
}

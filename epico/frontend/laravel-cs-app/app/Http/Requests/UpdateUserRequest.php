<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return User::where('id', $this->id)
                   ->where('id', Auth::id())->exists();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:4|max:30',
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            //'slug' => 'required|min:2|max:10|alpha_dash|unique:users,slug,'.$this->id.'|not_in:'.Lang::get('validation.forbidden_names'),
            //'bio' => 'max:140',
        ];
    }

    /**
    * Get the error messages for the defined validation rules.
    *
    * @return array
    */
    public function messages()
    {
        return [
            'slug.required' => 'Adresu profilu je nutné vyplnit.',
            'slug.min' => 'Adresa profilu musí mít alespoň :min znaky.',
            'slug.max' => 'Adresa profilu nesmí mít více než :max znaků.',
            'slug.alpha_dash' => 'Můžete použít pouze písmena, čísla a pomlčku.',
            'slug.unique' => 'Takto nazvaná adresa už je obsazená.',
            'slug.not_in' => 'Takto nazvaná adresa je zakázaná.',
            'bio.max' => 'Povídání nesmí přesáhnout :max znaků.',
        ];
    }

    /**
     * Modify the input, from null to empty strings.
     *
     * @return void
     */
    public function prepareForValidation()
    {
        $input = array_map('trim', $this->all());
        //$input['slug'] = str_slug($input['slug']);
/* 
        if (!isset($input['bio']))
            $input['bio'] = ''; */

        $this->replace($input);
    }
}

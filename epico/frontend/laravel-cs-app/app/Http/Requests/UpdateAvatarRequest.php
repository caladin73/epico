<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Illuminate\Foundation\Http\FormRequest;

class UpdateAvatarRequest extends FormRequest
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
            //'slug' => 'required|min:2|max:10|alpha_dash|unique:users,slug,'.$this->id.'|not_in:'.Lang::get('validation.forbidden_names'),
            //'bio' => 'max:140',
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
    

/*     public function update_avatar(UpdateAvatarRequest $request){
        
                // Handle the user upload of avatar
                if($request->hasFile('avatar')){
                    $avatar = $request->file('avatar');
                    $filename = time() . '.' . $avatar->getClientOriginalExtension();
                    Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );
        
                    $user = Auth::user();
                    $user->avatar = $filename;
                    $user->save();
                }

            } */

    /**
     * Modify the input, from null to empty strings.
     *
     * @return void
     */
    public function prepareForValidation()
    {
        $input = array_map('trim', $this->all());
        //$input['slug'] = str_slug($input['slug']);
        //$input['avatar'] = update_avatar($input['avatar']);
/* 
        if (!isset($input['bio']))
            $input['bio'] = ''; */

        $this->replace($input);
    }
}

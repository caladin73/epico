<?php
/**
 * Created by PhpStorm.
 * User: Tony
 * Date: 11/28/2017
 * Time: 9:24 PM
 */

namespace App\Http\Middleware;


use App\Models\UserProfileModel;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Auth;

class LoginModule
{
    public static function authenticate($email, $password) {
        $userProfileModel = UserProfileModel::where([
            "email" => $email
        ])->first();

        if ( $userProfileModel != null && LoginModule::checkPassword($userProfileModel, $password) ) {
            Auth::login($userProfileModel);
        }

        return $userProfileModel;
    }

    public static function setPassword(UserProfileModel &$profileModel, $password) {
        $salt = LoginModule::generateRandomString();
        $hash = hash("sha256", $password . $salt);

        $profileModel->password = $hash;
        $profileModel->password_salt = $salt;

        $profileModel->save();
    }

    public static function checkPassword(UserProfileModel $profileModel, $password) {
        $hash = hash("sha256", $password . $profileModel->password_salt);

        if ($profileModel->password == $hash) {
            return true;
        } else {
            return false;
        }
    }

    public static function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }



}
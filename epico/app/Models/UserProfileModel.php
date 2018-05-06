<?php
/**
 * Created by PhpStorm.
 * User: Tony
 * Date: 11/28/2017
 * Time: 8:19 PM
 */

namespace App\Models;

use App\Contact;
use App\UserProfile;

class UserProfileModel extends UserProfile
{
    public function __construct()
    {

    }

    public function getFullAddress() {
        $contact = Contact::where(["profile_id" => $this->id])->first();

        $address = "";
        if ($contact != null) {

            if ($contact->street != null) {
                $address .= $contact->street . ", ";
            }

            if ($contact->zip_code != null) {
                $address .= $contact->zip_code . ", ";
            }

            if ($contact->city != null) {
                $address .= $contact->city . ", ";
            }

            if ($contact->country != null) {
                $address .= $contact->country . ", ";
            }

            $address = substr($address, 0, -2);
        }

        return $address;
    }
}
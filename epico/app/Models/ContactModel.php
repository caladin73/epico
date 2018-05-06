<?php


namespace App\Models;

use App\Contact;

class ContactModel extends Contact
{
    /*
     * Constructor for api data
     */
    public function __construct($attributes = null)
    {
        if ($attributes != null) {
            $fill = [
                "street" => isset($attributes['NAME']) ? $attributes['NAME'] : null,
                "phone_number" => isset($attributes['PHONE']) ? $attributes['PHONE'] : null,
                "email" => isset($attributes['EMAIL']) ? $attributes['EMAIL'] : null,
                "contact_type" => isset($attributes['DEPARTMENT']) ? $attributes['DEPARTMENT'] : null,
            ];

            $this->fill($fill);
            return $this;
        }
    }
}
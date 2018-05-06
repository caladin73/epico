<?php


namespace App\Models;

use App\UserType;

class UserTypeModel extends UserType
{
    public function getTypeName() {
        $userTypeClass = new \ReflectionClass( '\App\Enums\UserTypeEnum' );
        $constants = $userTypeClass->getConstants();

        $constName = null;
        foreach ( $constants as $name => $value )
        {
            if ( $value == $this->user_type )
            {
                $constName = $name;
                break;
            }
        }

        $constName = str_replace("_", " ", $constName);


        return ucwords(strtolower($constName));
    }
}
<?php


namespace App\Models;

use App\Job;

class JobModel extends Job
{
    /*
     * Constructor for api data
     */
    public function __construct($attributes = null)
    {
        if ($attributes != null) {
            $fill = [
                "guid" => isset($attributes->Id) ? $attributes->Id : null,
                "description" => isset($attributes->Description) ? $attributes->Description : null,
                "title" => isset($attributes->HeadLine) ? $attributes->HeadLine : null,
                "location" => isset($attributes->Location) ? $attributes->Location : null,
                "start_date" => isset($attributes->JobBeginDate) ? JobModel::getDate($attributes->JobBeginDate) : null,
                "deadline" => isset($attributes->Applicationdeadline) ? JobModel::getDate($attributes->Applicationdeadline) : null,
                "duration" => isset($attributes->Duration) ? $attributes->Duration : null,
                "country" => isset($attributes->Duration) ? $attributes->Country : null,
                "external" => isset($attributes->ExternalAdIsPublished) ? $attributes->ExternalAdIsPublished : null,
                "type" => isset($attributes->AdvertisingType) ? $attributes->AdvertisingType : null,
                "email" => isset($attributes->SearchEmail) ? $attributes->SearchEmail : null,
                "footer" => isset($attributes->Footer) ? $attributes->Footer : null,
            ];

            $this->fill($fill);
            return $this;
        }
    }

    public function getShortDescription() {
        $desc = $this->description;

        if (strlen($desc) > 255) {
            $desc = substr($desc,0, 255) . "...";
        }

        return $desc;
    }

    private static function getDate($date) {
        $match = null;

        preg_match('/([0-9])+/', $date, $match);
        if ($match != null) {
            $match = $match[0] / 1000;
            $match = date('d.m.Y',$match);
        }

        return $match;
    }
}
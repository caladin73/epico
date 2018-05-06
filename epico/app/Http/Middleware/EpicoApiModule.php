<?php
/**
 * Created by PhpStorm.
 * User: Tony
 * Date: 11/27/2017
 * Time: 5:21 PM
 */

namespace App\Http\Middleware;


use App\Models\ContactModel;
use App\Models\JobModel;
use App\Job;

class EpicoApiModule
{
    static private $epicoApiModule = null;
    static private $jobEndpointUrl = null;
    static private $contactsEndpointUrl = null;
    static private $newsEndpointUrl = null;

    function __construct() {

    }

    static function init() {
        if (EpicoApiModule::$epicoApiModule == null) {
            EpicoApiModule::$epicoApiModule = new EpicoApiModule();
            EpicoApiModule::$jobEndpointUrl = env("EPICO_API_ENDPOINT_JOBS", null);
            EpicoApiModule::$contactsEndpointUrl = env("EPICO_API_ENDPOINT_CONTACTS", null);
            EpicoApiModule::$newsEndpointUrl = env("EPICO_API_ENDPOINT_NEWS", null);
        }
    }

    public static function GetJobs() {
        if (EpicoApiModule::$epicoApiModule == null) {
            EpicoApiModule::init();
        }

        $jobs = [];
        $data = json_decode(file_get_contents(EpicoApiModule::$jobEndpointUrl));

        foreach($data as $job) {
            array_push($jobs, new JobModel($job));
        }

        return $jobs;
    }

    public static function GetContacts() {
        if (EpicoApiModule::$epicoApiModule == null) {
            EpicoApiModule::init();
        }

        $parser = xml_parser_create();
        xml_parse_into_struct($parser, file_get_contents(EpicoApiModule::$contactsEndpointUrl), $data, $index);

        $contacts = [];

        foreach($data as $contact) {
            if ($contact['tag'] == "CONTACT") {
                array_push($contacts, new ContactModel($contact['attributes']));
            }
        }

        return $contacts;
    }

    public static function GetNews() {
        if (EpicoApiModule::$epicoApiModule == null) {
            EpicoApiModule::init();
        }

        $feed = simplexml_load_file(EpicoApiModule::$newsEndpointUrl);

        $news = [];
        foreach($feed->NewsAll->News as $item){
            array_push($news, $item);
        }

        return $news;
    }
}
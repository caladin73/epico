<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $contact_id
 * @property int $profile_id
 * @property string $street
 * @property string $city
 * @property string $zip_code
 * @property string $country
 * @property string $phone_number
 * @property int $contact_type
 * @property string $email
 * @property Profile $profile
 */
class Contact extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'contact';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'contact_id';

    /**
     * @var array
     */
    protected $fillable = ['profile_id', 'street', 'city', 'zip_code', 'country', 'phone_number', 'contact_type', 'email'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function profile()
    {
        return $this->belongsTo('App\Profile', null, 'profile_id');
    }
}

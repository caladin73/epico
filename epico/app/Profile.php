<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $profile_id
 * @property string $name
 * @property int $profile_type
 * @property Company $company
 * @property Contact[] $contacts
 * @property File[] $files
 * @property Job $job
 * @property UserProfile $userProfile
 */
class Profile extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'profile';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'profile_id';

    /**
     * @var array
     */
    protected $fillable = ['name', 'profile_type'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function company()
    {
        return $this->hasOne('App\Company', null, 'profile_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contacts()
    {
        return $this->hasMany('App\Contact', null, 'profile_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function files()
    {
        return $this->hasMany('App\File', null, 'profile_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function job()
    {
        return $this->hasOne('App\Job', null, 'profile_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function userProfile()
    {
        return $this->hasOne('App\UserProfile', 'id', 'profile_id');
    }
}

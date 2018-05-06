<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $password_salt
 * @property string $remember_token
 * @property string $linkedin_id
 * @property string $created_at
 * @property string $updated_at
 * @property int $notifications
 * @property Profile $profile
 * @property Company[] $companies
 * @property CompetenceUserProfileLink[] $competenceUserProfileLinks
 * @property Notification[] $notifications
 * @property UserType[] $userTypes
 */
class UserProfile extends User
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'user_profile';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['name', 'email', 'password', 'password_salt', 'remember_token', 'linkedin_id', 'created_at', 'updated_at', 'notifications'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function profile()
    {
        return $this->belongsTo('App\Profile', 'id', 'profile_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function companies()
    {
        return $this->hasMany('App\Company', 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function competenceUserProfileLinks()
    {
        return $this->hasMany('App\CompetenceUserProfileLink');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function notifications()
    {
        return $this->hasMany('App\Notification', 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userTypes()
    {
        return $this->hasMany('App\UserType', 'user_id');
    }
}

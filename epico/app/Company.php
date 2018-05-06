<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $company_id
 * @property int $user_id
 * @property string $company_name
 * @property string $government_id
 * @property Profile $profile
 * @property UserProfile $userProfile
 * @property Job[] $jobs
 */
class Company extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'company';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'company_id';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    protected $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['user_id', 'company_name', 'government_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function profile()
    {
        return $this->belongsTo('App\Profile', 'company_id', 'profile_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userProfile()
    {
        return $this->belongsTo('App\UserProfile', 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function jobs()
    {
        return $this->hasMany('App\Job', null, 'company_id');
    }
}

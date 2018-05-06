<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $competence_id
 * @property int $user_profile_id
 * @property int $level
 * @property int $priority
 * @property Competence $competence
 * @property UserProfile $userProfile
 */
class CompetenceUserProfileLink extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'competence_user_profile_link';

    /**
     * @var array
     */
    protected $fillable = ['level', 'priority'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function competence()
    {
        return $this->belongsTo('App\Competence', null, 'competence_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userProfile()
    {
        return $this->belongsTo('App\UserProfile');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $notification_id
 * @property int $user_id
 * @property string $action
 * @property string $message
 * @property int $type
 * @property UserProfile $userProfile
 */
class Notification extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'notification';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'notification_id';

    /**
     * @var array
     */
    protected $fillable = ['user_id', 'action', 'message', 'type'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userProfile()
    {
        return $this->belongsTo('App\UserProfile', 'user_id', 'user_id');
    }
}

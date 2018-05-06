<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $file_id
 * @property int $profile_id
 * @property int $size
 * @property string $type
 * @property string $source
 * @property Profile $profile
 */
class File extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'file';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'file_id';

    /**
     * @var array
     */
    protected $fillable = ['profile_id', 'size', 'type', 'source'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function profile()
    {
        return $this->belongsTo('App\Profile', null, 'profile_id');
    }
}

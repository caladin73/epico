<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $job_id
 * @property int $company_id
 * @property string $start_date
 * @property string $end_date
 * @property string $title
 * @property string $description
 * @property string $duration
 * @property string $location
 * @property string $guid
 * @property Company $company
 * @property Profile $profile
 * @property CompetenceJobLink[] $competenceJobLinks
 */
class Job extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'job';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'job_id';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = [
                            'company_id',
                            'end_date',
                            'title',
                            'description',
                            'title',
                            'location',
                            'start_date',
                            'deadline',
                            'duration',
                            'country',
                            'external',
                            'guid',
                            'type',
                            'email',
                            'footer',
                            ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company()
    {
        return $this->belongsTo('App\Company', null, 'company_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function profile()
    {
        return $this->belongsTo('App\Profile', 'job_id', 'profile_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function competenceJobLinks()
    {
        return $this->hasMany('App\CompetenceJobLink', null, 'job_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $competence_id
 * @property int $job_id
 * @property int $level
 * @property int $priority
 * @property Competence $competence
 * @property Job $job
 */
class CompetenceJobLink extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'competence_job_link';

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
    public function job()
    {
        return $this->belongsTo('App\Job', null, 'job_id');
    }
}

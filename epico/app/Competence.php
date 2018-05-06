<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $competence_id
 * @property int $parent_id
 * @property string $name
 * @property string $description
 * @property Competence $competence
 * @property CompetenceJobLink[] $competenceJobLinks
 * @property CompetenceUserProfileLink[] $competenceUserProfileLinks
 */
class Competence extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'competence';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'competence_id';

    /**
     * @var array
     */
    protected $fillable = ['parent_id', 'name', 'description'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function competence()
    {
        return $this->belongsTo('App\Competence', 'parent_id', 'competence_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function competenceJobLinks()
    {
        return $this->hasMany('App\CompetenceJobLink', null, 'competence_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function competenceUserProfileLinks()
    {
        return $this->hasMany('App\CompetenceUserProfileLink', null, 'competence_id');
    }
}

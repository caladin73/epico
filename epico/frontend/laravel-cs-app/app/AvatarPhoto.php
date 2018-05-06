<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AvatarPhoto extends Model
{
    protected $fillable = ['id', 'avatar'];

    public function avatar()
    {
        return $this->belongsTo('App\Upload');
    }
}

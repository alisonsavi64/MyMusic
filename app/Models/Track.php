<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    /**
     * @var string
     */
    protected $table = 'track';

    /**
     * @var array
     */
    protected $fillable = [
        'track_sequence',
        'project_id',
        'clips'
    ];

    /**
     * @var array
     */
    protected $visible = [
        'track_sequence',
        'project_id',
        'clips'
    ];

    public function clips(){
        $this->hasMany(Clip::class);
    }

    public function project(){
        $this->belongsTo(Project::class);
    }
}

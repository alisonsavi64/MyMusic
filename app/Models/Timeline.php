<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Timeline extends Model
{
   /**
    * @var string
    */
   protected $table = 'timeline';

    /**
     * @var array
     */

    protected $fillable = [
        'project_id',
        'tracks'
    ];

    /**
     * @var array
     */

    protected $visible = [
        'project_id',
        'tracks'
    ];

    public function project(){
        return $this->belongsTo(Project::class);
    }

    public function tracks(){
        $this->hasMany(Track::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clip extends Model
{
    /**
     * @var string
     */
    protected $table = 'clip';

    /**
     * @var array
     */
    protected $fillable = [
        'track_id',
        'start_track',
        'final_track',
        'start_audio',
        'final_audio',
        'audio_id'
    ];


}

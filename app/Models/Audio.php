<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Audio extends Model
{
    /**
    * @var string
    */
    protected $table = 'audios';

    /**
     * @var array
     */
    protected $fillable = [
        'original_path',
        'converted_path',
        'project_id',
        'progress',
        'status',
    ];
}

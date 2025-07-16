<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    /**
    * @var string
    */
    protected $table = 'projects';

    /**
     * @var array
     */
    protected $fillable = [
        'description',
        'user_id'
    ];

      /**
     * @var array
     */
    protected $visible = [
        'description'
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }

}

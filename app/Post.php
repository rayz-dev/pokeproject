<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;
use DB;

class Post extends Model
{
    public $timestamps = true;

    protected $collection = 'feed';

    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'team', 'username', 'votes'
    ];
    
    public function user(){
        return $this->belongsTo('\App\User', 'username');
    }

}

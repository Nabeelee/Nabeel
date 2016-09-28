<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user';
    
     public $fillable = ['name','user_name','password','extension'];
}

?>
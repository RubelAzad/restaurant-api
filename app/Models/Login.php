<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Login extends Model
{
    protected $table = 'users';

    protected $fillable = [
        'role_id','name', 'email', 'password','avatar','mobile_no','status','gender','created_by','modified_by'
    ];

    /* protected $hidden = [
        'password'
    ]; */


}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Rol extends Model
{
    protected $table = 'roles';

    public function user() {
        return $this->hasOne(User::class);
    }
}

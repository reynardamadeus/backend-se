<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{
    public $timestamps = false;
    public $table = 'password_reset_tokens';

    protected $fillable = ['email', 'token', 'created_at'];
}

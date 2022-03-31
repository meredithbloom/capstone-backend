<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Profile extends Model
{
    use HasFactory;

    protected $table = 'user_profiles';

    public function user() 
    {
        return $this->belongsTo(User::class, 'foreign_key');
    }


}

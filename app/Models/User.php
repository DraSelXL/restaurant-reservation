<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function role()
    {
        return $this->hasOne(Role::class);
    }
    public function gender()
    {
        return $this->hasOne(Gender::class);
    }
    public function review()
    {
        return $this->hasMany(Review::class);
    }
    public function reservation()
    {
        return $this->hasMany(Reservation::class);
    }
    public function restaurant()
    {
        return $this->hasOne(Restaurant::class);
    }
}

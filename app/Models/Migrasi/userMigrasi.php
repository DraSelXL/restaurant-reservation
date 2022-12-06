<?php

namespace App\Models\Migrasi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class userMigrasi extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "users";
    public function role()
    {
        return $this->hasOne(roleMigrasi::class);
    }
    public function gender()
    {
        return $this->hasOne(genderMigrasi::class);
    }
    public function review()
    {
        return $this->hasMany(reviewMigrasi::class);
    }
    public function reservation()
    {
        return $this->hasMany(reservationMigrasi::class);
    }
    public function restaurant()
    {
        return $this->hasOne(restaurantMigrasi::class);
    }
}

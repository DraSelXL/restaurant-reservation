<?php

namespace App\Models\Migrasi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class restaurantMigrasi extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "restaurants";
    public $timestamps = true;
    public function table()
    {
        return $this->hasMany(tableMigrasi::class);
    }
    public function reservation()
    {
        return $this->belongsToMany(reservationMigrasi::class);
    }
    public function review()
    {
        return $this->hasMany(reviewMigrasi::class);
    }
}

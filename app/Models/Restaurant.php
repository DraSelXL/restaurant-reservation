<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Restaurant extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function table()
    {
        return $this->hasMany(Table::class);
    }
    public function reservation()
    {
        return $this->belongsToMany(Reservation::class);
    }
    public function review()
    {
        return $this->hasMany(Review::class);
    }
}

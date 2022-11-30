<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reservation extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function restaurant()
    {
        return $this->hasOne(Restaurant::class);
    }
    public function transaction()
    {
        return $this->hasOne(Transaction::class);
    }
    public function table()
    {
        return $this->belongsTo(Table::class);
    }
}

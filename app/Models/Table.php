<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Table extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $timestamps=false;
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
    public function reservation()
    {
        return $this->hasMany(Reservation::class);
    }
}

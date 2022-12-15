<?php

namespace App\Models\Migrasi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class reservationMigrasi extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "reservations";
    public function restaurant()
    {
        return $this->hasOne(restaurantMigrasi::class);
    }
    public function transaction()
    {
        return $this->hasOne(transactionMigrasi::class);
    }

    /**
     * Get the table related to this reservation.
     */
    public function table()
    {
        return $this->belongsTo(tableMigrasi::class, 'table_id', 'id');
    }

    /**
     * Get the user that created the reservation.
     */
    public function user()
    {
        return $this->belongsTo(userMigrasi::class, 'user_id', 'id');
    }
}

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
    protected $primaryKey = "id";
    public function restaurant()
    {
        return $this->hasOne(restaurantMigrasi::class,"id","restaurant_id");
    }
    public function transaction()
    {
        return $this->hasOne(transactionMigrasi::class);
    }
    public function table()
    {
        return $this->belongsTo(tableMigrasi::class);
    }
}

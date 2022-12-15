<?php

namespace App\Models\Migrasi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class transactionMigrasi extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "transactions";
    protected $primaryKey = "id";

    public function reservation()
    {
        return $this->hasOne(reservationMigrasi::class,"id","reservation_id");
    }
}

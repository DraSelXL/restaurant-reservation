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
    public function reservation()
    {
        return $this->hasOne(transactionMigrasi::class);
    }
}

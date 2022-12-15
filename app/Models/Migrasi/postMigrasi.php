<?php

namespace App\Models\Migrasi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class postMigrasi extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = "posts";


    public function user()
    {
        return $this->belongsTo(userMigrasi::class,"id","user_id");
    }
}

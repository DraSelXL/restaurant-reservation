<?php

namespace App\Models\Migrasi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class tableMigrasi extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = "tables";
    protected $primaryKey = "id";

    public $timestamps = false;
}

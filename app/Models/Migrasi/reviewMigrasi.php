<?php

namespace App\Models\Migrasi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reviewMigrasi extends Model
{
    use HasFactory;

    protected $table = "reviews";
    protected $primaryKey = "id";

    public $timestamps = false;
}

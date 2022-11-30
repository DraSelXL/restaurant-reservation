<?php

namespace App\Models\Migrasi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class genderMigrasi extends Model
{
    use HasFactory;

    protected $table = "genders";
    protected $primaryKey = "id";
    public $timestamps = false;
}

<?php

namespace App\Models\Migrasi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class roleMigrasi extends Model
{
    use HasFactory;

    protected $table = "roles";
    protected $primaryKey = "id";
}

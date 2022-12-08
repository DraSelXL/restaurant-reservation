<?php

namespace App\Models\Migrasi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class favouriteMigrasi extends Model
{
    use HasFactory;

    protected $table = "favourites";

    public $timestamps = false;
    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $table = "applications";
    protected $primaryKey = "app_id";
    public $incrementing = true;
    public $timestamps = false;
}

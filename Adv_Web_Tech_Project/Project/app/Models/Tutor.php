<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    use HasFactory;

    protected $table = "tutors";
    protected $primaryKey = "tutor_id";
    public $incrementing = true;
    public $timestamps = false;
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table ="course";
    protected $primaryKey = "c_id";
    public $timestamps = false;

    function department()
    {
        return $this->belongsTo(Department::class,'d_id','d_id');
    }
}

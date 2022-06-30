<?php

namespace App\Models;
use  App\Models\Department;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table ="students_info";
    protected $primaryKey = "s_id";
    public $timestamps = false;

    function department()
    {
        return $this->belongsTo(Department::class,'d_id','d_id');
    }
}

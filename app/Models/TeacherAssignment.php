<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherAssignment extends Model
{
    use HasFactory;

    # Corresponden a la clave foranea hacia usuario profesor y curso
    protected $fillable = [
        'id_teacher',
        'id_course'
    ];
}

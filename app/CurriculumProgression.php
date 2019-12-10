<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CurriculumProgression extends Model
{
    //createする時にuser_idとcurriculum_idを許可
    protected $fillable = ['user_id', 'curriculum_id'];
}

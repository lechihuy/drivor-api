<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recruitment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'cv_path',
        'job_application_path',
        'working_time',
        'id_frontside_path',
        'id_backside_path',
        'license_frontside_path',
        'license_backside_path'
    ];
}

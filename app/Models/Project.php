<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'projectName',
        'projectLink',
        'projectImage1',
        'projectImage2',
        'projectImage3',
        'projectImage4',
        'projectImage5',
    ];
    
}

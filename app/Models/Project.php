<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;


    protected $fillable = ['name', 'link', 'slug', 'link', 'description', 'date_of_creation', 'is_public', 'contributors', 'contributors_link'];
}

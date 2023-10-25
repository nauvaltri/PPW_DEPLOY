<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class datacvs extends Model
{
    use HasFactory;
    protected $fillable = ['Nama', 'Gender', 'Umur', 'Gelar', 'Latar belakang'];
}

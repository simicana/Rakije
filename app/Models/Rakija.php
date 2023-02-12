<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rakija extends Model
{
    use HasFactory;

    protected $fillable = ['naziv', 'ambalaza', 'vrstaId', 'destilerijaId'];

    protected $table = 'rakije';
}

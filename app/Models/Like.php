<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;
    
    // Kolom-kolom dalam tabel like
    protected $fillable = ['user_id', 'tweet_id'];
}

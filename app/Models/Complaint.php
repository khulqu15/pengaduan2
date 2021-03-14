<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;

    protected $table = 'complaints';
    
    protected $fillable = ['user_id', 'name', 'nik', 'picture', 'report'];
    
    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Respond()
    {
        return $this->hasMany(Respond::class);
    }
}

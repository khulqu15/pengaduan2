<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Respond extends Model
{
    use HasFactory;

    protected $table = 'responds';

    protected $fillable = ['user_id', 'complaint_id', 'respond'];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Complaint()
    {
        return $this->belongsTo(Complaint::class);
    }
}

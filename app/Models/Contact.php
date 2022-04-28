<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Contact extends Model
{

    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'telephone',
        'observation',
        'avatar'
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }


}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;
    protected $table = 'organization';

    protected $fillable = [
        'name',
        'category',
        'address',
        'country'
    ];

    public function users()
    {
        return $this->hasOne(User::class);
    }
    
}

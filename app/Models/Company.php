<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'region_id',
    ];

    public function region()
    {
        return $this->hasOne(Region::class, 'id', 'region_id');
    }
}

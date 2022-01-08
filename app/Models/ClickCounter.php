<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClickCounter extends Model
{
    use HasFactory;

    protected $fillable = [
        'ip',
        'company_id',
        'website',
        'language',
        'user_agent',
        'cookie',
    ];

    public function company()
    {
        return $this->hasOne(Company::class, 'id', 'company_id');
    }
}

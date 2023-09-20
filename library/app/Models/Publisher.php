<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    use HasFactory;

    // protected $guard = [
    //     'id'
    // ];

    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'address'
    ];

    public function books() {
        
        return $this->hasMany('App\Models\Book', 'publisher_id');
    }

    public function scopeFilter($query, array $filters) {
        $query->when($filters['request']['search'] ?? false, function ($query, $value) {
            return $query->where('name','like', '%'. $value .'%');
        });
    }
}

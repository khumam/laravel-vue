<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'gender',
        'email',
        'phone_number',
        'address'
    ];

    public function user() {
        
        return $this->hasOne('App\Models\User', 'member_id');
    }

    public function transactions() {
        
        return $this->hasMany(Transaction::class, 'member_id');
    }

    public function scopeFilter($query, array $filters) {
        // dd($filters['request']['gender']);
        $query->when($filters['request']['gender'] ?? false, function ($query, $value) {
            return $query->where('gender', $value);
        });
    }
}

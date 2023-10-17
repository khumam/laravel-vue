<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id',
        'date_start',
        'date_end',
    ];

    public function transactionDetail() {
        
        return $this->hasOne(TransactionDetail::class, 'transaction_id');
    }

    public function member() {
        
        return $this->belongsTo('App\Models\Member', 'member_id');
    }
}

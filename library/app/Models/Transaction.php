<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id',
        'status',
        'date_start',
        'date_end',
    ];

    public function transactionDetail() {
        
        return $this->hasMany(TransactionDetail::class, 'transaction_id');
    }

    public function member() {
        
        return $this->belongsTo(Member::class, 'member_id');
    }

    public function scopeFilter($query, array $filters) {
        $query->when($filters['request']['status'] ?? false, function ($query, $value) {
            return $query->where('status', $value);
        });

        $query->when($filters['request']['date'] ?? false, function ($query, $value) {
            $splitDate = explode(',',$value);
            $start = DateTime::createFromFormat("d/m/Y", $splitDate[0]);
            $end = DateTime::createFromFormat("d/m/Y", $splitDate[1]);

            // dd(new DateTime($splitDate[0]));
            return $query->whereBetween('date_start', [$start->format("Y-m-d"), $end->format("Y-m-d")]);
        });
    }
}

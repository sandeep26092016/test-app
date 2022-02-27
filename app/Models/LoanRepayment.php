<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanRepayment extends Model
{

    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'loan_application_id',
        'payment_date',
        'week',
        'payment_amount',
        'payment_status',
    ];

    /**
     * LoanApplication relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function loanApplication()
    {
        return $this->belongsTo(LoanApplication::class);
    }

}

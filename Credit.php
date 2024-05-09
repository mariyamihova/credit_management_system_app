<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Credit extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'credits';

    /**
     * Attributes that should be mass-assignable.
     *
     */
    protected $fillable = ['requested_amount', 'credit_period', 'total_amount', 'borrower_id', 'credit_number'];
    public function borrower()
    {
        return $this->belongsTo(Borrower::class);
    }
    public function getAllCreditsWithBorrowers()
    {
        return self::join('borrowers', 'credits.borrower_id', '=', 'borrowers.id')
            ->select(
                'credits.id',
                'credits.credit_number',
                'credits.requested_amount',
                'credits.total_amount',
                'credits.paid_amount',
                'credits.credit_period',
                'borrowers.name',
            )
            ->where('status',1)
            ->orderBy('credits.credit_number');

    }
}

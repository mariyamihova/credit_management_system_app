<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'payments';

    /**
     * Attributes that should be mass-assignable.
     *
     */
    protected $fillable = ['amount', 'credit_id'];

    public function credit()
    {
        return $this->belongsTo(Credit::class);
    }
}

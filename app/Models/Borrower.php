<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrower extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'borrowers';

    /**
     * Attributes that should be mass-assignable.
     *
     */
    protected $fillable = ['name'];
    public function credits()
    {
        return $this->hasMany(Credit::class);
    }
}

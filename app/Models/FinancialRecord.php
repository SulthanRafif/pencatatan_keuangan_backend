<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancialRecord extends Model
{
    use HasFactory;

    /**
     * Determine which columns are fillable
     */
    protected $fillable = [
        'income',
        'expenditure',
        'balance',
        'category_id'
    ];

    /**
     * Specifies the columns that are ignored by eloquent
     */
    protected $guarded = ['id'];

    /**
     * Get the user that owns the financial record
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the category that owns the financial record
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

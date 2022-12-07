<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * Determine which columns are fillable
     */
    protected $fillable = [
        'name'
    ];

    /**
     * Specifies the columns that are ignored by eloquent
     */
    protected $guarded = ['id'];

    /**
     * Get the financial records for the category
     */
    public function financialRecords()
    {
        return $this->hasMany(Profile::class, 'user_id');
    }

    /**
     * Get the user for the category
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

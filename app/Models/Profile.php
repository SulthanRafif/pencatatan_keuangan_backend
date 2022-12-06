<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    /**
     * Determine which columns are fillable
     */
    protected $fillable = [
        'fullname',
        'address',
        'place_of_birth',
        'date_of_birth',
        'profession',
        'gender'
    ];

    /**
     * Specifies the columns that are ignored by eloquent
     */
    protected $guarded = ['id'];

    /**
     * Get the user that owns the profile
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

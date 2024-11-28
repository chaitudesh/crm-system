<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'source',
        'status',
        'notes'
    ];

    /**
     * Relationship: A lead may turn into multiple opportunities.
     */
    public function opportunities()
    {
        return $this->hasMany(Opportunity::class);
    }
}
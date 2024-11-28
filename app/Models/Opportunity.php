<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Opportunity extends Model
{
    protected $fillable = ['title', 'stage', 'value', 'close_date', 'lead_id'];

    public function lead()
    {
        return $this->belongsTo(Lead::class);
    }
}

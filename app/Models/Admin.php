<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    // Specify the table name
    protected $table = 'admin';

    // Define the fillable attributes
    protected $fillable = ['fname', 'lname', 'phone', 'address'];

    public $timestamps = false;

}

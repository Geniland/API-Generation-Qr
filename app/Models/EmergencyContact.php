<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EmergencyContact extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name', 'phone', 'relation'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserFunds extends Model
{
    protected $fillable = ['user_id', 'fund_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function fund()
    {
        return $this->belongsTo(Fund::class, 'fund_id');
    }
}

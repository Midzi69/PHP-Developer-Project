<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fund extends Model
{
    protected $fillable = ['name', 'fund_category_id', 'fund_sub_category_id', 'isin', 'wkn'];

    public function category()
    {
        return $this->belongsTo(FundCategory::class, 'fund_category_id');
    }

    public function subCategory()
    {
        return $this->belongsTo(FundSubCategory::class, 'fund_sub_category_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_funds', 'fund_id', 'user_id');
    }
}

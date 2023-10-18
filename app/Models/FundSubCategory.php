<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FundSubCategory extends Model
{
    protected $fillable = ['category_id', 'name'];

    public function category()
    {
        return $this->belongsTo(FundCategory::class, 'category_id');
    }

    public function funds()
    {
        return $this->hasMany(Fund::class, 'fund_sub_category_id');
    }
}

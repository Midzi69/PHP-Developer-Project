<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FundCategory extends Model
{
    protected $fillable = ['name'];

    public function subCategories()
    {
        return $this->hasMany(FundSubCategory::class, 'category_id');
    }

    public function funds()
    {
        return $this->hasMany(Fund::class, 'fund_category_id');
    }
}

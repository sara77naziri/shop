<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(Category::class, 'category_id');
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }




    public function AllSubCategoryProducts()

    {
        $childrenId= $this->children()->pluck('id');
        return Product::query()
            ->whereIn('category_id',$childrenId)
            ->orWhere('category_id', $this->id)
            ->get();
    }

    public function propertyGroups(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(PropertyGroup::class);
    }



public function hasPropertyGroup(PropertyGroup  $propertyGroup){
        return $this->propertyGroups()->where('property_group_id',$propertyGroup->id)
            ->exists();
}
}

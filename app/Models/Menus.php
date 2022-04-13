<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Menus
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Menus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Menus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Menus query()
 * @method static \Illuminate\Database\Eloquent\Builder|Menus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menus whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Menus extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'description', 'image'];

//    public function categories()
//    {
//        return $this->belongsToMany(Category::class, 'category_menu');
//    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * Class Article
 *
 * @package App\Models
 * @property int $id
 * @property string $title
 * @property string $subtitle
 * @property string|null $slug
 * @property string $content
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Article newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Article newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Article query()
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereSubtitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereUpdatedAt($value)
 * @mixin \Eloquent
 * @method static \Database\Factories\ArticleFactory factory(...$parameters)
 */
class Article extends Model
{
    use HasFactory;

    /**
     * @return string
     */
    public function dateFormatted(): string
    {
        return date_format($this->created_at,'d-m-Y');
    }

    /**
     * @var string[]
     */
    protected $fillable = [
        'title', 'slug', 'content'
    ];

//    /**
//     * @return BelongsTo
//     */
//    public function category(): BelongsTo
//    {
//        return $this->belongsTo(Category::class);
//    }

}

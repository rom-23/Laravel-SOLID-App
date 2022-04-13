<?php

namespace App\Models;

use App\Enums\TableLocation;
use App\Enums\TableStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Tables
 *
 * @property int $id
 * @property string $name
 * @property int $guest_number
 * @property string $status
 * @property string $location
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Tables newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tables newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tables query()
 * @method static \Illuminate\Database\Eloquent\Builder|Tables whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tables whereGuestNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tables whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tables whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tables whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tables whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tables whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Tables extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'guest_number', 'status', 'location'];

    public function reservations()
    {
        return $this->hasMany(Reservations::class);
    }
}

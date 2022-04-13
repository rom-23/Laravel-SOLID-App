<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Reservations
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $tel_number
 * @property \Illuminate\Support\Carbon $res_date
 * @property int $table_id
 * @property int $guest_number
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Reservations newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Reservations newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Reservations query()
 * @method static \Illuminate\Database\Eloquent\Builder|Reservations whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservations whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservations whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservations whereGuestNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservations whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservations whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservations whereResDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservations whereTableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservations whereTelNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservations whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Reservations extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'tel_number',
        'email',
        'table_id',
        'res_date',
        'guest_number'
    ];

    protected $dates = [
        'res_date'
    ];



//    public function table()
//    {
//        return $this->belongsTo(Tables::class);
//    }
}

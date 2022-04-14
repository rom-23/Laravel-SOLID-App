<?php

namespace App\Models;

use App\Enums\TableLocation;
use App\Enums\TableStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Reservations
 *
 * @package App\Models
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $tel_number
 * @property \Illuminate\Support\Carbon $res_date
 * @property int $tables_id
 * @property int $guest_number
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property mixed $status
 * @property mixed $location
 * @property-read \App\Models\Tables $tables
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
 * @method static \Illuminate\Database\Eloquent\Builder|Reservations whereTablesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservations whereTelNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservations whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Reservations extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'tel_number',
        'email',
        'tables_id',
        'res_date',
        'guest_number'
    ];

    protected $casts = [
        'status' => TableStatus::class,
        'location' => TableLocation::class
    ];

    /**
     * @var string[]
     */
    protected $dates = [
        'res_date'
    ];

    /**
     * @return BelongsTo
     */
    public function tables(): BelongsTo
    {
        return $this->belongsTo(Tables::class);
    }
}

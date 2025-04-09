<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = 'jadwal';

    protected $primaryKey = 'event_id';

    protected $fillable = [
        'event_status',
        'event_begin',
        'event_end',
        'event_title',
        'event_desc',
        'event_location',
        'event_link_location',
        'event_all_day',
        'event_time',
        'event_end_time',
        'event_recur',
        'event_recur_multiplier',
        'event_repeats',
        'event_hide_events',
        'event_show_title',
        'event_author',
        'event_category',
        'event_link',
        'event_image',
    ];

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class, 'category_id', 'event_category');
    }
    // public function kategori() : HasMany
    // {
    //     return $this->hasMany(Kategori::class, 'id', 'event_category');
    // }
}

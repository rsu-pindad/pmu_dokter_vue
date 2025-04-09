<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';

    protected $primaryKey = 'category_id';

    protected $fillable = [
        'category_name',
        'category_colour'
    ];

    public function jadwal(): HasMany
    {
        return $this->hasMany(Jadwal::class, 'event_category', 'category_id');
    }
}

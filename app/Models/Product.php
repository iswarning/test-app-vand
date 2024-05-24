<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'store_id',
        'name',
        'description',
        'price',
    ];
    
    public $timestamps = true;

    public function store(): BelongsTo
    {
        return $this->belongsTo(Store::class, 'store_id', 'id');
    }
}

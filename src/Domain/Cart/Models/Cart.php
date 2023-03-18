<?php

namespace Domain\Cart\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\MassPrunable;

class Cart extends Model
{
    use HasFactory;
    use MassPrunable;

    protected $fillable = [
        'storage_id',
        'user_id'
    ];

    public function cartItems(): HasMany
    {
        return $this->hasMany(CartItem::class);
    }

    public function prunable()
    {
        return static::where('created_at', '<=', now()->subMonth());
    }
}

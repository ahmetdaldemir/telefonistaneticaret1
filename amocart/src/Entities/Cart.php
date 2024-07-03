<?php

namespace Amocart\Cart\Entities;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['email', 'token'];

    /**
     * Get the items for the cart.
     */
    public function items()
    {
        return $this->hasMany(Items::class);
    }
}

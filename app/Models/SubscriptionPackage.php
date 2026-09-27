<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SubscriptionPackage extends Model
{
    protected $fillable = [
        'name',
        'description',
        'color',
        'price',
    ];

    public function subscriptionPackageBooks(): HasMany
    {
        return $this->hasMany(SubscriptionPackageBook::class);
    }

    public function subscriptionPackageUsers(): HasMany
    {
        return $this->hasMany(SubscriptionPackageUser::class);
    }
}

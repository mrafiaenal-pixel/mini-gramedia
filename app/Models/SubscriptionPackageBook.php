<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
#[Fillable(['book_id' , 'subscription_package_user_id' , ])]
class SubscriptionPackageBook extends Model
{
    //
    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }
    public function subscriptionPackageUser(): BelongsTo
    {
        return $this->belongsTo(SubscriptionPackageUser::class);
    }
    public function subscriptionPackage(): BelongsTo
    {
        return $this->belongsTo(SubscriptionPackage::class);
    }
}

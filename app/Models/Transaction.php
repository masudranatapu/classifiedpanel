<?php

namespace App\Models;

use App\Models\ManualPayment;
use Modules\Plan\Entities\Plan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Transaction customer
     *
     * @return BelongsTo
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     *  Customer scope
     * @return mixed
     */
    public function scopeCustomerData($query, $api = false)
    {
        if ($api) {
            return $query->where('user_id', auth('api')->id());
        } else {
            return $query->where('user_id', auth('user')->id());
        }
    }

    /**
     * Transaction plan
     *
     * @return BelongsTo
     */
    public function plan(): BelongsTo
    {
        return $this->belongsTo(Plan::class);
    }

     /**
     * Manual payment
     *
     * @return BelongsTo
     */
    public function manualPayment(): BelongsTo
    {
        return $this->belongsTo(ManualPayment::class, 'manual_payment_id');
    }
}

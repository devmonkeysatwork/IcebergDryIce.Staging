<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = [
        'order_id',
        'product_id',
        'amount_of_items',
        'unit_price',
        'total_price',
    ];

    // Relationships
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * GST is 5% and applies to every line. PST is 7% and applies only to
     * Styrofoam box (unit='box') product lines. Confirmed by Tyler
     * 2026-08-27. Computed live from total_price, mirroring
     * InvoiceLineItems::gst/pst -- never stored, never stale.
     */
    public function getGstAttribute(): float
    {
        return round(((float) $this->total_price) * 0.05, 2);
    }

    public function getPstAttribute(): float
    {
        if ($this->product && $this->product->unit === 'box') {
            return round(((float) $this->total_price) * 0.07, 2);
        }

        return 0.0;
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvoiceEmailLog extends Model
{
    const STATUS_SENT = 'sent';
    const STATUS_FAILED = 'failed';

    protected $fillable = [
        'invoice_id',
        'sent_to',
        'sent_by',
        'status',
        'error_message',
    ];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    public function sender()
    {
        return $this->belongsTo(User::class, 'sent_by');
    }
}

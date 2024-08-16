<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $primaryKey = 'order_id';
    protected $fillable = [
        'order_number', 'order_event_id', 'order_price', 'order_type', 'order_payment', 'order_info'
    ];
    public $timestamps = false;
    public function event()
    {
        return $this->belongsTo(Events::class, 'order_event_id', 'event_id');
    }

    public function tickets()
    {
        return $this->hasMany(Tickets::class, 'ticket_order_id', 'order_id');
    }
}

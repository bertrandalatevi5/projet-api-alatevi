<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    protected $primaryKey = 'ticket_id';
    protected $fillable = [
        'ticket_event_id', 'ticket_email', 'ticket_phone', 'ticket_price', 'ticket_order_id', 'ticket_key', 'ticket_ticket_type_id', 'ticket_status'
    ];

    public function event()
    {
        return $this->belongsTo(Events::class, 'ticket_event_id', 'event_id');
    }

    public function order()
    {
        return $this->belongsTo(Orders::class, 'ticket_order_id', 'order_id');
    }

    public function ticketType()
    {
        return $this->belongsTo(TicketTypes::class, 'ticket_ticket_type_id', 'ticket_type_id');
    }
}

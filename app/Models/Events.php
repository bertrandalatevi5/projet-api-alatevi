<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PHPUnit\Framework\Attributes\Ticket;

class Events extends Model
{
    protected $primaryKey = 'event_id';
    protected $fillable = [
        'event_category', 'event_title', 'event_description', 'event_date', 'event_image','event_city', 'event_address', 'event_status'
    ];

    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'ticket_event_id', 'event_id');
    }

    public function ticketTypes()
    {
        return $this->hasMany(TicketTypes::class, 'ticket_type_event_id', 'event_id');
    }

    public function orders()
    {
        return $this->hasMany(Orders::class, 'order_event_id', 'event_id');
    }
}

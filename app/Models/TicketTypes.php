<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketTypes extends Model
{
    protected $primaryKey = 'ticket_type_id';
    protected $fillable = [
        'ticket_type_event_id', 'ticket_type_name', 'ticket_type_price', 'ticket_type_quantity',
        'ticket_type_real_quantity', 'ticket_type_total_quantity', 'ticket_type_description'
    ];

    public function event()
    {
        return $this->belongsTo(Events::class, 'ticket_type_event_id', 'event_id');
    }

    public function tickets()
    {
        return $this->hasMany(Tickets::class, 'ticket_ticket_type_id', 'ticket_type_id');
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\WidgetRequest;
use App\Services\TicketService;

class WidgetController extends Controller
{
    protected TicketService $ticketService;

    public function __construct(TicketService $ticketService)
    {
        $this->ticketService = $ticketService;
    }

    public function store(WidgetRequest $request)
    {
        $validated = $request->validated();

        $ticket = $this->ticketService->createTicket(
            $validated,
            $request->hasFile('files') ? $request->file('files') : null
        );

        return response()->json([
            'success' => true,
            'message' => 'Тикет успешно создан',
            'ticket_id' => $ticket->id,
        ]);
    }
}

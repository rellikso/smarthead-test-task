<?php

namespace App\Services;

use App\Models\Customer;
use App\Models\Ticket;
use Illuminate\Http\UploadedFile;

class TicketService
{
    /**
     * Создаёт тикет и при необходимости нового Customer.
     *
     * @param array $data ['name', 'email', 'phone', 'subject', 'text']
     * @param UploadedFile[]|null $files
     * @return Ticket
     */
    public function createTicket(array $data, ?array $files = null): Ticket
    {
        // Customer
        $customer = Customer::firstOrCreate(
            ['email' => $data['email'], 'phone' => $data['phone']],
            ['name' => $data['name']]
        );

        // Ticket
        $ticket = Ticket::create([
            'customer_id' => $customer->id,
            'subject' => $data['subject'],
            'text' => $data['text'],
            'status' => 'Новый',
            'response_date' => now(),
        ]);

        // Файлы
        if ($files) {
            foreach ($files as $file) {
                $ticket->addMedia($file)->toMediaCollection('attachments');
            }
        }

        return $ticket;
    }
}

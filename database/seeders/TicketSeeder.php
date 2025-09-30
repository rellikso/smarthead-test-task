<?php

namespace Database\Seeders;

use App\Models\Ticket;
use App\Models\Customer;
use Illuminate\Database\Seeder;
use Illuminate\Http\UploadedFile;

class TicketSeeder extends Seeder
{
    public function run(): void
    {
        $customers = Customer::all();

        foreach ($customers as $customer) {
            // Создаём 1–3 тикета на клиента
            $tickets = Ticket::factory(rand(1, 3))->create([
                'customer_id' => $customer->id,
            ]);

            foreach ($tickets as $ticket) {
                // Добавляем 1–2 фейковых файла (PDF или изображения)
                $numFiles = rand(1, 2);
                for ($i = 1; $i <= $numFiles; $i++) {
                    // Генерируем случайный PDF (100 КБ) или изображение (200x200)
                    if (rand(0, 1)) {
                        $file = UploadedFile::fake()->create("ticket_file_{$i}.pdf", 100);
                    } else {
                        $file = UploadedFile::fake()->image("ticket_file_{$i}.jpg", 200, 200);
                    }

                    $ticket->addMedia($file)
                        ->toMediaCollection('attachments');
                }
            }
        }
    }
}

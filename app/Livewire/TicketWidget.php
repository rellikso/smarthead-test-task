<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Http;

class TicketWidget extends Component
{
    use WithFileUploads;

    public $name;
    public $email;
    public $phone;
    public $subject;
    public $text;
    public $files = [];

    public function submit()
    {
        $data = [
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'subject' => $this->subject,
            'text' => $this->text,
        ];

        $multipart = [];
        foreach ($this->files as $file) {
            $multipart[] = ['name' => 'files[]', 'contents' => fopen($file->getRealPath(), 'r'), 'filename' => $file->getClientOriginalName()];
        }

        $response = Http::withOptions([
            'multipart' => $multipart,
            'verify' => FALSE
        ])
            ->post(route('api.widget.store'), $data);

        if ($response->successful()) {
            $this->reset(['name','email','phone','subject','text','files']);
            session()->flash('success', 'Тикет успешно отправлен!');
        } else {
            session()->flash('error', 'Ошибка при отправке тикета');
        }
    }

    public function render()
    {
        return view('livewire.ticket-widget');
    }
}

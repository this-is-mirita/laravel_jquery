<?php

namespace App\Services;
use App\Models\Contact;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class ContactService
{
    public function contact( array $data ){
        $contact = Contact::create($data);

        // Отправка письма (простой пример)
        Mail::raw(
            "Имя: {$contact->name}\nТелефон: {$contact->phone}\nEmail: {$contact->email}",
            function ($message) {
                $message->to('admin@example.com')
                    ->subject('Новая заявка с формы');
            }
        );

        return $contact;

    }
}

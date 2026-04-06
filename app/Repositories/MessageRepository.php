<?php

namespace App\Repositories;

use App\Mail\CommonTemplateMail;
use App\Models\Message;
use App\Repositories\Contracts\MessageRepositoryInterface;
use Carbon\Carbon;
use Crud\Repositories\EloquentRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class MessageRepository extends EloquentRepository implements MessageRepositoryInterface
{
    public function __construct(Message $model)
    {
        parent::__construct($model);
    }

    public function read(Model|int $modelOrModelId): void
    {
        $modelOrModelId->update([
            'read_at' => Carbon::now(),
        ]);
    }

    public function send(array $payload): void
    {
        $this->create($payload);
        unset($payload['phone']);
        Mail::to([
            [
                'email' => setting('contact_message_receiver_mail'),
                'name' => config('app.name'),
            ]
        ])
            ->send(
                new CommonTemplateMail(
                    config('mail.from.address'),
                    $payload['name'],
                    setting('contact_message_receiver_mail'),
                    __('translate.New message from contact form'),
                    $payload
                )
            );

    }
}

<?php
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class CongeStatusUpdated extends Notification
{
    use Queueable;

    public $message;

    public function __construct($message)
    {
        $this->message = $message;
    }

    public function via($notifiable)
    {
        return ['database']; // Sauvegarder dans la base de données
    }

    public function toArray($notifiable)
    {
        return [
            'message' => $this->message,
        ];
    }
}

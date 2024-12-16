<?php

namespace App\Notifications;

use App\Models\DemandeConge;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Bus\Queueable;

use Illuminate\Notifications\Messages\DatabaseMessage;

class DemandeCongeNotification extends Notification
{
    use Queueable;

    protected $demande;
    protected $statut;

    /**
     * Create a new notification instance.
     */
    public function __construct(DemandeConge $demande, $statut)
    {
        $this->demande = $demande;
        $this->statut = $statut;
    }

    /**
     * Get the notification's delivery channels.
     */
    public function via($notifiable)
    {
        return ['database']; // Storing in the database
    }

    /**
     * Get the array representation of the notification.
     */
    public function toArray($notifiable)
    {
        return [
            'message' => "'Votre demande de congé a été ' { $this->statut }.",  // Ensure 'message' is included here
            'date debut' => $this->demande->date_debut,
            'date fin' => $this->demande->date_fin,
            
        ];
    }
}
    

    

?>

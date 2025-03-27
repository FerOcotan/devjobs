<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NuevoCandidato extends Notification
{
    use Queueable;


    /**
     * Create a new notification instance.
     */
    private $id_vacante;
    private $nombre_vacante;
    private $user_id;


    public function __construct($id_vacante, $nombre_vacante, $user_id)

    {
        $this->id_vacante = $id_vacante;
        $this->nombre_vacante = $nombre_vacante;
        $this->user_id = $user_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via($notifiable)
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {

        $url = url('/notificaciones');

        return (new MailMessage)
            ->line('Haz recibido un nuevo candidato en tu vacante.')
            ->line('La vacante es: '.$this->nombre_vacante)
            ->action('Ver notificaciones', $url)
            ->line('Gracias por utilizar devjobs!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
           
        ];
    }


    public function toDatabase($notifiable)
    {
     
        return [
            'id_vacante' => $this->id_vacante,
            'nombre_vacante' => $this->nombre_vacante,
            'user_id' => $this->user_id,
            
        ];


    }
}

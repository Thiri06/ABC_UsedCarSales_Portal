<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AppointmentStatusNotification extends Notification
{
    use Queueable;

    public $appointment;
    public $status;

    public function __construct($appointment, $status)
    {
        $this->appointment = $appointment;
        $this->status = $status;
    }

    public function via($notifiable)
    {
        return ['database'];  // You can also add 'mail' or other channels if needed
    }

    public function toDatabase($notifiable)
    {
        return [
            'appointment_id' => $this->appointment->id,
            'car_post_id' => $this->appointment->carPost->id,
            'status' => $this->status,
            'message' => "Your appointment for the car post '{$this->appointment->carPost->make} {$this->appointment->carPost->model}' has been {$this->status}."
        ];
    }
}

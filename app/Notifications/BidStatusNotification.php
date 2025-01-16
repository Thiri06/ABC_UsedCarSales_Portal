<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BidStatusNotification extends Notification
{
    use Queueable;

    public $bid;
    public $status;

    public function __construct($bid, $status)
    {
        $this->bid = $bid;
        $this->status = $status;
    }

    public function via($notifiable)
    {
        return ['database'];  // You can also add 'mail' or other channels if needed
    }

    public function toDatabase($notifiable)
    {
        return [
            'bid_id' => $this->bid->id,
            'car_post_id' => $this->bid->carPost->id,
            'status' => $this->status,
            'message' => "Your bid for the car post '{$this->bid->carPost->make} {$this->bid->carPost->model}' has been {$this->status}."
        ];
    }
}

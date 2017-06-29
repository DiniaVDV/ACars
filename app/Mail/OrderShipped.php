<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

/**
 * Class OrderShipped
 * @package App\Mail
 */
class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var
     */
    public $user;
    /**
     * @var
     */
    public $order;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $order)
    {
        $this->user = $user;
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Спасибо за заказ')
                    ->markdown('emails.orderShipped');
    }
}

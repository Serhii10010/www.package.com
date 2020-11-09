<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;
    public $orderInfo;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($orderInfo)
    {
      $this->orderInfo = $orderInfo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      return $this->view('emails.order')
        ->with([
            'theme' => $this->orderInfo['theme'],
            'phone' => $this->orderInfo['phone'],
            'name' => $this->orderInfo['name'],
            'surname' => $this->orderInfo['surname'],
            'email' => $this->orderInfo['email'],
            'comment' => $this->orderInfo['comment'],
            'delivery' =>
            [
              'delivery_way' => $this->orderInfo['delivery']['delivery_way'],
              'area' => $this->orderInfo['delivery']['area'],
              'city' => $this->orderInfo['delivery']['city'],
              'address' => $this->orderInfo['delivery']['address']
            ],
            'cart' => $this->orderInfo['cart'],
            'cart_total' => $this->orderInfo['cart_total'],
            'count' => $this->orderInfo['count']
        ]);
    }
}

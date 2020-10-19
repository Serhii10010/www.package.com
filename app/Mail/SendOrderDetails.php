<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendOrderDetails extends Mailable
{
    use Queueable, SerializesModels;
    public $details;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
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
            'success' => $this->details['success'],
            'theme' => $this->details['theme'],
            'tel' => $this->details['tel'],
            'name' => $this->details['name'],
            'surname' => $this->details['surname'],
            'patronymic' => $this->details['patronymic'],
            'email' => $this->details['email'],
            'comment' => $this->details['comment'],
            'delivery' =>
            [
              'delivery_way' => 'NovaPoshta',
              'area_name' => $this->details['delivery']['area_name'],
              'city_name' => $this->details['delivery']['city_name'],
              'warehouse' => $this->details['delivery']['warehouse']
            ],
            'cart_products' => $this->details['cart_products'],
            'total_price' => $this->details['total_price'],
            'count' => $this->details['count']
        ]);
    }
}

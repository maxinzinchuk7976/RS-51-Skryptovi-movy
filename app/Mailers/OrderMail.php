<?php

namespace App\Mailers;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Http\Requests\OrderRequest;


class OrderMail extends Mailable
{
    use SerializesModels;

    public function __construct(
        public OrderRequest $request,
        public string $product_name,
        public string $product_cost,
        public string $product_photo
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Дякуємо за замовлення, ' . $this->request->validated('name'),
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'product-order-envelop',
            with: [...$this->request->validated(),
                'product_name' =>$this->product_name,
                'product_cost' => $this->product_cost,
                'product_photo' => $this->product_photo]
        );
    }
}

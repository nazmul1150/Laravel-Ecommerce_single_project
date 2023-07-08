<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Mail\OrderMail;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Shipping;
use App\Models\Transaction;
use Illuminate\Support\Facades\Mail;
use Cart;

class ChackoutComponent extends Component
{
    public $ship_to_different;

    public $firstname;
    public $lastname;
    public $email;
    public $phon;
    public $b_add1;
    public $b_add2;
    public $city;
    public $country;
    public $zipcode;

    public $s_firstname;
    public $s_lastname;
    public $s_email;
    public $s_phon;
    public $s_add1;
    public $s_add2;
    public $s_city;
    public $s_country;
    public $s_zipcode;
    public $s_status;

    public $paymentmode;
    public $thankyou;

    public function update($fields)
    {
        $this->validateOnly($fields,[

        'firstname' => 'required',
        'lastname' => 'required',
        'email' => 'required|email',
        'phon' => 'required|numeric',
        'b_add1' => 'required',
        'city' => 'required',
        'country' => 'required',
        'zipcode' => 'required'

        ]);

        if($this->ship_to_different)
        {
            $this->validateOnly($fields,[

            's_firstname' => 'required',
            's_lastname' => 'required',
            's_email' => 'required|email',
            's_phon' => 'required|numeric',
            's_add1' => 'required',
            's_city' => 'required',
            's_country' => 'required',
            's_zipcode' => 'required'

            ]);
        }

    }

    public function placeOrder()
    {
        $this->validate([

        'firstname' => 'required',
        'lastname' => 'required',
        'email' => 'required|email',
        'phon' => 'required|numeric',
        'b_add1' => 'required',
        'city' => 'required',
        'country' => 'required',
        'zipcode' => 'required'
        ]);

        //order
        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->subtotal = session()->get('checkout')['subtotal'];
        $order->discount = session()->get('checkout')['discount'];
        $order->tax = session()->get('checkout')['tax'];
        $order->total = session()->get('checkout')['total'];

        $order->firstname = $this->firstname;
        $order->lastname = $this->lastname;
        $order->email = $this->email;
        $order->phone = $this->phon;
        $order->add1 = $this->b_add1;
        $order->add2 = $this->b_add2;
        $order->city = $this->city;
        $order->country = $this->country;
        $order->postcode = $this->zipcode;
        $order->status = 'ordered';
        $order->is_shipping_different = $this->ship_to_different ? 1:0;
        $order->save();

        //orderitem
        foreach(Cart::instance('cart')->content() as $item)
        {
            $orderItem = new OrderItem();
            $orderItem->product_id = $item->id;
            $orderItem->order_id = $order->id;
            $orderItem->price = $item->price;
            $orderItem->quentity = $item->qty;
            $orderItem->save();
        }

        //shipping
        if($this->ship_to_different)
        {
            $this->validate([

            's_firstname' => 'required',
            's_lastname' => 'required',
            's_email' => 'required|email',
            's_phon' => 'required|numeric',
            's_add1' => 'required',
            's_city' => 'required',
            's_country' => 'required',
            's_zipcode' => 'required'

            ]);

            $shipping = new Shipping();
            $shipping->order_id = $order->id;
            $shipping->firstname = $this->s_firstname;
            $shipping->lastname = $this->s_lastname;
            $shipping->email = $this->s_email;
            $shipping->phone = $this->s_phon;
            $shipping->add1 = $this->s_add1;
            $shipping->add2 = $this->s_add2;
            $shipping->city = $this->s_city;
            $shipping->country = $this->s_country;
            $shipping->postcode = $this->s_zipcode;
            $shipping->save();
        }

        //payment
        if($this->paymentmode == 'code')
        {
            $transaction= new Transaction();
            $transaction->user_id = Auth::user()->id;
            $transaction->order_id = $order->id;
            $transaction->mode = 'code';
            $transaction->status = 'pending';
            $transaction->save();
        }

        $this->thankyou = 1;
        Cart::instance('cart')->destroy();
        session()->forget('checkout');

        $this->sendOrderConfirmationMail($order);

        return redirect()->route('thankyou');

    }

    public function sendOrderConfirmationMail($order)
    {
        Mail::to($order->email)->send(new OrderMail($order));
    }

    public function verifyForCheckout()
    {
        if(!Auth::check())
        {
            return redirect()->route('login');
        }
        else if($this->thankyou)
        {
            return redirect()->route('thankyou');
        }
        else if(!session()->get('checkout'))
        {
            return redirect()->route('product.cart');
        }
    }

    

    public function render()
    {
        $this->verifyForCheckout();
        return view('livewire.chackout-component')->layout('website.layouts.base');
    }
}

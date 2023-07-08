<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Cart;
use Illuminate\Support\Facades\Auth;

use App\Models\Coupon;
use Carbon\Carbon;

use Illuminate\Support\Facades\DB;

class CartComponent extends Component
{
    //public $haveCouponCode;
    public $couponCode;
    public $discount;
    public $subtotalAfterdiscount;
    public $taxAfterdiscount;
    public $totalAfterdiscount;
    public $subtotal;

    public function mount()
    {
       $this->subtotal = Cart::instance('cart')->subtotal();
    }

    public function incressQuantity($rowId)
    {
            $product = Cart::instance('cart')->get($rowId);
            $qty = $product->qty + 1;
            Cart::instance('cart')->update($rowId,$qty);
            $this->emitTo('cart-count-component','refreshComponent');
            return redirect()->route('product.cart');
    }

    public function decressQuantity($rowId)
    {
            $product = Cart::instance('cart')->get($rowId);
            $qty = $product->qty - 1;
            Cart::instance('cart')->update($rowId,$qty);
            $this->emitTo('cart-count-component','refreshComponent');
            return redirect()->route('product.cart');
    }

    public function deleteCartProduct($rowId)
    {
        Cart::instance('cart')->remove($rowId);
        $this->emitTo('cart-count-component','refreshComponent');

        session()->flash('message', 'Successfully Item has been removed');
        return redirect()->route('product.cart');
    }


    public function destroyCartItem()
    {
        Cart::instance('cart')->destroy();
        $this->emitTo('cart-count-component','refreshComponent');
        session()->flash('message', 'Successfully removed all Item');
        
        return redirect()->route('product.cart');
    }

    public function switshToSaveLater($rowId)
    {
        $item = Cart::instance('cart')->get($rowId);
        Cart::instance('cart')->remove($rowId);
        Cart::instance('saveForLater')->add($item->id,$item->name,1,$item->price)->associate('App\Models\Product');
        $this->emitTo('cart-count-component','refreshComponent');
        session()->flash('save_message', 'Item has been save for later');
        return redirect()->route('product.cart');
    }

    public function moveToCart($rowId)
    {
        $item = Cart::instance('saveForLater')->get($rowId);
        Cart::instance('saveForLater')->remove($rowId);
        Cart::instance('cart')->add($item->id,$item->name,1,$item->price)->associate('App\Models\Product');
        $this->emitTo('cart-count-component','refreshComponent');
        session()->flash('message', 'Item has been move to Cart');
        return redirect()->route('product.cart');
    }

    public function deleteFromSaveForLater($rowId)
    {
        Cart::instance('saveForLater')->remove($rowId);
        session()->flash('save_message', 'Successfully save for later removed');
        return redirect()->route('product.cart');
    }

    public function applyCouponCode()
    {
        $coupon = Coupon::where('code', $this->couponCode)->where('cart_value', '<=', Cart::instance('cart')->subtotal())->where('expiry_date', '>=', Carbon::today()->format('Y-m-d'))->first();

        
        if(!$coupon){
            session()->flash('coupon_message', 'Coupon code is invalid!');
             return redirect()->route('product.cart');
        }

        session()->put('coupon',[
            'code' => $coupon->code,
            'type' => $coupon->type,
            'value' => $coupon->value,
            'cart_value' => $coupon->cart_value
        ]);

       return redirect()->route('product.cart');
    }

    public function calculateDiscount()
    {
        if(session()->has('coupon')){
            if(session()->get('coupon')['type'] == 'fixed'){
                $this->discount = session()->get('coupon')['value'];
            }
            else{
                $this->discount = (Cart::instance('cart')->subtotal * session()->get('coupon')['value'])/100;
            }
            $this->subtotalAfterdiscount = Cart::instance('cart')->subtotal() - $this->discount;
            $this->taxAfterdiscount = ($this->subtotalAfterdiscount * config('cart.tax'))/100;
            $this->totalAfterdiscount = $this->subtotalAfterdiscount + $this->taxAfterdiscount;
        }
    }

    public function removeCouponCode()
    {
        session()->forget('coupon');
        return redirect()->route('product.cart');
    }

    public function checkout()
    {
        if(Auth::check())
        {
            return redirect()->route('checkout');
        }
        else
        {
            return redirect()->route('login');
        }
    }

    public function setAmountForCheckout()
    {
        if(!Cart::instance('cart')->count() > 0)
        {
            session()->forget('checkout');
            return;
        }

        if(session()->has('coupon'))
        {
            session()->put('checkout',[
                'discount' => $this->discount,
                'subtotal' => $this->subtotalAfterdiscount,
                'tax' => $this->taxAfterdiscount,
                'total' => $this->totalAfterdiscount
            ]);
        }
        else
        {
            session()->put('checkout',[
                'discount' => 0,
                'subtotal' => Cart::instance('cart')->subtotal(),
                'tax' => Cart::instance('cart')->tax(),
                'total' => Cart::instance('cart')->total()
            ]);
        }
    }

    public function render()
    {
        if(session()->has('coupon'))
        {
            if(Cart::instance('cart')->subtotal() < session()->get('coupon')['cart_value']){
              session()->forget('coupon');
            }
            else{
                $this->calculateDiscount();
            }
        }

        $this->setAmountForCheckout();

        if(Auth::check())
        {
            Cart::instance('cart')->store(Auth::user()->email);
        }


        return view('livewire.cart-component')->layout('website.layouts.base');
    }
}

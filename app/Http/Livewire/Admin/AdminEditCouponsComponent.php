<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Coupon;

class AdminEditCouponsComponent extends Component
{
    public $code;
    public $type;
    public $value;
    public $cart_value;
    public $coupon_id;
    public $expiry_date;

    public function mount($coupon_id)
    {
        $coupon = Coupon::where('id', $coupon_id)->first();
        $this->code = $coupon->code;
        $this->type = $coupon->type;
        $this->value = $coupon->value;
        $this->cart_value = $coupon->cart_value;
        $this->expiry_date = $coupon->expiry_date;
        $this->coupon_id = $coupon->id;
    }

    public function update($fields)
    {
        $this->validateOnly($fields,[
            'code' => 'required',
            'type' => 'required',
            'value' => 'required|numeric',
            'cart_value' => 'required|numeric',
            'expiry_date' => 'required'
        ]);
    }

    public function updateCoupon()
    {
       $this->validate([
            'code' => 'required',
            'type' => 'required',
            'value' => 'required|numeric',
            'cart_value' => 'required|numeric',
            'expiry_date' => 'required'
        ]);

        $coupon = Coupon::find($this->coupon_id);
        $coupon->code = $this->code;
        $coupon->type = $this->type;
        $coupon->value = $this->value;
        $coupon->cart_value = $this->cart_value;
        $coupon->expiry_date = $this->expiry_date;
        $coupon->update();

        return redirect()->route('admin.coupon')->with('message', 'Coupon Update Successfully.');
    }

    public function render()
    {
        return view('livewire.admin.admin-edit-coupons-component')->layout('admin.layouts.base');
    }
}

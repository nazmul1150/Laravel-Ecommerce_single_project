<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

use App\Models\Coupon;
use Livewire\WithPagination;

class AdminCouponsComponent extends Component
{
    use WithPagination;

    // public $coupon_id;

    // public function mount($coupon_id)
    // {
    //     $coupon = Coupon::find($coupon_id);
    //     $this->coupon_id = $coupon_id;
    // }

    public function deleteCoupon($id)
    {
        Coupon::find($id)->delete();
        return redirect()->route('admin.coupon')->with('message', 'Coupon has been delete successfully!');
    }

    public function render()
    {
        $coupons = Coupon::orderBy('id','DESC')->paginate(10);
        return view('livewire.admin.admin-coupons-component',['coupons'=>$coupons])->layout('admin.layouts.base');
    }
}

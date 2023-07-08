<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;

use Illuminate\Support\Facades\Auth;

use App\Models\HomeSlider;
use App\Models\Product;
use App\Models\Category;
use App\Models\HomeCategories;
use App\Models\Sale;

class HomeComponent extends Component
{
    public function render()
    {
        $sliders = HomeSlider::where('status', 1)->orderBy('id', 'DESC')->get();
        $products = Product::orderBy('id', 'DESC')->get()->take(8);

        $home_category = HomeCategories::find(1);
        $sel_categories = explode(',',$home_category->sel_categories);
        $no_of_product = $home_category->no_of_product;

        $categorys = Category::whereIn('id', $sel_categories)->orderBy('id', 'DESC')->get();

        $on_sale_products = Product::where('sale_price','>',0)->inRandomOrder()->get()->take(8);

        $sale_time = Sale::find(1);

        if(Auth::check())
        {
            Cart::instance('cart')->restore(Auth::user()->email);
            Cart::instance(' wishlist')->restore(Auth::user()->email);
        }

        return view('livewire.home-component', ['sliders' => $sliders, 'products' => $products,'categorys' => $categorys,'no_of_product' => $no_of_product,'on_sale_products'=>$on_sale_products,'sale_time'=>$sale_time])->layout('website.layouts.base');
    }
}

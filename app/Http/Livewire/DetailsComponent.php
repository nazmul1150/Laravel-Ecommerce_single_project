<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Product;
use Cart;
use App\Models\Sale;
use App\Models\Review;

class DetailsComponent extends Component
{
    public $slug;
    public $qty;

    public function mount($slug){
        $this->slug = $slug;
        $this->qty = 1;
    }

    public function incressQuantity()
    {
        $this->qty++;

            // $product = Cart::instance('cart')->get($rowId);
            // $qty = $product->qty + 1;
            // Cart::instance('cart')->update($rowId,$qty);
            // $this->emitTo('cart-count-component','refreshComponent');
            // return redirect()->route('product.cart');
        //return redirect()->route('product.details',$this->slug);
    }

    public function decressQuantity()
    {

        if($this->qty > 1)
        {
            $this->qty--;
        }
            // $product = Cart::instance('cart')->get($rowId);
            // $qty = $product->qty - 1;
            // Cart::instance('cart')->update($rowId,$qty);
            // $this->emitTo('cart-count-component','refreshComponent');
            // return redirect()->route('product.cart');
    }

    public function store($product_id,$product_name,$product_price)
    {
        Cart::instance('cart')->add($product_id, $product_name,$this->qty,$product_price)->associate('App\Models\Product');
        session()->flash('message', 'Successfully Item add in Cart');
        return redirect()->route('product.cart');
    }


    public function render()
    {
        $product_details = Product::where('slug', $this->slug)->first();

        $propolour_products = Product::inRandomOrder()->limit(4)->get();

        $related_products = Product::where('category_id', $product_details->category_id)->orderBy('id','DESC')->limit(6)->get();

        $sale_time = Sale::find(1);

        return view('livewire.details-component', ['product_details' => $product_details,'propolour_products' => $propolour_products,'related_products' => $related_products,'sale_time'=>$sale_time])->layout('website.layouts.base');
    }
}

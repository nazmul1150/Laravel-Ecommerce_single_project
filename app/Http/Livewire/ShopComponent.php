<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Product;
use App\Models\Category;

use Cart;
use Illuminate\Support\Facades\Auth;

class ShopComponent extends Component
{
    public $sorting;
    public $pagesize;

    public $min_price;
    public $max_price;

    public function mount()
    {
        $this->sorting = "default";
        $this->pagesize = 12;

        $this->min_price = 0;
        $this->max_price = 10000;
    }


    public function store($product_id,$product_name,$product_price)
    {
        Cart::instance('cart')->add($product_id, $product_name,1,$product_price)->associate('App\Models\Product');
        session()->flash('message', 'Successfully Item add in Cart');
        return redirect()->route('product.cart');
    }

    public function addToWishlist($product_id,$product_name,$product_price)
    {
        Cart::instance('wishlist')->add($product_id, $product_name,1,$product_price)->associate('App\Models\Product');
        $this->emitTo('wishlist-count-component','refreshComponent');
        return redirect()->route('shop');
    }

    public function removeFormToWishlist($product_id)
    {
        foreach(Cart::instance('wishlist')->content() as $wisitm)
        {
            if($wisitm->id == $product_id)
            {
                Cart::instance('wishlist')->remove($wisitm->rowId);
                $this->emitTo('wishlist-count-component','refreshComponent');
                return redirect()->route('shop');
            }
        }
    }

    use WithPagination;


    public function render()
    {
        if($this->sorting == 'date')
        {
            $products = Product::whereBetween('sale_price',[$this->min_price,$this->max_price])->orderBy('created_at', 'DESC')->paginate($this->pagesize);
        }
        else if ($this->sorting == 'price') {
            $products = Product::whereBetween('sale_price',[$this->min_price,$this->max_price])->orderBy('sale_price', 'ASC')->paginate($this->pagesize);
        }
        else if ($this->sorting == 'price-desc') {
            $products = Product::whereBetween('sale_price',[$this->min_price,$this->max_price])->orderBy('sale_price', 'DESC')->paginate($this->pagesize);
        }
        else{
           $products = Product::whereBetween('sale_price',[$this->min_price,$this->max_price])->orderBy('id', 'DESC')->paginate($this->pagesize);
        }

        $categorys = Category::latest()->get();

        if(Auth::check())
        {
            Cart::instance('cart')->store(Auth::user()->email);
            Cart::instance('wishlist')->store(Auth::user()->email);
        }

        return view('livewire.shop-component',['products' => $products, 'categorys' => $categorys])->layout('website.layouts.base');
    }
}

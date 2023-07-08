<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Livewire\WithPagination;

use App\Models\Product;
use App\Models\Category;
use Cart;

class WishlistComponent extends Component
{

   
    public function moveProductFromWishlist($rowId)
    {
        $item =Cart::instance('wishlist')->get($rowId);
        Cart::instance('wishlist')->remove($rowId);
        Cart::instance('cart')->add($item->id, $item->name,1,$item->price)->associate('App\Models\Product');
        session()->flash('message', 'Successfully Item add in Cart');
        return redirect()->route('product.cart');
    }

    public function removeFormToWishlist($product_id)
    {
        foreach(Cart::instance('wishlist')->content() as $wisitm)
        {
            if($wisitm->id == $product_id)
            {
                Cart::instance('wishlist')->remove($wisitm->rowId);
                $this->emitTo('wishlist-count-component','refreshComponent');
                return redirect()->route('product.wishlist');
            }
        }
    }

    public function render()
    {
        //$wishlist = Cart::instance('wishlist')->content();
        //dd($wishlist);

        return view('livewire.wishlist-component')->layout('website.layouts.base');
    }
}

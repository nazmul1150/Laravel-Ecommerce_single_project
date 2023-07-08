<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Product;
use App\Models\Category;
use Cart;
use Livewire\WithPagination;


class CartCountComponent extends Component
{
    protected $listener = ['refreshComponent'=>'$refresh'];
    
    public function render()
    {
        return view('livewire.cart-count-component');
    }
}

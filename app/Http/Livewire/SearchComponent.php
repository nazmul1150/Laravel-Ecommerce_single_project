<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Product;
use App\Models\Category;
use Cart;

class SearchComponent extends Component
{
    public $sorting;
    public $pagesize;

    public $search;
    public $product_cat;
    public $product_cat_id;

    public function mount()
    {
        $this->sorting = "default";
        $this->pagesize = 12;
        $this->fill(request()->only('search','product_cat','product_cat_id'));
    }


    public function store($product_id,$product_name,$product_price)
    {
        Cart::add($product_id, $product_name,1,$product_price)->associate('App\Models\Product');
        session()->flash('message', 'Successfully Item add in Cart');
        return redirect()->route('product.cart');
    }

    use WithPagination;


    public function render()
    {
        if($this->sorting == 'date')
        {
            $products = Product::where('name','like','%'.$this->search . '%')->where('category_id', 'like','%' . $this->product_cat_id . '%')->orderBy('created_at', 'DESC')->paginate($this->pagesize);
        }
        else if ($this->sorting == 'price') {
            $products = Product::where('name','like','%'.$this->search . '%')->where('category_id', 'like','%' . $this->product_cat_id . '%')->orderBy('sale_price', 'ASC')->paginate($this->pagesize);
        }
        else if ($this->sorting == 'price-desc') {
            $products = Product::where('name','like','%'.$this->search . '%')->where('category_id', 'like','%' . $this->product_cat_id . '%')->orderBy('sale_price', 'DESC')->paginate($this->pagesize);
        }
        else{
           $products = Product::where('name','like','%'.$this->search . '%')->where('category_id', 'like','%' . $this->product_cat_id . '%')->paginate($this->pagesize);
        }

        $categorys = Category::latest()->get();

        
        return view('livewire.search-component',['products' => $products, 'categorys' => $categorys])->layout('website.layouts.base');
    }
}


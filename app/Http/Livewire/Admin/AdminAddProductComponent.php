<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;

use Livewire\WithFileUploads;
use Carbon\Carbon;

class AdminAddProductComponent extends Component
{
     use WithFileUploads;

    public $name;
    public $regular_price;
    public $sale_price;
    public $sku;
    public $stock_status;
    public $featured;
    public $quantity;
    public $category_id;
    public $sort_description;
    public $long_description;
    public $image;
    public $images;

    public function mount()
    {
        $this->stock_status = 'instock';
        $this->featured = 0;
        $this->regular_price = 0;
    }

    public function addProduct()
    {
        $this->validate([
            'name' => 'required|unique:products',
            'sale_price' => 'required',
            'stock_status' => 'required',
            'featured' => 'required',
            'quantity' => 'required',
            'category_id' => 'required',
            'sort_description' => 'required',
            'long_description' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);

        // $imageName = hexdec(uniqid()).'.'.$this->image->getClientOriginalExtension();
        // $this->image->storeAs('products',$imageName);

        $product = new Product();

        $imageName = Carbon::now()->timestamp.'.'.$this->image->extension();
        $this->image->storeAs('products', $imageName);

        if($this->images)
        {
           // $imagesName = Carbon::now()->timestamp.'.'.$this->images->extension();
           // $this->images->storeAs('products', $imagesName);
            $imagesname = '';
            foreach($this->images as $key=>$image)
            {
                $imgname = Carbon::now()->timestamp. $key.'.'.$image->extension();
                $image->storeAs('products', $imgname);
                $imagesname = $imagesname . ',' . $imgname;
            }
            $product->images = $imagesname;
        }


       
            $product->name = $this->name;
            $product->slug = strtolower(str_replace(' ', '-', $this->name));
            $product->regular_price = $this->regular_price;
            $product->sale_price = $this->sale_price;
            $product->sku = $this->sku;
            $product->stock_status = $this->stock_status;
            $product->featured = $this->featured;
            $product->quantity = $this->quantity;
            $product->category_id = $this->category_id;
            $product->sort_description = $this->sort_description;
            $product->long_description = $this->long_description;
            $product->image = $imageName;
            $product->save();
        

        return redirect()->route('admin.product')->with('message', 'Product add successfully!');
    }

    public function render()
    {
        $categorys = Category::latest()->get();
        return view('livewire.admin.admin-add-product-component',['categorys' => $categorys])->layout('admin.layouts.base');
    }
}

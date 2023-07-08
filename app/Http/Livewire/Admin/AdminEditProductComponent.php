<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;


use App\Models\Category;
use App\Models\Product;

use Livewire\WithFileUploads;
use Carbon\Carbon;

class AdminEditProductComponent extends Component
{
    use WithFileUploads;

    public $product_slug;
    public $product_id;

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
    public $newimage;

    public $images;
    public $newimages;

    public function mount($product_slug)
    {
        $this->product_slug = $product_slug;
        $product = Product::where('slug', $product_slug)->first();
        
        $this->product_id= $product->id;
        $this->name= $product->name;
        $this->regular_price= $product->regular_price;
        $this->sale_price= $product->sale_price;
        $this->sku= $product->sku;
        $this->stock_status= $product->stock_status;
        $this->featured= $product->featured;
        $this->quantity= $product->quantity;
        $this->category_id= $product->category_id;
        $this->sort_description= $product->sort_description;
        $this->long_description= $product->long_description;
        $this->image= $product->image;

        $this->images = explode(",",$product->images);
    }


    public function updateProduct()
    {
       $product = Product::find($this->product_id);

       $product->name = $this->name;
       $product->slug = strtolower(str_replace(' ', '-', $this->name));
       $product->regular_price = $this->regular_price;
       $product->sale_price = $this->sale_price;
       $product->stock_status = $this->stock_status;
       $product->featured = $this->featured;
       $product->quantity = $this->quantity;

       $product->category_id = $this->category_id;
       $product->sort_description = $this->sort_description;
       $product->long_description = $this->long_description;
       $product->name = $this->name;
       $product->name = $this->name;
       $product->name = $this->name;
       $product->name = $this->name;

        if($this->newimage){

             if ($product->image) {
                unlink(public_path('website/images/products/' . $product->image));
            }

             $imageName = Carbon::now()->timestamp.'.'.$this->newimage->extension();
             $this->newimage->storeAs('products', $imageName);
             $product->image = $imageName;
        } else{
            $product->image = $this->image;
        }

        if($this->newimages)
        {
            if($product->images)
           {
            $images = explode(",",$product->images);
            foreach($images as $image)
            {
                if($image)
                {
                    unlink(public_path('website/images/products/' . $image));
                }
                
            }
          }

          $imagesname = '';
            foreach($this->newimages as $key=>$image)
            {
                $imgname = Carbon::now()->timestamp. $key.'.'.$image->extension();
                $image->storeAs('products', $imgname);
                $imagesname = $imagesname . ',' . $imgname;
            }
            $product->images = $imagesname;
        }

        $product->update();

        return redirect()->route('admin.product')->with('message', 'Product Update successfully!');
    }


    public function render()
    {
        $categorys = Category::latest()->get();
        return view('livewire.admin.admin-edit-product-component',['categorys' => $categorys])->layout('admin.layouts.base');
    }
}

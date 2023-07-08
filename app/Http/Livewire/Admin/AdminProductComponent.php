<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

use App\Models\Category;
use App\Models\Product;
use Livewire\WithPagination;

class AdminProductComponent extends Component
{
    use WithPagination;

    public function deleteProduct($id)
    {
        $product = Product::find($id);
         unlink(public_path('website/images/products/' . $product->image));
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
        $product->delete();
        return redirect()->route('admin.product')->with('message', 'Product delete has been successfully!');
    }

    public function render()
    {
        $products = Product::orderBy('id', 'DESC')->paginate(10);
        return view('livewire.admin.admin-product-component', ['products' => $products])->layout('admin.layouts.base');
    }
}

<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

use App\Models\Subcategory;
use Livewire\WithPagination;

class AdminSubcategoriComponent extends Component
{
    use WithPagination;

    public function deletesubCategory($id)
    {
        Subcategory::find($id)->delete();
        return redirect()->route('admin.subcategory')->with('message', 'SubCategory has been delete successfully!');
    }
      

    public function render()
    {
        $subcategorys = Subcategory::orderBy('id','DESC')->paginate(10);
        return view('livewire.admin.admin-subcategori-component',['subcategorys'=>$subcategorys])->layout('admin.layouts.base');
    }
}

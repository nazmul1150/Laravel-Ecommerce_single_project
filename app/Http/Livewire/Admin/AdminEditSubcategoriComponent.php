<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use App\Models\Subcategory;

class AdminEditSubcategoriComponent extends Component
{
    public $name;
    public $category_id;

    public $subcategory_id;

    public function mount($subcategory_slug)
    {
        $subcategory = Subcategory::where('slug', $subcategory_slug)->first();
        $this->name = $subcategory->name;
        $this->category_id = $subcategory->category_id;
        $this->subcategory_id = $subcategory->id;
    }

     public function updateSubCategory()
    {
        $this->validate([
            'name' => 'required',
            'category_id' => 'required'
        ]);


        $subcategory = Subcategory::find($this->subcategory_id);
        $subcategory->name = $this->name;
        $subcategory->category_id = $this->category_id;
        $subcategory->slug = strtolower(str_replace(' ', '-', $this->name));
        $subcategory->update();

        return redirect()->route('admin.subcategory')->with('message', 'SubCategory Update Succesfully');
    }

    public function render()
    {
        $categorys = Category::all();
        return view('livewire.admin.admin-edit-subcategori-component',['categorys'=>$categorys])->layout('admin.layouts.base');
    }
}

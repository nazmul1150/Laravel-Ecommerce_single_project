<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use App\Models\Subcategory;

class AdminAddSubcategoriComponent extends Component
{
    public $name;
    public $category_id;

    public function storeSubCategory()
    {
        $this->validate([
            'name' => 'required',
            'category_id' => 'required'
        ]);

        $subcategory = new Subcategory();
        $subcategory->name = $this->name;
        $subcategory->category_id = $this->category_id;
        $subcategory->slug = strtolower(str_replace(' ', '-', $this->name));
        $subcategory->save();

        return redirect()->route('admin.subcategory')->with('message', 'SubCategory Added Succesfully');
    }
    public function render()
    {
        $categorys = Category::all();
        return view('livewire.admin.admin-add-subcategori-component',['categorys'=>$categorys])->layout('admin.layouts.base');
    }
}

<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

use App\Models\Category;
use App\Models\HomeCategories;

class AdminHomeCategoryComponent extends Component
{
    public $selected_categories = [];
    public $numberofproducts;

    public function mount()
    {
        $category = HomeCategories::find(1);
        $this->selected_categories = explode(',', $category->sel_categories);
        $this->numberofproducts = $category->no_of_product;
    }

    public function updateHomeCategories()
    {
        $category = HomeCategories::find(1);
        $category->sel_categories = implode(',',$this->selected_categories);
        $category->no_of_product = $this->numberofproducts;
        $category->save();

        return redirect()->route('admin.homecategories')->with('message', 'Home Categories selectes Update Successfully!');
    }

    public function render()
    {
        $categorys = Category::latest()->get();
        return view('livewire.admin.admin-home-category-component',['categorys' => $categorys])->layout('admin.layouts.base');
    }
}

<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

// use Illuminate\Http\Request;

use App\Models\Category;
// use Illuminate\Support\Str;

class AdminAddCategoryComponent extends Component
{
    public $name;

    public function storeCategory()
    {

         Category::insert([
            'name' => $this->name,
            'slug' => strtolower(str_replace(' ', '-', $this->name))
        ]);

        // $category = new Category();
        // $category->name = $this->name;
        // $category->slug = strtolower(str_replace(' ', '-', $this->name));
        // $category->save();

        return redirect()->route('admin.category')->with('message', 'Category Added Succesfully');
    }

    public function render()
    {
        return view('livewire.admin.admin-add-category-component')->layout('admin.layouts.base');
    }
}

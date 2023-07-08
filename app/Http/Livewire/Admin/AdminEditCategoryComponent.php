<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;

class AdminEditCategoryComponent extends Component
{
    public $category_slug;
    public $category_id;
    public $name;

    public function mount($category_slug)
    {
        $this->category_slug = $category_slug;
        $category = Category::where('slug', $category_slug)->first();
        $this->category_id = $category->id;
        $this->name = $category->name;
    }


    public function updateCategory()
    {
        Category::findOrFail($this->category_id)->update([
            'name' => $this->name,
            'slug' => strtolower(str_replace(' ', '-', $this->name)) 
         ]);
        
        return redirect()->route('admin.category')->with('message', 'Category Updated Succesfully');
    }

    public function render()
    {
       
        return view('livewire.admin.admin-edit-category-component')->layout('admin.layouts.base');
    }
}

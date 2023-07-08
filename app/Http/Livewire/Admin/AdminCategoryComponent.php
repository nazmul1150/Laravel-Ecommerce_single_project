<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

use App\Models\Category;
use Livewire\WithPagination;

class AdminCategoryComponent extends Component
{
    use WithPagination;

    public function deleteCategory($id)
    {
        Category::find($id)->delete();
        return redirect()->route('admin.category')->with('message', 'Category has been delete successfully!');
    }
        

    public function render()
    {
        $categorys = Category::orderBy('id','DESC')->paginate(10);
        return view('livewire.admin.admin-category-component', ['categorys' => $categorys])->layout('admin.layouts.base');
    }
}

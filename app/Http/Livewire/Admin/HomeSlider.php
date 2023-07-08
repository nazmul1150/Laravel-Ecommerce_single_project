<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\HomeSlider as Slider;
use Livewire\WithPagination;

class HomeSlider extends Component
{
    use WithPagination;

    public function deleteHomeSlider($id)
    {
        $slider = Slider::find($id);
        unlink(public_path('website/images/sliders/' . $slider->image));
        $slider->delete();
        return redirect()->route('admin.homeslider')->with('message', 'Slider delete has been successfully!');
    }

    public function render()
    {
        $sliders = Slider::orderBy('id', 'DESC')->paginate(10);
        return view('livewire.admin.home-slider',['sliders' => $sliders])->layout('admin.layouts.base');
    }
}

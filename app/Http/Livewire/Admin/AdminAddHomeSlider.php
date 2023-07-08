<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

use App\Models\HomeSlider;
use Livewire\WithFileUploads;
use Carbon\Carbon;

class AdminAddHomeSlider extends Component
{
    use WithFileUploads;

    public $title;
    public $subtitle;
    public $price;
    public $link;
    public $image;
    public $status;

    public function mount()
    {
        $this->status = '1';
    }

    public function addHomeSlider()
    {
        $this->validate([
            'image' => 'required'
        ]);

        $slider = new HomeSlider();

        $imageName = Carbon::now()->timestamp.'.'.$this->image->extension();
        $this->image->storeAs('sliders', $imageName);
        $slider->image = $imageName;

        $slider->title = $this->title;
        $slider->subtitle = $this->subtitle;
        $slider->price = $this->price;
        $slider->link = $this->link;
        $slider->status = $this->status;

        $slider->save();

        return redirect()->route('admin.homeslider')->with('message', 'Home Slider Add Successfully');
    }

    public function render()
    {
        return view('livewire.admin.admin-add-home-slider')->layout('admin.layouts.base');
    }
}

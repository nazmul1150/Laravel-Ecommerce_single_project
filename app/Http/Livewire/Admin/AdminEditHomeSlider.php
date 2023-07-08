<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

use App\Models\HomeSlider;
use Livewire\WithFileUploads;
use Carbon\Carbon;

class AdminEditHomeSlider extends Component
{
    use WithFileUploads;

    public $title;
    public $subtitle;
    public $price;
    public $link;
    public $image;
    public $newimage;
    public $status;
    public $slider_id;

    public function mount($slider_id)
    {
        $slider = HomeSlider::where('id', $slider_id)->first();
         $this->title = $slider->title;
         $this->subtitle = $slider->subtitle;
         $this->price = $slider->price;
         $this->link = $slider->link;
         $this->image = $slider->image;
         $this->status = $slider->status;
         $this->slider_id = $slider->id;
    }

    public function updateHomeSlider()
    {
        $slider = HomeSlider::find($this->slider_id);

        if($this->newimage){

            unlink(public_path('website/images/sliders/' . $slider->image));

            $imageName = Carbon::now()->timestamp.'.'.$this->newimage->extension();
            $this->newimage->storeAs('sliders', $imageName);
            $slider->image = $imageName;
        } else{
            $slider->image = $this->image;
        }

        $slider->title = $this->title;
        $slider->subtitle = $this->subtitle;
        $slider->price = $this->price;
        $slider->link = $this->link;
        $slider->status = $this->status;

        $slider->update();

        return redirect()->route('admin.homeslider')->with('message', 'Home Slider Update Successfully');
    }

    public function render()
    {
        return view('livewire.admin.admin-edit-home-slider')->layout('admin.layouts.base');
    }
}

<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Sale;

class AdminSaleComponent extends Component
{
    public $sale_date;
    public $status;

    public function mount()
    {
        $sale = Sale::find(1);
        $this->status = $sale->status;
        $this->sale_date = $sale->sale_date;
    }

    public function updateSaleDatetime()
    {
        $sale = Sale::find(1);
        $sale->status = $this->status;
        $sale->sale_date = $this->sale_date;
        $sale->update(); 
        return redirect()->route('admin.sale')->with('message', 'Sale Date Time Update Successfully!');
    }

    public function render()
    {
        return view('livewire.admin.admin-sale-component')->layout('admin.layouts.base');
    }
}

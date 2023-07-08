<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

use App\Models\Contact;
use App\Models\Setting;
use Livewire\WithPagination;

class AdminContactComponent extends Component
{
    use WithPagination;

    public function deleteMessage($id)
    {
        $contact = Contact::find($id);
        $contact->delete();
        return redirect()->route('admin.contact')->with('message', 'Message delete successfully!');
    }

    public function render()
    {
        $contact = Contact::orderBy('id','DESC')->paginate(12);
       
        return view('livewire.admin.admin-contact-component',['contact'=>$contact])->layout('admin.layouts.base');
    }
}

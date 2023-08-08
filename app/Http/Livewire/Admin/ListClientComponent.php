<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Foundation\Auth\User;
use Livewire\Component;

class ListClientComponent extends Component
{
    public function render()
    {
        $clients = User::where('utype', '=', 'CLT')->paginate(10);
        return view('livewire.admin.list-client-component', ['clients' => $clients]);
    }
}

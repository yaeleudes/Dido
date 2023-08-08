<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class VendeurComponent extends Component
{
    use WithPagination;
    public function render()
    {
        $vendeurs = User::where('utype', '=', 'ADM')
                        ->where('etat', '=', 'autorise')
                        ->paginate(12);
        return view('livewire.vendeur-component', ['vendeurs' => $vendeurs]);
    }
}

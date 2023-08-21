<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;

class Profile extends Component
{
    protected User $us;
    public $editar = false;
    public $image;

    use WithFileUploads;

    protected $rules= [
        'nombre' => 'required|string|max:120',
        'area' => 'required|string',
        'puesto' => 'required|string',
        'image' => 'image|max:2048',
        'tipo' => 'required',
        'telefono' => 'numeric',
    ];


    public function mount() {

    }

    public function editar() {
        if ($this->editar == true)
            $this->editar=false;
        else
            $this->editar=true;
    }
    


    public function render() {
        $this->us = User::findOrFail(auth()->id());

        return view('livewire.admin.profile',[
            'user' => $this->us,
            'editar' => $this->editar,
        ]);
    }
}

<?php

namespace App\Http\Livewire;

use App\Models\Perusahaan;
use Livewire\Component;

class SearchToken extends Component
{
    public $items;
    public $item;
    public $token;
    public $status = false;

    public function mount()
    {
        $this->items = Perusahaan::all();
    }

    public function render()
    {
        return view('livewire.search-token');
    }

    public function search()
    {
        $this->item = Perusahaan::where('token', $this->token)->first();
        if ($this->item) {
            $this->status = 'found';
        } else {
            $this->status = 'not found';
        }
        
    }
}

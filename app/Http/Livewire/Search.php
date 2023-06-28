<?php

namespace App\Http\Livewire;

use App\Helpers\VsmHelper;
use App\Models\DetailPengujian;
use App\Models\Document;
use Livewire\Component;

class Search extends Component
{
    public $items;
    public $results;
    public $query;
    public $status = false;

    public function mount()
    {
        $this->items = Document::all();
    }

    public function render()
    {
        return view('livewire.search');
    }

    public function search()
    {
        if ($this->query == null) {
            $this->status = 'empty';
            return;
        }
        $vsm = new VsmHelper();
        
        $this->results = $vsm->vsmSearch($this->query);

        if ($this->results->count()) {
            $this->status = 'found';
        } else {
            $this->status = 'not found';
        }

        // dd($this->status, $this->results);
    }
}

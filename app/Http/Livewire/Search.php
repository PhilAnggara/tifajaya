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
    public $precision;
    public $recall;
    public $query;
    public $status = false;
    public $showPrecisionAndRecall;

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
        
        $vsmResults = $vsm->vsmSearch($this->query);
        $this->results = $vsmResults['sortedDocuments'];
        $this->precision = $vsmResults['precision'];
        $this->recall = $vsmResults['recall'];
        $this->showPrecisionAndRecall = $vsmResults['showPrecisionAndRecall'];

        if ($this->results->count()) {
            $this->status = 'found';
        } else {
            $this->status = 'not found';
        }
    }
}

<?php

namespace App\Http\Livewire;

use App\Models\Jawaban;
use App\Models\Pertanyaan;
use App\Models\Perusahaan;
use App\Models\Responden;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class SearchToken extends Component
{
    public $items;
    public $item;
    public $token;
    public $status = false;
    public $questions;

    public $state = [];

    public function mount()
    {
        $this->items = Perusahaan::all();
        $this->questions = Pertanyaan::all();
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

    public function kirim()
    {
        $validatedData = Validator::make($this->state, [
            'nama_responden' => 'required|min:3|max:50',
            'jabatan' => 'required|min:2|max:50',
            'saran_perbaikan' => 'required|min:8|max:255',
            'jawaban.*' => 'required',
        ])->validate();

        $newResponden = Responden::create([
            'id_perusahaan' => $this->item->id,
            'nama' => $validatedData['nama_responden'],
            'jabatan' => $validatedData['jabatan'],
            'saran' => $validatedData['saran_perbaikan'],
        ]);

        $jawaban = [];
        foreach ($validatedData['jawaban'] as $key => $value) {
            $jawaban[] = [
                // 'id_responden' => $newResponden->id,
                'id_pertanyaan' => $key,
                'pilihan' => $value,
            ];
        }

        // sort array by id_pertanyaan
        usort($jawaban, function($a, $b) {
            return $a['id_pertanyaan'] <=> $b['id_pertanyaan'];
        });
        
        $newResponden->jawaban()->createMany($jawaban);
        
        $this->item->response = true;
        $this->dispatchBrowserEvent('terkirim');
    }
}

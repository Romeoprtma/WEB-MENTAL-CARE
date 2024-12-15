<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Carbon;
use Livewire\Component;

class UserChart extends Component
{
    public $userChartData;
    protected $listeners = ['ubahData' => 'changeData'];
    public function mount(){
        $userData = User::latest()->limit(5)->get();
        foreach($userData as $item){
            $data['label'][]= $item->created_at->format('Y-m-d');
            $data['data'][] = (int) $item->id;
        }
        $this->userChartData = json_encode($data);
        // dd($this->userChartData);
    }

    public function render()
    {

        return view('livewire.user-chart');
    }

    public function changeData () {
        $userData = User::latest()->limit(5)->get();
        foreach($userData as $item){
            $data['label'][]= $item->created_at->format('Y-m-d');
            $data['data'][] = (int) $item->income;
        }
        $this->userChartData = json_encode($data);
        $this->emit('berhasilUpdate', ['data' => $this->userChartData]);
        // dd($this->userChartData);
    }
}

<?php

namespace App\Http\Livewire;

use App\Models\Units;
use Livewire\Component;

class Convert extends Component
{
    public $superUnits = [];
    public $subUnits = [];
    public $super = null;
    public $sub = null;
    public $superValue = 0;
    public $subValue = 0;


    public function mount()
    {
        $this->superUnits = Units::units()->get();
        $this->super = $this->superUnits[0]->id;
        $this->subUnits = $this->superUnits[0]->subUnits;
        $this->sub = $this->subUnits[0]->id;

    }

    public function updatedSuperValue()
    {

        $this->super2Sub();


    }

    public function updatedSubValue()
    {

            $this->Sub2super();


    }

    public function changeSuper()
    {
        $this->subUnits = Units::where('id', $this->super)->firstOrFail()->subUnits;
        $this->sub = $this->subUnits[0]->id;
        $this->super2Sub();
    }

    public function changeSub(){
        $this->Sub2super();
    }

    public function render()
    {
        return view('livewire.convert');
    }

    private function super2Sub(){
        if (!empty($this->superValue) && $this->superValue != 0) {
            $superUnit = Units::where('id', $this->super)->firstOrFail();
            $subUnit = Units::where('id', $this->sub)->firstOrFail();
            $this->subValue = \App\Helpers\Convert::Up2Dow($superUnit, $subUnit, $this->superValue);
        }
    }

    private function Sub2super(){
        if (!empty($this->subValue) && $this->subValue != 0) {

            $superUnit = Units::where('id', $this->super)->firstOrFail();
            $subUnit = Units::where('id', $this->sub)->firstOrFail();
            $this->superValue = \App\Helpers\Convert::Down2Up($subUnit, $superUnit, $this->subValue);

        }
    }

}

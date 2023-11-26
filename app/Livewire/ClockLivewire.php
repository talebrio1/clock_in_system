<?php

namespace App\Livewire;

use App\Models\Clock;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class ClockLivewire extends Component
{
    public $clock_in;
    public $clock_out;
    public $date;
    public $search;
    
    public function mount()
    {
       
       
        $this->date = Carbon::now()->toDateString();
    }

    public function save()
    {
        $user = auth()->user();
        $user_id = $user->id;
        $clock = Clock::where('user_id', $user_id)
            ->where('date', Carbon::now()->toDateString())->first();

    
        if ($clock && $clock->status == 2 && $clock->date == Carbon::now()->toDateString()) {

            return Redirect::back()->with('error', 'You can only clock in again the next day');
        }
        
        if ($clock && $clock->status == 1) {
            
            $dt = Carbon::now();
        
            $this->clock_out =  $dt->addHour()->toDateTimeString();
        }

       
        if (empty($this->clock_out)) {

            $dt = Carbon::now();
            $this->clock_in =  $dt->addHour()->toDateTimeString();
            
            
            $clock = new Clock();
            $clock->clock_in = $this->clock_in;
            $clock->clock_out = null;
            $clock->date = Carbon::now()->toDateString();
            $clock->user_id = $user_id;
            $clock->status = 1;
            $clock->save();


            return redirect::back();
        } else {

            $clock = Clock::where('user_id', $user_id)
                    ->whereNull('clock_out')
                     ->where('date', Carbon::now()->toDateString())->first();


            $clock->clock_out = $this->clock_out;
            $clock->status = 2;
            $clock->save();

            return redirect::back();
        }
    }

    public function render()
    {
        $user = auth()->user();
        $user_type = $user->user_type;
        

        if($user_type == 'user'){

                $clocks = Clock::where('user_id', $user->id)->get();

            $clocks_status = Clock::where('user_id', $user->id)
                                ->where('date',Carbon::now()->toDateString())->first();
            

            if( empty($clocks_status->status )){

                $clock_status = 0;

            }else{
                
                $clock_status = $clocks_status->status;

            }

            return view('livewire.clock-livewire',[
                'clocks' => Clock::Search($this->search)->where('user_id', $user->id)->get(),
                'user_status' => $clock_status
            ]);
        }
    }
}

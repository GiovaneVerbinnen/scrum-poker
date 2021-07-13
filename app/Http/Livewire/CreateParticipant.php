<?php

namespace App\Http\Livewire;

use App\Models\Participant;
use App\Models\Room;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class CreateParticipant extends Component
{
    public Room $room;
    public $name;

    public $rules = [
        'name' => 'required|max:32',
    ];

    public function render()
    {
        return view('livewire.create-participant');
    }

    public function create()
    {
        $validated = $this->validate();
        /** @var Participant $participant */
        $participant = $this->room->participants()->create($validated);
        Session::put('participant', $participant);
        return redirect()->to(route('room.view', $this->room));
    }
}

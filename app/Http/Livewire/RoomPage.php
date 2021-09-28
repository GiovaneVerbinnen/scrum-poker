<?php

namespace App\Http\Livewire;

use App\Models\Feature;
use App\Models\Participant;
use App\Models\Room;
use Illuminate\Support\Facades\Session;
use Laravel\Fortify\Features;
use Livewire\Component;


/**
 * @property-read Collection $featureList
 * @package App\Http\Livewire
 */

class RoomPage extends Component
{

    public ?Participant $participant;
    public ?Feature $feature;
    public Room $room;
    public $newFeature;
    public $showCompleted = false;
    public $selectedFeatureId;


    protected $rules = [
        'newFeature' => 'required|string|max:128',
    ];

    protected $listeners = [
        'featureDeleted' => '$refresh',
        'featureUpdated' => '$refresh',
        'featureSelected' => 'setSelectedFeature',
    ];

    protected $queryString = [
        'selectedFeatureId' => ['except' => ''],
    ];

    public function mount(?Room $room)
    {
        $this->room = $room->exists
            ? $room
            : $this->getRoom();
    }

    public function render()
    {
        return view('livewire.room-page')->layout('layouts.dark');
    }



    // public function verifySelectedFeature()
    // {
    //     $this->selectedFeatureId = $this->room->selected_feature_id;
    // }

    public function getFeatureListProperty()
    {
        return $this->room->features()
            ->latest()
            ->when(!$this->showCompleted, fn ($query) =>
            $query->whereNull('compleated_at'))
            ->get();
    }

    public function getCompletedFeatureCountProperty()
    {
        return $this->room->features()->completed()->count();
    }

    public function addNewFeature()
    {
        $this->validate();
        $this->room->features()->create([
            'name' => $this->newFeature
        ]);
        $this->newFeature = null;
    }

    public function setSelectedFeature(Feature $feature)
    {
        //$this->selectedFeatureId = $feature;
        $this->room->update([
            'selected_feature_id' => $feature->id ?? null,
        ]);
    }

    private function getRoom(): Room
    {
        $roomId = Session::get('roomId');
        /** @var Room $room */
        $room = Room::find($roomId) ?? Room::create();
        Session::put('roomId', $room->id);
        if ($room->wasRecentlyCreated) {
            // $managerToken =  Str::random(32);
            Session::put('isManager', true);
        }

        return $room;
    }
}

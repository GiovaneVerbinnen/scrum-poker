<?php

namespace App\Http\Livewire;

use App\Models\Feature;
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

    public Room $room;
    public $newFeature;
    public $showCompleted = false;
    public $selectedFeatureId;
    public bool $isParticipant = false;

    protected $rules = [
        'newFeature' => 'required|string|max:512',
    ];

    protected $listeners = [
        'featureDeleted' => '$refresh',
        'featureUpdated' => '$refresh',
        'featureSelected' => 'setSelectedFeature',
    ];

    protected $queryString = [
        'selectedFeatureId' => ['except' => ''],
    ];

    public function mount(? Room $room)
    {
        $this->room = $room->exists
            ? $room
            : $this->getRoom();
    }

    public function render()
    {
        return view('livewire.room-page')->layout('layouts.dark');
    }

    public function getFeatureListProperty()
    {
        return $this->room->features()
            ->latest()
            ->when( !$this->showCompleted, fn ($query) =>
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
        $this->newFeature = null ;
    }

    public function setSelectedFeature($feature)
    {
       $this->selectedFeatureId = $feature;
       $this->room->forceFill([
           'select_feature_id' => $feature,
           ])->save();
    }

    private function getRoom(): Room
    {
        $roomId = Session::get('roomId');
        /** @var Room $room */
        $room = Room::find($roomId) ?? Room::create();
        Session::put('roomId', $room->id);
        if($room->wasRecentlyCreated) {
            // $managerToken =  Str::random(32);
            Session::put('isManager', true);
        }

        return $room;
    }
}

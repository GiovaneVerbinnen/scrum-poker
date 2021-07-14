<?php

namespace App\Http\Livewire;

use App\Models\Feature;
use Livewire\Component;

class VotingFeature extends Component
{
    public $selectedFeatureId;

    public ?Feature $feature;

    public $ratings = [
        '?', 1, 2, 3, 5, 8, 10, 13, 21, 40, 100
    ];

    public function mount($selectedFeatureId)
    {
        $this->feature = Feature::find($selectedFeatureId);
    }

    public function render()
    {
        return view('livewire.voting-feature');
    }

    public function remove()
    {
        $this->feature->room->removeFeature($this->feature);
        $this->feature = null;
        $this->emitUp('featureDeleted');
    }

    public function toggleComplete()
    {
        $this->feature->toggleComplete();
        $this->emit('featureUpdated' . $this->feature->id);
    }

    public function getParticipantsProperty()
    {
        return $this->feature->room->participants;
    }
}

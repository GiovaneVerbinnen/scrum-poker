<?php

namespace App\Http\Livewire;

use App\Support;
use App\Models\Feature;
use App\Models\Participant;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

/**
 * @property-read Collection $participants
 * @package
 */

class VotingFeature extends Component
{
    public $selectedFeatureId;

    public ?Feature $feature;

    public $voted;

    public $reactive;


    public $ratings = [
        '?', 1, 2, 3, 5, 8, 10, 13, 21, 40, 100
    ];


    public function mount($selectedFeatureId)
    {
        $this->feature = Feature::find($selectedFeatureId);
        $this->voted = $this->getEstimatePointValue($this->feature);
    }

    public function render()
    {
        return view('livewire.voting-feature');
    }

    public function getParticipantsProperty()
    {
        if (!$this->feature) {
            return [];
        }
        return $this->feature->room->fresh()->participants()
            ->with([
                'estimatePoints' => fn ($estimatePoint)
                => $estimatePoint->whereFeatureId($this->feature->id ?? null)
            ])
            ->get();
    }

    public function remove()
    {
        $this->feature->room->removeFeature($this->feature);
        $this->feature = null;
        $this->emitUp('featureDeleted');
    }

    public function removeParticipant(Participant $participant)
    {
        $participant->delete();
        $this->emitSelf('$refresh');
    }
    public function toggleComplete()
    {
        $this->feature->toggleComplete();
        $this->emit('featureUpdated' . $this->feature->id);
    }

    public function vote($rating)
    {
        $this->voted = $rating;
        if (isManager()) {
        } else {
            $estimatePoint = participant()->vote($this->feature, $rating);
        }
    }
    public function voteValue(Participant $participant)
    {
        return $participant->getEstimatePoints($this->feature)->value ?? false;
    }

    public function verifyParticipants()
    {
        $this->reactive = $this->participants
            ->map(fn (Participant $p) => $p->estimatePoints->map->value->join(':'))
            ->join('');
    }

    private function getEstimatePointValue(?Feature $feature)
    {
        if (!$feature || !participant()) {
            return null;
        }

        return participant()->estimatePoints()
            ->whereFeatureId($feature->id)
            ->firstOrNew()->value ?? null;
    }

    public function reveal()
    {
        $this->feature->update([
            'revealed_at' => now(),
        ]);
    }
}

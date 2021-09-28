<?php

namespace Tests\Feature\Http\Livewire;

use Tests\TestCase;
use Livewire\Livewire;
use Illuminate\Support\Str;
use App\Http\Livewire\RoomPage;
use Illuminate\Support\Facades\Session;

class FeatureListItem extends TestCase
{
    /** @test */
    public function sees_you_are_the_manager()
    {
        Livewire::test(RoomPage::class)
            ->assertSee('You are the manager');

        $this->assertTrue(Session::get('isManager'));
    }

    /** @test */
    public function create_a_new_feature()
    {
        Livewire::test(RoomPage::class)
            ->set('newFeature', 'Jetete')
            ->call('addNewFeature');

        $this->assertDatabaseCount('features', 1);
        $this->assertDatabaseHas('features', [
            'name' => 'Jetete',
        ]);
    }

    /** @test */
    public function it_requires_a_new_feature()
    {
        Livewire::test(RoomPage::class)
            ->set('newFeature', '')
            ->call('addNewFeature')
            ->assertHasErrors(['newFeature' => 'required']);
    }

    /** @test */
    public function it_has_max_of_128_characters()
    {
        $invalidFeature =  Str::random(129);
        $validFeature =  Str::random(128);
        $errorMessage = trans('validation.max.string', [
            'attribute' => 'new feature',
            'max' => 128,
        ]);
        Livewire::test(RoomPage::class)
            ->set('newFeature', $invalidFeature)
            ->call('addNewFeature')
            ->assertHasErrors(['newFeature' => 'max'])
            ->assertSee($errorMessage)
            ->set('newFeature', $validFeature)
            ->call('addNewFeature')
            ->assertDontSee($errorMessage);

        $this->assertDatabaseCount('features', 1);
    }
}

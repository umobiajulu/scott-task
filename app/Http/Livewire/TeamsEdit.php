<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use Livewire\Component;
use App\Team;

class TeamsEdit extends Component
{
	public $name;
	public $team_id;

	public function mount(Request $request)
	{
		$this->team_id = $request->id;
		$team = Team::where("id", $this->team_id)->first();

		if(!$team)
		{
			$this->emit("error", "Team not found");
			return redirect()->back();
		}

		$this->name = $team->name;
	}

	public function edit()
	{
		$this->validate([
			'name' => 'required'
		]);

		$team = Team::where("id", $this->team_id)->first();

		if(!$team)
		{
			$this->emit("error", "Team not found");
			return;
		}

		$team->update([
			'name' => $this->name
		]);

		$this->emit("success", "Team updated successfully");
		return redirect()->route('teams');
	}

    public function render()
    {
        return view('livewire.teams-edit');
    }
}

<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Team;

class Teams extends Component
{
	public $name;
	public $teams;
	public $filter;

	public function mount()
	{
		$this->teams = Team::all();
	}

	public function updated($filter)
	{
		if($filter == 'filter')
		{
			$this->teams = Team::where("name", "like", "%" . $this->filter . "%")->get();
		}
	}

	public function create()
	{
		$this->validate([
			'name' => 'required'
		]);

		Team::create([
			'name' => $this->name
		]);

		$this->emit("success", "Team added successfully");
		
		$this->teams = Team::all();
		$this->name = NULL;
	}

	public function delete($id)
	{
		$team = Team::where("id", $id)->first();

		if(!$team)
		{
			$this->emit("error", "Team not found");
			return;
		}

		if(count($team->team_users) > 0)
		{
			$this->emit("error", "Team cannot be deleted because a user is assigned to it");
			return;
		}

		$team->delete();
		
		$this->emit("success", "Team deleted successfully");
		$this->teams = Team::all();
	}

    public function render()
    {
        return view('livewire.teams');
    }
}

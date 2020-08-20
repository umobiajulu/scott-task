<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\User;

class Users extends Component
{
	public $firstname;
	public $lastname;
	public $filter;
	public $users;

	public function mount()
	{
		$this->users = User::with('team_users.team')->get();
	}

	public function updated($filter)
	{
		if($filter == 'filter')
		{
			$this->users = User::where("firstname", "like", "%" . $this->filter . "%")->orWhere("lastname", "like", "%" . $this->filter . "%")->get();
		}
	}

	public function create()
	{
		$this->validate([
			'firstname' => 'required',
			'lastname' => 'required'
		]);

		User::create([
			'firstname' => $this->firstname,
			'lastname' => $this->lastname
		]);

		$this->emit("success", "User added successfully");
		
		$this->users = User::with('team_users.team')->get();
		$this->firstname = NULL;
		$this->lastname = NULL;
	}

	public function delete($id)
	{
		$user = User::where("id", $id)->first();

		if(!$user)
		{
			$this->emit("error", "User not found");
			return;
		}

		if(count($user->team_users) > 0)
		{
			$this->emit("error", "User cannot be deleted because their account is assigned a team");
			return;
		}

		$user->delete();

		$this->emit("success", "User deleted successfully");
		$this->users = User::with('team_users.team')->get();
	}

    public function render()
    {
        return view('livewire.users');
    }
}

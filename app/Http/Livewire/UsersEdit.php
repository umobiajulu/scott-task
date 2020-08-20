<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use Livewire\Component;
use App\User;

class UsersEdit extends Component
{
	public $firstname;
	public $lastname;
	public $user_id;

	public function mount(Request $request)
	{
		$this->user_id = $request->id;
		$user = User::where("id", $this->user_id)->first();

		if(!$user)
		{
			$this->emit("error", "User not found");
			return redirect()->back();
		}

		$this->firstname = $user->firstname;
		$this->lastname = $user->lastname;
	}

	public function edit()
	{
		$this->validate([
			'firstname' => 'required',
			'lastname' => 'required'
		]);

		$user = User::where("id", $this->user_id)->first();

		if(!$user)
		{
			$this->emit("error", "User not found");
			return;
		}

		$user->update([
			'firstname' => $this->firstname,
			'lastname' => $this->lastname
		]);

		$this->emit("success", "User updated successfully");
		return redirect()->route('users');
	}

    public function render()
    {
        return view('livewire.users-edit');
    }
}

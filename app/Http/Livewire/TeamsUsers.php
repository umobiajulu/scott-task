<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\TeamUser;
use App\User;
use App\Team;

class TeamsUsers extends Component
{
	public $team_id;
	public $user_id;
	public $users;
	public $teams;
	public $filter;
	public $teams_users;

	public function updated($field)
	{
		$this->users = User::all();
		$this->teams = Team::all();

		if($field == 'filter')
		{
			$this->loadTeamUser($field);
		}
		else{
			$this->loadTeamUser();
		}
	}

	public function mount()
	{
		$this->loadTeamUser();
		$this->users = User::all();
		$this->teams = Team::all();
	}

	public function create()
	{
		$this->validate([
			'user_id' => 'required',
			'team_id' => 'required'
		]);

		$teams_user = TeamUser::where("user_id", $this->user_id)->where("team_id", $this->team_id)->first();

		if($teams_user){
			$this->emit("warning", "User already added to Team");
			$this->loadTeamUser();
			return ;
		}

		TeamUser::create([
			'user_id' => $this->user_id,
			'team_id' => $this->team_id
		]);

		$this->emit("success", "User added to Team");
		$this->loadTeamUser();
		$this->user_id = NULL;
		$this->team_id = NULL;
	}

	public function delete($id)
	{
		$teams_user = TeamUser::where("id", $id)->first();

		if(!$teams_user)
		{
			$this->emit("error", "TeamUser not found");
			return;
		}

		$teams_user->delete();

		$this->emit("success", "TeamUser deleted successfully");
		$this->loadTeamUser();
	}

    public function loadTeamUser($filter = NULL)
    {
		if($filter != NULL)
		{
			$this->teams_users = TeamUser::leftJoin('users', 'users.id', "=", 'team_users.user_id')
									->leftJoin('teams', 'teams.id', "=", 'team_users.team_id')
									->select([
										'team_users.id as id',
										'users.firstname as firstname',
										'users.lastname as lastname',
										'teams.name as team',
									])
									->where("users.firstname", "like", "%" . $this->filter . "%")
									->orWhere("users.lastname", "like", "%" . $this->filter . "%")
									->orWhere("teams.name", "like", "%" . $this->filter . "%")
									->get();
		}
		else{
			$this->teams_users = TeamUser::leftJoin('users', 'users.id', "=", 'team_users.user_id')
									->leftJoin('teams', 'teams.id', "=", 'team_users.team_id')
									->select([
										'team_users.id as id',
										'users.firstname as firstname',
										'users.lastname as lastname',
										'teams.name as team',
									])->get();
		}
    }

    public function render()
    {
        return view('livewire.teams-users');
    }
}

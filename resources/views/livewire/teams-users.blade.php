    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#" style="text-shadow: 2px 1px rgba(255, 255, 255, 0.5); font-weight: bold;">Scott Task</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('users') }}">Users<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('teams') }}">Teams<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('teams-users') }}">Teams Users<span class="sr-only">(current)</span></a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input wire:model="filter" class="form-control mr-sm-2" type="search" placeholder="Search TeamsUsers" aria-label="Search">
                </form>
            </div>
        </nav>

        <div class="container-fluid mt-5">
            
            <h5>Add User To Team</h5>
            <div >
                <form class="form" wire:submit.prevent="create">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <select wire:model="user_id" type="text" name="user_id" class="form-control" placeholder="Enter First Name">
                                    <option value="">Choose user ...</option>
                                    @if($users)
                                        @foreach($users->sortBy("firstname") as $user)
                                            <option value="{{ $user->id }}">{{ $user->firstname . ' ' . $user->lastname }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            	@error('user_id') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select wire:model="team_id" type="text" name="user_id" class="form-control" placeholder="Enter First Name">
                                    <option value="">Choose team ...</option>
                                    @if($teams)
                                        @foreach($teams as $team)
                                            <option value="{{ $team->id }}">{{ $team->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                @error('team_id') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <button type="submit" class="btn btn-secondary btn-sm">Add User</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <br>
            <h5>TeamsUsers Table</h5>
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Team</th>
                        <th scope="col" style="width: 5%;">...</th>
                    </tr>
                </thead>
                <tbody>
                    @if($teams_users)
                        @foreach($teams_users as $teams_user)
                            <tr>
                                <th scope="row">{{ $loop->index + 1 }}</th>
                                <td>{{ $teams_user->firstname }}</td>
                                <td>{{ $teams_user->lastname }}</td>
                                <td>{{ $teams_user->team }}</td>
                                <td>
                                    <a href="Javascript:void(0)" data-toggle="modal" data-target="#deleteModal-{{ $teams_user->id }}"><i class="fa fa-trash text-white"></i></a>
                                </td>
                            </tr>
                            <div class="modal" id="deleteModal-{{ $teams_user->id }}" tabindex="-1" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Are you sure ?</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>This will delete this user from the system</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button wire:click="delete({{ $teams_user->id }})" type="button" class="btn btn-secondary" data-dismiss="modal">Yes Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
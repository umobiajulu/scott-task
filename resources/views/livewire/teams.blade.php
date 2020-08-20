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
                    <input wire:model="filter" class="form-control mr-sm-2" type="search" placeholder="Search Teams" aria-label="Search">
                </form>
            </div>
        </nav>

        <div class="container-fluid mt-5">
            
            <h5>Add New Team</h5>
            <div >
                <form class="form" wire:submit.prevent="create">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input wire:model="name" type="text" name="name" class="form-control" placeholder="Enter Team Name">
                            	@error('name') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <button type="submit" class="btn btn-secondary btn-sm">Create Team</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <br>
            <h5>Teams Table</h5>
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col" style="width: 10%;">...</th>
                    </tr>
                </thead>
                <tbody>
                    @if($teams)
                        @foreach($teams as $team)
                            <tr>
                                <th scope="row">{{ $loop->index + 1 }}</th>
                                <td>{{ $team->name }}</td>
                                <td>
                                    <a href="{{ route('teams-edit', $team->id) }}"><i class="fa fa-edit text-white mr-2"></i></a>
                                    <a href="Javascript:void(0)" data-toggle="modal" data-target="#deleteModal-{{ $team->id }}"><i class="fa fa-trash text-white"></i></a>
                                </td>
                            </tr>
                            <div class="modal" id="deleteModal-{{ $team->id }}" tabindex="-1" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Are you sure ?</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>This will delete this team from the system</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button wire:click="delete({{ $team->id }})" type="button" class="btn btn-secondary" data-dismiss="modal">Yes Delete</button>
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
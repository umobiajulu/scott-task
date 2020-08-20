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
                    <input wire:model="filter" class="form-control mr-sm-2" type="search" placeholder="Search User" aria-label="Search">
                </form>
            </div>
        </nav>

        <div class="container-fluid mt-5">
            
            <h5>Edit User</h5>
            <div >
                <form class="form" wire:submit.prevent="edit">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input wire:model="firstname" type="text" name="firstname" class="form-control" placeholder="Enter First Name">
                            	@error('firstname') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input wire:model="lastname" type="text" name="lastname" class="form-control" placeholder="Enter Last Name">
                            	@error('lastname') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <button type="submit" class="btn btn-secondary btn-sm">Edit User</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
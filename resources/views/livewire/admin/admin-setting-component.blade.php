@section('title')
 Setting Contract Page
@endsection


<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <!-- page header -->
            <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Setting Contact Page</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashbord')}}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Setting</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
            </div>
            <!-- end header -->
            <!-- horizontal Basic Forms Start -->
                <div class="pd-20 card-box mb-30">
                    @if(session()->has('message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{session()->get('message')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                    @endif
                    
                    <form action="" method="POST" wire:submit.prevent="updateSetting">
                        @csrf
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" type="email" placeholder="Email" wire:model='email' />
                            @error('email') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label>Phone1</label>
                            <input class="form-control" type="text" placeholder="Phone" wire:model='phone' />
                            @error('phone') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label>Phone2</label>
                            <input class="form-control" type="text" placeholder="Phone2" wire:model='phone2' />
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input class="form-control" type="text" placeholder="Address" wire:model='address' />
                            @error('address') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label>Map</label>
                            <input class="form-control" type="text" placeholder="Map" wire:model='map' />
                            @error('map') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label>Twiter Link</label>
                            <input class="form-control" type="text" placeholder="Twiter Link" wire:model='twiter' />
                        </div>
                        <div class="form-group">
                            <label>Facebook Link</label>
                            <input class="form-control" type="text" placeholder="Facebook Link" wire:model='facebook' />
                        </div>
                        <div class="form-group">
                            <label>Pinterest Link</label>
                            <input class="form-control" type="text" placeholder="Pinterest Link" wire:model='pinterest' />
                        </div>
                        <div class="form-group">
                            <label>Instagarm Link</label>
                            <input class="form-control" type="text" placeholder="Instagarm Link" wire:model='instagarm' />
                        </div>
                        <div class="form-group">
                            <label>Youtube Link</label>
                            <input class="form-control" type="text" placeholder="Youtube Link" wire:model='youtube' />
                        </div>

                        <div class="form-group">
                            <input class="btn btn-primary btn-bg" type="submit" value="Submit">
                        </div>
                    </form>



                </div>
                <!-- horizontal Basic Forms End -->

        </div>
    </div>
</div>
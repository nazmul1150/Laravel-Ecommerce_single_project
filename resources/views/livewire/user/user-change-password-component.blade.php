@section('title')
Change Password
@endsection
<main id="main" class="main-site left-sidebar">
        <div class="container">

            <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="/" class="link">home</a></li>
                    <li class="item-link"><span>Change Password</span></li>
                </ul>
            </div>
        </div>
        
        <div class="container pb-60">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        @if(session()->has('password_success'))
                         <div class="alert alert-success" role="alert">{{session()->get('password_success')}}</div>
                        @endif
                        @if(session()->has('password_error'))
                         <div class="alert alert-danger" role="alert">{{session()->get('password_error')}}</div>
                        @endif
                        <div class="panel-heading">Change Password</div>
                        <div class="panel-body">

                            <form class="form-horizontal" method="" action="" wire:submit.prevent="changePassword">
                                @csrf
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Current Password</label>
                                    <div class="col-md-4">
                                        <input class="form-control input-md" type="password" name="current_password" placeholder="Current Password" wire:model="current_password" />
                                        @error('current_password') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">New Password</label>
                                    <div class="col-md-4">
                                        <input class="form-control input-md" type="password" name="password" placeholder="New Password" wire:model="password" />
                                        @error('password') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Confirm Password</label>
                                    <div class="col-md-4">
                                        <input class="form-control input-md" type="password" name="password" placeholder="Confirm Password" wire:model="password_confirmation" />
                                        @error('confirm_password') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label"></label>
                                    <div class="col-md-4">
                                        <button class="btn btn-primary" type="submit">Submit</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div><!--end container-->


    </main>


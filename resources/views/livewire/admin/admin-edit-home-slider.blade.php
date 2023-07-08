@section('title')
 Edit Slider
@endsection


<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <!-- page header -->
            <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Update Slider</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashbord')}}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Update Slider</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="col-md-6 col-sm-12 text-right">
                            <a class="btn btn-primary" href="{{route('admin.homeslider')}}">Back</a>
                        </div>
                    </div>
            </div>
            <!-- end header -->
            <!-- horizontal Basic Forms Start -->
                <div class="pd-20 card-box mb-30">
                    
                    <form action="" method="POST" wire:submit.prevent="updateHomeSlider" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Title</label>
                            <input class="form-control" type="text" placeholder="title" wire:model='title' />
                        </div>
                        <div class="form-group">
                            <label>Sub Title</label>
                            <input class="form-control" type="text" placeholder="sub title" wire:model='subtitle' />
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input class="form-control" type="text" placeholder="price" wire:model='price' />
                        </div>
                        <div class="form-group">
                            <label>Link</label>
                            <input class="form-control" type="text" placeholder="link" wire:model='link' />
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input class="form-control" type="file" wire:model='newimage' />
                            @error('image') <span class="error text-danger">{{ $message }}</span> @enderror
                            <br/>
                            @if($newimage)
                             <img src="{{$newimage->temporaryUrl()}}" width="200">
                             @else
                              <img src="{{asset('website/images/sliders')}}/{{$image}}" width="200">
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" wire:model='status'>
                                <option selected>Select</option>
                                <option value="1">active</option>
                                <option value="0">deactive</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary btn-bg" type="submit" value="Update Submit">
                        </div>
                    </form>



                </div>
                <!-- horizontal Basic Forms End -->

        </div>
    </div>
</div>

@section('title')
 Add Sub Category
@endsection


<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <!-- page header -->
            <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Add Sub Category</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashbord')}}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Sub Category</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="col-md-6 col-sm-12 text-right">
                            <a class="btn btn-primary" href="{{route('admin.subcategory')}}">Back</a>
                        </div>
                    </div>
            </div>
            <!-- end header -->
            <!-- horizontal Basic Forms Start -->
                <div class="pd-20 card-box mb-30">
                    
                    <form action="" method="POST" wire:submit.prevent="storeSubCategory">
                        @csrf
                        <div class="form-group">
                            <label>Category Name</label>
                            <!-- <input class="form-control" type="text" placeholder="Category Name" wire:model='name' wire:keyup="generateSlug" /> -->
                            <input class="form-control" type="text" placeholder="Category Name" wire:model='name' />
                            @error('name') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">

                                        <label>Category</label>
                                        <select class="form-control" wire:model='category_id'>
                                            <option selected>select category</option>
                                            @foreach($categorys as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id') <span class="error text-danger">{{ $message }}</span> @enderror
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

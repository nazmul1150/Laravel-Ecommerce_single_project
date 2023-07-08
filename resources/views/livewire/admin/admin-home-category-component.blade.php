@section('title')
 Manage Home Categories
@endsection


<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <!-- page header -->
            <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Manage Home Categories</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashbord')}}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Manage Home Categories</li>
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
                    
                    <form action="" method="POST" wire:submit.prevent="updateHomeCategories">
                        @csrf
                        <div class="form-group" wire:ignore>
                            <label>Choose Categories</label>
                            <!-- <input class="form-control" type="text" placeholder="Category Name" wire:model='name' /> -->
                            <select class="sel_categories form-control" name="categories[]" multiple="multiple" wire:model='selected_categories'>
                                @foreach($categorys as $category)
                                 <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>No of Products</label>
                            <input class="form-control" type="text" placeholder="no of products" wire:model='numberofproducts' />
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

@push('scripts')
 <script type="text/javascript">
     $(document).ready(function(){
        $('.sel_categories').select2();
        $('.sel_categories').on('change', function(e){
            var data = $('.sel_categories').select2("val");
            @this.set('selected_categories',data);
        });
     });
 </script>
@endpush

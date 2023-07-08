@section('title')
 Sale Time
@endsection


<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <!-- page header -->
            <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Sale Time</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashbord')}}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Sale Time</li>
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
                    
                    <form action="" method="POST" wire:submit.prevent="updateSaleDatetime">
                        @csrf
                        <div class="form-group" wire:ignore>
                            <label>Status</label>
                            <!-- <input class="form-control" type="text" placeholder="Category Name" wire:model='name' /> -->
                            <select class="form-control" wire:model='status'>
                                 <option value="0">Deactive</option>
                                 <option value="1">Active</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Sale Time Setup</label>
                            <input type='text' class="form-control" id='sale-date' placeholder="YYYY/MM/DD H:M:S" wire:model='sale_date' />
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

     $(function(){
        $('#sale-date').datetimepicker({
            format: 'Y-MM-DD HH:mm:ss'
        });
        .on('dp.change',function(ev){
           var data = $('#sale-date').val();
           @this.set('sale_date',data);
        });
     });

 </script>
@endpush


<!-- @push('scripts')
 <script type="text/javascript">
     $(document).ready(function(){
        $('#sale-date').datetimepicker({
            format : 'Y-MM-DD h:m:s'
        });
        $('#sale-date').on('dp.change', function(e){
            //var data = $('.sel_categories').select2("val");
            //@this.set('selected_categories',data);
        });
     });
 </script>
@endpush -->
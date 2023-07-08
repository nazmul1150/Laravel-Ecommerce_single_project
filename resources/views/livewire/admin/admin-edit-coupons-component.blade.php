@section('title')
 Update Coupon
@endsection


<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <!-- page header -->
            <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Add Coupon</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashbord')}}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Coupon</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="col-md-6 col-sm-12 text-right">
                            <a class="btn btn-primary" href="{{route('admin.coupon')}}">Back</a>
                        </div>
                    </div>
            </div>
            <!-- end header -->
            <!-- horizontal Basic Forms Start -->
                <div class="pd-20 card-box mb-30">
                    
                    <form action="" method="POST" wire:submit.prevent="updateCoupon">
                        @csrf
                        <div class="form-group">
                            <label>Coupon Code</label>
                            <!-- <input class="form-control" type="text" placeholder="Category Name" wire:model='name' wire:keyup="generateSlug" /> -->
                            <input class="form-control" type="text" placeholder="Coupon Code" wire:model='code' />
                            @error('code') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label>Coupon Type</label>
                            <select class="form-control" wire:model='type'>
                                <option selected>Select</option>
                                <option value="fixed">Fixed</option>
                                <option value="percent">Percent</option>
                            </select>
                            @error('type') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label>Coupon Value</label>
                            <input class="form-control" type="text" placeholder="Coupon Value" wire:model='value' />
                            @error('value') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label>Coupon Cart Value</label>
                            <input class="form-control" type="text" placeholder="Coupon Cart Value" wire:model='cart_value' />
                            @error('cart_value') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label>Expiry Date</label>
                            <input class="form-control" id="expiry_date" type="date" value="2015-08-09" placeholder="Expiry Date" wire:model='expiry_date' />
                            @error('expiry_date') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary btn-bg" type="submit" value="Update">
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
        $('#expiry_date').datetime({
            format: 'Y-MM-DD'
        });
        .on('dp.change',function(ev){
           var data = $('#expiry_date').val();
           @this.set('expiry_date',data);
        });
     });
</script>
@endpush
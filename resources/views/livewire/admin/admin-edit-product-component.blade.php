@section('title')
 Edit Product
@endsection


<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <!-- page header -->
            <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Edit Product</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashbord')}}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="col-md-6 col-sm-12 text-right">
                            <a class="btn btn-primary" href="{{route('admin.product')}}">Back</a>
                        </div>
                    </div>
            </div>
            <!-- end header -->
            <!-- horizontal Basic Forms Start -->
                <div class="pd-20 card-box mb-30">
                    
                    <form action="" method="POST" enctype="multipart/form-data" wire:submit.prevent="updateProduct" >
                        @csrf
                        <div class="form-group">
                            <label>Product Name</label>
                            <input class="form-control" type="text" placeholder="Product Name" wire:model='name' />
                             
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                        <label>Regular price</label>
                                        <input class="form-control" type="text" placeholder="Regular price" wire:model='regular_price' />
                                </div>
                                <div class="col-md-6 col-sm-12">
                                        <label>Sale price</label>
                                        <input class="form-control" type="text" placeholder="Sale price" wire:model='sale_price' />
                                        
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row d-flex align-items-center">
                                <div class="col-md-4 col-sm-12">
                                      <label>Sku</label>
                                      <input class="form-control" type="text" placeholder="Sku" wire:model='sku' />
                                </div>
                                <div class="col-md-4 col-sm-12">
                                        <label>Stock Status</label>
                                        <select class="form-control" wire:model='stock_status'>
                                            <option selected>Select</option>
                                            <option value="instock">instock</option>
                                            <option value="outofstock">out of stock</option>
                                        </select>
                                        
                                </div>
                                <div class="col-md-4 col-sm-12">
                                        <label>Featured Product</label>
                                        <select class="form-control" wire:model='featured'>
                                            <option selected>Select</option>
                                            <option value="0">No</option>
                                            <option value="1">Yes</option>
                                        </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row d-flex align-items-center">
                                <div class="col-md-6 col-sm-12">
                                      <label>Quantity</label>
                                      <input class="form-control" type="text" placeholder="quantity" wire:model='quantity' />
                                      
                                </div>
                                <div class="col-md-6 col-sm-12">
                                        <label>Category</label>
                                        <select class="form-control" wire:model='category_id'>
                                            <option selected>select category</option>
                                            @foreach($categorys as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                       
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label>Sort Description</label>
                            <textarea class="form-control" placeholder="Sort Description" wire:model='sort_description'></textarea>
                            
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" placeholder="Description" wire:model='long_description'></textarea>
                        </div>

                        <div class="form-group">
                            <label>Image</label>
                            <input class="form-control" type="file" wire:model='newimage'>
                            @if($newimage)
                            <img src="{{$newimage->temporaryUrl()}}" width="150">
                            @else
                            <img src="{{asset('website/images/products')}}/{{$image}}" width="150">
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Product Gallery</label>
                            <input class="form-control" type="file" wire:model='newimages' multiple>
                            @if($newimages)
                             @foreach($newimages as $image)
                              @if($image)
                               <img src="{{$image->temporaryUrl()}}" width="120">
                              @endif
                             @endforeach
                            @else
                              @foreach($images as $image)
                                 @if($image)
                                  <img src="{{asset('website/images/products')}}/{{$image}}" width="120">
                                  @endif
                               @endforeach
                            @endif
                        </div>
                        
                        <div class="form-group">
                            <input class="btn btn-primary btn-bg" type="submit" value="Update Product">
                        </div>
                    </form>



                </div>
                <!-- horizontal Basic Forms End -->

        </div>
    </div>
</div>

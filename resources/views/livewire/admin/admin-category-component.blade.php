@section('title')
 Admin Category
@endsection

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <!-- page header -->
            <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Product Category</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashbord')}}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Category</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <!-- end page header -->
                <!-- Striped table start -->
                <div class="pd-20 card-box mb-30">
                    <div class="clearfix mb-20">
                        <div class="pull-left">
                            <h4 class="text-blue h4">All Produt Categorys</h4>
                        </div>
                        <div class="pull-right">
                            <a href="{{route('admin.addcategory')}}" class="btn btn-primary btn-sm">Add Category</a>
                        </div>
                    </div>
                    @if(session()->has('message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{session()->get('message')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                    @endif
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categorys as $category)
                            <tr>
                                <th scope="row">{{$category->id}}</th>
                                <td>{{$category->name}}</td>
                                <td>{{$category->slug}}</td>
                                <td>
                                    <a href="{{route('admin.editcategory', ['category_slug'=>$category->slug])}}" class="btn btn-primary">Edit</a>
                                    <a href="#" onclick="confirm('Are you sure, You want to delete this Category?') || event.stopImmediatePropagation()" class="btn btn-danger" wire:click.prevent="deleteCategory({{$category->id}})">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$categorys->links()}}
                    <div class="collapse collapse-box" id="striped-table">
                        <div class="code-box">
                            <div class="clearfix">
                                <a href="javascript:;" class="btn btn-primary btn-sm code-copy pull-left"  data-clipboard-target="#striped-table-code"><i class="fa fa-clipboard"></i> Copy Code</a>
                                <a href="#striped-table" class="btn btn-primary btn-sm pull-right" rel="content-y"  data-toggle="collapse" role="button"><i class="fa fa-eye-slash"></i> Hide Code</a>
                            </div>
                            <pre><code class="xml copy-pre" id="striped-table-code">
                            <table class="table table-striped">
                              <thead>
                                <tr>
                                  <th scope="col">#</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <th scope="row">1</th>
                                </tr>
                              </tbody>
                            </table>
                            </code></pre>
                        </div>
                    </div>
                </div>
                <!-- Striped table End -->
        </div>
    </div>
</div>
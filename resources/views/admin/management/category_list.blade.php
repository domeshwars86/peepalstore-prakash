@extends('layouts.login_layout')
@section('content')
<style type="text/css">
    img{
  max-width:180px;
    }
    input[type=file]{
    padding:10px;
    background:white;}
</style>

    <!-- BEGIN : Main Content-->
    <div class="main-content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <!-- Zero configuration table -->
            <section id="configuration">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col">
                                        <h4 class="card-title">Category</h4>
                                    </div>
                                    <div class="col text-right">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                            Add Records
                                        </button>


                                        {{--</div>--}}
                                    </div>

                                </div>
                                 @if(Session::has('message'))
                                    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                                @endif
                                @if($errors->any())
                                    <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">
                                    {{ implode('', $errors->all(':message')) }}
                                    </p>
                                @endif
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-6">
                                                        <div class="dataTables_length" id="DataTables_Table_0_length">
                                                            <label>Show <select name="DataTables_Table_0_length"
                                                                                aria-controls="DataTables_Table_0"
                                                                                class="custom-select custom-select-sm form-control form-control-sm">
                                                                    <option value="10">10</option>
                                                                    <option value="25">25</option>
                                                                    <option value="50">50</option>
                                                                    <option value="100">100</option>
                                                                </select> entries</label></div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-6 text-right">
                                                        <div id="DataTables_Table_0_filter" class="dataTables_filter">
                                                            <label>Search:<input type="search"
                                                                                 class="form-control form-control-sm"
                                                                                 placeholder=""
                                                                                 aria-controls="DataTables_Table_0"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <table class="table table-striped table-bordered zero-configuration dataTable"
                                                               id="DataTables_Table_0" role="grid"
                                                               aria-describedby="DataTables_Table_0_info">
                                                            <thead>
                                                            <tr role="row">
                                                                <th>ID</th>
                                                                <th>NAME</th>
                                                                <th>ACTION</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @if(!empty($data))
                                                            @foreach($data as $brand)
                                                                <tr role="row" class="odd">
                                                                    <td class="sorting_1" style="width: 10%;">{{$loop->iteration}}</td>
                                                                    <td id="title-{{$brand->id}}">{{$brand->cat_name}}</td>
                                                                    <td class="text-truncate">
                                                                        {{--<a href="javascript:;" class="info p-0">--}}
                                                                        {{--<i class="ft-user font-medium-3 mr-2"></i>--}}
                                                                        {{--</a>--}}
                                                                        <a href="javascript:;" class="success p-0 edit" data-id="{{$brand->id}}" data-toggle="modal" data-target="#edit" title="Edit">
                                                                            <i class="ft-edit-2 font-medium-3 mr-2"></i>
                                                                        </a>
                                                                        <a href="javascript:;" data-id="{{$brand->id}}" class="danger py-1 delete" data-bs-target="#delete">
                                                                            <i class="ft-x font-medium-3"></i>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                               
                                                            @endforeach
                                                            @endif

                                                            </tbody>
                                                            <tfoot>
                                                            <tr>
                                                                <th rowspan="1" colspan="1">ID</th>
                                                                <th rowspan="1" colspan="1">NAME</th>
                                                                <th rowspan="1" colspan="1">ACTION</th>

                                                            </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </section>
            <!--/ Zero configuration table -->

        </div>
    </div>

    <!-- Add Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #F0F8FF">
                    <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="background-color: #F0F8FF">
                    <form action="{{ route('master.category') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Category name*</label>
                            <input type="text" id="brand_name" class="form-control" name="brand_name"  placeholder="Enter Category Name" style="background-color: white;" required>
                        </div>
                        {{-- <div class="form-group text-center">
                            <img class="my-2" id="blah" src="{{ asset('images/demo_product.png') }}"  alt="your image" />
                            <input type='file' name="image" onchange="readURL(this);" class="form-control" required />
                        </div> --}}

                        <div class="text-center">
                            <input type="submit" class="btn btn-primary" value="Submit" name="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- end add modal  --}}
    {{-- Edit Modal --}}
    <div class="modal fade" id="edit" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #F0F8FF">
                        <h5 class="modal-title" >Update</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="background-color: #F0F8FF">
                        <form action="" method="POST" id="updateUrl" onsubmit="return checkEditForm(this);">
                            @csrf                            <div class="form-group">
                                <label>category name</label>
                                <input type="text" class="form-control" id="edit-title" name="cat_name" style="background-color: white;">
                            </div>
                            {{-- <div class="form-group">
                                <label>Price</label>
                                <input type="text" class="form-control" id="price" name="price" value="{{$users->price}}">
                            </div> --}}
                            <div class="text-center">
                                <input type="submit" class="btn btn-info btn-lg" value="Update" name="Update">
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    {{--end edit modal--}}
    <!-- END : End Main Content-->
    <script type="text/javascript">
         function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#blah')
                            .attr('src', e.target.result);
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }
        $(document).ready(function() {

            $('.edit').on('click', function() {
                let id = $(this).attr("data-id");
                let title = $('#title-' + id).text();
                // let description = $('#description-' + id).text();
                let url = "{{url('/update-category')}}/" + id;
                $('#edit-title').val(title);
                // $('#edit-description').val(description);
                $('#updateUrl').attr('action', url);
            });

            $('.delete').on('click', function() {
                if (confirm('Are you sure you want to Delete Category ?')) {
                    var id = $(this).attr('data-id');
                    $.ajax({
                        method: "POST",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "id": id
                        },
                        url: "{{url('/category_delete_modal')}}",
                    }).done(function(msg) {
                        if (msg.type == 'success') {
                            alert(msg.message);
                            location.reload();
                        } else {
                            alert(msg.message);
                            //$('.error-favourite-message').html(msg.message);
                        }
                    });
                } else {
                    return false;
                }
            });
            @if(Session::has('message'))
            setTimeout(function() {
                $('.alert').fadeOut('fast')
            }, 5000); // <-- time in milliseconds
            @endif

            @if($errors -> any())
            setTimeout(function() {
                $('.alert').fadeOut('fast')
            }, 5000); // <-- time in milliseconds
            @endif
        });
    </script>
@stop
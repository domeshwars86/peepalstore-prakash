@extends('layouts.login_layout')
@section('content')

<style type="text/css">
img {
    max-width: 180px;
}

input[type=file] {
    padding: 10px;
    background: white;
}
</style>
<!-- Include stylesheet -->
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

<!-- Include the Quill library -->
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script src="{{asset('js/custom/admin/product_list.js?var=')}}{{date('YmdHis')}}"></script>

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
                                    <h4 class="card-title">Product</h4>
                                </div>
                                <div class="col text-right">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#exampleModal">
                                        Add Records
                                    </button>
                                </div>

                            </div>
                            @if(Session::has('message'))
                            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">
                                {{ Session::get('message') }}</p>
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
                                                    <!-- <div class="dataTables_length" id="DataTables_Table_0_length">
                                                        <label>Show <select name="DataTables_Table_0_length"
                                                                aria-controls="DataTables_Table_0"
                                                                class="custom-select custom-select-sm form-control form-control-sm">
                                                                <option value="10">10</option>
                                                                <option value="25">25</option>
                                                                <option value="50">50</option>
                                                                <option value="100">100</option>
                                                            </select> entries</label>
                                                    </div> -->
                                                </div>
                                                <div class="col-sm-12 col-md-6 text-right">
                                                    <div class="dataTables_filter">
                                                        <label>Search:<input type="text" id="search_text"
                                                                class="form-control form-control-sm" placeholder=""
                                                                id="myInput"></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <table
                                                        class="table table-striped table-bordered zero-configuration dataTable"
                                                        id="DataTables_Table_0" role="grid"
                                                        aria-describedby="DataTables_Table_0_info">
                                                        <thead>
                                                            <tr role="row">
                                                                <th>ID</th>
                                                                <th>ACTION</th>
                                                                <th>NAME</th>
                                                                <th style="min-width: 200px;">PEEPAL STORE PRICE (PER
                                                                    PIECE)</th>
                                                                <th style="min-width: 200px;">MRP PRICE (PER PIECE)</th>
                                                                <th style="min-width: 200px;">QUANTITY</th>
                                                                <th>CATEGORY</th>
                                                                <th>BRAND</th>
                                                                <th>DETAIL</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="product_list"></tbody>
                                                    </table>
                                                    <div class="row">
                                                        <div class="container">
                                                            <div class="user_pagination d-flex justify-content-center">
                                                                <ul class="nav">
                                                                    <li class="nav-item js_pagination_append"
                                                                        style="padding: 10px;"></li>
                                                                    <li class="nav-item">
                                                                        <div class="dataTables_length"
                                                                            id="DataTables_Table_0_length">
                                                                            <label> <select id="user_per_page"
                                                                                    name="DataTables_Table_0_length"
                                                                                    aria-controls="DataTables_Table_0"
                                                                                    class="custom-select custom-select-sm form-control form-control-sm" style="display: none;">
                                                                                    <option value="10">10</option>
                                                                                    <option value="25">25</option>
                                                                                    <option value="50">50</option>
                                                                                    <option value="100">100</option>
                                                                                </select> </label>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div><br /><br />
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
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #F0F8FF">
                <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="background-color: #F0F8FF">
                <form action="{{ route('master.product') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Product name*</label>
                        <input type="text" id="brand_name" class="form-control" name="brand_name"
                            placeholder="Enter Product Name" style="background-color: white;" required>
                        <div class="error" id="brand_name_err" style="display: none;font-size: 14px;color:red;"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Category*</label>
                                <select name="category" id="category" class="form-control select2 select2-hidden-accessible"
                                    style="width: 100%;" tabindex="-1" aria-hidden="true" required>
                                    <option value="">----Select Option----</option>
                                    @if(!empty($cat))
                                    @foreach($cat as $val)
                                    <option value="{{$val->id}}">{{$val->cat_name}}</option>
                                    @endforeach
                                    @endif
                                </select>
                                <div class="error" id="category_id_err" style="display: none;font-size: 14px;color:red;"></div>
                            </div> <!-- /.form-group -->
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Brand</label>
                                <select name="brand" class="form-control select2 select2-hidden-accessible"
                                    style="width: 100%;" tabindex="-1" aria-hidden="true" id="brand">
                                    <option value="">----Select Option----</option>
                                    @if(!empty($b_data))
                                    @foreach($b_data as $value)
                                    <option value="{{$value->id}}">{{$value->brand_name}}</option>
                                    @endforeach
                                    @endif
                                </select>
                                <div class="error" id="brand_err" style="display: none;font-size: 14px;color:red;"></div>
                            </div> <!-- /.form-group -->
                        </div> <!-- /.col -->
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label>MRP Price (Per Piece)*</label>
                                <input ext="price" class="form-control" id="mrp_price" name="mrp_price" placeholder="Enter MRP Price"
                                    style="background-color: white;" required>
                                <div class="error" id="mrp_price_err" style="display: none;font-size: 14px;color:red;"></div>
                            </div>
                            <div class="col-md-6">
                                <label>Peepal Store Price (Per Piece)*</label>
                                <input ext="price" id="price" class="form-control" name="price"
                                    placeholder="Enter Peepal Store Price" style="background-color: white;" required>
                                <div class="error" id="price_err" style="display: none;font-size: 14px;color:red;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Quantity*</label>
                        <input type="text" id="quantity" class="form-control" name="quantity"
                            placeholder="Enter Product Quantity" style="background-color: white;" required>
                        <div class="error" id="quantity_err" style="display: none;font-size: 14px;color:red;"></div>
                    </div>
                    <div class="form-group">
                        <label>Detail</label>
                        <div class="form-group">
                            <div style="width: 100%;min-height: 300px;background-color: white;" id="editor-container">
                                {{old('detail')}}
                            </div>
                            <textarea name="detail" style="display:none;" id="hiddenArea"></textarea>
                        </div>
                    </div>
                    <div class="text-center">
                        <input type="submit" id="submit" class="btn btn-primary" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- end add modal  --}}
{{-- Edit Modal --}}
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #F0F8FF">
                <h5 class="modal-title">Update</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="background-color: #F0F8FF">
                <form action="" method="POST" id="updateUrl" onsubmit="return checkEditForm(this);">
                    @csrf
                    <div class="form-group">
                        <label>category name</label>
                        <input type="text" class="form-control" id="edit-title" name="cat_name" value=""
                            style="background-color: white;">
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
<input type="hidden" id="edit_product">
<script type="text/javascript">
// function readURL(input) {
//     if (input.files && input.files[0]) {
//         var reader = new FileReader();

//         reader.onload = function(e) {
//             $('#blah')
//                 .attr('src', e.target.result);
//         };

//         reader.readAsDataURL(input.files[0]);
//     }
// }
// $(document).ready(function() {
//     //ajax search
//     $("#myInput").keyup(function(){
//         $value=$(this).val(); 
//             $.ajax({
//                 type : 'get',
//                 url : '{{URL::to('/product_list_search')}}',
//                 data:{'search':$value},
//                 success: function(data){
//                     var trHTML = '';
//                       $.each(data, function (key,value) {
//                          trHTML += 
//                             '<tr><td>' + ++key + 
//                             '</td><td id="title-'+ value.id +'">' + value.product_name +
//                             '</td><td>' +  '<form action="" method="POST">'
//                                             +'@csrf'
//                                             +'<div class="row">'
//                                                 +'<div class="col-sm-9">'
//                                                     +'<input class="form-control" style="background-color: white" type="number" name="price" value="'+value.price+'">'
//                                                 +'</div>'
//                                                 +'<div class="col-xs-3">'
//                                                     +'<a type="submit" data-id="'+value.id+'" class="btn btn-sm submit primary py-1 delete" data-toggle="tooltip" data-placement="bottom" title="update">'
//                                                        +' <i class="ft-save"></i>'
//                                                     +'</a>'
//                                                 +'</div>'
//                                             +'</div>'
//                                         +'</form>' + 
//                             '</td><td>' + '<form action="" method="POST">'
//                                            +' @csrf'
//                                             +'<div class="row">'
//                                                +' <div class="col-sm-9">'
//                                                     +'<input class="form-control" style="background-color: white" type="number" name="mrp_price" value="'+value.mrp_price+'">'
//                                                 +'</div>'
//                                                 +'<div class="col-xs-3">'
//                                                     +'<a type="submit" data-id="'+key+'" class="btn btn-sm submit primary py-1" data-toggle="tooltip" data-placement="bottom" title="update">'
//                                                         +'<i class="ft-save"></i>'
//                                                     +'</a>'
//                                                 +'</div>'
//                                             +'</div>'
//                                         +'</form>'+
//                             '</td><td>' + '<form action="" method="POST">'
//                                                     +'@csrf'
//                                                     +'<div class="row">'
//                                                        +' <div class="col-sm-9">'
//                                                            +' <input class="form-control" style="background-color: white" type="number" name="quantity" value="'+value.quantity+'">'
//                                                         +'</div>'
//                                                         +'<div class="col-xs-3">'
//                                                             +'<a type="submit" data-id="'+value.id+'" class=" btn btn-sm submit primary py-1" data-toggle="tooltip" data-placement="bottom" title="update">'
//                                                                +' <i class="ft-save"></i>'
//                                                             +'</a>'
//                                                         +'</div>'
//                                                     +'</div>'
//                                                 +'</form> '+
//                             '</td><td>' + value.rln_pro_cat.category.cat_name + 
//                             '</td><td>' + (value.rln_pro_cat.brand ? value.rln_pro_cat.brand.brand_name : '') +
//                             '</td><td>' + (value.detail ? value.detail : '') +
//                             '</td><td class="text-truncate">' 
//                                         +'<a href="javascript:;" class="success p-0 edit" data-id="'+ value.id +'" data-toggle="modal" data-target="#edit" title="edit">'
//                                        + '<i class="ft-edit-2 font-medium-3 mr-2"></i>'
//                                        +' </a>'
//                                         +'<a href="javascript:;" data-id="'+ value.id +'" class="danger py-1 delete" data-bs-target="#delete">'
//                                             +'<i class="ft-x font-medium-3"></i>'
//                                        +' </a>' +
//                             '</td></tr>';     
//                       });

//                     $('#search_data').html(trHTML);
//                 }
//             });

//     });
//     //edit data
//     $('.edit').on('click', function() {
//         let id = $(this).attr("data-id");
//         let title = $('#title-' + id).text();
//         // let description = $('#description-' + id).text();
//         let url = "{{url('/update-category')}}/" + id;
//         $('#edit-title').val(title);
//         // $('#edit-description').val(description);
//         $('#updateUrl').attr('action', url);
//     });
//     //delete data
//     $('.delete').on('click', function() {
//         if (confirm('Are you sure you want to Delete Product ?')) {
//             var id = $(this).attr('data-id');
//             $.ajax({
//                 method: "POST",
//                 data: {
//                     "_token": "{{ csrf_token() }}",
//                     "id": id
//                 },
//                 url: "{{url('/product_delete_modal')}}",
//             }).done(function(msg) {
//                 if (msg.type == 'success') {
//                     alert(msg.message);
//                     location.reload();
//                 } else {
//                     alert(msg.message);
//                     //$('.error-favourite-message').html(msg.message);
//                 }
//             });
//         } else {
//             return false;
//         }

//     });
//     //update data
//      $('.update_data').on('click', function() {
//         if (confirm('Are you sure you want to Delete Product ?')) {
//             var id = $(this).attr('data-id');
//             $.ajax({
//                 method: "POST",
//                 data: {
//                     "_token": "{{ csrf_token() }}",
//                     "id": id
//                 },
//                 url: "{{url('/product_delete_modal')}}",
//             }).done(function(msg) {
//                 if (msg.type == 'success') {
//                     alert(msg.message);
//                     location.reload();
//                 } else {
//                     alert(msg.message);
//                     //$('.error-favourite-message').html(msg.message);
//                 }
//             });
//         } else {
//             return false;
//         }
//     });
//     @if(Session::has('message'))
//     setTimeout(function() {
//         $('.alert').fadeOut('fast')
//     }, 5000); // <-- time in milliseconds
//     @endif

//     @if($errors -> any())
//     setTimeout(function() {
//         $('.alert').fadeOut('fast')
//     }, 5000); // <-- time in milliseconds
//     @endif

//     //serach option begin

// });

// var quill = new Quill('#editor-container', {
//     placeholder: 'Start Writing Here.....',
//     theme: 'snow' // or 'bubble'
// });

// $("#submit").on("click", function() {
//     $("#hiddenArea").val($("#editor-container").find(".ql-editor").html());
//     $('#identifier').submit();
// });
</script>
@stop
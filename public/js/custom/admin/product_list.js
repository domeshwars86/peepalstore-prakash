$(document).ready(function() {
    let baseUrl = $('#base_url').val();
    let search_text = $('#search_text').val();
    let perPage = $('#user_per_page').val();
    let page_no = 0;

    var quill = new Quill('#editor-container', {
        placeholder: 'Start Writing Here.....',
        theme: 'snow' // or 'bubble'
    });
    
    $("#submit").on("click", function() {
        $("#hiddenArea").val($("#editor-container").find(".ql-editor").html());
        $('#identifier').submit();
    });

    get_product_list(search_text, page_no, perPage);
    function get_product_list(search_text, page_no, perPage) {
        $.ajax({
            url: baseUrl+'/admin/get-product-list',
            type: 'POST',
            data: {
                '_token': '{{csrf_token()}}',
                'search_text': search_text,
                'page': page_no,
                'perPage': perPage
            },
            dataType: 'json',
            beforeSend: function(){},
            success: function(res){
                if(res.status == 200){
                    let x = '';
                    $.each(res.product_records.data, function(plKey, plVal){
                        let $brand_id = '-----';
                        if(plVal.rln_pro_cat.brand_id != null){
                            $brand_id = plVal.rln_pro_cat.brand.brand_name;
                        }
                        x+= '<tr>'+
                            '<td>'+parseInt(plKey+1)+'</td>'+
                            '<td class="text-truncate"><button type="button" class="btn btn-sm btn-primary edit_product_detail" data-product_id='+plVal.id+'><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button> ' +
                            ' <button type="button" class="btn btn-sm btn-danger delete_product" data-product_id='+plVal.id+'><i class="fa fa-trash" aria-hidden="true"></i></button></td>'+
                            '<td>'+plVal.product_name+'</td>'+
                            '<td> <input type="text" class="form-control" id="tbl_mrp_price" name="tbl_mrp_price" value='+plVal.product_details.price+'><button type="button" class="btn btn-sm btn-primary" style="margin-top:5px;">update</button></td>'+
                            '<td> <input type="text" class="form-control" id="tbl_mrp_price" name="tbl_mrp_price" value='+plVal.product_details.mrp_price+'><button type="button" class="btn btn-sm btn-primary" style="margin-top:5px;">update</button></td>'+
                            '<td> <input type="text" class="form-control" id="tbl_mrp_price" name="tbl_mrp_price" value='+plVal.product_details.quantity+'><button type="button" class="btn btn-sm btn-primary" style="margin-top:5px;">update</button></td>'+
                            '<td>'+plVal.rln_pro_cat.category.cat_name+'</td>'+
                            '<td>'+$brand_id+'</td>'+
                            '<td>'+plVal.detail+'</td>'+
                        '</tr>';
                    });
                    $('#product_list').html(x);
                    if(res.pagination != ''){
                        $('#user_per_page').css('display','block');
                    }else {
                        $('#user_per_page').css('display','none');
                    }
                }else {
                    $('#product_list').html('<tr><td colspan="9" style="text-align:center;">'+res.msg+'</td></tr>');
                }
            }
        });
    }

    $(document).on('keyup','#search_text', function() {
        let search_text = $(this).val();
        get_product_list(search_text, page_no, perPage);
    });

    $(document).on('click','.edit_product_detail', function() {
        let id = $(this).data('product_id');
        if(id == ''){
            alert('Your had found some errors on your system, please refresh it once');
            location.reload();
        }else {
            $.ajax({
                url: baseUrl+'/admin/edit-product-record',
                type: 'POST',
                data: {
                    '_token': '{{csrf_token()}}',
                    'id': id
                },
                dataType: 'json',
                beforeSend: function(){},
                success: function(res){
                    if(res.status == 200){
                        quill = '';
                        $('#edit_product').val(res.data.id);
                        $('#exampleModalLabel').html('Edit product');
                        $('#submit').hide();
                        $('#brand_name').val(res.data.product_name);
                        $('#category').val(res.data.rln_pro_cat.rln_category);
                        // $('#country_id').select2().trigger('change');
                        $('#category').select2().trigger('change');
                        $('#brand').val(res.data.rln_pro_cat.brand_id);
                        $('#brand').select2().trigger('change');
                        $('input[name="mrp_price"]').val(res.data.product_details.mrp_price);
                        $('input[name="price"]').val(res.data.product_details.price);
                        $('input[name="quantity"]').val(res.data.product_details.quantity);

                        $('#editor-container').html(res.data.detail);

                        $('.text-center').html('<button type="button" class="btn btn-info" id="update_product_detail">Update</button>');
                        $('#exampleModal').modal({backdrop:'static',keyboard:false});
                    }else {
                        quill = '';
                    }
                },
                complete: function() {
                    var quill = new Quill('#editor-container', {
                    });
                }
            });
        }
    });

    $(document).on('click','#update_product_detail', function() {
        let $product_name = $('#brand_name').val();
        let $category_id = $('#category').val();
        let $brand = $('#brand').val();
        let $price = $('#price').val();
        let $mrp_price = $('#mrp_price').val();
        let $quantity = $('#quantity').val();
        let $detail = $('.ql-editor').html();
        
        let formValid = true;
        if($product_name == ''){
            $('#brand_name_err').html('Enter product name').css('display','block');
            $('#brand_name').focus();
            formValid = false;
        }else {
            $('#brand_name_err').html('').css('display','block');
        }
        if($category_id == ''){
            $('#category_id_err').html('Select category').css('display','block');
            formValid = false;
        }else {
            $('#category_id_err').html('').css('display','block');
        }
        if($price == ''){
            $('#price_err').html('Select category').css('display','block');
            $('#price').focus();
            formValid = false;
        }else {
            $('#price_err').html('').css('display','block');
        }
        if($mrp_price == ''){
            $('#mrp_price_err').html('Enter MRP').css('display','block');
            $('mrp_price').focus();
            formValid = false;
        }else {
            $('#mrp_price_err').html('').css('display','block');
        }
        if($quantity == ''){
            $('#quantity_err').html('Enter MRP').css('display','block');
            $('quantity').focus();
            formValid = false;
        }else {
            $('#quantity_err').html('').css('display','block');
        }
        if(formValid){
            $.ajax({
                url: baseUrl+'/admin/update-product-record',
                type: 'POST',
                data: {
                    '_token': '{{csrf_token()}}',
                    'edit_id': $('#edit_product').val(),
                    'product_name': $product_name,
                    'category_id': $category_id,
                    'brand': $brand,
                    'price': $price,
                    'mrp_price': $mrp_price,
                    'quantity': $quantity,
                    'details': $detail
                },
                dataType: 'json',
                beforeSend: function(){},
                success: function(res){
                    if(res.status == 200){
                        alert(res.msg);
                        $('#exampleModalLabel').html('Add product');
                        $('#update_product_detail').remove();
                        $('.text-center').html('<input type="submit" id="submit" class="btn btn-primary" value="Submit">');
                        $('#exampleModal').modal('hide');
                        get_product_list(search_text, page_no, perPage);
                    }else {
                        alert(res.msg);
                    }
                }
                
            });
        }
    });

    $(document).on('click','.delete_product', function() {
        let id = $(this).data('product_id');
        if(confirm("Are you sure you want to Delete Product ?")){
            if(id == ''){
                alert('Your had found some errors on your system, please refresh it once');
                location.reload();
            }else {

            }
        }
    });


    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
    
            reader.onload = function(e) {
                $('#blah')
                    .attr('src', e.target.result);
            };
    
            reader.readAsDataURL(input.files[0]);
        }
    }

});
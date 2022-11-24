@extends('backend.admin.master')
@section('content')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">Product</h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Product</li>
      </ol>
    </div>
  </div>
  <style>
    .w-5{
      width: 100px;
    }
  </style>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4>Product list 
                  
                  <a href="{{ route('stock_download') }}" target="_blank" style="float: right;"  class="btn btn-primary">
                    <i class="fas fa-download"></i> Download
                  </a>
                  
                </h4>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12 m-auto text-center">
                    <strong>Supplier</strong>
                    <input type="radio" name="supplier" id="supplier" value="supplier" class="supplier"> &nbsp;&nbsp;
                    <strong>Product</strong>
                    <input type="radio" name="product" id="product" value="product" class="product">&nbsp;&nbsp;
                  </div>

                  <div class="col-md-6">
                    <div class="show_supplier" style="display: none">
                        <form action="{{ route('supplier_wise_report_pdf') }}" target="_blank" method="get" id="supplierForm">
                            <div class="row">
                                <div class="col">
                                    <label for="supplier">Supplier name</label>
                                    <select name="supplier" id="supplier" class="form-control form-control-sm select2">
                                        <option value="">Select supplier</option>
                                        @foreach ($suppliers as $supplier)
                                        <option value="{{ $supplier->id  }}">{{ $supplier->name  }}</option> 
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <input class="btn btn-success btn-sm mt-2" type="submit" value="Search" name="submit">
                            </div>
                        </form>
                      </div>
                  </div>
                  <div class="col-md-12">
                    <div class="show_product" style="display: none">
                        <form action="{{ route('product_wise_report_pdf') }}" target="_blank" method="get" id="supplierForm">
                            <div class="row">
                              <div class="col-md-5">
                                <div class="mb-3">
                                  <label for="exampleFormControlInput1" class="form-label">Supplier Name</label>
                                  <select name="category_id" id="category_id" class="form-control form-control-sm select2 ">
                                    <option value="">Select category</option>
                                  @foreach ($categories as $category)
                                    <option value="{{ $category->id  }}" {{ (@$editProduct->category_id == $category->id)?'selected':'' }}>{{ $category->name }}</option>
                                  @endforeach
                                </select>
                                  <font style="color: red">{{ ($errors->has('category_id'))?($errors->first('category_id')):" " }}</font>
                               </div>
                              </div>
                              <div class="col-md-7">
                                <div class="mb-3">
                                  <label for="exampleFormControlInput1" class="form-label">Product Name</label>
                                  <select name="product_id" id="product_id" class="form-control form-control-sm select2">
                                   
                                  </select>
                                  <font style="color: red">{{ ($errors->has('product_id'))?($errors->first('product_id')):" " }}</font>
                               </div>
                              </div>
                            </div>
                            <div class="col-md-2">
                                <input class="btn btn-success btn-sm mt-2" type="submit" value="Search" name="submit">
                            </div>
                        </form>
                      </div>
                  </div>
                </div>
              </div>
            </div>          
        </div>
    </div>
</div>

<script>
    $(document).on('change',".supplier",function(){
        var supplier = $(this).val();
        if(supplier == 'supplier'){
            $('.show_supplier').show();
        }else{
            $('.show_supplier').hide();
        }
    });

    $(document).on('change',".product",function(){
        var product = $(this).val();
        if(product == 'product'){
            $('.show_product').show();
        }else{
            $('.show_product').hide();
        }
    });


</script>

<script>
  $(function(){
    $(document).on('change','#category_id',function(){
      var category_id = $(this).val();
      $.ajax({
        url:"{{ route('get_product') }}",
        type:'GET',
        data:{category_id:category_id},
        success:function(data){
          var html = '<option value="">Select product</option>';
          $.each(data,function(key,v){
            html += '<option value="'+v.id+'">'+v.name+'</option>';
          });
          $('#product_id').html(html);

        }
      });
    });
  });
</script>

@endsection
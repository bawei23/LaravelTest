@extends('layouts.master')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Product') }}</h1>

    <!-- Main Content goes here -->

    <div class="card shadow mb-4">
    </br>
    <form class="form-horizontal"  id="form1" method="GET" action="<?php $_PHP_SELF ?>">
    <div class="col-12 text-right">
              <a href="{{ route('create_product') }}" class="btn btn-sm btn-primary btn-round btn-icon">
                <span class="btn-inner--icon"><i class="fas fa-plus"></i></span>
                <span class="btn-inner--text">Create Product</span>
              </a>
            </div>
   
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered searchProduct" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Price (RM)</th>
                        <th>Detail</th>
                        <th>Publish</th>
                        <th>Action</th>
                        </tr>
                        </thead>
                            
                       <tbody>
                                       
                        </tbody>
                    </table>
                    </div>
                </div>
            </form>
        </div>

    <!-- End of Main Content -->


    <!-- Delete Modal-->
    <div class="modal fade" id="delete-modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('Delete Product') }}</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Are you sure?
            <form id="delete-form" action="{{ route('product.delete') }}" method="POST" >
                    @csrf
                    <input type="hidden" name="product_id" id="product_id" class="form-control"> 
                   
                
            </div>
            <div class="modal-footer">
                <button class="btn btn-link" type="button" data-dismiss="modal">{{ __('Cancel') }}</button>
                <button type="submit" class="btn btn-primary">Save</button>
                
            </div>
            </form>
        </div>
    </div>
</div>
@endsection


@push('js')
<script>
   
$(document).ready( function () {
   
    $('#start_date').on('change', function () {
		  $('#form1').submit(); 

	});
    $('#end_date').on('change', function () {
		  $('#form1').submit(); 

	});

    var tbl = $('#dataTable').DataTable({
		"scrollX": true,
		"responsive": true,
		"lengthChange": true,
		"autoWidth": true,
		"ajax": {
            "headers": {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
			"url": "{{route('dataproduct')}}",
			"type": "POST",
			"data": function(d){
                d.name = $('.searchProduct').val(),
                d.search = $('input[type="search"]').val();
			}
		},
		"columnDefs": [ {"targets": 1,"className" : 'text-left', "width" :"300px"},{"targets": '_all',"className" : 'text-center'},
            {
            "targets": 5,
            "data": null,
			 "render": function ( data, type, row, meta ) {
				 if (data[0]=='' || data[0]== null){
					return '';
				 }else{		
					return '<a class="btn-sm btn-primary btn-round btn-icon" href="/detail_product/'+data[0]+'"><i class="fa fa-eye"></i></a>'+' '+
                    '<a class="btn-sm btn-success btn-round btn-icon" href="/edit_product/'+data[0]+'"><i class="fa fa-pen"></i></a>'+' '+
                    '<a class="btn-sm btn-danger btn-round btn-icon" id="delete-click" data-product-id="'+data[0]+'" data-toggle="modal" data-target="#delete-modal"><i class="fa fa-trash"></i></a>';
                 }
				}
		
            },

		],createdRow: function(row){
			   $(row).find(".truncate").each(function(){
			   $(this).attr("title", this.innerText);
		       });
		   }
		,
		dom: 'Bfrtip',
//		stateSave: true,
        lengthMenu: [
            [ 10,15, 25, 50, -1 ],
            [ '10 rows','15 rows', '25 rows', '50 rows', 'Show all' ]
        ],
		buttons: [
        'pageLength'
		],

		}

		
	);

    $(".searchProduct").keyup(function(){
        table.draw();
    });
 
    $(document).on('click', "#delete-click", function() {
            $(this).addClass('clicked');
            var id = $(this).data('product-id');
            
            $(".modal-body #product_id").val( id );
  
            var options = {
              'backdrop': 'static'
            };
            $('#delete-modal').modal(options)
          })

 
          // on modal hide
          $('#delete-modal').on('hide.bs.modal', function() {
            $('.clicked').removeClass('clicked')
            $("#delete-form").trigger("reset");
          })

});
</script>
@endpush
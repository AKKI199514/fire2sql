@extends('admin.layouts.master')

@section('container')

<!-- page content -->
<div class="right_col" role="main">
	<div class="">
	  <div class="page-title">
	    <div class="title_left">
	      <h3><?php echo $page_title ?></h3>
	    </div>      
	  </div>
	  <div class="clearfix"></div>
	  <div class="row">
	    <div class="col-md-12 col-sm-12 col-xs-12">
	      <div class="x_panel">
	        <!-- <div class="x_title">
	          <h2><?php //echo $page_title ?></h2>
	          <ul class="nav navbar-right panel_toolbox">                  
	          </ul>
	          <div class="clearfix"></div>
	        </div> -->
	        <div class="x_content">
			     <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2></h2>                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">                   				
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
						<thead>
							<tr>
							  <th>ID</th>
							  <th>Name</th>
							  <th>Email</th>
							  <th>Action</th>                          
							</tr>
						</thead>
                      	<tbody>
                      		<?php $i=1; ?>
                      		@foreach($user as $users)
	                        <tr>
	                          <td>{{$i}}</td>
	                          <td>{{$users->name}}</td>
	                          <td>{{$users->email}}</td>
	                          <td><a class="btn btn-primary btn-xs" href="javascript:void(0)" style="border-radius: 50%;">
	                          	<i class="fa fa-edit"></i></a>
                          		<a class="btn btn-primary btn-xs" href="javascript:void(0)" style="border-radius: 50%;">
                          		<i class="fa fa-eye"></i></a>
                          		<a class="btn btn-danger btn-xs" href="javascript:void(0)" style="border-radius: 50%;">
                          		<i class="fa fa-remove"></i></a>
	                          </td>	                          
                        	</tr> 
                        	<?php $i++; ?>
                        	@endforeach
                       	</tbody>
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
<!-- /page content -->


@endsection
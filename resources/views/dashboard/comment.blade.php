@extends('layouts.admin_layout')
@section('content')

<div id="page-wrapper">
	
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Comments</h1>
		</div>
		<div class="col-md-12">
		</div>
	</div>
	<div class="row">
		
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<span class="fa fa-inbox fa-fw"></span> Comments
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					
					<table class="table table-responsive table-hover table-bordered" id="item_tbl" width="100%">
						<thead>
							<tr>
								
								<th width="10%">Name</th>
								<th width="10%">Email</th>
								<th width="10%">Comment</th>
								<th width="10%">Status</th>
								<th width="10%">Actions</th>								
							</tr>
						</thead>
						<tbody>	
							<tr>	
								
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td style="vertical-align: middle; text-align:center">
									<div class="btn-group">
									  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
									    Action <span class="caret"></span>
									  </button>
									  <ul class="dropdown-menu" role="menu">
									    <li><a href=""><i class="fa fa-check fa-fw"></i>Approved</a></li>
									    <li><a href=""><i class="fa fa-trash-o fa-fw"></i>Delete</a></li>
									  </ul>
									</div>
								</td>
							</tr>
													
						</tbody>
					</table>
				</div>
				<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
		</div>
		<!-- /.col-lg-12 -->
	</div>
</div>

@endsection
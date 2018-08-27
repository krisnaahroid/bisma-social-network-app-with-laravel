@extends('master')

@section('title', 'Post Management')

@section('kontent')
  <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xmlns:xlink="#" xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Management</li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Management - Students</h1>
			</div>
		</div><!--/.row-->


    <div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Advanced Table</div>
					<div class="panel-body">
						<div class="bootstrap-table">
              <div class="fixed-table-toolbar">
                <div class="columns btn-group pull-right"><button class="btn btn-default" type="button" name="refresh" title="Refresh"><i class="glyphicon glyphicon-refresh icon-refresh"></i></button><button class="btn btn-default" type="button" name="toggle" title="Toggle"><i class="glyphicon glyphicon glyphicon-list-alt icon-list-alt"></i></button>
                  <div class="keep-open btn-group" title="Columns">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                      <i class="glyphicon glyphicon-th icon-th"></i> <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                      <li><label><input type="checkbox" data-field="id" value="1" checked="checked"> Item ID</label></li>
                      <li><label><input type="checkbox" data-field="name" value="2" checked="checked"> Item Name</label></li>
                      <li><label><input type="checkbox" data-field="price" value="3" checked="checked"> Item Price</label></li>
                    </ul>
                  </div>
                  </div>
                <div class="pull-right search"><input class="form-control" type="text" placeholder="Search">
                </div>
              </div>
            <div class="fixed-table-container">
              <div class="fixed-table-header">
                <table>

              </table>
              </div>
              <div class="fixed-table-body">
                <div class="fixed-table-loading" style="top: 37px; display: none;">Loading, please wait…</div>
                <table data-toggle="table" data-url="tables/data1.json" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc" class="table table-hover">
						    <thead>
						    <tr>
                  <th style=""><div class="th-inner sortable">User ID</div><div class="fht-cell"></div>
                  </th>
                  <th style="">
                    <div class="th-inner sortable">Username<span class="order"><span class="caret" style="margin: 10px 5px;"></span></span>
                    </div><div class="fht-cell"></div>
                  </th>
                  <th style=""><div class="th-inner sortable">Email</div>
                    <div class="fht-cell"></div>
                  </th>
                  <th style=""><div class="th-inner sortable">Password</div>
                    <div class="fht-cell"></div>
                  </th>
                  <th style=""><div class="th-inner sortable">Action</div>
                    <div class="fht-cell"></div>
                  </th>
                </tr>
						    </thead>
						<tbody>
              @foreach ($users as $user)
              <tr class="no-records-found">

                <td colspan="4">{{ $user->id }}</td>
                <td colspan="4">{{ $user->name }}</td>
                <td colspan="4">{{ $user->email }}</td>
                <td colspan="4">{{ $user->password }}</td>
                <td colspan="4">
                  <a class="btn btn-danger" href="{{ route('admin.students.delete', ['id' => $user->id ]) }}" role="button">Delete</a>
                </td>

              </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="clearfix"></div>
					</div>
				</div>
			</div>

		</div>



	</div>
@endsection

@extends('layouts.crud')

@section('content')
<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Manage <b>Employees</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Employee</span></a>

					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
                        <th>#</th>
						<th>Name</th>
						<th>Email</th>
						<th>Address</th>
						<th>Phone</th>
                        <th>date_of_birth</th>
                        <th>education_qualification</th>
                        <th>photo</th>
                        <th>resume</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
                    @php
                        $i=0;
                    @endphp
                    @foreach ($employee as $item)
                    <tr>
                        @php
                            $i++;
                        @endphp
                        <td>{{$i}}</td>
						<td>{{$item->firstname}} {{$item->lastname}}</td>
						<td>{{$item->email}}</td>
						<td>{{$item->address}}</td>
						<td>{{$item->phone}}</td>
                        <td>{{$item->date_of_birth}}</td>
                        <td>{{$item->education_qualification}}</td>
                        <td> <img src="{{$item->photo}}" alt="" height="50px" srcset=""> </td>
                          <td> <a href="{{asset($item->resume)}}"  target="_blank"> <iframe height="50px" src="{{$item->resume}}" width="50px" frameborder="0"></iframe></a> </td>
						<td>
							<a href="{{route('Employee.Update',$item->employee_id)}}" ><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                            <a href="{{route('Employee.View',$item->employee_id)}}" ><i class="material-icons" data-toggle="tooltip" title="show">&#xE853;</i></a>
							<a href="{{route('Employee.Delete',$item->employee_id)}}" ><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
						</td>
					</tr>
                    @endforeach


				</tbody>
			</table>

			<div class="clearfix">
                {{-- {{$employee->links()}} --}}



			</div>
		</div>
	</div>
</div>
<!-- Edit Modal HTML -->
<div id="addEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="POST" action="{{route('Employee.Create')}}"  enctype="multipart/form-data">
                @csrf
				<div class="modal-header">
					<h4 class="modal-title">Add Employee</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body row">
					<div class="form-group col-6">
						<label>First Name</label>
						<input type="text" class="form-control" name="first" id="first" required>
					</div>
                    <div class="form-group col-6">
						<label> Last Name</label>
						<input type="text" class="form-control" name="last" id="last" required>
					</div>
					<div class="form-group col-6">
						<label>Email</label>
						<input type="email" class="form-control" name="email" id="email" required>
					</div>
                    <div class="form-group col-6">
						<label>Phone</label>
						<input type="tel" class="form-control" name="phone" id="phone" pattern="[0-9]{10}" placeholder="1234567890"required>
					</div>
                    <div class="form-group col-6">
						<label>Education qualification</label>
						<input type="text" class="form-control" name="qualification" id="qualification" required>
					</div>
                    <div class="form-group col-6">
						<label> Date Of Birth</label>
						<input type="date" class="form-control" name="dob" id="dob" required>
					</div>
					<div class="form-group col-12">
						<label>Address</label>
						<textarea class="form-control" name="address" id="address" required></textarea>
					</div>
					<div class="form-group col-6">
						<label>Photo</label>
						<input type="file" class="form-control" name="image" id="image"  accept="image/*" required>
					</div>
                    <div class="form-group col-6">
						<label>Resume(pdf)</label>
						<input type="file" class="form-control" name="resume" id="resume" accept="application/pdf" required>
					</div>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-success" value="Add">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Edit Modal HTML -->
<div id="editEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">
					<h4 class="modal-title">Edit Employee</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Name</label>
						<input type="text" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Address</label>
						<textarea class="form-control" required></textarea>
					</div>
					<div class="form-group">
						<label>Phone</label>
						<input type="text" class="form-control" required>
					</div>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-info" value="Save">
				</div>
			</form>
		</div>
	</div>
</div>

@endsection

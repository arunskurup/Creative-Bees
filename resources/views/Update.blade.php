@extends('layouts.crud')

@section('content')
<style>
    .modal-dialog {
    max-width: 1500px;
    margin: 1.75rem auto;
}
</style>
	<div class="modal-dialog col-10">
		<div class="modal-content">
			<form method="POST" action="{{route('Employee.Updated')}}"  enctype="multipart/form-data">
                @csrf
				<div class="modal-header">
					<h4 class="modal-title">Update Employee</h4>
					<a href="{{route('Employee.list')}}"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button></a>
				</div>
				<div class="modal-body row">
                    <input type="hidden" name="id" id="id" value="{{$employee->employee_id}}" >
					<div class="form-group col-6">
						<label>First Name</label>
						<input type="text" class="form-control" name="first" id="first" value="{{$employee->firstname}}" required>
					</div>
                    <div class="form-group col-6">
						<label> Last Name</label>
						<input type="text" class="form-control" name="last" id="last" value="{{$employee->lastname}}" required>
					</div>
					<div class="form-group col-6">
						<label>Email</label>
						<input type="email" class="form-control" name="email" id="email" value="{{$employee->email}}" required>
					</div>
                    <div class="form-group col-6">
						<label>Phone</label>
						<input type="tel" class="form-control" name="phone" id="phone" pattern="[0-9]{10}" value="{{$employee->phone}}" placeholder="1234567890"required>
					</div>
                    <div class="form-group col-6">
						<label>Education qualification</label>
						<input type="text" class="form-control" name="qualification" id="qualification" value="{{$employee->education_qualification}}"required>
					</div>
                    <div class="form-group col-6">
						<label> Date Of Birth</label>
						<input type="date" class="form-control" name="dob" id="dob" required value="{{$employee->date_of_birth}}" >
					</div>
					<div class="form-group col-12">
						<label>Address</label>
						<textarea class="form-control" name="address" id="address" required value="{{$employee->address}}" >{{$employee->address}}</textarea>
					</div>
					<div class="form-group col-6">
						<label>Photo</label>
						<input type="file" class="form-control" name="image" id="image"  accept="image/*" >
					</div>
                    <div class="form-group col-6">
						<label>Resume(pdf)</label>
						<input type="file" class="form-control" name="resume" id="resume" accept="application/pdf" r>
					</div>
				</div>
				<div class="modal-footer">
					<a href="{{route('Employee.list')}}"><input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel"></a>
					<input type="submit" class="btn btn-success" value="Add">
				</div>
			</form>
		</div>
	</div>

@endsection

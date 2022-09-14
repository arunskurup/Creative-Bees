@extends('layouts.crud')

@section('content')
<style>
    .modal-dialog {
    max-width: 1500px;
    margin: 1.75rem auto;
}
label{
    font-size: 18px;
}
</style>
	<div class="modal-dialog col-10">
		<div class="modal-content">

				<div class="modal-header">
					<h4 class="modal-title">Update Employee</h4>
					<a href="{{route('Employee.list')}}"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button></a>
				</div>
				<div class="modal-body row">
                    <input type="hidden" name="id" id="id" value="{{$employee->employee_id}}" >
					<div class="form-group col-6">
					  <img src="{{$employee->photo}}" height="450px" alt="">
					</div>
                    <div class="form-group col-6">
						<a href="{{asset($employee->resume)}}"  target="_blank"> <iframe   src="{{$employee->resume}}" height="450px" width="100%" frameborder="0"></iframe></a> </td>
					</div>
                    <div class="form-group col-6">
						<label>First Name :  {{$employee->firstname}}</label>
					</div>
                    <div class="form-group col-6">
						<label> Last Name : {{$employee->lastname}}</label>

					</div>
					<div class="form-group col-6">
						<label>Email : {{$employee->email}}</label>

					</div>
                    <div class="form-group col-6">
						<label>Phone : {{$employee->phone}}</label>

					</div>
                    <div class="form-group col-6">
						<label>Education qualification :{{$employee->education_qualification}}</label>

					</div>
                    <div class="form-group col-6">
						<label> Date Of Birth : {{$employee->date_of_birth}} </label>

					</div>
					<div class="form-group col-12">
						<label>Address : {{$employee->address}} </label>

					</div>

				</div>
				<div class="modal-footer">
					<a href="{{route('Employee.list')}}"><input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel"></a>

				</div>
			</form>
		</div>
	</div>

@endsection

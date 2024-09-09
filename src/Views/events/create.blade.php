@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="row justify-content-center align-items-center">
			<div class="col-md-10">
				<div class="card">
					<form action="{{ 'http://' . $_SERVER['HTTP_HOST'] . '/events' }}" method="POST">
						<div class="card-header">New Event</div>
						<div class="card-body">
							<div class="form-group">
								<label for="name">Title</label>
								<input type="text" name="title" class="form-control" id="title">
							</div>
							<div class="form-group">
								<label for="description">Description</label>
								<input type="text" name="description" class="form-control" id="description">
							</div>
							<div class="form-group">
								<label for="start_date">Start date</label>
								<input type="date" name="start_date" class="form-control" id="start_date">
							</div>
							<div class="form-group">
								<label for="end_date">End date</label>
								<input type="date" name="end_date" class="form-control" id="end_date">
							</div>
						</div>
						<div class="card-footer">
							<button class="btn btn-primary"><i class="bi bi-save" ></i> Create</button>
						</div>
					</form>
				</div>
			</div>
		</div>
@endsection

@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="row justify-content-center align-items-center">
			<div class="col-md-10">
				<div class="card">
					<div class="card-header">
						<a class="btn btn-light ml-2" href="{{ 'http://' . $_SERVER['HTTP_HOST'] . '/events' }}">
							<i class="bi bi-caret-left"></i>
						</a> {{ $event->getTitle() }}
					</div>
					<div class="card-body">
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" class="form-control" id="name" value="{{ $event->getTitle() }}" readonly>
						</div>
						<div class="form-group">
							<label for="description">Description</label>
							<input type="text" class="form-control" id="description" value="{{ $event->getDescription() }}" readonly>
						</div>
						<div class="form-group">
							<label for="start_date">Start date</label>
							<input type="text" class="form-control" id="start_date" value="{{ strftime('%m-%d-%Y', strtotime($event->getStartDate())) }}" readonly>
						</div>
						<div class="form-group">
							<label for="end_date">End date</label>
							<input type="text" class="form-control" id="end_date" value="{{ strftime('%m-%d-%Y', strtotime($event->getEndDate())) }}" readonly>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-10">
				<div class="card">
					<div class="card-header">Event list</div>
					<div class="card-body">
						<div class="row mb-2">
							<div class="col-auto">
								<a class="btn btn-primary" href="{{ 'http://' . $_SERVER['HTTP_HOST'] . '/events/create' }}">
									<i class="bi bi-plus"></i> Create
								</a>
							</div>
						</div>
						@if (count($events) > 0)
							<div class="row">
								<div class="table-responsive">
									<table class="table table-striped  table-hover table-sm table-bordered">
										<thead>
										<tr>
											<th scope="col">ID</th>
											<th scope="col">Name</th>
											<th scope="col">Description</th>
											<th scope="col">Date</th>
											<th scope="col">Actions</th>
										</tr>
										</thead>
										<tbody>
										@foreach ($events as $event)
											<tr>
												<td>{{ $event->getId() }}</td>
												<td>{{ $event->getTitle() }}</td>
												<td>{{ $event->getDescription() }}</td>
												<td>{{ date('m-d-Y', strtotime($event->getStartDate())) }} - {{ date('m-d-Y', strtotime($event->getEndDate())) }}</td>
												<td>
													<a href="{{ 'http://' . $_SERVER['HTTP_HOST'] . '/events/' . $event->getId() }}" class="btn btn-primary">View details</a>
												</td>
											</tr>
										@endforeach
										</tbody>
									</table>
								</div>
							</div>
						@else
							<p class="text-center">No events found.</p>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

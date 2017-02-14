@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
		        <div class="panel-heading">List of Subscribers</div>
			<table class="table table-bordered">
		  		<thead>
		  			<tr>
		  				<th>First Name</th>
		  				<th>Last Name</th>
		  				<th>Company or  Organization</th>
		  				<th>Email</th>
		  				<th>Phone</th>
		  				<th>Confirmed</th>
		  			</tr>
		  		</thead>
		  		<tbody>
		  			@foreach($subscribers as $subscriber)
		  			<tr>
		  				<td>{{ $subscriber->first_name }}</td>
		  				<td>{{ $subscriber->last_name }}</td>
		  				<td>{{ $subscriber->company_name }}</td>
		  				<td>{{ $subscriber->email }}</td>
		  				<td>{{ $subscriber->phone }}</td>
		  				<td>{{ $subscriber->confirmed==1 ? 'Yes':'No' }}</td>
		  			</tr>

		  			@endforeach
		  		</tbody>
			</table>
		</div>
	</div>
</div>
</div>

@endsection
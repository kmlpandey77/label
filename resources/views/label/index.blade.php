
<div class="card">
	<div class="card-header row no-gutters">
		<h4 class="m-0">Labels</h4>
		<div class="card-tools ml-auto">
    		<a href="{{ route('labels.create') }}" class="btn btn-primary btn-sm rounded-pill pull-right px-3"><i class="fa fa-plus-circle"></i> <span>Add New</span></a>
		</div>
	</div>

	<!-- /.card-header -->
	<div class="card-body p-0">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Page</th>
					<th>Label Id</th>
					<th>Value</th>
					<th>Created At</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach ($labels as $label)
				<tr>
					<td>{{ $label->page }}</td>
					<td>{{ $label->labelid }}</td>
					<td>{{ Str::limit($label->value, 75) }}</td>
					<td>{{ $label->created_at->format('M d, Y') }}</td>
					<td class="text-right">

							<a class="btn btn-primary btn-sm" href="{{ route('labels.edit', $label->id) }}"><i class="fa fa-edit"></i>edit</a>

							<div class="float-right ml-2">
								<form onsubmit="return confirm('Are you sure?')" action="{{ route('labels.destroy', $label->id) }}" method="post">
									{{ method_field('DELETE') }}
									{{ csrf_field() }}
									<button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>delete</button>
								</form>
							</div>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>

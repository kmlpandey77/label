
Edit label

<div class="card">
	<form class="form-horizontal" action="{{ route('labels.update', $label->id) }}" accept-charset="utf-8" method="post" enctype="multipart/form-data">
		{{ method_field('PUT') }}
		{!! csrf_field() !!}
		@include('label::form')
	</form>
</div>

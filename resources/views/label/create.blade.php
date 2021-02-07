
Add Label
<div class="card">
	<form class="form-horizontal" action="{{ route('labels.store') }}" accept-charset="utf-8" method="post" enctype="multipart/form-data">
		{!! csrf_field() !!}
		@include('label::form')
	</form>
</div>


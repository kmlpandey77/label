<div class="card-header sticky-top text-right" style="top:67px; background: #F8F9FA;">
	<button type="submit" class="button button-primary button-rounded button-small" name="save_close" value="save_close">
		<i class="lnr lnr-inbox"></i> <span>Save & Close</span>
	</button>
	<button type="submit" class="button button-secondary button-rounded button-small" name="save" value="save">
		<i class="lnr lnr-inbox"></i> <span>Save</span>

	</button>
	<a href="{{ route('labels.index') }}" class="button button-plain_gray button-rounded button-small"><i class="lnr lnr-exit"></i> <span>Cancel</span></a>
</div>

<div class="card-body">
	@if (!isset($label))
	<div class="form-group row">
		<label class="col-sm-2 col-form-label text-right" for="page">Page</label>
		<div class="col-sm-3">
			<select class="form-control" name="page" id="page" onchange="newPage()">
				<option value="">Select Page</option>
				@foreach ($pages as $page)
					{{-- expr --}}
				<option value="{{ $page->page }}">{{ $page->page }}</option>
				@endforeach
                    <option value="new_page">Add new page</option>
			</select>

            <input type="text" placeholder="Add new page" name="new_page" id="new_page" style="display: none;">
		</div>
	</div>
	@endif

	<div class="form-group row">
		<label class="col-sm-2 col-form-label text-right" for="labelid">Label Id</label>
		<div class="col-sm-6">
			<input class="form-control" placeholder="label Id" name="labelid" value="{{ old('labelid', isset($label) ? $label->labelid : null) }}" type="text" id="labelid" {{ isset($label) ? 'readonly="readonly"' : null }}>
		</div>
	</div>

    @foreach(config('label.lang') as $lang)
	<div class="form-group row">
		<label class="col-sm-2 col-form-label text-right" for="value">Value[{{$lang}}]</label>
        @if(isset($labels) && $labels)
            <input type="hidden" name="l_id[{{ $lang }}]" value="{{ $labels[$lang]->id }}">
        @endif

		<div class="col-sm-6">
			<textarea class="form-control" placeholder="Value" name="value[{{$lang}}]">{{ old('value', isset($label) && $labels ? $labels[$lang]->value : null) }}</textarea>
		</div>
	</div>
    @endforeach
</div>

<script>
    function newPage(){
        if(document.getElementById('page').value == 'new_page'){
            document.getElementById('new_page').style.display = 'block';
        }
        else{
            document.getElementById('new_page').style.display = 'none';
        }

    }
</script>

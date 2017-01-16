@if (empty($errors)==false)
	@if (count($errors) > 0)
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif
@endif

@if ($message = session('success'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<h4>@lang('notifications.success')</h4>
	{{ $message }}
</div>
@endif

@if ($message = session('error'))
<div class="alert alert-error alert-block">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<h4>@lang('notifications.error')</h4>
	{{ $message }}
</div>
@endif

@if ($message = session('warning'))
<div class="alert alert-warning alert-block">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<h4>@lang('notifications.warning')</h4>
	{{ $message }}
</div>
@endif

@if ($message = session('info'))
<div class="alert alert-info alert-block">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<h4>@lang('notifications.info')</h4>
	{{ $message }}
</div>
@endif

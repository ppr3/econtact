
@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('app.trackmenu_search') }} {{ trans('app.trackmenu_title')}}
@endsection

@section('contentheader_title')
	{{ trans('app.trackmenu_search') }} {{ trans('app.trackmenu_title')}}
@endsection

@section('$contentheader_description')
@endsection

@section('main-content')
        
        	{!! Form::open(array('route' => 'tracking', 'class' => 'form-horizontal')) !!}
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">{{ trans('tracking.division_name') }}</label>
                  <div class="col-sm-4">
                    {!! Form::select('division_id',$division,$division_id,array('class' => 'form-control','disabled' => 'disabled')) !!}                         
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">{{ trans('tracking.command') }}</label>
                  <div class="col-sm-4">
                    {!! Form::select('command_id',$commander,old('command_id'),array('class' => 'form-control')) !!}  
                  </div>

                  <label class="col-sm-2 control-label">{{ trans('tracking.subdivision') }}</label>
                  <div class="col-sm-4">
                    {!! Form::select('subdivision_id',$subdivision,old('subdivision_id'),array('class' => 'form-control')) !!} 
                  </div>
                </div>
				</div>


<div class="row">
    <div class="col-lg-12 col-xs-12">
      <a href="{{ route('tracking') }}"  class="pull-right btn btn-warning"><i class="fa fa-undo fa-lg"></i>  @lang('tracking.btn_cancle')</a>
      <button type="submit" class="pull-right btn btn-primary" style="margin-right: 5px;" id="btn_search"><i class="fa fa-search fa-lg"></i>  @lang('tracking.btn_search')</button>
    </div><!-- ./col -->
</div><!-- /.row -->

<p>
<div class="row">
  <div class="col-lg-12 col-xs-12">
      <div class="box box-success">
        <div class="box-body">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                      <th></th>
                        <th>@lang('tracking.order')</th>
                        <th>@lang('tracking.tracking_id')</th>
                        <th class="col-lg-1">@lang('tracking.date')</th>
                        <th class="col-lg-1">@lang('tracking.time')</th>
                        <th class="col-lg-3">@lang('tracking.command')</th>
                        <th class="col-lg-1">@lang('tracking.position')</th>
                        <th class="col-lg-2">@lang('tracking.subdivision')</th>
                        <th class="col-lg-2">@lang('tracking.subdivision_box')/@lang('tracking.subdivision_pointservice')</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($tracking as $index => $item)
                    <tr>
                      <td>
                        <a href="{{ route('tracking.edit', $item->tracking_id ) }}" class="btn btn-success btn-xs"><i class="fa fa-edit"></i> @lang('tracking.btn_edit')</a>
                      </td>
                      <td>
                        {{ (5*($page-1))+($index+1) }}
                      </td>
                      <td>{{ $item->tracking_id }}</td>
                      <td>{{ $item->tracking_date }}</td>
                      <td>{{ $item->tracking_time }}</td>
                      <td>{{ $item->commander_name }}</td>
                      <td>{{ $item->position_name }}</td>
                      <td>{{ $item->subdivision_name }}</td>
                      <td>{{ $item->pointofservice }}</td>
                    </tr>

                  @endforeach
                </tbody>
            </table>
            <span class="pull-right">
              {{ $tracking->links() }}
            </span>
        </div>
      </div>
  </div>
</div>

    {!! Form::close() !!}
@endsection
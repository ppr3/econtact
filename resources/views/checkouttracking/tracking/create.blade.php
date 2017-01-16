@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('app.trackmenu_add')  }} {{ trans('app.trackmenu_title')}}
@endsection

@section('contentheader_title')
	{{ trans('app.trackmenu_add') }} {{ trans('app.trackmenu_title') }}
@endsection

@section('$contentheader_description')
@endsection

@section('main-content')
        
        	{!! Form::open(array('route' => 'tracking.store', 'class' => 'form-horizontal')) !!}
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">{{ trans('tracking.division_name') }}<span style="color:red;padding-left: 5px;">*</span></label>
                  <div class="col-sm-4">
                    {!! Form::select('division_id',$division,$division_id,array('class' => 'form-control','disabled' => 'disabled')) !!}                          
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">{{ trans('tracking.date') }}<span style="color:red;padding-left: 5px;">*</span></label>
                  <div class="col-sm-1">
                    {!! Form::select('day',App\Helper::dayslist(),date('d'),array('class' => 'form-control')) !!}                          
                  </div>
                  <div class="col-sm-2">
                    {!! Form::select('mount',App\Helper::monthslist(),date('m'),array('class' => 'form-control')) !!}  
                  </div>
                  <div class="col-sm-1">
                    <input type="text" class="form-control" disabled='disabled' name="year"  value="{{ date('Y')+543 }}" >
                  </div>

                  <label class="col-sm-2 control-label">{{ trans('tracking.time') }}<span style="color:red;padding-left: 5px;">*</span></label>
                  <div class="col-sm-2">
                    {!! Form::text('tracking_time',old('tracking_time'),array('class' => 'form-control')) !!}  
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">{{ trans('tracking.command') }}<span style="color:red;padding-left: 5px;">*</span></label>
                  <div class="col-sm-4">
                    {!! Form::select('command_id',$commander,null,array('class' => 'form-control')) !!}  
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">{{ trans('tracking.subdivision') }}<span style="color:red;padding-left: 5px;">*</span></label>
                  <div class="col-sm-4">
                    {!! Form::select('subdivision_id',$subdivision,null,array('class' => 'form-control')) !!} 
                  </div>

                  <label class="col-sm-2 control-label">{{ trans('tracking.subdivision_box') }}/{{trans('tracking.subdivision_pointservice') }}</label>
                  <div class="col-sm-4">
                     {!! Form::text('pointofservice',old('pointofservice'),array('class' => 'form-control')) !!}  
                  </div>
                </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">{{ trans('tracking.tracking_issue') }}</label>
                      <div class="col-sm-10">
          		          <textarea name="tracking_issue" class="form-control" class="form-control" rows="4"></textarea> 
          					  </div>
          				</div>

          				<div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">{{ trans('tracking.command_issue') }}</label>
                      <div class="col-sm-10">
          		          <textarea name="command_issue" class="form-control" class="form-control" rows="4"></textarea> 
          					   </div>
          				</div>

                  <div class="form-group">
                      <div class="col-lg-12 col-xs-12">
                          <button type="submit"  class="pull-right btn btn-primary" id="btn_save"><i class="fa fa-floppy-o fa-lg"></i>  @lang('tracking.btn_save')</button>
                          <a href="{{ route('tracking.create') }}" style="margin-right: 5px;" class="pull-right btn btn-warning"><i class="fa fa-undo fa-lg"></i>  @lang('tracking.btn_cancle')</a>
                      </div><!-- ./col -->
                  </div><!-- /.row -->
              </div>
              <!-- /.box-body -->
      

    {!! Form::close() !!}
@endsection
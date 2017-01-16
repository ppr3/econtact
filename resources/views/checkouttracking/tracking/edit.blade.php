@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('app.trackmenu_edit') }} {{ trans('app.trackmenu_title')}}
@endsection

@section('contentheader_title')
	{{ trans('app.trackmenu_edit')}} {{ trans('app.trackmenu_title')}}
@endsection

@section('$contentheader_description')
@endsection

@section('main-content')
        
        	{!! Form::open(array('route' => array('tracking.update',$tracking->tracking_id), 'class' => 'form-horizontal')) !!}
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">{{ trans('tracking.division_name') }}<span style="color:red;padding-left: 5px;">*</span></label>
                  <div class="col-sm-4">
                    {!! Form::select('division_id',$division,$division_id,array('class' => 'form-control','disabled' => 'disabled')) !!}                          
                  </div>

                  <label class="col-sm-2 control-label">{{ trans('tracking.tracking_id') }}</label>
                  <div class="col-sm-2">
                    {!! Form::text('tracking_id',$tracking->tracking_id,array('class' => 'form-control','disabled' => 'disabled')) !!}  
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">{{ trans('tracking.date') }}<span style="color:red;padding-left: 5px;">*</span></label>
                  <div class="col-sm-1">
                    {!! Form::select('day',App\Helper::dayslist(),date_format($tracking_date,'d'),array('class' => 'form-control')) !!}                          
                  </div>
                  <div class="col-sm-2">
                    {!! Form::select('mount',App\Helper::monthslist(),date_format($tracking_date,'m'),array('class' => 'form-control')) !!}  
                  </div>
                  <div class="col-sm-1">
                    <input type="text" class="form-control" name="year" value="{{ date_format($tracking_date,'Y')+543}} " disabled = 'disabled'>
                  </div>

                  <label class="col-sm-2 control-label">{{ trans('tracking.time') }}</label>
                  <div class="col-sm-2">
                    {!! Form::text('tracking_time',$tracking->tracking_time,array('class' => 'form-control')) !!}  
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">{{ trans('tracking.command') }}<span style="color:red;padding-left: 5px;">*</span></label>
                  <div class="col-sm-4">
                    {!! Form::select('command_id',$commander,$tracking->command_id,array('class' => 'form-control')) !!}  
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">{{ trans('tracking.subdivision') }}<span style="color:red;padding-left: 5px;">*</span></label>
                  <div class="col-sm-4">
                    {!! Form::select('subdivision_id',$subdivision,$tracking->subdivision_id,array('class' => 'form-control')) !!} 
                  </div>

                  <label class="col-sm-2 control-label">{{ trans('tracking.subdivision_box') }}/{{trans('tracking.subdivision_pointservice') }}</label>
                  <div class="col-sm-4">
                     {!! Form::text('pointofservice',$tracking->pointofservice,array('class' => 'form-control')) !!}  
                  </div>
                </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">{{ trans('tracking.tracking_issue') }}</label>
                      <div class="col-sm-10">
          		          <textarea name="tracking_issue" class="form-control" class="form-control" rows="4" >{{ $tracking->tracking_issue }}</textarea> 
          					  </div>
          				</div>

          				<div class="form-group">
                      <label class="col-sm-2 control-label">{{ trans('tracking.command_issue') }}</label>
                      <div class="col-sm-10">
          		          <textarea name="command_issue" class="form-control" class="form-control" rows="4" value="dssda">{{ $tracking->command_issue }}</textarea> 
          					   </div>
          				</div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">{{ trans('tracking.created_at') }}</label>
                      <div class="col-sm-4">
                        <label class="control-label">{{ $tracking->create_date }}</label>
                      </div>

                      <label class="col-sm-2 control-label">{{ trans('tracking.updated_at') }}</label>
                      <div class="col-sm-4">
                        <label class="control-label">{{ $tracking->update_date }}</label>
                      </div>
                  </div>

                  <div class="form-group">
                      <div class="col-lg-12 col-xs-12">
                          <button type="submit"  class="pull-right btn btn-primary" id="btn_save"><i class="fa fa-floppy-o fa-lg"></i>  @lang('tracking.btn_save')</button>
                          <a href="{{ route('tracking.edit',$tracking->tracking_id) }}" style="margin-right: 5px;" class="pull-right btn btn-warning"><i class="fa fa-undo fa-lg"></i>  @lang('tracking.btn_cancle')</a>
                      </div><!-- ./col -->
                  </div><!-- /.row -->
              </div>
              <!-- /.box-body -->


      

    {!! Form::close() !!}
@endsection
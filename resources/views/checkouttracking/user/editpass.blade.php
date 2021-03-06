@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('tracking.tracking_tile') }}
@endsection

@section('contentheader_title')
	{{ trans('tracking.tracking_tile') }}
@endsection

@section('$contentheader_description')
@endsection

@section('main-content')
        
        	{!! Form::open(array('route' =>array('user.updatepass',$user->id) , 'class' => 'form-horizontal')) !!}
              <div class="box-body">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">{{ trans('user.division') }}</label>
                    <div class="col-sm-4">
                      {!! Form::select('division_id',$division,$user->division_id,array('class' => 'form-control','disabled' => 'disabled')) !!}  
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">{{ trans('user.name') }}</label>
                    <div class="col-sm-4 has-feedback">
                      {!! Form::text('name',$user->name,array('class' => 'form-control','disabled' => 'disabled')) !!}
                      <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>

                    <label class="col-sm-2 control-label">{{ trans('user.email') }}</label>
                    <div class="col-sm-4 has-feedback">
                      {!! Form::email('email',$user->email,array('class' => 'form-control','disabled' => 'disabled')) !!}
                      <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">{{ trans('user.password') }}</label>
                    <div class="col-sm-4 has-feedback">
                       <input type="password" class="form-control" name="passworduser" autocomplete="off"/>
                      <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>

                    <label class="col-sm-2 control-label">{{ trans('user.password_confirmation') }}</label>
                    <div class="col-sm-4 has-feedback">
                      <input type="password" class="form-control" name="password_confirmation" autocomplete="off"/>
                      <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                    </div>
                  </div>

                  <div class="form-group">
                      <div class="col-lg-12 col-xs-12">
                          <button type="submit"  class="pull-right btn btn-primary" id="btn_save"><i class="fa fa-floppy-o fa-lg"></i>  @lang('tracking.btn_save')</button>
                          <a href="{{ route('user.editpass',$user->id) }}" style="margin-right: 5px;" class="pull-right btn btn-warning"><i class="fa fa-undo fa-lg"></i>  @lang('tracking.btn_cancle')</a>
                      </div><!-- ./col -->
                  </div><!-- /.row -->
              </div>
              <!-- /.box-body -->
    {!! Form::close() !!}
@endsection
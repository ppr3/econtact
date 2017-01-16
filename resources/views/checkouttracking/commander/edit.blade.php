@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('app.trackmenu_edit') }} {{ trans('app.commandmenu_title')}}
@endsection

@section('contentheader_title')
	{{ trans('app.trackmenu_edit')}} {{ trans('app.commandmenu_title')}}
@endsection

@section('$contentheader_description')
@endsection

@section('main-content')
        
        	{!! Form::open(array('route' => array('commander.update',$commander->commander_id), 'class' => 'form-horizontal')) !!}
              
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">{{ trans('tracking.division_name') }}<span style="color:red;padding-left: 5px;">*</span></label>
                  <div class="col-sm-4">
                    {!! Form::select('division_id',$division,$division_id,array('class' => 'form-control','disabled' => 'disabled')) !!}                         
                  </div>

                  <label class="col-sm-2 control-label">{{ trans('commander.status') }}<span style="color:red;padding-left: 5px;">*</span></label>
                  <div class="col-sm-4">
                    {!! Form::select('status_id',$status,$commander->status_id,array('class' => 'form-control')) !!}  
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">{{ trans('commander.rank_name') }}<span style="color:red;padding-left: 5px;">*</span></label>
                  <div class="col-sm-4">
                    {!! Form::text('rank_name',$commander->rank_name,array('class' => 'form-control')) !!}                    
                  </div>

                  <label class="col-sm-2 control-label">{{ trans('commander.position_name') }}<span style="color:red;padding-left: 5px;">*</span></label>
                  <div class="col-sm-4">
                    {!! Form::text('position_name',$commander->position_name,array('class' => 'form-control')) !!}                     
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">{{ trans('commander.fname') }}<span style="color:red;padding-left: 5px;">*</span></label>
                  <div class="col-sm-4">
                    {!! Form::text('fname',$commander->fname,array('class' => 'form-control')) !!}                         
                  </div>

                  <label class="col-sm-2 control-label">{{ trans('commander.lname') }}<span style="color:red;padding-left: 5px;">*</span></label>
                  <div class="col-sm-4">
                   {!! Form::text('lname',$commander->lname,array('class' => 'form-control')) !!}                        
                  </div>
                </div>
              </div>

              <div class="form-group">
                  <div class="col-lg-12 col-xs-12">
                      <button type="submit"  class="pull-right btn btn-primary" id="btn_save"><i class="fa fa-floppy-o fa-lg"></i>  @lang('commander.btn_save')</button>
                          <a href="{{ route('commander.edit',$commander->commander_id) }}" style="margin-right: 5px;" class="pull-right btn btn-warning"><i class="fa fa-undo fa-lg"></i>  @lang('commander.btn_cancle')</a>
                      </div><!-- ./col -->
                  </div><!-- /.row -->
              </div>
              <!-- /.box-body -->

    {!! Form::close() !!}
@endsection
@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('app.reportmenu_mouth_export')}}
@endsection

@section('contentheader_title')
	 {{ trans('app.reportmenu_mouth_export') }}
@endsection

@section('$contentheader_description')
@endsection

@section('main-content')
        
  {!! Form::open(array('route' => array('report.mouth'), 'class' => 'form-horizontal')) !!}
              
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">{{ trans('tracking.division_name') }}</label>
                  <div class="col-sm-4">
                    {!! Form::select('division_id',$division,$division_id,array('class' => 'form-control','disabled' => 'disabled')) !!}                         
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">{{ trans('tracking.date') }}</label>
                  <div class="col-sm-1">
                    {!! Form::select('day_st',App\Helper::dayslist(),$day_st,array('class' => 'form-control')) !!}                          
                  </div>
                  <div class="col-sm-2">
                    {!! Form::select('mount_st',App\Helper::monthslist(),$mount_st,array('class' => 'form-control')) !!}  
                  </div>
                  <div class="col-sm-1">
                     {!! Form::select('year_st',App\Helper::yearreportlist(),$year_st,array('class' => 'form-control')) !!}  
                  </div>

                   <label class="col-sm-1 control-label">{{ trans('tracking.report_to') }}</label>
                  <div class="col-sm-1">
                    {!! Form::select('day_en',App\Helper::dayslist(),$day_en,array('class' => 'form-control')) !!}                          
                  </div>
                  <div class="col-sm-2">
                    {!! Form::select('mount_en',App\Helper::monthslist(),$mount_en,array('class' => 'form-control')) !!}  
                  </div>
                  <div class="col-sm-1">
                    {!! Form::select('year_en',App\Helper::yearreportlist(),$year_en,array('class' => 'form-control')) !!}  
                  </div>
                </div>

            <div class="row">
                <div class="col-lg-12 col-xs-12">
                  <a href="{{ route('report.mouth') }}"  class="pull-right btn btn-warning"><i class="fa fa-undo fa-lg"></i>  @lang('commander.btn_cancle')</a>
                  <a href="{{ URL::to('report/export',[$division_id,(date('Y').$mount_st.$day_st),(date('Y').$mount_en.$day_en)])}}"  class="pull-right btn btn-success" style="margin-right: 5px;"><i class="fa fa-file-excel-o fa-lg"></i> Export to Excel</a>
                  <button type="submit" class="pull-right btn btn-primary" style="margin-right: 5px;" id="btn_search"><i class="fa fa-search fa-lg"></i>  @lang('commander.btn_search')</button>
                </div><!-- ./col -->
            </div><!-- /.row -->

            </p>
            <div class="row col-lg-12 col-xs-12 box box-success">
              <div class="box-body">
                        <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="col-lg-1">@lang('commander.order')</th>
                                <th class="col-lg-1">@lang('commander.commander_id')</th>
                                <th class="col-lg-2">@lang('commander.rank_name')</th>
                                <th class="col-lg-2">@lang('commander.fname')</th>
                                <th class="col-lg-2">@lang('commander.lname')</th>
                                <th class="col-lg-2">@lang('commander.position_name')</th>
                                <th class="col-lg-2">@lang('commander.numof_tracking')</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($report as $index => $item)
                                <tr>
                                  <td>
                                    {{ $index+1 }}
                                  </td>
                                   <td>{{ $item->commander_id }}</td>
                                  <td>{{ $item->rank_name }}</td>
                                  <td>{{ $item->fname }}</td>
                                  <td>{{ $item->lname }}</td>
                                  <td>{{ $item->position_name }}</td>
                                  <td>{{ $item->numof_tracking }}</td>
                                </tr>
                             @endforeach
                        </tbody>
                    </table>
                    </div>
                  </div>

    {!! Form::close() !!}
@endsection
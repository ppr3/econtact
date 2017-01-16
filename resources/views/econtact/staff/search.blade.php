
@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('app.app_name')}}
@endsection

@section('contentheader_title')
	{{ trans('app.staff_search') }} 
@endsection

@section('$contentheader_description')
@endsection

@section('main-content')
        
        	{!! Form::open(array('route' => 'staff', 'class' => 'form-horizontal')) !!}
            <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">{{ trans('staff.rang') }}</label>
                  <div class="col-sm-4">
                                    
                  </div>

                  <label class="col-sm-2 control-label">{{ trans('staff.position') }}</label>
                  <div class="col-sm-4">
                    
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">{{ trans('staff.first_name') }}</label>
                  <div class="col-sm-4">
                                    
                  </div>

                  <label class="col-sm-2 control-label">{{ trans('staff.last_name') }}</label>
                  <div class="col-sm-4">
                    
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">{{ trans('staff.division_id') }}</label>
                  <div class="col-sm-4">
                                    
                  </div>

                  <label class="col-sm-2 control-label">{{ trans('staff.subdivision_id') }}</label>
                  <div class="col-sm-4">
                    
                  </div>
                </div>
				    </div>

            <div class="row">
                <div class="col-lg-12 col-xs-12">
                  <a href="{{ route('staff') }}"  class="pull-right btn btn-warning"><i class="fa fa-undo fa-lg"></i>  @lang('commander.btn_cancle')</a>
                  <button type="submit" class="pull-right btn btn-primary" style="margin-right: 5px;" id="btn_search"><i class="fa fa-search fa-lg"></i>  @lang('commander.btn_search')</button>
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
                                    <th>@lang('staff.order_id')</th>
                                    <th>@lang('staff.staff_id')</th>
                                    <th class="col-lg-1">@lang('staff.rang')</th>
                                    <th class="col-lg-2">@lang('staff.first_name')</th>
                                    <th class="col-lg-2">@lang('staff.last_name')</th>
                                    <th class="col-lg-2">@lang('staff.position')</th>
                                    <th class="col-lg-1">@lang('staff.subdivision_id')</th>
                                    <th class="col-lg-1">@lang('staff.division_id')</th>
                                    <th class="col-lg-2">@lang('staff.telephone')</th>
                                    <th class="col-lg-1">@lang('staff.mobile_phone')</th>
                                    <th class="col-lg-1">@lang('staff.line_id')</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach ($staff as $index => $item)
                                <tr>
                                  <td>
                                    {{ (5*($page-1))+($index+1) }}
                                  </td>
                                  <td>{{ $item->staff_id }}</td>
                                  <td>{{ $item->rang }}</td>
                                  <td>{{ $item->first_name }}</td>
                                  <td>{{ $item->last_name }}</td>
                                  <td>{{ $item->position }}</td>
                                  <td>{{ $item->subdivision_id }}</td>
                                  <td>{{ $item->division_id }}</td>
                                  <td>{{ $item->telephone }}</td>
                                  <td>{{ $item->mobile_phone }}</td>
                                  <td>{{ $item->line_id }}</td>
                                </tr>

                              @endforeach
                            </tbody>
                        </table>
                        <span class="pull-right">
                          {{ $staff->links() }}
                        </span>
                    </div>
                  </div>
              </div>
            </div>

    {!! Form::close() !!}
@endsection
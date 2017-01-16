
@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('app.trackmenu_search') }} {{ trans('app.commandmenu_title')}}
@endsection

@section('contentheader_title')
	{{ trans('app.trackmenu_search') }} {{ trans('app.commandmenu_title')}}
@endsection

@section('$contentheader_description')
@endsection

@section('main-content')
        
        	{!! Form::open(array('route' => 'division', 'class' => 'form-horizontal')) !!}
            <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">{{ trans('tracking.division_name') }}</label>
                  <div class="col-sm-4">
                                    
                  </div>

                  <label class="col-sm-2 control-label">{{ trans('commander.status') }}</label>
                  <div class="col-sm-4">
                    
                  </div>
                </div>
				    </div>

            <div class="row">
                <div class="col-lg-12 col-xs-12">
                  <a href="{{ route('division') }}"  class="pull-right btn btn-warning"><i class="fa fa-undo fa-lg"></i>  @lang('commander.btn_cancle')</a>
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
                                  <th></th>
                                    <th>@lang('commander.order')</th>
                                    <th>@lang('commander.commander_id')</th>
                                    <th class="col-lg-1">@lang('commander.rank_name')</th>
                                    <th class="col-lg-2">@lang('commander.fname')</th>
                                    <th class="col-lg-2">@lang('commander.lname')</th>
                                    <th class="col-lg-1">@lang('commander.position_name')</th>
                                    <th class="col-lg-3">@lang('commander.division_id')</th>
                                    <th class="col-lg-1">@lang('commander.status')</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach ($division as $index => $item)
                                <tr>
                                  <td>
                                    <a href="{{ route('division.edit', $item->division_id ) }}" class="btn btn-success btn-xs"><i class="fa fa-edit"></i> @lang('commander.btn_edit')</a>
                                  </td>
                                  <td>
                                    {{ (5*($page-1))+($index+1) }}
                                  </td>
                                   <td>{{ $item->division_id }}</td>
                                  <td>{{ $item->division_name }}</td>
                                  <td>{{ $item->address }}</td>
                                  <td>{{ $item->tumbol }}</td>
                                  <td>{{ $item->amphoe }}</td>
                                  <td>{{ $item->province }}</td>
                                  <td>{{ $item->postcode }}</td>
                                </tr>

                              @endforeach
                            </tbody>
                        </table>
                        <span class="pull-right">
                          {{ $division->links() }}
                        </span>
                    </div>
                  </div>
              </div>
            </div>

    {!! Form::close() !!}
@endsection
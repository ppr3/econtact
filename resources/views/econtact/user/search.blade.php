
@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('app.trackmenu_search') }} {{ trans('user.user_title') }}
@endsection

@section('contentheader_title')
	{{ trans('app.trackmenu_search') }} {{ trans('user.user_title') }}
@endsection

@section('$contentheader_description')
@endsection

@section('main-content')
        
    {!! Form::open(array('route' => 'user', 'class' => 'form-horizontal')) !!}
              <div class="box-body">

        <div class="row">
          <div class="col-lg-12 col-xs-12">
              <div class="box box-success">
                <div class="box-body">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="col-lg-1"></th>
                                <th class="col-lg-1"></th>
                                <th class="col-lg-1">@lang('user.order')</th>
                                <th class="col-lg-3">@lang('user.name')</th>
                                <th class="col-lg-3">@lang('user.email')</th>
                                <th class="col-lg-3">@lang('user.division')</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($users as $index => $item)
                            <tr>
                              <td>
                                <a href="{{ route('user.edit', $item->id) }}" class="btn btn-success btn-xs"><i class="fa fa-edit"></i> @lang('user.btn_edit')</a>
                              </td>
                              <td>
                                <a href="{{ route('user.editpass', $item->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> @lang('user.btn_edit_password')</a>
                              </td>
                              <td>{{ $index+1}}</td>
                              <td>{{ $item->name }}</td>
                              <td>{{ $item->email }}</td>
                              <td>{{ $item->division_name }}</td>
                            </tr>
                          @endforeach
                        </tbody>
                    </table>
                </div>
              </div>
          </div>
        </div>

    {!! Form::close() !!}
@endsection
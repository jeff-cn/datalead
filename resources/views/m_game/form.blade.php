@extends('layouts.base')

@section('content')
@if( $errors->has('base_deal') )
<div class="alert alert-danger alert-dismissable">
    <button type="button" class="close" data-dismiss="alert"
            aria-hidden="true">
        &times;
    </button>
    {{ $errors->first('id') }}
</div>
@endif
<!-- Forms Section-->
<section class="forms"> 
    <div class="container-fluid">
        <div class="row">
            <!-- Form Elements -->
            <div class="col-lg-12">
                <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h3 class="h4">应用数据</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('game_dealwith') }}" class="form-horizontal">
                        {{ csrf_field() }}
                        <input name="old_id" type="hidden" value="{{ old('old_id') }}">
                        <div class="form-group row">
                            <label class="col-sm-3 form-control-label">ID</label>
                            <div class="col-sm-9">
                            <input name='id' type="text" class="form-control {{ $errors->has('id') ? 'is-invalid' : '' }}" value="{{ old('id') }}">
                            @if( $errors->has('id') )
                            <small class="help-block-none text-danger">{{ $errors->first('id') }}</small>
                            @endif
                            </div>
                        </div>
                        <div class="line"></div>
                        <div class="form-group row">
                            <label class="col-sm-3 form-control-label">名称</label>
                            <div class="col-sm-9">
                            <input name='name' type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ old('name') }}">
                            @if( $errors->has('name') )
                            <small class="help-block-none text-danger">{{ $errors->first('name') }}</small>
                            @endif
                            </div>
                        </div>
                        <div class="line"></div>
                        <div class="form-group row">
                            <label class="col-sm-3 form-control-label">简介</label>
                            <div class="col-sm-9">
                            <input name='desc' type="text" class="form-control {{ $errors->has('desc') ? 'is-invalid' : '' }}" value="{{ old('desc') }}">
                            @if( $errors->has('desc') )
                            <small class="help-block-none text-danger">{{ $errors->first('desc') }}</small>
                            @endif
                            </div>
                        </div>
                        <div class="line"></div>
                        <div class="form-group row">
                            <label class="col-sm-3 form-control-label">下载地址</label>
                            <div class="col-sm-9">
                            <input name='download_url' type="text" class="form-control {{ $errors->has('download_url') ? 'is-invalid' : '' }}" value="{{ old('download_url') }}">
                            @if( $errors->has('download_url') )
                            <small class="help-block-none text-danger">{{ $errors->first('download_url') }}</small>
                            @endif
                            </div>
                        </div>
                        <div class="line"></div>
                        <div class="form-group row">
                            <div class="col-sm-4 offset-sm-3">
                            <button id="cancel_btn" type="button" class="btn btn-secondary" onclick="$('input').val('');">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
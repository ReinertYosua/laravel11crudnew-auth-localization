@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-12">
        <label>@lang('crud.label_nama')</label>
        <h3>{{ $datamahasiswa[0]->nama }}</h3>
        
        <label>@lang('crud.label_nim')</label>
        <h3>{{ $datamahasiswa[0]->nim }}</h3>

        <label>@lang('crud.label_jurusan')</label>
        <h3>{{ $datamahasiswa[0]->nama_jurusan }}</h3>


    </div>
</div>
@endsection()
@extends('users.layouts.master')


@push('title')
    USERS | HOME
@endpush


@push('css')

@endpush


@section('content')
    @include('users.home')
    @include('users.education')
    @include('users.conseling')
    @include('users.kader')
    @include('users.kegiatan')
    @include('users.about')
    @include('users.contact')
@endsection


@push('js')

@endpush

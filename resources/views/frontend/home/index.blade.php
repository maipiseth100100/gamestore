@extends('frontend.layouts.app')

@section('title', 'Game Store')

@section('content')

    {{-- Hero Slider --}}
    @include('frontend.partials.hero')

    {{-- Categories --}}
    @include('frontend.partials.categories')

    {{-- Featured Games --}}
    @include('frontend.partials.featured')

    {{-- Latest Games --}}
    @include('frontend.partials.latest')

    {{-- Coupons --}}
    @include('frontend.partials.coupons')

@endsection
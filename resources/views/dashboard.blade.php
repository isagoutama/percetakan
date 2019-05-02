@extends('app')
@section('content')
  @include('app.carousel', ['simages' => $slides])
@endsection

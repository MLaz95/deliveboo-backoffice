@extends('layouts.app')

@section('content')

<div style="width: 75%; background-color: white;">
    {!! $chartjs->render() !!}
</div>

{{-- @dd($totals) --}}

{{-- <ul>
    @foreach($orders as $order)
    <li>{{$order}}</li>
    @endforeach
</ul> --}}
@endsection
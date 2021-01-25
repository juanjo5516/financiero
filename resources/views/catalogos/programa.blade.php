@extends('layouts.app')
@section('content')
  <div id="app">
    <h1>VueJs</h1>
    @include('custom.modal_eliminar')
    <programa-component></programa-component>
  </div>
@endsection

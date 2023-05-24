{{--
@extends('layouts.app')

@section('title','About')
@section('meta-description','Descripcion de About')


@section('content')
    <h1>ABOUT<h1>
@endsection


--}}

<x-layouts.app
  title="About"
  metaDescription="About meta description"
  >
  <h1 class="my-4 font-serif text-3xl text-center text-sky-600 dark:text-sky-500">
  About
  </h1>
</x-layouts.app>
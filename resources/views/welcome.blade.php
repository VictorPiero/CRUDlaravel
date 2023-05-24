{{-- @extends('layouts.app')


{{-- @section('title')
  HOME
@endsection 
--}}

{{--
@section('title','Inicio')
@section('meta-description','Descripcion de Home')

@section('content')
    <h1>INICIO</h1>
@endsection
--}}


{{--
@component('components.layout')
<h1>Homeasdsad</h1>
@endcomponent
--}}

<x-layouts.app
  title="Home"
  metaDescription="Home meta description"
  {{--:sum="2+2"--}}
  >
  
  {{--
  <x-slot name="title">
    Pagina Welcome
  </x-slot>
  --}}

  <h1 class="my-4 font-serif text-3xl text-center text-sky-600 dark:text-sky-500">
    
    @auth
    <div>
      Usuario autenticado:  <br>
      Nombre : {{Auth::user()->name}}  <br>
      Email: {{Auth::user()->email}}  <br>
      Password: {{Auth::user()->password}}
    </div>
    @endauth
    
  </h1>

</x-layouts.app>


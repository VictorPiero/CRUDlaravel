<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{--VARIABLE OBLIGATORIA 
        <title>Aprendible- {{$title}}</title> --}}
        {{--VARIABLE OPCIONAL --}}
        <title>Aprendible- {{$title ?? ''}}</title>

        <meta name="description" content="{{$metaDescription ?? 'Defaul meta description' }}" />

        <link rel="stylesheet" href="/css/app.scss">
        <script src="/js/app.js"></script>
      
        @vite(['resources/css/app.scss','resources/js/app.js'])
    </head>
    <body class="antialiased bg-slate-100 dark:bg-slate-900">
        {{--Invocando a NAVIGATION --}}
        <x-layouts.navigation />

        </div>

        @if (session('status'))        
            
            <div class="max-w-screen-xl px-3 py-2 mx-auto font-bold text-white sm:px-6 lg:px-8 bg-emerald-500 dark:bg-emerald-700">
                {{--VALOR DE POST CONTROLLER--}}
                {{ session('status') }}
            </div>
        @endif

        {{--<pre>{{$sum}}</pre>--}}
        {{ $slot }}
    </body>
</html>

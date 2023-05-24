
<x-layouts.app
  title="Crear nuevo post"
  metaDescription="Formulario para crear un nuevo blog post"
>

<h1 class="my-4 font-serif text-3xl text-center text-sky-600 dark:text-sky-500">CREAR NUEVO POST</h1>
{{--
@foreach($errors->all() as $error)
    <p>{{ $error}}</p>
@endforeach
--}}

<form class="max-w-xl px-8 py-4 mx-auto bg-white rounded shadow dark:bg-slate-800" action="{{route('posts.store')}}" method="POST">
    {{--DIRECTIVA QUE DEBE IR EN TODOS LOS FORMULARIOS PARA LOS ATAQUES 
        @csrf
        Tiene duracion de 2 horas, pasa la hora y la pagina te bota un error 
        
        --}}
    @csrf
    @include('posts.form-fields')
        {{-- 
            <label>
                Title <br>--}}
                {{-- <input name="title" type="text" value="{{old('title')}}"> --}}
        {{--    <input name="title" type="text" value="{{old('title',$post->title)}}">
                @error('title')
                    <br>
                    <small style="color:red">{{$message}}</small>
                @enderror
            </label> <br>--}}
        {{--
            <label>
                Body <br>
                {{--<textarea name="body">{{old('body')}}</textarea> --}}
        {{--    <textarea name="body">{{old('body',$post->body)}}</textarea>
                @error('body')
                    <br>
                    <small style="color:red">{{$message}}</small>
                @enderror
            </label> <br>
        --}}
    <div class="flex items-center justify-between mt-4">
        <a class="text-sm font-semibold underline border-2 border-transparent rounded dark:text-slate-300 text-slate-600 focus:border-slate-500 focus:outline-none" href="{{ route('posts.index')}}">Regresar</a>
        <button class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition duration-150 ease-in-out border border-2 border-transparent rounded-md dark:text-sky-200 bg-sky-800 hover:bg-sky-700 active:bg-sky-700 focus:outline-none focus:border-sky-500" type="submit">Enviar</button>
    </div>
   
</form>



</x-layouts.app>
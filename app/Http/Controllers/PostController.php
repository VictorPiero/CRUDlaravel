<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\SavePostRequest;
use Illuminate\Http\Request;

class PostController extends Controller
{
//LISTADO DE POST 
    public function __construct(){
        // $this->middleware('auth',['only'=> ['create','edit']]);
        $this->middleware('auth',['except'=> ['index','show']]);

    }
    public function index(){
          
        $posts = Post::get();
        //$posts = DB::table('posts')->get();
        // return view('blog',['posts'=>$posts]);
        return view('posts.index',['posts'=>$posts]);
    }
    //public function show($post)
    // {
        
    //     return Post::findOrFail($post);
    // }
    // public function show(Post $post)
    // {
        
    //     return $post;
    // }

    
//DETALLE DE POST 
    public function show(Post $post)
    {
        return view('posts.show',['post'=>$post]);
    }
 //FORMULARIO  DE POST 
    public function create()
    {
        //return view('posts.create');
        return view('posts.create',['post'=>new Post]);
    }
 //ALMANENAR EN LA BD DE POST 
    public function store(SavePostRequest $request)
    {    
        //VALIDACION
        // laravel.com/docs/validation


        // $validated = $request -> validate ([
        //     'title'=>['required','min:4'],
        //     'body'=>['required']
        // ]);


        // $request -> validate ([
        //     'title'=>['required','min:4'],
        //     'body'=>['required'],
        // ],[
        //     //Se puede definir los atributos aqui tbm 
        //     'title.required'=>'Error diferente :attribute'
        // ]);


        // $post = new Post;
        // $post->title = $request->input('title');
        // $post->body = $request->input('body');
        // $post->save();

        //Esto es lo mismo a lo de arriba 
        // Post::create([
        //     'title'=>$request->input('title'),
        //     'body'=>$request->input('body'),
        // ]);
        
        Post::create($request->validated());

        //session()->flash('status','Post creado!');
        return to_route('posts.index')->with('status','Post creado!');

    }
 //EDITAR EL FORMULARIO DE POST 
    public function edit(Post $post)
    {
       return view('posts.edit',['post'=>$post]);
    }
 //EDITAR EN LA BASE DE DATOS DE POST 
    public function update(SavePostRequest $request,Post $post)
    {
        // $validated = $request -> validate ([
        //     'title'=>['required','min:4'],
        //     'body'=>['required']
        // ]);

        // Esto se pone si no ingresa el metodo "Post $post" en la entrada
        // $post = Post::find($post);

        // ---- 
        // $post->title = $request->input('title');
        // $post->body = $request->input('body');
        // $post->save();

        //Esto es lo mismo a lo de arriba 
        // $post->update([
        //     'title'=>$request->input('title'),
        //     'body'=>$request->input('body'),
        // ]);

        $post->update($request->validated());

        //session()->flash('status','Post actualizado!');
        return to_route('posts.show',$post)->with('status','Post actualizado!');

    }
 //ELIMINAR DE POST 
    public function destroy( Post $post){
        $post->delete();
        return to_route('posts.index')->with('status','Post eliminado!');

    }

}



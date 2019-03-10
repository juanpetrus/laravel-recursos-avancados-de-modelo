<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        echo "Titulo: {$post->title}<br>";
        echo "Subtitulo: {$post->subtitle}<br>";
        echo "Conteúdo: {$post->description}<br> <hr>";

        $postAuthor = $post->author()->get()->first();

        if($postAuthor){
            echo "<h1>Dados do Endereço</h1>";
            echo "Nome: {$postAuthor->name}<br>";
            echo "E-mail: {$postAuthor->email}<br>";
        }

        $postCetegories = $post->categories()->get();
        if($postCetegories){
            echo "<h1>Categorias</h1>";

            foreach ($postCetegories as $category){
                echo "#{$category->id} Categoria: {$category->name} <br>";
            }
        }
        //Adcionar Categoria
        //$post->categories()->attach([3]);

        //Deletetar Categoria
        //$post->categories()->detach([3]);

        //Arrumar categoria apaga e concerta automatico
        //$post->categories()->sync([5,10]);

        //Arrumar categoria só add categoria automatica
        //$post->categories()->syncWithoutDetaching([5,6,7]);

//        $post->comments()->create([
//            'content' => 'comentario 123456'
//        ]);

        $comments = $post->comments()->get();
        if($comments){
            echo "<h1>Comentarios</h1>";

            foreach ($comments as $comment){
                echo "#{$comment->id} Titulo {$comment->content} <br>";
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Address;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
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
        $user = User::find($id);
        echo "<h1>Dados do Usuario</h1>";
        echo "Nome: {$user->name} <br>";
        echo "E-mail: {$user->email} <br>";

        $userAddress = $user->addressDelivery()->get()->first();
        if($userAddress){
            echo "<h1>Dados do Endereço</h1>";
            echo "Endereço: {$userAddress->address}, {$userAddress->number}<br>";
            echo "Complemento: {$userAddress->complement} CEP: {$userAddress->zipcode}<br>";
            echo "Cidade/Estado: {$userAddress->city}/{$userAddress->state}";
        }

//        $addressTeste = new Address([
//            'address' => 'Rua dos bobos',
//            'number' => '7589',
//            'complement' => 'casa',
//            'zipcode' => '76820-564',
//            'city' => 'Porto Velho',
//            'state' => 'RO'
//        ]);

//        $address = new Address();
//        $address->address = 'Rua dos bobos';
//        $address->number = '7589';
//        $address->complement = 'casa';
//        $address->zipcode = '76820-564';
//        $address->city = 'Porto Velho';
//        $address->state = 'RO';

//        $user->addressDelivery()->create([
//            'address' => 'Rua dos bobos',
//            'number' => '7589',
//            'complement' => 'casa',
//            'zipcode' => '76820-564',
//            'city' => 'Porto Velho',
//            'state' => 'RO'
//        ]);

//        $user->addressDelivery()->createMany([[
//            'address' => 'Rua dos bobos',
//            'number' => '7589',
//            'complement' => 'casa',
//            'zipcode' => '76820-564',
//            'city' => 'Porto Velho',
//            'state' => 'RO'
//        ],[
//            'address' => 'Rua dos bobos',
//            'number' => '7589',
//            'complement' => 'casa',
//            'zipcode' => '76820-564',
//            'city' => 'Porto Velho',
//            'state' => 'RO'
//        ]]);

        //$user->addressDelivery()->save($address);

        //$user->addressDelivery()->saveMany([$address, $addressTeste]);

//        $user = User::with('addressDelivery')->get();
//        dd($user);

        $posts = $user->posts()->orderBy('id', 'DESC')->get();
        if($posts){
            echo "<h1>Artigos</h1>";
            foreach ($posts as $post) {
                echo "#{$post->id} Titulo: {$post->title}<br>";
                echo "Subtitulo: {$post->subtitle}<br>";
                echo "Conteúdo: {$post->description}<br> <hr>";
            }
        }

//        $comments = $user->commentsOnMyPost()->get();
//        if($comments){
//            echo "<h1>Comentários no meus Artigos</h1>";
//
//            foreach ($comments as $comment){
//                echo "Post {$comment->post} User: {$comment->user} {$comment->content} <br>";
//            }
//        }

//        $user->comments()->create([
//            'content' => 'comentario modelo usuario'
//        ]);

        $comments = $user->comments()->get();
        if($comments){
            echo "<h1>Comentarios</h1>";

            foreach ($comments as $comment){
                echo "#{$comment->id} Titulo {$comment->content} <br>";
            }
        }

        $students = User::students()->get();
        if($students){
            echo "<h1>Alunos</h1>";
            foreach ($students as $student) {
                echo "Nome: {$student->name} <br>";
                echo "E-mail: {$student->email} <br>";
            }
        }

        $admins = User::admins()->get();
        if($admins){
            echo "<h1>Admin</h1>";
            foreach ($admins as $admin) {
                echo "Nome: {$admin->name} <br>";
                echo "E-mail: {$admin->email} <br>";
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

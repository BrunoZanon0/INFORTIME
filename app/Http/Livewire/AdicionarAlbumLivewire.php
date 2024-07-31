<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use App\Actions\CadastrarAlbumAction;

class AdicionarAlbumLivewire extends Component
{
    public $album;
    public $descricao;
    public $estilo;
    public $dados_user;
    public function mount(){
        $this->dados_user = User::where('email',auth()->user()->email)->first();
    }

    public function salvar(){

        $dados = [
            'name'      => $this->album,
            'estilo'    => $this->estilo,
            'descricao' => $this->descricao
        ];

        foreach($dados as $inputs){
            if(!$inputs){
                session()->flash('message_erro', "Todos os campos devem ser preenchidos!");
                return;
            }
        }

        $adicionando = CadastrarAlbumAction::run($dados); // Instancia a Action para a chamada da API

        if($adicionando['Cadastro'])  session()->flash('message', "Usuario criado com sucesso!");
        if(!$adicionando['Cadastro']) session()->flash('message', "$adicionando[msg]");
    }
    public function retornar(){
        return redirect('/home');
    }
    public function render()
    {
        return view('livewire.album');
    }
}

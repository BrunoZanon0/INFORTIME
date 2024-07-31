<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use App\Models\Album;
use App\Actions\CadastrarFaixaAction;

class AdicionarFaixaLivewire extends Component
{
    public $album;
    public $descricao;
    public $faixa;
    public $estilo;
    public $minutos;
    public $segundos;
    public $dados_user;
    public $dados_album;

    public function mount(){
        $this->dados_user = User::where('email',auth()->user()->email)->first();
        $this->dados_album  = Album::leftJoin('users as U','U.id','user')
        ->select('Albums.name as album','status', 'U.name','Albums.descricao','Albums.estilo','Albums.id','Albums.created_at')
        ->where('status','active')->get();
    }

    public function salvar(){

        function zero_esquerda($indice){
            $tempo = $indice <= 9 ? "0" . $indice : $indice;

            return $tempo;
        }
        $tempo_musica   = zero_esquerda($this->minutos).':'.zero_esquerda($this->segundos);

        $dados = [
            'name'      => $this->faixa,
            'estilo'    => $this->estilo,
            'descricao' => $this->descricao,
            'duracao'   => $tempo_musica,
            'album_id'  => $this->album
        ];

        foreach($dados as $inputs){
            if(!$inputs){
                session()->flash('message_erro', "Todos os campos devem ser preenchidos!");
                return;
            }
        }

        $adicionando = CadastrarFaixaAction::run($dados); // Instancia a Action para a chamada da API

        if($adicionando['Cadastro'])  session()->flash('message', "Usuario criado com sucesso!");
        if(!$adicionando['Cadastro']) session()->flash('message', "$adicionando[msg]");

        return view('livewire.faixa');

    }
    public function retornar(){
        return redirect('/home');
    }
    public function render()
    {
        return view('livewire.faixa');
    }
}

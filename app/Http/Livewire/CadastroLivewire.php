<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Actions\CadastrarUserAction;

class CadastroLivewire extends Component
{
    public $senha1;
    public $senha2;
    public $nome;

    public $email;
    public function cadastrar(){

        $inputs = [$this->senha1 , $this->senha2 , $this->nome, $this->email];

        foreach($inputs as $values){
            if(!$values){
                session()->flash('message_erro', "Campo $values não preenchido");
                return;
            }
        }

        if($this->senha1 != $this->senha2){
            session()->flash('message_erro', "Senhas não são iguais");
            return;
        }

        $dados = [
            "name" => $this->nome,
            "senha" => $this->senha1,
            "email" => $this->email
        ];

        $criando_user = CadastrarUserAction::run($dados);

        if($criando_user['Cadastro']) session()->flash('message', "Usuario criado com sucesso!");
        if(!$criando_user['Cadastro']) session()->flash('message', "$criando_user[msg]");

    }
    public function render()
    {
        return view('livewire.cadastro');
    }
}

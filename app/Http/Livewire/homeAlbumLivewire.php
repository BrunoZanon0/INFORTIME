<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use App\Models\Album;

class HomeAlbumLivewire extends Component
{
    public $search;
    public $dados_user;
    public $dados_album;
    public function mount(){
        $this->dados_user   = User::where('email',auth()->user()->email)->first();
        $this->dados_album  = Album::leftJoin('users as U','U.id','user')
        ->select('Albums.name as album','status', 'U.name','Albums.descricao','Albums.estilo','Albums.id','Albums.created_at')
        ->where('status','active')->get();
    }

    public function album(){
        return redirect('/adicionar/album');
    }

    public function faixa(){
        return redirect('/adicionar/faixa');
    }

    public function faixa_descr($id){
        return redirect("/desc/album/$id");
    }

    public function deletar_album($id)
    {
        $album = Album::find($id);

        if ($album) {

            $album->update(['status' => 'deleted']);

            session()->flash('message', 'Álbum excluído com sucesso.');
        } else {
            session()->flash('message_erro', 'Álbum não encontrado.');
        }

        $this->dados_album  = Album::leftJoin('users as U','U.id','user')
        ->select('Albums.name as album','status', 'U.name','Albums.descricao','Albums.estilo','Albums.id','Albums.created_at')
        ->where('status','active')->get();
    }

    public function search(){
        $this->dados_album  = Album::leftJoin('users as U','U.id','user')
        ->select('Albums.name as album','status', 'U.name','Albums.descricao','Albums.estilo','Albums.id','Albums.created_at')
        ->where('status','active')->where('Albums.name','like',"%{$this->search}%")->get();
    }

    public function deslogar(){
        Auth::logout();

        session()->flush();

        return redirect('/');
    }
    public function render()
    {
        return view('livewire.home');
    }
}

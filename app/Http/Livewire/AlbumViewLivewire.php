<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use App\Models\Album;
use App\Models\Faixa;
use App\Actions\CadastrarFaixaAction;

class AlbumViewLivewire extends Component
{
    public $album;
    public $descricao;
    public $faixa;
    public $estilo;
    public $minutos;
    public $segundos;
    public $dados_user;
    public $dados_faixas;
    public $id_album;

    public function mount($id)
    {
        $this->id_album = $id;

        $this->dados_user = User::where('email',auth()->user()->email)->first();
        $this->dados_faixas = Faixa::leftJoin('albums as A', 'A.id', '=', 'faixas.album_id')
                                    ->leftJoin('users as B','B.id','faixas.user_id')
                                    ->select('faixas.*', 'A.status as status_album', 'A.name as name_album','B.name as name_user')
                                    ->where('faixas.status', 'active')
                                    ->where('faixas.album_id',$this->id_album)
                                    ->get();

    }
    public function retornar(){
        return redirect('/home');
    }

    public function deletar_faixa($id)
    {
        $album = Faixa::find($id);

        if ($album) {

            $album->update(['status' => 'deleted']);

            session()->flash('message', 'Álbum excluído com sucesso.');
        } else {
            session()->flash('message_erro', 'Álbum não encontrado.');
        }

        $this->dados_faixas = Faixa::leftJoin('albums as A', 'A.id', '=', 'faixas.album_id')
                                    ->leftJoin('users as B','B.id','faixas.user_id')
                                    ->select('faixas.*', 'A.status as status_album', 'A.name as name_album','B.name as name_user')
                                    ->where('faixas.status', 'active')
                                    ->where('faixas.album_id',$this->id_album)
                                    ->get();
    }
    public function render()
    {
        return view('livewire.album-desc');
    }
}

<?php

namespace App\Actions;

use App\Models\User;
use Illuminate\Support\Facades\Log;
use App\Services\ApiTrainee;
use App\Models\Album;

class CadastrarAlbumAction
{
    private function handle($dados)
    {
        try {
                // Verificar se o album já está cadastrado
        $checagem_exist = Album::where('name', $dados['name'])->count();

        if ($checagem_exist) {
            return ['status' => 400, 'msg' => "O album já está cadastrado", "Cadastro" => false];
        }

        $apiTrainee = new ApiTrainee();

        $result = $apiTrainee->cadastroAlbum($dados);

        if ($result['status'] == 200) {
            return ['status' => 200, 'msg' => "Album Cadastrado!", "Cadastro" => true];
        } else {
            return $result;
        }

        } catch (\Exception  $e) {
            Log::error("====== inicio log criacao de album da dupla handle ========== ");
            Log::error($e);
            Log::error("====== fim log criacao de album da dupla handle ========== ");
        }
    }

    public static function run($dados)
    {
        return (new self())->handle($dados);
    }
}

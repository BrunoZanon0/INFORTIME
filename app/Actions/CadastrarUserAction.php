<?php

namespace App\Actions;

use App\Models\User;
use Illuminate\Support\Facades\Log;
use App\Services\ApiTrainee;

class CadastrarUserAction
{
    private function handle($dados)
    {
        try {
                // Verificar se o email já está cadastrado
        $checagem_exist = User::where('email', $dados['email'])->count();

        if ($checagem_exist) {
            return ['status' => 400, 'msg' => "O email já está cadastrado", "Cadastro" => false];
        }

        $apiTrainee = new ApiTrainee();

        $result = $apiTrainee->cadastroUser($dados);

        if ($result['status'] == 200) {
            return ['status' => 200, 'msg' => "Usuário cadastrado!", "Cadastro" => true];
        } else {
            return $result;
        }

        } catch (\Exception  $e) {
            Log::error("====== inicio log criacao de conta da dupla handle ========== ");
            Log::error($e);
            Log::error("====== fim log criacao de conta da dupla handle ========== ");
        }
    }

    public static function run($dados)
    {
        return (new self())->handle($dados);
    }
}

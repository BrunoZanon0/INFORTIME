<?php

namespace App\Actions;

use App\Models\User;
use Illuminate\Support\Facades\Log;
use App\Services\ApiTrainee;
use App\Models\Faixa;

class CadastrarFaixaAction
{
    private function handle($dados)
    {
        try {
                // Verificar se a faixa já está cadastrado
        $checagem_exist = Faixa::where('name', $dados['name'])->count();

        if ($checagem_exist) {
            return ['status' => 400, 'msg' => "A Faixa já está cadastrado", "Cadastro" => false];
        }

        $apiTrainee = new ApiTrainee();

        $result = $apiTrainee->CadastroFaixa($dados);

        if ($result['status'] == 200) {
            return ['status' => 200, 'msg' => "Faixa Cadastrado!", "Cadastro" => true];
        } else {
            return $result;
        }

        } catch (\Exception  $e) {
            Log::error("====== inicio log criacao de faixa da dupla handle ========== ");
            Log::error($e);
            Log::error("====== fim log criacao de faixa da dupla handle ========== ");
        }
    }

    public static function run($dados)
    {
        return (new self())->handle($dados);
    }
}

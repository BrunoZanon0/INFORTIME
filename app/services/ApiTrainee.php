<?php

namespace App\Services;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Log; // Caso deva criar uma coluna de log ou uma tabela
use App\Models\User;
use App\Models\Album;
use App\Models\Faixa;

class ApiTrainee
{
    public function cadastroUser($dados){
        try {
            // Simular a chamada à API externa
            $payload = true; // Simular sucesso da operação

            if ($payload) {
                User::updateOrCreate([
                    'email' => $dados['email'],
                ], [
                    'name' => $dados['name'],
                    'password' => bcrypt($dados['senha'])
                ]);

                return ['status' => 200, 'msg' => "Usuário cadastrado!", "Cadastro" => true];
            }

            return ['status' => 400, 'msg' => "Falha ao cadastrar usuário", "Cadastro" => false];

        } catch (RequestException $e) {
            Log::error("====== início log api trainee ========== ");
            Log::error($e->getMessage());
            Log::error("====== fim log api trainee ========== ");

            return ['status' => 500, 'msg' => "Erro interno", "Cadastro" => false];
        }
    }

    public function cadastroAlbum($dados){

        try {
            // Simular a chamada à API externa
            $payload = true; // Simular sucesso da operação

            if ($payload) {
                Album::updateOrCreate([
                    'name'      => $dados['name'],
                ], [
                    'estilo'    => $dados['estilo'],
                    'descricao' => $dados['descricao'],
                    'status'    => 'active',
                    'user'      => auth()->user()->id
                ]);

                return ['status' => 200, 'msg' => "Album cadastrado!", "Cadastro" => true];
            }

            return ['status' => 400, 'msg' => "Falha ao cadastrar O Album", "Cadastro" => false];

        } catch (RequestException $e) {
            Log::error("====== início log api trainee ========== ");
            Log::error($e->getMessage());
            Log::error("====== fim log api trainee ========== ");

            return ['status' => 500, 'msg' => "Erro interno", "Cadastro" => false];
        }
    }

    public function CadastroFaixa($dados){

        try {
            // Simular a chamada à API externa
            $payload = true; // Simular sucesso da operação

            if ($payload) {
                Faixa::updateOrCreate([
                    'name'      => $dados['name'],
                ], [
                    'estilo'    => $dados['estilo'],
                    'descricao' => $dados['descricao'],
                    'name'      => $dados['name'],
                    'duracao'   => $dados['duracao'],
                    'album_id'  => $dados['album_id'],
                    'status'    => 'active',
                    'user_id'   => auth()->user()->id
                ]);

                return ['status' => 200, 'msg' => "Album cadastrado!", "Cadastro" => true];
            }

            return ['status' => 400, 'msg' => "Falha ao cadastrar O Album", "Cadastro" => false];

        } catch (RequestException $e) {
            Log::error("====== início log api trainee ========== ");
            Log::error($e->getMessage());
            Log::error("====== fim log api trainee ========== ");

            return ['status' => 500, 'msg' => "Erro interno", "Cadastro" => false];
        }
    }
}

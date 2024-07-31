<div class="row w-100">
    <button class="btn btn-primary w-75 m-auto" wire:click='retornar'><i class="bi bi-arrow-left" ></i> Retornar</button>
    @if (Session::has('message'))
    <div class="alert alert-success border-0 bg-success alert-dismissible fade show py-1 col-xl-9 mx-auto">
        <div class="d-flex align-items-center">
            <div class="font-35 text-white">
                <i class='bx bxs-check-circle'></i>
            </div>
            <div class="ms-3">
                <h6 class="mb-0 text-white">Aviso</h6>
                <div class="text-white">{{ session('message') }}</div>
            </div>
        </div>
    </div>
    @elseif (Session::has('message_erro'))
    <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show py-1 col-xl-9 mx-auto">
        <div class="d-flex align-items-center">
            <div class="font-35 text-white">
                <i class='bx bx-error-circle'></i>
            </div>
            <div class="ms-3">
                <h6 class="mb-0 text-white">Aviso</h6>
                <div class="text-white">{{ session('message_erro') }}</div>
            </div>
        </div>
    </div>
@endif
    <div class="col-xl-9 mx-auto" style="margin-top:2%">
        <div class="card"><br>
            <h6 class="m-auto text-center p-10" >Aqui você verá todas as faixas do album</h6>
            <div class="card-body text-center">
                <table class="table mb-0 table-striped m-auto">
                    <thead class="m-auto">
                        <tr class="m-auto text-center">
                            <th scope="col">#</th>
                            <th scope="col">Nome faixa</th>
                            <th scope="col">Estilo</th>
                            <th scope="col">descricao</th>
                            <th scope="col">Album</th>
                            <th scope="col">Cadastrado por:</th>
                            <th scope="col">Cadastro</th>
                            <th scope="col">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($dados_faixas && $dados_faixas != '[]')
                            @foreach ($dados_faixas as $item)
                            <tr class="text-center">
                                <th scope="row">{{ $item->id }}</th>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->estilo }}</td>
                                <td>{{ $item->descricao }}</td>
                                <td>{{ $item->name_album }}</td>
                                <td>{{ $item->name_user }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->created_at)->format('H:i - d/m/Y') }}</td>
                                <td>
                                    <button class="btn btn-danger" wire:click='deletar_faixa({{ $item->id }})'>
                                    <i class="bi bi-trash-fill"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        @else
                            <tr class="text-center">
                                <th scope="row">-</th>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

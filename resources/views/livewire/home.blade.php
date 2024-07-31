<div class="row w-100">
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
            <h6 class="m-auto text-center p-10" >Olá novamente<br>{{ $dados_user['name'] }}<br><br> O que você quer fazer?</h6>
            <div class="card-body text-center">
                <button class="btn btn-success" wire:click='album'><i class="bi bi-plus-circle-dotted"></i> Album</button>
                <button class="btn btn-primary"wire:click='faixa'><i class="bi bi-plus-circle-dotted"></i> Musica</button><br><br>
                <input type="search" wire:model.defer='search'class="form-control w-25 m-auto" placeholder="Deseja pesquisar por algum album?"><br><button class="btn btn-primary" wire:click='search'><i class="bi bi-search"></i></button><br><br>
                <table class="table mb-0 table-striped m-auto">
                    <thead class="m-auto">
                        <tr class="m-auto text-center">
                            <th scope="col">#</th>
                            <th scope="col">Album</th>
                            <th scope="col">Criado</th>
                            <th scope="col">Usuario responsavel</th>
                            <th scope="col">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($dados_album)
                            @foreach ($dados_album as $item)
                                <tr class="text-center">
                                    <th scope="row">{{ $item->id }}</th>
                                    <td>{{ $item->album }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->created_at)->format('H:i - d/m/Y') }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        <button class="btn btn-primary" wire:click='faixa_descr({{ $item->id }})'>
                                            <i class="bi bi-music-note-list"></i>
                                        </button>

                                        <button class="btn btn-danger" wire:click='deletar_album({{ $item->id }})'>
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
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <button class="btn btn-danger w-25 m-auto" wire:click="deslogar"><i class="bi bi-box-arrow-left"></i> Deslogar</button><br>
        </div>
    </div>
</div>

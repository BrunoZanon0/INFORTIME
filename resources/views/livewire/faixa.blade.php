<div class="row w-100">
    <button class="btn btn-primary w-75 m-auto" wire:click='retornar'><i class="bi bi-arrow-left" ></i> Retornar</button>
    @if (Session::has('message'))
        <div class="alert alert-success border-0 bg-success alert-dismissible fade show py-1 w-75 m-auto">
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
        <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show py-1 w-75 m-auto">
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
    <div class="col-xl-9 mx-auto " style="margin-top: 2%">
        <div class="card">
            <div class="card-body text-center w-50 m-auto">

                <div class="card-title d-flex align-items-center">
                    <div><i class="bx bxs-user me-1 font-22 text-info"></i>
                    </div>
                    <h5 class="mb-0 text-success m-auto">Adicionar um novo album</h5>
                </div>
                <br>
                <div class="row mb-3">
                    <label for="inputEnterYourName" class="col-sm-3 col-form-label">Nome</label>
                    <div class="col-sm-9">
                        <input type="text" wire:model.defer="faixa" class="form-control" id="inputEnterYourName" placeholder="Ex: Paixão da meia noite">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputEnterYourName" class="col-sm-3 col-form-label">Album</label>
                    <div class="col-sm-9">
                        <select class="select_album form-control" wire:model.defer="album" name="album" id="album">
                            <option value="" selected>Selecione</option>
                            @foreach ($dados_album as $item)
                                <option value="{{ $item->id }}">{{ $item->album }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="estilo" class="col-sm-3 col-form-label">Estilo Musical</label>
                    <div class="col-sm-9">
                        <input type="text" wire:model.defer="estilo" class="form-control" id="estilo" placeholder="Ex: Sertanejo">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="seu_tempo" class="col-sm-3 col-form-label">Duração min.</label>
                    <div class="col-sm-9">
                        <input type="number" wire:model.defer="minutos" name="seu_tempo" id="seu_tempo" placeholder="Ex: minutos" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="segundos" class="col-sm-3 col-form-label">Duração sec.</label>
                    <div class="col-sm-9">
                        <input type="number" wire:model.defer="segundos" name="segundos" id="seu_tempo" placeholder="Ex: segundos" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="desc" class="col-sm-3 col-form-label">Descrição</label>
                    <div class="col-sm-9">
                        <input type="text" wire:model.defer="descricao" class="form-control" id="desc" placeholder="Ex: Esse album foi muito importante para minha trajetoria pois isso aconteceu e ...">
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-3 col-form-label"></label>
                        <button type="button" wire:click="salvar" class="btn btn-success w-50">Register</button>
                </div>
            </div>
        </div>
    </div>
</div>

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
                    <label for="inputEnterYourName" class="col-sm-3 col-form-label">Nome do album</label>
                    <div class="col-sm-9">
                        <input type="text" wire:model.defer="album" class="form-control" id="inputEnterYourName" placeholder="Ex: Paixão da meia noite">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputEnterYourName" class="col-sm-3 col-form-label">Estilo Musical</label>
                    <div class="col-sm-9">
                        <input type="text" wire:model.defer="estilo" class="form-control" id="inputEnterYourName" placeholder="Ex: Sertanejo">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputEnterYourName" class="col-sm-3 col-form-label">Descrição</label>
                    <div class="col-sm-9">
                        <input type="text" wire:model.defer="descricao" class="form-control" id="inputEnterYourName" placeholder="Ex: Esse album foi muito importante para minha trajetoria pois isso aconteceu e ...">
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

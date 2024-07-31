<div class="row w-50 m-auto ">
    @if (Session::has('message'))
        <div class="alert alert-success border-0 bg-success alert-dismissible fade show py-1 w-50 m-auto">
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
        <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show py-1 w-50 m-auto">
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
    <div class="col-xl-7 mx-auto">
        <div class="card border-0  >
            <div class="card-body p-5">
                <div class="card-title text-center"><i class="bx bxs-user-circle text-dark font-50"></i>
                    <h5 class="mb-5 mt-2 text-dark">Cadastrar Usuario</h5>
                </div>
                <form class="row g-3">
                    <div class="col-12">
                        <label for="inputLastEnterUsername" class="form-label">Nome</label>
                        <div class="input-group input-group-lg"> <span class="input-group-text bg-transparent"><i class="bi bi-person-fill"></i></span>
                            <input type="text" wire:model.defer='nome' class="form-control border-start-0" id="inputLastEnterUsername" placeholder="Nome de login">
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="inputLastEnterUsername" class="form-label">Nome</label>
                        <div class="input-group input-group-lg"> <span class="input-group-text bg-transparent"><i class="bi bi-envelope-fill"></i></span>
                            <input type="text" wire:model.defer='email' class="form-control border-start-0" id="inputEmail" placeholder="Email Completo">
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="inputLastEnterPassword" class="form-label">Senha</label>
                        <div class="input-group input-group-lg"> <span class="input-group-text bg-transparent"><i class="bi bi-key chave_pass"></i></span>
                            <input type="password" wire:model.defer='senha1' class="form-control border-start-0" id="inputLastEnterPassword" placeholder="Senha">
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="inputLastEnterPassword" class="form-label">Digite a senha novamente</label>
                        <div class="input-group input-group-lg"> <span class="input-group-text bg-transparent"><i class="bi bi-key chave_pass"></i></span>
                            <input type="password" wire:model.defer='senha2' class="form-control border-start-0" id="inputLastEnterPassword" placeholder="Senha">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="d-grid">
                            <button type="button" wire:click='cadastrar' class="btn btn-primary btn-lg px-5"><i class="bx bxs-lock-open"></i>Cadastrar</button><br>
                            <a href="{{ route('login') }}" class="btn btn-success w-50 m-auto">Retornar</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $('#gridCheck3').on('click', function(e) {
            let valor = $(this).is(':checked');
            if(valor){
                swal("Sucesso","Você será lembrado da proxima vez","success")
            }
        })

        $(".chave_pass").on('click', function(e) {
            let $input = $("#inputLastEnterPassword");
            let currentType = $input.attr('type');

            $input.attr('type', currentType === 'password' ? 'text' : 'password');
        });
    </script>
</div>

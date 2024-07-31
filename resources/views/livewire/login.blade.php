    <div class="row w-50 m-auto">
        <div class="col-xl-7 mx-auto">
            <div class="card border-0  >
                <div class="card-body p-5">
                    <div class="card-title text-center"><i class="bx bxs-user-circle text-dark font-50"></i>
                        <h5 class="mb-5 mt-2 text-dark">Logar</h5>
                    </div>
                    <form class="row g-3">
                        @csrf
                        <div class="col-12">
                            <label for="inputLastEnterUsername" class="form-label">Email</label>
                            <div class="input-group input-group-lg"> <span class="input-group-text bg-transparent"><i class="bi bi-person-fill"></i></span>
                                <input type="text" wire:model.defer="email" class="form-control border-start-0" id="inputLastEnterUsername" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="inputLastEnterPassword" class="form-label">Senha</label>
                            <div class="input-group input-group-lg"> <span class="input-group-text bg-transparent"><i class="bi bi-key chave_pass"></i></span>
                                <input type="password" wire:model.defer="password" class="form-control border-start-0" id="inputLastEnterPassword" placeholder="Senha">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck3">
                                <label class="form-check-label" for="gridCheck3">Check me out</label>
                            </div>
                        </div>
                        <div class="col-md-6 text-end">	<a href="{{ route('cadastro') }}">Cadastrar Usuario?</a>
                        </div>
                        <div class="col-12">
                            <div class="d-grid">
                                <button type="button" wire:click="logando" class="btn btn-success btn-lg px-5"><i class="bx bxs-lock-open"></i>Login</button>
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

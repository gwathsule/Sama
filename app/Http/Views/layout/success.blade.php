<!--
|   Recebe e exibe as mensagens de sucesso ou de aviso vindas do controler.
-->
@if (session('success'))
    <button type="button" id="btn_modal_sucess" class="btn btn-primary" data-toggle="modal" data-target="#modal_success" style="display: none">
        Launch demo modal
    </button>

    <div class="modal fade " id="modal_success" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content alert alert-success">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body ">
                    @if(is_array(session('success')))
                        <ul>
                        @foreach(session('success') as $message)
                                <li><strong>{{ session('success') }}</strong><br></li>
                        @endforeach
                        </ul>
                    @else
                        <strong>{{ session('success') }}</strong>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
@endif

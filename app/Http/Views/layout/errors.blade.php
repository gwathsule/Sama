{{--dd($errors)--}}
@if (count($errors) > 0)
    <button type="button" id="btn_modal_errors" class="btn btn-primary" data-toggle="modal" data-target="#modal_errors" style="display: none">
        Launch demo modal
    </button>
    <!-- Modal -->
    <div class="modal fade " id="modal_errors" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content alert alert-danger">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Erro(s) encontrado(s):</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body ">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
@endif

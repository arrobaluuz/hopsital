<div class="modal fade" id="CE-especialidad" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear especialidad</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formEsp" class="form" method="POST" action="{{route('especialidad.store')}}">
                    @csrf
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="nc-icon nc-badge"></i>
                            </span>
                        </div>
                        <!-- puras letras -->
                        <input class="form-control" name="nombre" placeholder="nombre" type="text" required maxlength="50">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button id="btn-g-d" type="button" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>
<script>
    $("#btn-g-d").click(function() {
        if( $("#formEsp").valid() == true){
            /* showLoad() */
            $("#formEsp").submit()
        }else{
            /* toastr.error('Verifica los datos') */
            return false;
        }
    });
</script>
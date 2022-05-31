<div class="modal fade" id="CE-especialidad" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="titleEsp" class="modal-title" id="exampleModalLabel">Crear especialidad</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formEsp" class="form" method="POST" action="">
                    @csrf
                   <!--  {{route('especialidad.store')}} -->
                    <input id="input_method" type="hidden" name="_method" value="" />
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa-solid fa-notes-medical"></i>
                            </span>
                        </div>
                        <input id="nombreEsp" class="form-control" name="nombre" placeholder="Especialidad" type="text" required maxlength="50">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa-regular fa-circle-xmark"></i></button>
                <button id="btn-g-e" type="button" class="btn btn-primary"><i class="fa-regular fa-floppy-disk"></i></button>
            </div>
        </div>
    </div>
</div>
<script>
    $("#btn-g-e").click(function() {
        if( $("#formEsp").valid() == true){
            /* showLoad() */
            $("#formEsp").submit()
        }else{
            /* toastr.error('Verifica los datos') */
            return false;
        }
    });
</script>
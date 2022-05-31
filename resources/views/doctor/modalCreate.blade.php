<div class="modal fade" id="exampleModal" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="title" class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- El metodo no se borra {{route('doctor.store')}} -->
                <form id="formCreateDoctor" class="form" method="POST" action="">
                    @csrf
                    <input id="input_method" type="hidden" name="_method" value="" />
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="nc-icon nc-single-02"></i>
                            </span>
                        </div>
                        <input id="nombres" class="form-control" placeholder="Nombres" type="text" name="nombres" value="" required autofocus>
                        <input id="apellidos" class="form-control" placeholder="Apellidos" type="text" name="apellidos" value="" required>
                    </div>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa-solid fa-note-sticky"></i>
                            </span>
                        </div>
                        <input id="curp" class="form-control" name="curp" placeholder="CURP" type="text" required maxlength="18"
                        onkeypress="return (event.charCode >= 48 && event.charCode <= 57 || event.charCode >= 97 && event.charCode <= 122 || event.charCode >= 65 && event.charCode <= 90 )"
                        style="text-transform:uppercase;">
                    </div>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa-solid fa-id-card-clip"></i>
                            </span>
                        </div>
                        <input id="cedula" class="form-control" name="cedula" placeholder="Cédula" type="text" required  minlength="7" maxlength="8"
                        onkeypress="return (event.charCode >= 48 && event.charCode <= 57 || event.charCode >= 97 && event.charCode <= 122 || event.charCode >= 65 && event.charCode <= 90 )"
                        style="text-transform:uppercase;">
                        @if ($errors->has('cedula'))
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('cedula') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa-solid fa-at"></i>
                            </span>
                        </div>
                        <input id="correo" class="form-control" name="correo" placeholder="Correo" type="email" required>
                    </div>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa-solid fa-phone"></i>
                            </span>
                        </div>
                        <input id="telefono" class="form-control" name="telefono" placeholder="Telefono" type="text" maxlength="10"
                        onkeypress="return (event.charCode >= 48 && event.charCode <= 57)">
                    </div>
                    <select id="especialidad-select" name="especialidad" style="width:100%; height: 34px !important;padding: 0 0 0 12px !important;line-height: 32px !important">
                        <option></option>
                        <option value="1">Cardiología</option>
                        <option value="2">Cirugía plastica</option>
                        <option value="3">Odontología</option>
                    </select>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button id="btn-g-d" type="button" class="btn btn-primary">Agregar</button>
            </div>
        </div>
    </div>
</div>

<script>
        $("#btn-g-d").click(function() {
           /*  alert("Validacion: " + );
            return false; */
            if( $("#formCreateDoctor").valid() == true){
                /* showLoad() */
                $("#formCreateDoctor").submit()
            }else{
                /* toastr.error('Verifica los datos') */
                return false;
            }
        });

    $(document).ready( function () {
        $('#especialidad-select').select2({
                dropdownParent: $('#exampleModal .modal-body'),
                placeholder: '<i class="fa-solid fa-stethoscope"></i> Selecciona una especialidad',
                escapeMarkup: function (markup) { return markup; }
        });
    });
</script>
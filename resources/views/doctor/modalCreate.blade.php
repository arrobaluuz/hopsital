<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear doctor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formCreateDoctor" class="form" method="POST" action="{{route('doctor.store')}}">
                    @csrf
                    @method('POST')
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="nc-icon nc-single-02"></i>
                            </span>
                        </div>
                        <input class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Nombres" type="text" name="nombres" value="" required autofocus>
                        <input class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Apellidos" type="text" name="apellidos" value="" required>
                    </div>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="nc-icon nc-single-02"></i>
                            </span>
                        </div>
                        <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="curp" placeholder="CURP" type="text" required maxlength="18"
                        onkeypress="return (event.charCode >= 48 && event.charCode <= 57 || event.charCode >= 97 && event.charCode <= 122 || event.charCode >= 65 && event.charCode <= 90 )"
                        style="text-transform:uppercase;">
                    </div>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="nc-icon nc-single-02"></i>
                            </span>
                        </div>
                        <input class="form-control {{ $errors->has('cedula') ? ' is-invalid' : '' }}" name="cedula" placeholder="Cédula" type="text" required  minlength="7" maxlength="8"
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
                                <i class="nc-icon nc-single-02"></i>
                            </span>
                        </div>
                        <input class="form-control {{ $errors->has('correo') ? ' is-invalid' : '' }}" name="correo" placeholder="Correo" type="email" required>
                    </div>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="nc-icon nc-single-02"></i>
                            </span>
                        </div>
                        <input class="form-control" name="telefono" placeholder="Telefono" type="text" maxlength="10"
                        onkeypress="return (event.charCode >= 48 && event.charCode <= 57)">
                    </div>
                    <select id="especialidad-select" name="especialidad" class="form-select" aria-label="Default select example" style="width:100%; height: 34px !important;padding: 0 0 0 12px !important;line-height: 32px !important">
                        <option></option>
                        <option value="1">Cardiología</option>
                        <option value="2">Cirugía plastica</option>
                        <option value="3">Odontología</option>
                    </select>
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
</script>
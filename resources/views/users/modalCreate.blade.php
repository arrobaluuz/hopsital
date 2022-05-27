<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card card-signup text-center">
                    <div class="card-header ">
                        <h4 class="card-title">Registar</h4>
                    </div>
                    <div class="card-body ">
                        <form class="form" method="POST" action="{{route('registrar') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="padding: 0 10px;">
                                        <i class="fa-solid fa-camera"></i>
                                    </span>
                                </div>
                                <input name="file" type="file" class="form-control" placeholder="Foto de perfil" required>
                            </div>
                            <div class="input-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="padding: 0 10px;">
                                        <i class="nc-icon nc-single-02"></i>
                                    </span>
                                </div>
                                <input name="name" type="text" class="form-control" placeholder="Nombre" value="{{ old('name') }}" required autofocus>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="input-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="padding: 0 10px;">
                                        <i class="nc-icon nc-email-85"></i>
                                    </span>
                                </div>
                                <input name="email" type="email" class="form-control" placeholder="Correo" required value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="input-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="padding: 0 10px;">
                                        <i class="nc-icon nc-key-25"></i>
                                    </span>
                                </div>
                                <input name="password" type="password" class="form-control" placeholder="Contraseña" required>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="padding: 0 10px;">
                                        <i class="nc-icon nc-key-25"></i>
                                    </span>
                                </div>
                                <input name="password_confirmation" type="password" class="form-control" placeholder="Confirma tu contraseña" required>
                                @if ($errors->has('password_confirmation'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-regular fa-circle-xmark fa-2x"></i></button>
                    <button type="submit" type="button" class="btn btn-primary"><i class="fa-regular fa-floppy-disk fa-2x"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>








                    
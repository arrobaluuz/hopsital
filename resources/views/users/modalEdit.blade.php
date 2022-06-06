<div class="modal fade" id="resetPassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card card-signup text-center">
                    <div class="card-header ">
                        <h4 class="card-title">Resetear contraseña</h4>
                    </div>
                    <div class="card-body ">
                        <form id="formReset" class="form" method="PUT" action="">
                            @csrf
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="padding: 0 10px;">
                                        <i class="nc-icon nc-key-25"></i>
                                    </span>
                                </div>
                                <input name="pass" type="password" class="form-control" placeholder="contraseña" required>
                            </div>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="padding: 0 10px;">
                                        <i class="nc-icon nc-key-25"></i>
                                    </span>
                                </div>
                                <input name="passConfirm" type="password" class="form-control" placeholder="confirma la contraseña" required>
                            </div>
                        </form>
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
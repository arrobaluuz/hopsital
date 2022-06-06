<div class="modal fade" id="modal-citas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="titleCita" class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formCitas" class="form" method="POST" action="">
                    @csrf
                    <input id="input_method" type="hidden" name="_method" value="" />
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa-regular fa-calendar"></i>
                            </span>
                        </div>
                        <input id="diaCita" class="form-control" name="dia"  type="date" required
                        value="{{Carbon\Carbon::now()->format('Y-m-d')}}" 
                        min="{{Carbon\Carbon::now()->format('Y-m-d')}}">
                    </div>


                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa-regular fa-clock"></i>
                            </span>
                        </div>
                        <input id="hora" class="form-control" name="hora" type="time" value="13:00" required>
                    </div>

                    <select id="doctor-select" name="id_doctor" style="width:100%; height: 34px !important;padding: 0 0 0 12px !important;line-height: 32px !important">
                        <option></option>
                        @foreach($doctores as $item)
                            <option value="{{$item->_id}}">{{$item->nombres}} {{$item->apellidos}}</option>
                        @endforeach
                    </select>



                    <div class="input-group" style="margin-top: 10px;">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa-solid fa-clipboard"></i>
                            </span>
                        </div>
                        <input id="notas" class="form-control" name="notas" placeholder="Notas" type="text" required>
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
        if( $("#formCitas").valid() == true){
            /* showLoad() */
            $("#formCitas").submit()
        }else{
            /* toastr.error('Verifica los datos') */
            return false;
        }
    });


    $(document).ready( function () {
        $('#doctor-select').select2({
                dropdownParent: $('#modal-citas .modal-body'),
                placeholder: '<i class="fa-solid fa-stethoscope"></i> Selecciona doctor',
                escapeMarkup: function (markup) { return markup; }
        });
    }); 

</script>
@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'doctors'
])
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card demo-icons">
                    <div class="card-header">
                        <h5 class="card-title">Doctores registrados</h5>
                    </div>
                    <div class="card-body all-icons">
                        <div class="row">
                            <div class="col-12 text-right">
                                <button type="button" class="btn-redondo btn btn-success " data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <i class="fa-solid fa-circle-plus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-12 table-responsive">
                        <table id="index-doctores" class="table">
                        <thead>
                            <tr>
                                <th class="text-center">Cédula profesional</th>
                                <th class="text-center">Nombre</th>
                                <th class="text-center">Especialidad</th>
                                <th class="text-center">Curp</th>
                                <th class="text-center">Correo</th>
                                <th class="text-center">No. teléfono</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($doctores as $doctor)
                            <tr>
                                <td class="text-center">{{$doctor->cedula}}</td>
                                <td class="text-center">{{$doctor->nombres.' '.$doctor->apellidos}}</td>
                                <td class="text-center">{{$doctor->especialidad}}</td>
                                <td class="text-center">{{$doctor->curp}}</td>
                                <td class="text-center">{{$doctor->correo}}</td>
                                <td class="text-center">{{$doctor->telefono}}</td>
                                <td class="text-center">
                                    <a type="button" rel="tooltip" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal" data-object="{{$doctor}}">
                                        <i class="fa-solid fa-pen-to-square" style="color: white;"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@include('doctor.modalCreate')
@endsection
@push('scripts')
    <script>
        /* datatables */
        $(document).ready( function () {
            $('#index-doctores').DataTable( {
				dom: 'Bfrtip',
				buttons: [
					{extend:'copy',exportOptions: {columns: [1,2,3,4,5]}},
					{extend:'print',exportOptions: {columns: [1,2,3,4,5]}},
					{extend:'csv',exportOptions: {columns: [1,2,3,4,5]}},
					{extend:'excel',exportOptions: {columns: [1,2,3,4,5]}},
					{extend:'pdf',exportOptions: {columns: [1,2,3,4,5]}}
				],
	        	"language": {
					"lengthMenu": "Mostrar "+
								'<select class="custom-select custom-select-sm form-control form-control-sm"><option value="10">10</option> <option value="25">25</option> <option value="50">50</option> <option value="100">100</option> <option value="-1">Todos</option></select>'
								+" registros por página",
					"zeroRecords": "Nada encontrado - Disculpa :(",
					"info": "",
					"infoEmpty": "Sin registros disponibles por el momento",
					"infoFiltered": "(filtrado de MAX registros totales)",
					'search':'Buscar:',
					'paginate' :{
						'next':'Siguiente',
						'previous':'Anterior'
					}
				}
			});

            $('#especialidad-select').select2({
                dropdownParent: $('#exampleModal .modal-body'),
                placeholder: '<i class="fa-solid fa-stethoscope"></i>    Selecciona una especialidad',
                escapeMarkup: function (markup) { return markup; }
            });

        } );
        /* end datatables */
        
        /* Modal Edit */
        let modalEdit = document.getElementById('exampleModal');
		    modalEdit.addEventListener('show.bs.modal',function(e) {
                //Obtenemos la propiedades del evento. data
                var $this = $(e.relatedTarget);
                const doctor = $this.data('object');
                console.log(doctor)
            });
    </script>
@endpush
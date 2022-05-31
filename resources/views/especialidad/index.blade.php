@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'esp'
])
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card demo-icons">
                    <div class="card-header">
                        <h5 class="card-title">Especialidades</h5>
                    </div>
                    <div class="card-body all-icons">
                        <div class="row">
                            <div class="col-12 text-right">
                                <button type="button" class="btn-redondo btn btn-success " data-bs-toggle="modal" data-bs-target="#CE-especialidad" data-action="create">
                                    <i class="fa-solid fa-circle-plus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-12 table-responsive">
                        <table id="index-doctores" class="table">
                        <thead>
                            <tr>
                                <th class="text-center">Nombre</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($especialidades as $especialidad)
                            <tr>
                                <td class="text-center">{{$especialidad->nombre}}</td>
                                <td class="text-center">
                                    <a type="button" rel="tooltip" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#CE-especialidad" data-object="{{$especialidad}}" data-action="update">
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

@include('especialidad.modalCreateEsp')
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
        
        /* Modal Crete / Edit */
        document.getElementById('CE-especialidad').addEventListener('show.bs.modal',function(e) {
                //Obtenemos la propiedades del evento. data
                var $this = $(e.relatedTarget);
                const action = $this.data('action');
                let actiones = '{{url('')}}/especialidad/es/'
                if(action == 'update'){
                    
                    
                   
                    const especialidad = $this.data('object');
                    const method = "PUT";
                    actiones = actiones + especialidad._id;
                    document.querySelector('#titleEsp').innerHTML="Editar especialidad";
                    document.querySelector('#input_method').value=method;   
                    document.querySelector('#nombreEsp') .value    = especialidad.nombre;
                    $('#formEsp').attr('action',actiones)                                   
                }else{
                    const method = "POST";
                    document.querySelector('#input_method').value=method; 
                    /* crear 
                    method="POST" action="{{route('doctor.store')}}" */
                    document.querySelector('#titleEsp').innerHTML="Crear especialidad";
                    document.querySelector('#nombreEsp') .value    = '';
                    $('#formEsp').attr('action',actiones)
                }
            });;
    </script>
@endpush
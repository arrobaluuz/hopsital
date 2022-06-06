@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'citas'
])
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card demo-icons">
                    <div class="card-header">
                        <h5 class="card-title">Citas</h5>
                    </div>
                    <div class="card-body all-icons">
                        <div class="row">
                            <div class="col-12 text-right">
                                <button type="button" class="btn-redondo btn btn-success " data-bs-toggle="modal" data-bs-target="#modal-citas" data-action="create">
                                    <i class="fa-solid fa-circle-plus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-12 table-responsive">
                        <table id="index-citas" class="table">
                        <thead>
                            <tr>
                                <th class="text-center">Doctor</th>
                                <th class="text-center">Dia</th>
                                <th class="text-center">Hora</th>
                                <th class="text-center">Notas</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($citas as $item)
                            <tr>
                                <td class="text-center">{{$item->doctor}}</td>
                                <td class="text-center">{{$item->dia}}</td>
                                <td class="text-center">{{$item->hora}}</td>
                                <td class="text-center">{{$item->notas}}</td>
                                <td class="text-center">
                                    <a type="button" rel="tooltip" href="{{route('cita.active', $item->_id)}}"
                                        @if( $item->active == 1)
                                            class="btn btn-success btn-sm" >
                                                <i class="fa-solid fa-toggle-on" style="color: white;"></i>
                                        @else
                                            class="btn btn-danger btn-sm" >
                                                <i class="fa-solid fa-toggle-off" style="color: white;"></i>
                                        @endif
                                    </a>
                                    <a type="button" rel="tooltip" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modal-citas" data-object="{{$item}}" data-action="update">
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
@include('citas.modalCreate')
@endsection
@push('scripts')
    <script>
        /* datatables */
        $(document).ready( function () {
            $('#index-citas').DataTable( {
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

           /*  $('#especialidad-select').select2({
                dropdownParent: $('#exampleModal .modal-body'),
                placeholder: '<i class="fa-solid fa-stethoscope"></i>    Selecciona una especialidad',
                escapeMarkup: function (markup) { return markup; }
            }); */

        } );
        /* end datatables */
        
        /* Modal Crete / Edit */
        document.getElementById('modal-citas').addEventListener('show.bs.modal',function(e) {
                //Obtenemos la propiedades del evento. data
                var $this = $(e.relatedTarget);
                const action = $this.data('action');
                let actiones = '{{url('')}}/citas/es/'
                if(action == 'update'){
                    const cita = $this.data('object');
                    console.log(cita);
                    const method = "PUT";
                    actiones = actiones + cita._id;
                    document.querySelector('#titleCita').innerHTML="Editar cita";
                    $('#input_method').val(method); 
                    $('#diaCita').val(cita.dia); 
                    $('#hora').val(cita.hora);  
                    $('#notas').val(cita.notas);
                    $('#doctor-select').val(cita.id_doctor); 
                    $('#doctor-select').trigger('change.select2');
                    $('#formCitas').attr('action',actiones)   
                }else{
                    const method = "POST";
                    $('#input_method').val(method); 
                    $('#formCitas').attr('action',actiones)
                    document.querySelector('#titleCita').innerHTML="Crear cita";
                    $('#nombreEsp') .value = '';
                    $("#doctor-select").val(null).trigger('change'); 
                }
            });;
    </script>
@endpush
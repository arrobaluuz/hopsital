@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'user'
])

@section('content')
    <div class="content">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        @if (session('password_status'))
            <div class="alert alert-success" role="alert">
                {{ session('password_status') }}
            </div>
        @endif
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Users</h3>
                            </div>
                            <div class="col-4 text-right">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <i class="fa-solid fa-circle-plus fa-2x"></i>
                                </button>   
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-12">
                    </div>

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                       <!--  <td>
                                            <a type="button" rel="tooltip" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#resetPassword" data-user="{{$user->_id}}">
                                                <i class="fa-solid fa-pen-to-square" style="color: white;"></i>
                                            </a>
                                        </td> -->
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('users.modalCreate')
    @include('users.modalEdit')
    <script>
         /* Modal Crete / Edit */
        document.getElementById('resetPassword').addEventListener('show.bs.modal',function(e) {
            //Obtenemos la propiedades del evento. data
            var $this = $(e.relatedTarget);
            const user= $this.data('user');
            let actiones = '{{url('')}}/user/reset/'
            actiones = actiones + user;
            $('#formRese').attr('action',actiones)                                   
        });;
    </script>
@endsection

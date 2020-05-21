@extends('admin.layouts.layout')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title text-center">All Users</h3>

                </div>
                <div class="card-body">
                    <div class="toolbar">
                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                        <div class=" col-md-2 ml-auto">
                            <a href="{{ route('admin.users.invite') }}" class="btn btn-info btn-xl "> Invite new User</a>
                        </div>
                    </div>
                    <table id="datatable" class="table table-striped table-bordered dataTable dtr-inline" cellspacing="0" width="100%" role="grid" aria-describedby="datatable_info" style="width: 100%;">                        <thead>
                        <div class="row">
                            <div class="col-md-12">
                            <tr>

                                    <div class="col-md-1">
                                        <th>Id</th>
                                    </div>
                                    <div class="col-md-4">
                                        <th>Name</th>
                                    </div>
                                    <div class="col-md-5">
                                        <th>Email</th>
                                    </div>
                                    <div class="col-md-2">
                                        <th>Actions</th>
                                    </div>
                            </tr>
                            </div>

                        </div>

                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <div class="row">
                                <div class="col-md-12">
                                    <tr>
                                        <div class="col-md-1">
                                            <td>{{ $user->id }}</td>
                                        </div>
                                        <div class="col-md-4">
                                            <td>{{ $user->name }}</td>
                                        </div>
                                        <div class="col-md-5">
                                            <td>{{ $user->email }}</td>
                                        </div>
                                        <div class="col-md-2">
                                            <td>
                                                <a href="{{ route('admin.users.show', $user) }}" class="btn btn-round btn-warning btn-sm"><i class="fa fa-eye"></i></a>
                                                <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-round btn-info btn-sm"><i class="fa fa-pencil-alt"></i></a>
                                                <form action="{{ route('admin.users.destroy', $user) }}" method="post" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-round btn-danger btn-sm" onclick="return confirm('¿Seguro que quieres eliminar este usuario?')">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </div>

                                    </tr>
                                </div>
                            </div>

                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>



@endsection

@push('scripts')

    <script>
        $(function () {
            $('#datatable').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
            });
        });
    </script>
@endpush


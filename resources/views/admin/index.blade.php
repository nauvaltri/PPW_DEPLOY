@extends('admin.layouts')

@section('content')

<div class="position-relative">
    <div class="position-absolute top-0 start-0">
        <h2>Data List CV</h2>
    </div>
    <div class="position-absolute top-0 end-0">
        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            Logout</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
        </form>
    </div>
</div>
<div class="position-relative row justify-content-center mt-5">
    <div class="col-md-12">

        @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
            {{ $message }}
        </div>
        @endif

        <div class="card">
            <div class="card-header">LIST CV yang tersedia</div>
            <div class="card-body">
                <a href="{{ route('admin.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> tambah CV baru</a>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Nama</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Umur</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($CV as $dataCV)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $dataCV->Nama }}</td>
                            <td>{{ $dataCV->Gender }}</td>
                            <td>{{ $dataCV->Umur }}</td>
                            <td>
                                <form action="{{ route('admin.destroy', $dataCV->id) }}" method="post">
                                    @csrf
                                    @method('GET')

                                    <a href="{{ route('admin.show', $dataCV->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>

                                    <a href="{{ route('admin.edit', $dataCV->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>

                                    <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash" onclick="return confirm('Do you want to delete this product?');"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <td colspan="6">
                            <span class="text-danger">
                                <strong>Tidak ada CV ditemukan!</strong>
                            </span>
                        </td>
                        @endforelse
                    </tbody>
                </table>

                {{ $CV->links() }}

            </div>
        </div>
    </div>
</div>

@endsection
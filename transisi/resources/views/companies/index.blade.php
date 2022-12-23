@extends('layouts.app',['title' => 'Companies'])
@section('content')

    <h1 class="h3 mb-2 text-gray-800">Companies</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Company Table</h6>
            <div class="d-flex justify-content-end">
                <a href="{{ route('company.printPDF') }}" style="border-radius: 7px" class="btn btn-danger btn-sm mr-1" target="_blank">PDF</a>
                <a href="{{ route('company.create') }}" style="border-radius: 7px" class="btn btn-primary btn-sm">Add Company</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Logo</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Website</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($companies as $company)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><img src="{{ $company->logo ? asset('storage/'.$company->logo) : asset('default.png')}}"  width="50" height="50" alt=""></td>
                                <td>{{ $company->name }} </td>
                                <td>{{ $company->email }}</td>
                                <td>{{ $company->website }}</td>
                                <td class="d-flex">
                                    <a href="{{ route('company.edit',$company->id) }}" class="btn btn-warning btn-sm" title="edit ?"><i class="fas fa-edit"></i></a>
                                    <form class="ml-1" action="{{ route('company.delete',$company->id) }}" method="POST">
                                        @method("DELETE")
                                        @csrf
                                        <button type="submit" onclick="return confirm('Yakin ingin menghapus data ini? data yang dihapus tidak dapat dikembalikan!')" class="btn btn-danger btn-sm" title="Delete ?"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
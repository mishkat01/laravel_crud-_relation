@extends('dashboard')
@section('pages')
    <table id="default-datatable" class="table table-bordered">
        <thead>
            <tr>
                <th>SL</th>
                <th>Category name</th>
                <th>Action</th>


            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->category_name }}</td>

                    <td>
                        <a href="{{ route('edit.category', $item->id) }}" class="btn btn-info">Edit</a>
                        <a href="{{ route('delete.category', $item->id) }}" class="btn btn-danger" id="deleteButton">Delete</a>
                    </td>

                </tr>
            @endforeach

        </tbody>

    </table>
@endsection

@extends('dashboard')
@section('pages')
    <table id="default-datatable" class="table table-bordered">
        <thead>
            <tr>
                <th>SL</th>
                <th>Category Name</th>
                <th>SubCategory name</th>

                <th>Action</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($subcategories as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <!-- call the category relationship function then access category table fields -->
                    <td>{{ $item['category']['category_name'] ?? 'N/A' }}</td>

                    <td>{{ $item->subcategory_name }}</td>
                    <td>
                        <a href="{{ route('edit.SubCategory', $item->id) }}" class="btn btn-info">Edit</a>
                        <a href="{{ route('delete.SubCategory', $item->id) }}" class="btn btn-danger"
                            id="deleteButton">Delete</a>
                    </td>

                </tr>
            @endforeach

        </tbody>
        <tfoot>
            <tr>
                <th>SL</th>
                <th>Category name</th>
                <th>SubCategory name</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>
@endsection

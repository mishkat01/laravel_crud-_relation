@extends('dashboard')
@section('pages')
    <table id="default-datatable" class="table table-bordered">
        <thead>
            <tr>
                <th>SL</th>
                <th>Product name</th>
                <th>Product Image</th>
                <th>Price</th>
                <th>QTY</th>
                <th>Discount</th>
                <th>Status</th>

                <th>Action</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($products as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->product_name }}</td>
                    <td><img src="{{ asset($item->product_thambnail) }}" style="width:80px; height:60px;"></td>
                    <td>{{ $item->selling_price }}</td>
                    <td>{{ $item->product_qty }}</td>
                    <td>
                        @if ($item->discount_price == null)
                            <span class="badge badge-danger m-1">No discount</span>
                        @else
                            @php
                                $amount = $item->selling_price - $item->discount_price;
                                $discount = ($amount / $item->selling_price) * 100;
                            @endphp
                            <span class="badge badge-dark  m-1">{{ round($discount) }}%</span>
                        @endif
                    </td>




                    <td>
                        @if ($item->status == 1)
                            <span class="badge badge-success m-1">Active</span>
                        @else
                            <span class="badge badge-danger m-1">inactive</span>
                        @endif
                    </td>

                    {{-- <td>
                        <a href="{{ route('edit.product', $item->id) }}" class="btn btn-info btn-sm" title="edit_data"><i
                                class="fa fa-pencil"></i></a>
                        <a href="{{ route('delete.product', $item->id) }}" class="btn btn-danger btn-sm" id="deleteButton"
                            title="Delete"><i class="fa fa-trash"></i></a>
                        <a href="{{ route('delete.product', $item->id) }}" class="btn btn-warning btn-sm" id="deleteButton"
                            title="Details"><i class="fa fa-eye"></i></a>
                        @if ($item->status == 1)
                            <a href="{{ route('delete.product', $item->id) }}" class="btn btn-primary btn-sm"
                                id="deleteButton" title="Inactive"><i class="fa fa-solid fa-thumbs-down"></i></a>
                        @else
                            <a href="{{ route('delete.product', $item->id) }}" class="btn btn-primary btn-sm"
                                id="deleteButton" title="Active"><i class="fa fa-solid fa-thumbs-up"></i></a>
                        @endif
                    </td> --}}

                </tr>
            @endforeach

        </tbody>
        <tfoot>
            <tr>
                <th>SL</th>
                <th>Product name</th>
                <th>Product Image</th>
                <th>Price</th>

                <th>Discount</th>


                <th>Action</th>
            </tr>
        </tfoot>
    </table>
@endsection

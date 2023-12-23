@extends('dashboard')
@section('pages')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <form id="productForm" method="POST" action="{{ route('store.Product') }}" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-body p-4">
                <h5 class="card-title">Add New Product</h5>
                <hr />
                <div class="form-body mt-4">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="border border-3 p-4 rounded">


                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">Product Name</label>
                                    <input type="text" name="product_name" class="form-control" id="inputProductTitle"
                                        placeholder="Enter product title">
                                </div>






                                <div class="mb-3">
                                    <label for="inputProductDescription" class="form-label">Long Description</label>
                                    <textarea name="short_descp" class="form-control" id="inputProductDescription" rows="3"></textarea>
                                </div>







                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">Main Thambnail</label>
                                    <input name="product_thambnail" class="form-control" type="file" id="formFile"
                                        onchange="mainThamUrl(this)">
                                    <img src="" alt="" id='mainThmb'>
                                </div>







                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="border border-3 p-4 rounded">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="inputPrice" class="form-label">Selling Price</label>
                                        <input type="text" name="selling_price" class="form-control" id="inputPrice">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputCompareatprice" class="form-label">Discount Price </label>
                                        <input type="text" name="discount_price" class="form-control"
                                            id="inputCompareatprice">
                                    </div>






                                    <div class="col-12">
                                        <label for="inputVendor" class="form-label">Product Category</label>
                                        <select name="category_id"
                                            class="form-control single-select select2-hidden-accessible" data-select2-id="1"
                                            tabindex="-1" aria-hidden="true">
                                            @foreach ($categories as $cat)
                                                <option value="{{ $cat->id }}" data-select2-id="3">
                                                    {{ $cat->category_name }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label for="inputCollection" class="form-label">Product SubCategory</label>
                                        <select name="subcategory_id"
                                            class="form-control single-select select2-hidden-accessible" data-select2-id="1"
                                            tabindex="-1" aria-hidden="true">
                                            <option data-select2-id="3">select a category</option>
                                            <option data-select2-id="3"></option>

                                        </select>
                                    </div>






                                    <hr>
                                    <br>


                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary">Save Product</button>
                                        </div>
                                    </div>
    </form>
    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="category_id"]').on('click', function() {
                var category_id = $(this).val();
                if (category_id) {
                    $.ajax({
                        url: "{{ url('/subcategory/ajax') }}/" + category_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="subcategory_id"]').html('');
                            var d = $('select[name="subcategory_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="subcategory_id"]').append(
                                    '<option value="' + value.id + '">' + value
                                    .subcategory_name + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });
        });
    </script>
@endsection

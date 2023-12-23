@extends('dashboard')
@section('pages')
    <div class="tab-content p-3">



        <form method="post" action="{{ route('store.SubCategory') }}">
            @csrf




            <div class="form-group row">
                <label class="col-lg-3 col-form-label form-control-label">SubCategory Name</label>
                <div class="col-lg-9">
                    <input class="form-control" type="text" name="subcategory_name">
                </div>
            </div>







            <div class="form-group row">
                <label class="col-lg-3 col-form-label form-control-label">Category Name</label>
                <div class="col-lg-9">
                    <select class="form-control valid" id="input-7" name="category_id" required=""
                        aria-invalid="false">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endforeach

                    </select>
                </div>
            </div>





            <div class="form-group row">
                <label class="col-lg-3 col-form-label form-control-label"></label>
                <div class="col-lg-9">
                    <input type="reset" class="btn btn-secondary" value="Cancel">
                    <input type="submit" class="btn btn-primary" value="Save Changes">
                </div>
            </div>
        </form>

    </div>
@endsection

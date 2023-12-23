@extends('dashboard')
@section('pages')
    <div class="tab-content p-3">



        <form method="post" action="{{ route('update.category') }}">
            @csrf

            <input type="hidden" name="id" value="{{ $categories->id }}">



            <div class="form-group row">
                <label class="col-lg-3 col-form-label form-control-label">Category Name</label>
                <div class="col-lg-9">
                    <input class="form-control" type="text" name="category_name" value="{{ $categories->category_name }}">
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

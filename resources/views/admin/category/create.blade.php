@extends('admin.layout.app')
@section('content')
<div class="row">
    <div class="col-xxl">
        <div class="card mb-4">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Create new category</h5>
            <a  class="btn btn-primary" href="/admin/category">Back</a>
          </div>
          <div class="card-body">
            <form action="/admin/category" method="post">
              @csrf
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Category Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="basic-default-name" name="category_name" />
                  @if ($errors->first('category_name'))
                    <span class="err-msg">{{$errors->first('category_name')}}</span>
                  @endif
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Category Description</label>
                <div class="col-sm-10">
                <textarea id="basic-default-name" class="form-control"  name="category_desc"></textarea>
                @if ($errors->first('category_desc'))
                  <span class="err-msg">{{$errors->first('category_desc')}}</span>
                @endif
              </div>
              </div>
              <div class="mb-3" style="display: flex">
                <label for="defaultSelect" class="col-sm-2 col-form-label">Category status</label>
                <select id="defaultSelect" class="form-select" name="category_status">
                  <option value="1">Active</option>
                  <option value="0">Inactive</option>
                </select>
              </div>
              <div class="row justify-content-end">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Create</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
</div>

@endsection
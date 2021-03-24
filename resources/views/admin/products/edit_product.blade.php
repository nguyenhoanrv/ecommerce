@extends('admin.layouts.app')
@section('title', 'Edit Product | Admin')
@section('css')
    <link href="{{ URL::asset('backend/libs/boostrap-tags/bootstrap-tagsinput.css') }}" rel="stylesheet"
        type="text/css" />

@endsection
@section('content')
    <div class="row">

        <div class="card">
            <div class="card-body">
                <div class="col-xl-12">
                    <h4 class="card-title mb-4"> Edit product</h4>
                    <form method="POST" id="form-product" action="{{ route('product.update', ['id' => $product->id]) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="formrow-product-name" class="form-label">Product Name <span
                                            style="color: red">*</span></label>
                                    <input type="text" class="form-control @error('product_name') is-invalid @enderror"
                                        id="formrow-product-name" name="product_name"
                                        value="{{ $product->product_name }}">
                                    @error('product_name')
                                        <strong class="invalid-feedback">
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="formrow-product-code" class="form-label">Product Code <span
                                            style="color: red">*</span></label>
                                    <input type="text" class="form-control @error('product_code') is-invalid @enderror"
                                        id="formrow-product-code" name="product_code"
                                        value="{{ $product->product_code }}">
                                    @error('product_code')
                                        <strong class="invalid-feedback">
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="formrow-quantity" class="form-label">Quantity <span
                                            style="color: red">*</span></label>
                                    <input type="text" class="form-control @error('product_quantity') is-invalid @enderror"
                                        id="formrow-quantity" name="product_quantity"
                                        value="{{ $product->product_quantity }}">
                                    @error('product_quantily')
                                        <strong class="invalid-feedback">
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="formrow-category" class="form-label">Category <span
                                            style="color: red">*</span></label>
                                    <select class="form-select @error('category_id') is-invalid @enderror"
                                        name="category_id" id="formrow-category" name="category_id">
                                        <option value="">Select Category</option>
                                        @foreach ($categorys as $category)
                                            <option value="{{ $category->id }}" @if ($category->id == $product->category->id) selected="selected" @endif>
                                                {{ $category->category_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <strong class="invalid-feedback">
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="formrow-subcategory" class="form-label">Sub Category</label>
                                    <select class="form-select" id="formrow-subcategory" name="subcategory_id">
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="formrow-brand" class="form-label">Brand <span
                                            style="color: red">*</span></label>
                                    <select class="form-select @error('brand_id') is-invalid @enderror" id="formrow-brand"
                                        name="brand_id">
                                        <option value="">Select Brand</option>
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}" @if ($brand->id == $product->brand->id) selected="selected" @endif>
                                                {{ $brand->brand_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('brand_id')
                                        <strong class="invalid-feedback">
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="formrow-product-size" class="form-label">Product Size <span
                                            style="color: red">*</span></label>
                                    <input type="text" data-role="tagsinput" name="product_size"
                                        class="form-control @error('product_size') is-invalid @enderror"
                                        id="formrow-product-size" value="{{ $product->product_size }}" />
                                    @error('product_size')
                                        <strong class="invalid-feedback">
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="formrow-product-color" class="form-label">Product
                                        Color <span style="color: red">*</span></label>
                                    <input type="text" data-role="tagsinput" name="product_color" id="formrow-product-color"
                                        class="form-control @error('product_color') is-invalid @enderror"
                                        value="{{ $product->product_color }}" />
                                    @error('product_color')
                                        <strong class="invalid-feedback">
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="formrow-selling-price" class="form-label">Selling Price <span
                                            style="color: red">*</span></label>
                                    <input type="text" class="form-control @error('selling_price') is-invalid @enderror"
                                        id="formrow-selling-price" name="selling_price"
                                        value="{{ $product->selling_price }}">
                                    @error('selling_price')
                                        <strong class="invalid-feedback">
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="card-body">
                                <h4 class="card-title">Description <span style="color: red">*</span></h4>
                                <p class="card-title-desc">Bootstrap-wysihtml5 is a javascript
                                    plugin that makes it easy to create simple, beautiful wysiwyg editors
                                    with the help of wysihtml5 and Twitter Bootstrap.</p </div>
                                <textarea id="elm1" name="product_details"
                                    class="@error('description') is-invalid @enderror">{{ $product->product_details }}</textarea>
                                @error('product_details')
                                    <strong class="invalid-feedback">
                                        {{ $message }}
                                    </strong>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="mt-3">
                                        <label for="image1" class="form-label">Image One</label>
                                        <input class="form-control" type="file" id="image1" accept=".png, .jpg, .jpeg"
                                            name="image_one">
                                    </div>
                                    <img " @if ($product->image_one) src="{{ asset($product->image_one) }}" width="100px"
                                    height="100px" @endif"
                                    id="preview1" class="mt-3" width="100px" height="100px">
                                </div>

                                <div class="col-lg-4">
                                    <div class="mt-3">
                                        <label for="image2" class="form-label">Image Two</label>
                                        <input class="form-control" type="file" id="image2" accept=".png, .jpg, .jpeg"
                                            name="image_two">
                                    </div>
                                    <img id="preview2" class="mt-3" " @if ($product->image_two) src="{{ asset($product->image_two) }}" width="100px"
                                    height="100px" @endif "/>
                                </div>

                                <div class="col-lg-4">
                                    <div class="mt-3">
                                        <label for="image3" class="form-label">Image Three</label>
                                        <input class="form-control" type="file" id="image3" accept=".png, .jpg, .jpeg"
                                            name="image_three">
                                    </div>
                                    <img " @if ($product->image_three) src="{{ asset($product->image_three) }}" width="100px"
                                    height="100px" @endif" id="preview3"
                                    class="mt-3"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-check form-check-primary mt-3">
                                        <input class="form-check-input" type="checkbox" id="main-slider" @if ($product->main_slider) checked @endif
                                            name="main_slider" value="1">
                                        <label class="form-check-label" for="main-slider">
                                            Main Slider
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-check form-check-success mt-3">
                                        <input class="form-check-input" type="checkbox" id="hot-deal" value="1" @if ($product->hot_deal) checked @endif name="hot_deal">
                                        <label class="form-check-label" for="hot-deal">
                                            Hot Deal
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-check form-check-info mt-3">
                                        <input class="form-check-input" type="checkbox" id="best_rated" value="1" @if ($product->best_rated) checked @endif name="best_rated">
                                        <label class="form-check-label" for="best_rated">
                                            Best Rated
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-check form-check-warning mt-3">
                                        <input class="form-check-input" type="checkbox" id="trend-product" name="trend" @if ($product->trend) checked @endif
                                            value="1">
                                        <label class="form-check-label" for="trend-product">
                                            Trend Product
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-check form-check-danger mt-3">
                                        <input class="form-check-input" type="checkbox" id="mid-slider" name="mid_slider"
                                            @if ($product->mid_slider) checked @endif value="1">
                                        <label class="form-check-label" for="mid-slider">
                                            Mid Slider
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-check form-check-primary mt-3">
                                        <input class="form-check-input" type="checkbox" id="hot-new" name="hot_new" @if ($product->hot_new) checked @endif
                                            value="1">
                                        <label class="form-check-label" for="hot-new">
                                            Hot New
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary waves-effect waves-light mt-4"
                                style="width: 200px">
                                Update
                            </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('backend/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('backend/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('backend/libs/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('backend/js/pages/form-editor.init.js') }}"></script>
    <script src="{{ asset('backend/libs/boostrap-tags/bootstrap-tagsinput.js') }}"></script>
    <script type="text/javascript">
        function readURL(input, previewId) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $(previewId)
                        .attr('src', e.target.result)
                        .width(100)
                        .height(100)
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#image1").change(function() {
            readURL(this, '#preview1');
        });
        $("#image2").change(function() {
            readURL(this, '#preview2');
        });
        $("#image3").change(function() {
            readURL(this, '#preview3');
        });
        $(document).ready(function() {
            // $('#select_2').hide();
            $('#formrow-category').change(function() {

                $('#formrow-subcategory').empty();
                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                    }
                });
                $.ajax({
                    url: '/admin/subcategory/get',
                    type: "get",
                    data: {
                        category_id: $('#formrow-category').val()
                    },
                    success: function(response) {
                        var html = '';
                        response.forEach(element => {
                            html +=
                                `<option value=${element.id}> ${element.subcategory_name} </option>`
                        });
                        $('#formrow-subcategory').append(html)
                    },
                    error: function(xhr) {
                        console.log(xhr
                            .responseText
                        );
                    }
                });
            });
        });
        $('form').keypress(function(e) {
            if (e.keyCode == 13) {
                return false;
            }
        });

    </script>
@endsection

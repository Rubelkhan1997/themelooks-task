@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 offset-md-1 py-5">
            <div class="card">
                <div class="card-header">
                    Create New Product
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Product Name: <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}" required>
                        </div>
                
                        <div class="form-group">
                            <label for="sku">SKU: <span class="text-danger">*</span></label>
                            <input type="text" name="sku" class="form-control" id="sku" value="{{ old('sku') }}" required>
                        </div>
                
                        <div class="form-group">
                            <label for="unit">Unit: <span class="text-danger">*</span></label>
                            <select name="unit" class="form-control" id="unit">
                                <option value="">Select Unit</option>
                                <option {{ old('unit') == 'kg'? 'selected' : '' }} value="kg">Kg</option>
                                <option {{ old('unit') == 'liter'? 'selected' : '' }} value="liter">Liter</option>
                                <option {{ old('unit') == 'pieces'? 'selected' : ''}} value="pieces">Pieces</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="unit_value">Unit Value: <span class="text-danger">*</span></label>
                            <input type="number" name="unit_value" step="0.01" class="form-control" id="unit_value"  value="{{ old('unit_value') }}">
                        </div>
                        <div class="form-group">
                            <label for="unit_value">Tax(Fixed Aamount): <span class="text-danger">*</span></label>
                            <input type="number" name="tax" step="0.01" class="form-control" id="tax" value="{{ old('unit_value') }}">
                        </div>
                        <h5>Product Variants</h5>
                        <div class="form-group">
                            <label>Add multiple variants :</label>
                            <button type="button" class="btn btn-success" id="addVariant">Add Variant</button>
                        </div>
                
                        <div id="variants"></div>
                
                        <div class="form-group pt-3">
                            <button type="submit" class="btn btn-primary">Create Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
 @endsection
 @push('custom_js')
 <script>
    $(document).ready(function() {
        var variantCount = 0;  // Initial variant count
        $('#addVariant').click(function() {
      
            var newVariant = `
                <div class="row variant-div border py-3 my-2">
                    <div class="col-md-4">
                        <label for="size" class="math-inline">Size: </label>
                        <input type="text" name="variants[${variantCount}][size]" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="color" class="math-inline">Color/Type: <span class="text-danger">*</span></label>
                        <input type="text" name="variants[${variantCount}][color]" class="form-control" required>
                    </div>
                    <div class="col-md-4">
                        <label for="image">Product Image: <span class="text-danger">*</span></label>
                        <input type="file" name="variants[${variantCount}][image]" class="form-control-file" accept="image/x-png,image/gif,image/jpeg, image/webp">
                    </div>
                    <div class="col-md-4">
                        <label for="purchase_price" class="math-inline">Purchase Price: <span class="text-danger">*</span></label>
                        <input type="number" name="variants[${variantCount}][purchase_price]" class="form-control" required>
                    </div>
                    <div class="col-md-4">
                        <label for="selling_price" class="math-inline">Selling Price: <span class="text-danger">*</span></label>
                        <input type="number" name="variants[${variantCount}][selling_price]" class="form-control" required>
                    </div>
                    <div class="col-md-3">
                        <label for="discount" class="math-inline">Discount(Fixed Aamount): </label>
                        <input type="number" name="variants[${variantCount}][discount]" class="form-control">
                    </div>
                    <div class="col-md-1 pt-4">
                        <button class="btn btn-danger btn-sm remove" type="button">X</button>
                    </div>
                </div>
            `;
            $('#variants').append(newVariant);
            ++variantCount;
        });

         // Remove Package Pricing
        $("#variants").on("click", ".remove", function() {
            $(this).closest(".variant-div").remove();
        });
    });
 </script>
 @endpush
@extends('layouts.app') 
@section('content')
    <div class="row m-0">
        <div class="col-md-8 pt-1 pb-3">
            <input type="text" name="keyword" class="form-control search mb-2" placeholder="Search by name or sku">
            <div class="product-list">

            </div>
        </div>
        <div class="col-md-4 pl-0" style="min-height: 300px">
            <div class="card">
                <div class="card-header">
                    <p class="card-title">Billing Section</p>   
                </div>
                <div class="card-body p-0 cart-list">

                </div>
            </div>
        </div>
    </div>
 @endsection

@push('custom_js')
 <script>
    $(document).ready(function() {
        products(1);
        viewCart();  
    });
    // Product paginate request 
    $(document).on('click', '.pagination a', function(event) {
        event.preventDefault();
        var page = $(this).attr('href').split('page=')[1];

        products(page);
    });
    // Search product 
    let timeout = null;
    $('.search').on('keyup', function() {
        clearTimeout(timeout);
        timeout = setTimeout(() => {
            var keyword = $(this).val();
            products(1, keyword);
        }, 1000);
    });
    // Product list 
    function products(page, keyword = ""){
        $.ajax({
            url: "{{ url('/product/fetch?page=') }}"+page +"&keyword="+keyword,
            type: 'GET',
            success: function(response) {
                $('.product-list').html(response);
            },
            error: function(error) {
                console.error(error);  
            }
        });
    }
    // Add product to cart 
    function addToCart(variant_id){
        $.ajax({
            url: "{{ url('/add-to-cart') }}"+"/"+variant_id,
            type: 'GET',
            success: function(response) {
                $('.cart-list').html(response);
            },
            error: function(error) {
                console.error(error);  
            }
        });
    }
    // Remove product to cart 
    function removeCartItem(itemId) {
        $.ajax({
            url: "{{ url('remove-from-cart') }}",  
            type: "DELETE",  
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: { 'id': itemId},  
            success: function(response) {
                viewCart();
            }
        });
    }
    // Update quantity 
    function updateCart(quantity, product_id){
        // Check if quantity is a valid number
        if (isNaN(quantity) || quantity < 1) {
            alert('Please enter a valid quantity (minimum 1).');
            return;
        }
        $.ajax({
            url: "{{ url('update-cart') }}", 
            type: 'PATCH',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {'id': product_id, 'quantity': quantity},
            success: function(response) {
                viewCart();
            },
            error: function(error) {
                console.error(error); 
            }
        });
    }   
    // View cart 
    function viewCart(){
        $.ajax({
            url: "{{ url('/view-cart') }}",
            type: 'GET',
            success: function(response) {
                $('.cart-list').html(response);
            },
            error: function(error) {
                console.error(error); 
            }
        });
    }
    // Place order
    function placeOrder(){
        $.ajax({
            url: "{{ url('/place-order') }}",
            type: 'POST',
            data: {'_token': '{{ csrf_token() }}' },
            success: function(response) {
                alert(response.message)
                window.location.reload();
            },
        });
    }
 </script>
 @endpush
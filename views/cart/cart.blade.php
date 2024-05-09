
@if (count($cart_items) > 0)
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Item</th>
                <th scope="col">Quantity</th>
                <th scope="col">Price</th>
                <th scope="col">Total</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @php
                $total_total = $total_discount = $total_tax = 0;
            @endphp
            @foreach ($cart_items as $item)
                @php
                    $total_tax += $item['tax'] * $item['quantity'];
                    $total_total += $item['total'] * $item['quantity'];
                    $total_discount += $item['discount'] * $item['quantity'];
                @endphp
                <tr>
                    <td style="width: 30%">
                        <img src="{{ asset($item['image']) }}" class="border" alt="{{ $item['name'] }}" style="width: 100%; height: 60px">
                        {{ $item['name'] }}
                    </td>
                    <td style="width: 15%">
                        <input type="number" onkeyup="updateCart(this.value, {{ $item['id'] }})" class="form-control" value="{{ $item['quantity'] }}" min="1">
                    </td>
                    <td>{{ $item['price'] }} <span>{{ currency() }}</span></td>
                    <td>{{ $item['total'] * $item['quantity']}} <span>{{ currency() }}</span></td>
                    <td>
                        <button type="button" onclick="removeCartItem({{ $item['id'] }})" class="btn btn-danger btn-sm">X</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="p-2">
        <div class="d-flex justify-content-between">
            <p>Sub Total: </p>
            <p> {{ ($total_total + $total_discount) . ' '. currency() }}</p>
        </div>
        <div class="d-flex justify-content-between">
            <p>Discount: </p>
            <p>{{ $total_discount .' '. currency() }}</p>
        </div>
        <div class="d-flex justify-content-between">
            <p>Tax: </p>
            <p>{{ $total_tax .' '. currency() }}</p>
        </div>
        <div class="d-flex justify-content-between">
            <p>Total: </p>
            <p>{{ ($total_total + $total_tax).' '. currency() }}</p>
        </div>
    </div>
    <div class="pb-2">
        <button type="button" onclick="placeOrder()"  class="btn btn-primary d-block w-100">Place Order</button>
    </div>
@endif

 
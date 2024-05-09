 <div class="row">
    @forelse ($variants as $variant)
        <div class="col-md-3 mb-3">
            <div class="card pb-1">
                <div class="card-body p-0 pb-2">
                    @if ($variant->image)
                        <img src="{{ asset($variant->image) }}" class="border" alt="{{ @$variant->product->name }} ({{ $variant->size ?? '' }} - {{ $variant->color ?? '' }})" style="width: 100%; height: 100px">
                    @endif
                    <p class="card-title text-center py-2">
                        {{ @$variant->product->name }}
                        (@if ($variant->size)
                            {{ $variant->size }}
                        @endif
                        @if ($variant->size && $variant->color) - @endif
                        @if ($variant->color)
                            {{ $variant->color }}
                        @endif)
                    </p>
                    <p class="card-text text-center font-weight-bold">
                        @if ($variant->discount)
                            <span>{{ number_format($variant->selling_price - $variant->discount, 2) }} </span> <span>{{ currency() }}</span> 
                            <del style="color: #ddd">{{ $variant->selling_price }} {{ currency() }}</del> 
                        @else
                            <span>{{ number_format($variant->selling_price, 2) }}</span> <span>{{ currency() }}</span>
                        @endif 
                    </p>
                </div>
                <button type="button" onclick="addToCart({{$variant->id}})" class="btn btn-sm btn-success text-center">Add To Cart</button>
            </div>
        </div>
    @empty
        <p>Product not fuond.</p>
    @endforelse
</div>
{{ $variants->links() }}
@extends('layouts.app') 
@section('content')
    <style>
        .d-flex{
            gap:20px;
        }
    </style>
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-6 ml-2 mt-1">
               <form action="{{ url('/orders') }}" method="GET" class="d-flex">
                    <label>Date Filter</label>
                    <input  name="date_filter" class="form-control daterange" placeholder="Pick date rage" />
                    <button type="submit" class="btn" style="height: 40px">Filter</button>
                    <a href="{{ url('/orders') }}" style="margin-top: 8px">Clear</a>
               </form>
            </div>
            <div class="card border-0">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Order No</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Sub Total</th>
                                    <th scope="col">Discount</th>
                                    <th scope="col">Tax</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Created At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $item)
                                    <tr>
                                        <td>{{ $item->order_number }}</td>
                                        <td>{{ $item->total_quantity }}</td>
                                        <td>{{ $item->total_sub_amount }}</td>
                                        <td>{{ $item->total_discount }}</td>
                                        <td>{{ $item->total_tax }}</td>
                                        <td>{{ $item->total_amount }}</td>
                                        <td>{{ $item->created_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $orders->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom_js')
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<script>
    $(document).ready(function() {
        $('.daterange').daterangepicker({
            opens: 'left'
        });
    });
</script>
@endpush
 
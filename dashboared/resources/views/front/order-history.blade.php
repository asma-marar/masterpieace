@extends('front.master')
@section('header-class', 'header-v4')
@section('content')
<section class="sec-order-history bg0 p-t-65 p-b-60">
    <div class="container">
        <div class="row">
            <!-- Sidebar -->
            @include('front.partials.profile-sidebar')
            <!-- Content Area -->
            <div class="col-sm-12 col-lg-9 m-b-50">
                <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-0-sm">
                    <!-- Order History Section -->
                    <div id="orders-section">
                        <h4 class="mtext-109 cl2 p-b-30">Order History</h4>
                        
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="stext-112 cl2 p-tb-10">Order ID</th>
                                        <th class="stext-112 cl2 p-tb-10">Date</th>
                                        <th class="stext-112 cl2 p-tb-10">Status</th>
                                        <th class="stext-112 cl2 p-tb-10">Total</th>
                                        <th class="stext-112 cl2 p-tb-10">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($orders as $order)
                                        <tr>
                                            <td class="stext-115 cl6 p-tb-8">#{{ $order->id }}</td>
                                            <td class="stext-115 cl6 p-tb-8">{{ $order->created_at->format('Y-m-d') }}</td>
                                            <td class="stext-115 cl6 p-tb-8">
                                                <span class="badge 
                                                    @if($order->order_status == 'delivered') bg-success 
                                                    @elseif($order->order_status == 'pending') bg-warning 
                                                    @else bg-secondary @endif 
                                                    cl0">
                                                    {{ ucfirst($order->order_status) }}
                                                </span>
                                            </td>
                                            <td class="stext-115 cl6 p-tb-8">${{ number_format($order->order_total, 2) }}</td>
                                            <td class="stext-115 cl6 p-tb-8">
                                                <button class="flex-c-m stext-101 cl0 size-111 bg1 bor1 hov-btn1 p-lr-15 trans-04" 
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#orderDetailModal{{ $order->id }}">
                                                    View
                                                </button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center stext-115 cl6 p-tb-8">No orders found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@foreach($orders as $order)
    <!-- Order Detail Modal -->
    <div class="modal fade" id="orderDetailModal{{ $order->id }}" tabindex="-1" aria-labelledby="orderDetailModalLabel{{ $order->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="orderDetailModalLabel{{ $order->id }}">Order #{{ $order->id }} Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><strong>Status:</strong> {{ ucfirst($order->order_status) }}</p>
                    <p><strong>Date:</strong> {{ $order->created_at->format('F d, Y') }}</p>
                    <p><strong>Total:</strong> ${{ number_format($order->order_total, 2) }}</p>
                    <hr>
                    <h6>Items:</h6>
                    <ul>
                        @foreach($order->orderProducts as $item)
                            <li>{{ $item->product->name }} (x{{ $item->quantity }}) - ${{ number_format($item->price, 2) }}</li>
                        @endforeach
                    </ul>
                    <hr>
                    <p><strong>Shipping Address:</strong> {{ $order->order_address }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="flex-c-m stext-101 cl0 size-112 bg3 bor1 hov-btn3 p-lr-15 trans-04" data-bs-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
@endforeach

@endsection

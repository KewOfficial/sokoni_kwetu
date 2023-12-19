@extends('layouts.adminlte')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <h1>Welcome to the Admin Dashboard</h1>

                
            <!-- Order List and Search -->
            <div class="mt-4">
                <h2>Order List</h2>

                <!-- Search Bar -->
                <form action="{{ route('admin.dashboard') }}" method="get">
                    <div class="input-group mb-3">
                        <input type="text" name="search" class="form-control" placeholder="Search orders"
                            value="{{ request('search') }}">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit">Search</button>
                        </div>
                    </div>
                </form>

                <!-- Order Statistics -->
                <div class="row">
                    <div class="col-md-6">
                        <h3>Order Statistics</h3>

                     <!-- Display Total Number of Orders -->
<p>Total Orders: {{ $totalOrders ?? 0 }}</p>                    
                    </div>
                    <div class="col-md-6">
                        <h2>Order Status Distribution</h2>
                        <canvas id="orderStatusChart" width="400" height="200"></canvas>
                    </div>
                </div>

                <!-- Order Table -->
    <table class="table">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Customer Name</th>
                <th>Order Date</th>
                <th>Order Status</th>
                <th>Order Total</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user->name }}</td>
                    <td>{{ $order->created_at }}</td>
                    <td>{{ $order->status }}</td>
                    <td>{{ $order->total }}</td>
                    <td>
                        <!-- Action buttons -->
                        <a href="{{ route('admin.orderDetails', ['orderId' => $order->id]) }}" class="btn btn-info">View Details</a>
                        <a href="{{ route('admin.editOrder', ['orderId' => $order->id]) }}" class="btn btn-warning">Edit</a>
                        <a href="{{ route('admin.updateOrderStatus', ['orderId' => $order->id]) }}" class="btn btn-primary">Update Status</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No orders available.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

            <!-- Order Status Chart -->
            <div class="mt-4">
                <h2>Order Status Distribution</h2>
                <canvas id="orderStatusChart" width="400" height="200"></canvas>
            </div>

            <script>
                // Render the Order Status Chart
                var ctx = document.getElementById('orderStatusChart').getContext('2d');
                var orderStatusData = @json($orderStatusData);
            
                try {
                    var chart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: Object.keys(orderStatusData),
                            datasets: [{
                                label: 'Order Status',
                                data: Object.values(orderStatusData),
                                backgroundColor: [
                                    'rgba(75, 192, 192, 0.2)',
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(255, 205, 86, 0.2)',
                                    
                                ],
                                borderColor: [
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(255, 205, 86, 1)',
                                    
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                } catch (error) {
                    console.error('Error creating chart:', error);
                }
            </script>
            

        </div>
    </div>
@endsection

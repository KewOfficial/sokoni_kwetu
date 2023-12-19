@extends('layouts.adminlte-layout')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <h1>User Dashboard</h1>
            @if ($user)
                <h2>Welcome, {{ $user->name }}!</h2>
            @else
                <h2>Welcome to the User Dashboard</h2>
            @endif

            <div class="row">
                <div class="col-md-12">
                    <!-- Order History and Status -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Order History and Status</h3>
                        </div>
                        <div class="card-body">
                            <!-- Recent Orders Table -->
                            <h4>Recent Orders</h4>
                            <table id="recentOrdersTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Total Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Add your actual order data here -->
                                </tbody>
                            </table>

                            <!-- Order Status Breakdown Chart -->
                            <h4>Order Status Breakdown</h4>
                            <canvas id="orderStatusChart" width="200" height="200"></canvas>
                        </div>
                    </div>

                    <!-- Purchase Preferences and Trends -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Purchase Preferences and Trends</h3>
                        </div>
                        <div class="card-body">
                            <!-- Top Purchased Products Table -->
                            <h4>Top Purchased Products</h4>
                            <table id="topPurchasedProductsTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Total Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Add your actual product data here -->
                                </tbody>
                            </table>

                            <!-- Product Category Preferences Chart -->
                            <h4>Product Category Preferences</h4>
                            <canvas id="productCategoryChart" width="200" height="200"></canvas>

                            <!-- Purchase Frequency by Day of Week Chart -->
                            <h4>Purchase Frequency by Day of Week</h4>
                            <canvas id="purchaseFrequencyChart" width="200" height="200"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Initialize DataTables
        $(document).ready(function () {
            $('#recentOrdersTable').DataTable();
            $('#topPurchasedProductsTable').DataTable();
        });
    
        // Order Status Breakdown Chart
        var ctxOrderStatus = document.getElementById('orderStatusChart').getContext('2d');
        var orderStatusChart = new Chart(ctxOrderStatus, {
            type: 'pie',
            data: {
                labels: ['Pending', 'Processing', 'Shipped', 'Completed'],
                datasets: [{
                    data: [15, 20, 25, 40], // Example data (replace with actual data)
                    backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4CAF50'],
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    position: 'bottom',
                },
                title: {
                    display: true,
                    text: 'Order Status Breakdown',
                    fontSize: 16,
                },
            },
        });
    
        // Product Category Preferences Chart
        var ctxProductCategory = document.getElementById('productCategoryChart').getContext('2d');
        var productCategoryChart = new Chart(ctxProductCategory, {
            type: 'doughnut',
            data: {
                labels: ['Electronics', 'Clothing', 'Books', 'Home Decor'],
                datasets: [{
                    data: [30, 25, 20, 25], // Example data (replace with actual data)
                    backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4CAF50'],
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    position: 'bottom',
                },
                title: {
                    display: true,
                    text: 'Product Category Preferences',
                    fontSize: 16,
                },
            },
        });
    
        // Purchase Frequency by Day of Week Chart
        var ctxPurchaseFrequency = document.getElementById('purchaseFrequencyChart').getContext('2d');
        var purchaseFrequencyChart = new Chart(ctxPurchaseFrequency, {
            type: 'bar',
            data: {
                labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
                datasets: [{
                    label: 'Number of Purchases',
                    data: [15, 25, 20, 30, 35, 28, 18], // Example data (replace with actual data)
                    backgroundColor: '#4CAF50',
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    display: false,
                },
                title: {
                    display: true,
                    text: 'Purchase Frequency by Day of Week',
                    fontSize: 16,
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                        },
                    }],
                },
            },
        });
    </script>
    
@endsection

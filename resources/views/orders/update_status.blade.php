@extends('adminlte')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Update Order Status</div>

                    <div class="card-body">
                        <!-- Form to update order status -->
                        <form method="POST" action="{{ route('orders.updateStatus', ['orderId' => $orderId]) }}">
                            @csrf

                            <div class="form-group row">
                                <label for="status" class="col-md-4 col-form-label text-md-right">Order Status</label>

                                <div class="col-md-6">
                                    <select id="status" name="status" class="form-control" required>
                                        <option value="pending">Pending</option>
                                        <option value="confirmed">Confirmed</option>
                                        <option value="shipped">Shipped</option>
                                        <option value="delivered">Delivered</option>
                                        <option value="canceled">Canceled</option>
                                    </select>

                                    @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Update Status
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

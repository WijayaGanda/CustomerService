<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Pesanan</title>
    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg mb-3" style="background-color: #338a69;">
        <div class="container-fluid">
            <div class="d-flex w-100 justify-content-between align-items-center">
                <h5 class="mb-0 text-white" style="margin-right: 20px; font-weight:bold">Riwayat Pesanan</h5>
                <a class="nav-link text-white me-3" href="http://localhost:8000/customers/">Home</a>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="http://localhost:8001/products/">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="http://localhost:8002/orders/create">List of Order</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

<div class="container">
    <h2>Riwayat Pesanan {{ $customer->nama }}</h2>

    @if(count($customerOrders) > 0)
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Produk</th>
                    <th>Jumlah</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customerOrders as $order)
                    <tr>
                        <td>{{ $loop->iteration}}</td>
                        <td>{{ $order['product']['name'] ?? 'Produk tidak ditemukan' }}</td>
                        <td>{{ $order['quantity'] }}</td>
                        <td>{{ $order['created_at'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="mt-3">Belum ada pesanan untuk pelanggan ini.</p>
    @endif

    <a href="{{ url()->previous() }}" class="btn btn-secondary mt-3">Kembali</a>
</div>

</body>
</html>
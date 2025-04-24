<!DOCTYPE html>
<html>

<head>
    <title>Data Customers</title>
    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg mb-3" style="background-color: #338a69;">
        <div class="container-fluid">
            <div class="d-flex w-100 justify-content-between align-items-center">
                <h5 class="mb-0 text-white" style="margin-right: 20px; font-weight:bold">Daftar Pelanggan</h5>
                <a class="nav-link text-white me-3" href="http://localhost:8000/customers/">Home</a>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="http://localhost:8001/products/">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="http://localhost:8002/orders/">List of Order</a>
                        </li>
                    </ul>
                </div>
                <div class="d-flex justify-content-between">
                    <a href="{{ route('customers.create') }}" class="btn btn-sm"
                        style="background-color: #4040407f; color:#ffffff">Create New Customer</a>
                </div>
            </div>
        </div>
    </nav>
    <table id="customers-table" class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#customers-table').DataTable({
                ajax: {
                    url: "{{ url('/api/customers-api') }}",
                    dataSrc: 'data'
                },
                columns: [{
                        data: 'id'
                    },
                    {
                        data: 'nama'
                    },
                    {
                        data: 'phone'
                    },
                    {
                        data: 'address'
                    },
                    {
                        data: null,
                        render: function(data, type, row) {
                            return `
                    <a href="/customers/${row.id}" class="btn btn-success btn-sm">View History</a>
                     <a href="http://localhost:8002/orders/create?customer_id=${row.id}" class="btn btn-primary btn-sm">Create Order</a>
    `;
                        }
                    }
                ]
            });
        });
    </script>
</body>

</html>

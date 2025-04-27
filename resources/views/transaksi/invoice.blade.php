<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: #f5f5f5;
            padding: 20px;
        }
        .invoice-container {
            /* max-width: 800px; */
            margin: auto;
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
        }
        .invoice-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .invoice-header h2 {
            margin: 0;
            font-size: 28px;
            color: #333;
        }
        .invoice-details {
            margin-bottom: 20px;
        }
        .invoice-details p {
            margin: 5px 0;
            font-size: 16px;
        }
        .invoice-footer {
            text-align: center;
            margin-top: 30px;
        }
        .btn-print {
            display: inline-block;
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            margin-top: 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            text-decoration: none;
            cursor: pointer;
        }
        .btn-print:hover {
            background-color: #0056b3;
        }

        @media print {
            .btn-print {
                display: none;
            }
            body {
                background: white;
            }
        }
    </style>
    <div class="invoice-container" id="invoiceArea">
        <div class="invoice-header">
            <h2>Invoice Transaksi</h2>
            <p><small>{{ now()->format('d F Y') }}</small></p>
        </div>
    
        <div class="table-responsive">
            <table class="table table-bordered border-primary">
                <thead>
                    <tr>
                        <th><small>Nama Pasien</small></th>
                        <th>Tanggal Registrasi</th>
                        <th>Tindakan</th>
                        <th>Tarif Tindakan</th>
                        <th>Petugas Rumah Sakit</th>
                        <th>Tanggal Transaksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $transaksi->registrasi->pasien->name ?? '-' }}</td>
                        <td>
                            {{ \Carbon\Carbon::parse($transaksi->registrasi->tanggal_registrasi)->translatedFormat('d F Y') ?? '-' }}
                        </td>
                        <td>{{ $transaksi->tindakan->nama_tindakan ?? '-' }}</td>
                        <td>Rp {{ number_format($transaksi->tindakan->tarif_tindakan ?? 0, 2, ',', '.') }}</td>
                        <td>{{ $transaksi->pegawai->name ?? '-' }}</td>
                        <td>{{ \Carbon\Carbon::parse($transaksi->registrasi->created_at)->translatedFormat('d F Y') ?? '-' }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        {{-- <div class="invoice-details">
            <p><strong>Nama Pasien:</strong> </p>
            <p><strong>Tanggal Registrasi:</strong> </p>
            <p><strong>Nama Tindakan:</strong> </p>
            <p><strong>Tarif Tindakan:</strong> </p>
            <p><strong>Petugas Input:</strong> </p>
            <p><strong>Tanggal Transaksi:</strong> </p>
        </div> --}}
    
        <div class="invoice-footer">
            <p>Terima kasih telah mempercayai layanan kami!</p>
        </div>
    </div>
    
    <div style="text-align: center;">
        <button onclick="printInvoice()" class="btn-print">
            <i class="fas fa-print"></i> Cetak Invoice
        </button>
    </div>
    
    <script>
    function printInvoice() {
        window.print();
    }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<style>
    body::before {
        position: absolute;
        content: "";
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-image: asset{{ url('dist/img/Does-the-VA-Cover-Dental-Benefits-for-Disabled-Vets.jpg') }} background-size: cover;
        opacity: 0.5;
        z-index: -1;

    }
</style>

<body>


    @extends('layouts.reportAppPatInvo')
    @section('reportInvoices')

        <div class="container position-relative"
            style="margin-left:250px;  width:auto; padding-top: 25px; padding-left: 25px">

            <h2> Paid :
                <span style="color: green">
                    {{ $reperPaid->total1 }}
                </span>
            </h2>

            <h2> UnPaid :
                <span style="color: red">
                    {{ $reperUnPaid->total2 }}
                </span>
            </h2>

            <table class="table">
                <thead>
                    <th scope="col">totalAmount</th>
                    <th scope="col">Status</th>
                    <th scope="col">invoices_data</th>
                </thead>
                <tbody>

                    @if ($reportInvoices->isEmpty())
                        <tr>
                            <td scop="col"> No Invoices </td>
                        </tr>
                    @else
                        @foreach ($reportInvoices as $reportInvoice)
                            <tr scope="col">

                                <td>{{ $reportInvoice->total_amount }}</td>
                                <td>{{ $reportInvoice->status }}</td>
                                <td>{{ $reportInvoice->invoice_date }}</td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>

            </table>

        </div>
    @endsection

</body>
</html>

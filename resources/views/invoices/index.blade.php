<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body::before {
            position: absolute;
            content: "";
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: url('dist/img/vecteezy_tooth-happy-character-cute_21880393.jpg');
            background-size: cover;
            opacity: 0.7;
            z-index: -1;

        }
    </style>
</head>
<body>

@extends('layouts.appInvoices')
@section('invoices')
        {{-- <a href="{{ route('Invoices.create') }}" class="btn btn-info">Create</a>

        <form method="GET" action="{{ route('searchInvoices') }}" class="form-group my-5">
            <input type="text" class="form-control my-3 w-50" name="searchInvoices" placeholder="searchInvoices">
            <button type="submit" class="btn btn-primary"> Search </button>
        </form> --}}

        <div class="container position-relative" style="margin-left:250px;  width:auto; padding-top: 25px; padding-left: 25px">


        <table class="table mt-5">
            <thead>
                <tr>
                    <th scope="col">invoice_id</th>
                    <th scope="col">Patient</th>
                    <th scope="col">totalAmount</th>
                    <th scope="col">Status</th>
                    <th scope="col">InvoiceDate</th>

                </tr>
            </thead>
            <tbody>

                @if (@isset($empty) && $empty)
                    <tr>
                        <td>
                            No Result
                        </td>
                    </tr>
                @else
                    @if (@isset($result))
                        @foreach ($result as $result)
                            <tr>
                                <td>{{ $result->invoice_id }}</td>
                                <td>{{ $result->patient_id }}</td>
                                <td>{{ $result->total_amount }}</td>
                                <td>{{ $result->status }}</td>
                                <td>{{ $result->invoice_date }}</td>


                            </tr>
                        @endforeach
                    @else
                        @foreach ($invoices as $invoice)
                            <tr>
                                <td>{{ $invoice->invoice_id }}</td>
                                <td>{{ $invoice->patient_id }}</td>
                                <td>{{ $invoice->total_amount }}</td>
                                <td>{{ $invoice->status }}</td>
                                <td>{{ $invoice->invoice_date }}</td>


                            </tr>
                        @endforeach
                    @endif
                @endif


            </tbody>
        </table>
    </div>
@endsection

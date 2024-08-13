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
            background-image: url('dist/img/Green-Dentistry-Dental-Cost-1.jpg');
            background-size: cover;
            opacity: 0.5;
            z-index: -1;

        }
    </style>
</head>
<body>

@extends('layouts.appTreatment')
@section('treatments')


            {{-- <a href="{{ route('Treatments.create') }}" class="btn btn-info">Create</a> --}}


            {{-- <form method="GET" action="{{ route('searchTreatments') }}" class="form-group my-5">
                <input type="text" class="form-control my-3 w-50" name="searchTreatments" placeholder="SearchByName">
                <button type="submit" class="btn btn-primary"> Search </button>
            </form> --}}


            <div class="container position-relative" style="margin-left:250px;  width:auto; padding-top: 25px; padding-left: 25px">


            <table class="table mt-5">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Appointment</th>
                        <th scope="col">TreatmentType</th>
                        <th scope="col">Description</th>
                        <th scope="col">Cost</th>
                        <th scope="col">TreatmentDate</th>

                    </tr>
                </thead>
                <tbody>

                    @if (@isset($isEmpty) && $isEmpty)
                        <tr>
                            <td>
                                No Result
                            </td>
                        </tr>
                    @else
                        @if (@isset($results))
                            @foreach ($results as $result)
                                <tr>
                                    <td>{{ $result->treatment_id }}</td>
                                    <td>{{ $result->appointment }}</td>
                                    <td>{{ $result->treatment_type }}</td>
                                    <td>{{ $result->description }}</td>
                                    <td>{{ $result->cost }}</td>
                                    <td>{{ $result->treatment_date }}</td>

                                </tr>
                            @endforeach
                        @else
                            @foreach ($treatments as $treatment)
                                <tr>
                                    <td>{{ $treatment->treatment_id }}</td>
                                    <td>{{ $treatment->appointment }}</td>
                                    <td>{{ $treatment->treatment_type }}</td>
                                    <td>{{ $treatment->description }}</td>
                                    <td>{{ $treatment->cost }}</td>
                                    <td>{{ $treatment->treatment_date }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('Treatments.edit', $treatment->treatment_id) }}"
                                                class="btn btn-info rounded-3">Edit</a>
                                            <a href="{{ route('Treatments.show', $treatment->treatment_id) }}"
                                                class="btn btn-danger mx-2 rounded-3">Delete</a>
                                            {{-- <div class="btn-group dropend">
                                                <button type="button" class="btn btn-primary dropdown-toggle rounded-3"
                                                    data-bs-toggle="dropdown">Report by :</button>
                                                <ul class="dropdown-menu ">
                                                    <li><a href="{{ route('reportAppointment', $treatment->treatment_id) }}"
                                                            class="text-decoration-none">ReAppointment</a></li>
                                                    <li><a href="{{ route('reportInvoices', $treatment->treatment_id) }}"
                                                            class="text-decoration-none">ReInvoices</a></li>
                                                </ul>
                                            </div> --}}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    @endif



                </tbody>
            </table>

@endsection

</body>

</html>

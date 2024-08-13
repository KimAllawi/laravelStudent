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
            background-image: url('dist/img/shutterstock_1062891104.jpg');
            background-size: cover;
            opacity: 0.5;
            z-index: -1;

        }
    </style>
</head>
<body>
    @extends('layouts.appAppointment')
@section('appointments')

        <a href="{{ route('Appointments.create') }}" class="btn btn-info">Create</a>

        {{-- <form action="{{ route('searchAppointments') }}">
            <div class="form-floating mb-3 mt-3">
                <input type="text" class="form-control w-50" placeholder="searchByName" name="searchAppointments">
                <label for="email">Search</label>
                <button type="submit" class="btn btn-info my-2 ">Search</button>
            </div>
        </form> --}}

        <div class="container position-relative" style="margin-left:250px;  width:auto; padding-top: 25px; padding-left: 25px">


        <table class="table mt-5">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Patients</th>
                    <th scope="col">Dentist</th>
                    <th scope="col">appointment_date</th>
                    <th scope="col">appointment_time</th>
                    <th scope="col">status</th>
                    <th scope="col">notes</th>
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
                                <td>{{ $result->appointment_id }}</td>
                                <td>{{ $result->patient_id }}</td>
                                <td>{{ $result->dentist_id }}</td>
                                <td>{{ $result->appointment_date }}</td>
                                <td>{{ $result->appointment_time }}</td>
                                <td>{{ $result->status }}</td>
                                <td>{{ $result->notes }}</td>
                            </tr>
                        @endforeach
                    @else
                        @foreach ($appointments as $appointment)
                            <tr>
                                <td>{{ $appointment->appointment_id }}</td>
                                <td>{{ $appointment->patient_id }}</td>
                                <td>{{ $appointment->dentist_id }}</td>
                                <td>{{ $appointment->appointment_date }}</td>
                                <td>{{ $appointment->appointment_time }}</td>
                                <td>{{ $appointment->status }}</td>
                                <td>{{ $appointment->notes }}</td>
                                <td>
                                    <a href="{{ route('Appointments.edit', $appointment->appointment_id) }}"
                                        class="btn btn-info">Edit</a>
                                    <a href="{{ route('Appointments.show', $appointment->appointment_id) }}"
                                        class="btn btn-info">Delete</a>
                                    {{-- <a href="{{ route('Appointments.report', $appointment->appointment_id) }}"
                                        class="btn btn-info">Show Report</a> --}}

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





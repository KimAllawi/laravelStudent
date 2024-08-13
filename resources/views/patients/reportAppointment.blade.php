@extends('layouts.reportAppPatients')
@section('reportAppPatients')
    <div class="container position-relative" style="margin-left:250px;  width:auto; padding-top: 25px; padding-left: 25px">

        <table class="table">
            <thead>
                <th scope="col">firstName</th>
                <th scope="col">lastName</th>
                <th scope="col">appointmentDate</th>
                <th scope="col">appointmentTime</th>
                <th scope="col">Status</th>
            </thead>
            <tbody>

                @if ($reportPatient->isEmpty())
                    <tr>
                        <td scop="col"> No Appointments </td>
                    </tr>
                @else
                    @foreach ($reportPatient as $reportPatient)
                        <tr scope="col">


                            <td>{{ $reportPatient->first_name }}</td>
                            <td>{{ $reportPatient->last_name }}</td>
                            {{-- <td>{{ $reportPatient->dentist_name }}</td>  --}}
                            <td>{{ $reportPatient->appointment_date }}</td>
                            <td>{{ $reportPatient->appointment_time }}</td>
                            <td>{{ $reportPatient->status }}</td>

                        </tr>
                    @endforeach
                @endif

            </tbody>

        </table>

    </div>
@endsection

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
        background-image: url('dist/img/Does-the-VA-Cover-Dental-Benefits-for-Disabled-Vets.jpg');
        background-size: cover;
        opacity: 0.5;
        z-index: -1;

    }
</style>

<body>




    @extends('layouts.appDentist')
    @section('dentist')

        <div class="container position-relative"
            style="margin-left:250px;  width:auto; padding-top: 25px; padding-left: 25px">
            {{-- <a href="{{ route('patients.create') }}" class="btn btn-info">Create</a> --}}

            {{-- <form method="GET" action="{{ route('searchPatients') }}" class="form-group my-3">
                <input type="text" class="form-control my-3 w-50" name="searchPatient" placeholder="SearchByName">
                <button type="submit" class="btn btn-primary"> Search </button>
            </form> --}}
            <table class="mt-3 table">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">firstName</th>
                        <th scope="col">lastName</th>
                        <th scope="col">date_of_birth</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Address</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                    @if (isset($isEmpty) && $isEmpty)
                        <tr>
                            <td>
                                NO result
                            </td>
                        </tr>
                    @else
                        @if (@isset($results))
                            @foreach ($results as $result)
                                <tr>
                                    <td>{{ $result->patient_id }}</td>
                                    <td>{{ $result->first_name }}</td>
                                    <td>{{ $result->last_name }}</td>
                                    <td>{{ $result->date_of_birth }}</td>
                                    <td>{{ $result->gender }}</td>
                                    <td>{{ $result->address }}</td>
                                    <td>{{ $result->phone }}</td>
                                    <td>{{ $result->email }}</td>

                                </tr>
                            @endforeach
                        @else
                            @foreach ($patients as $patient)
                                <tr>
                                    <td>{{ $patient->patient_id }}</td>
                                    <td>{{ $patient->first_name }}</td>
                                    <td>{{ $patient->last_name }}</td>
                                    <td>{{ $patient->date_of_birth }}</td>
                                    <td>{{ $patient->gender }}</td>
                                    <td>{{ $patient->address }}</td>
                                    <td>{{ $patient->phone }}</td>
                                    <td>{{ $patient->email }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('patients.edit', $patient->patient_id) }}"
                                                class="btn btn-info rounded-3">Edit</a>
                                            <a href="{{ route('patients.show', $patient->patient_id) }}"
                                                class="btn btn-danger mx-2 rounded-3">Delete</a>
                                            <div class="btn-group dropbuttom">
                                                <button type="button" class="btn btn-primary dropdown-toggle rounded-3"
                                                    data-bs-toggle="dropdown">Report by :</button>
                                                <ul class="dropdown-menu ">
                                                    <li><a href="{{ route('reportAppointment', $patient->patient_id) }}"
                                                            class="text-decoration-none">ReAppointment</a></li>
                                                    {{-- <li><a href="{{ route('reportInvoices', $patient->patient_id) }}"
                                                            class="text-decoration-none">ReInvoices</a></li> --}}
                                                </ul>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    @endif
                </tbody>
            </table>
        </div>
    @endsection

</body>

</html>

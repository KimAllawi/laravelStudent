@extends('layouts.app')

@section('content')
    <div class="container">


        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('Appointments.store') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="patient_id"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Patient') }}</label>

                                <div class="col-md-6">
                                    <select id="patient_id" type="text"
                                        class="form-control @error('patient_id') is-invalid @enderror" name="patient_id"
                                        value="{{ old('patient_id') }}" required autocomplete="patient_id">

                                        @foreach ($dataPatients as $dataPatient)
                                            <option value="{{ $dataPatient->patient_id }}">{{ $dataPatient->first_name }}
                                            </option>
                                        @endforeach


                                    </select>

                                    @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="dentist_id"
                                    class="col-md-4 col-form-label text-md-end">{{ __('DentistId') }}</label>

                                <div class="col-md-6">
                                    <select id="dentist_id" type="number"
                                        class="form-control @error('dentist_id') is-invalid @enderror" name="dentist_id"
                                        value="{{ old('dentist_id') }}" required autocomplete="dentist_id">

                                        @foreach ($dataUsers as $dataUser)
                                            <option value="{{ $dataUser->id }}">{{ $dataUser->name }}</option>
                                        @endforeach


                                    </select>

                                    @error('dentist_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="appointment_date"
                                    class="col-md-4 col-form-label text-md-end">{{ __('AppointmentsData') }}</label>

                                <div class="col-md-6">
                                    <input id="appointment_date" type="date"
                                        class="form-control @error('appointment_date') is-invalid @enderror"
                                        name="appointment_date" value="{{ old('appointment_date') }}" required
                                        autocomplete="appointment_date">

                                    @error('appointment_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="appointment_time"
                                    class="col-md-4 col-form-label text-md-end">{{ __('AppointmentTime') }}</label>

                                <div class="col-md-6">
                                    <input id="appointment_time" type="time"
                                        class="form-control @error('appointment_time') is-invalid @enderror"
                                        name="appointment_time" required autocomplete="new-appointment_time">

                                    @error('appointment_time')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="status"
                                    class="col-md-4 col-form-label text-md-end">{{ __('status') }}</label>

                                <div class="col-md-6">
                                    <select id="status" type="text"
                                        class="form-control @error('status') is-invalid @enderror" name="status" required>

                                        <option value="scheduled">scheduled</option>
                                        <option value="completed">completed</option>
                                        <option value="cancelled">cancelled</option>


                                    </select>

                                    @error('status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="notes"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Notes') }}</label>

                                <div class="col-md-6">
                                    <input id="notes" type="text"
                                        class="form-control @error('notes') is-invalid @enderror" name="notes" required
                                        autocomplete="new-notes">

                                    @error('notes')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Create') }}
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

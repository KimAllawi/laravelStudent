@extends('layouts.app')

@section('content')
    <div class="container">


        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('Appointments.destroy' , $appointment->appointment_id) }}">
                            @csrf
                            @method('DELETE')

                            <div class="row mb-3">
                                <label for="patient_id"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Patient') }}</label>

                                <div class="col-md-6">
                                    <select id="patient_id" type="text"
                                        class="form-control @error('patient_id') is-invalid @enderror" name="patient_id"
                                         required autocomplete="patient_id">

                                        @foreach ($patients as $patient)
                                            <option value="{{ $patient->patient_id }}" @selected($patient->patient_id == $appointment->patient_id) >
                                                {{ $patient->first_name }}
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

                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}" @selected($user->id  == $appointment->dentist_id  )  >
                                                {{ $user->name }}</option>
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
                                        name="appointment_date" value="{{ $appointment->appointment_date }}" required
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
                                        name="appointment_time" value="{{ $appointment->appointment_time }}" required autocomplete="new-appointment_time">

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

                                        @foreach ($users as $user)
                                            <option value="{{ $appointment->status }}" @selected($user->id  == $appointment->appointment_id) >
                                                {{ $appointment->status }}</option>
                                        @endforeach

                                        {{-- @foreach ($appointment as $appointment )

                                        <option value="{{ $appointment->appointment_id }}">{{ $appointment->status }}</option>


                                        @endforeach () --}}









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
                                        autocomplete="new-notes" value="{{ $appointment->notes }}" >

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
                                        {{ __('Delete') }}
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

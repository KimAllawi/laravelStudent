@extends('layouts.app')

@section('content')
    <div class="container">


        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="#">
                            @csrf
                            @method('PUT')

                             <div class="row mb-3">
                                <label for="appointment_id"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Appointment') }}</label>

                                <div class="col-md-6">
                                    <select id="appointment_id" type="text"
                                        class="form-control @error('appointment_id') is-invalid @enderror"
                                        name="appointment_id" >
                                        <option value="">Select</option>

                                        @foreach ($dataPatients as $dataPatients)
                                            <option value="{{ $dataPatients->appointment_id }}">{{ $dataPatients->appointment_id }}
                                            </option>
                                        @endforeach

                                    </select>

                                    @error('appointment_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                             <div class="row mb-3">
                                <label for="treatment_type"
                                    class="col-md-4 col-form-label text-md-end">{{ __('TreatmentType') }}</label>

                                <div class="col-md-6">
                                    <input id="treatment_type" type="text"
                                        class="form-control @error('treatment_type') is-invalid @enderror"
                                        name="treatment_type" required autocomplete="treatment_type" value="{{ $dataPatients->treatment_type }}">

                                    @error('treatment_type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="description"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>

                                <div class="col-md-6">
                                    <input id="description" type="text"
                                        class="form-control @error('description') is-invalid @enderror" name="description"
                                        required autocomplete="description" value="{{ $dataPatients->description }}">

                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="cost"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Cost') }}</label>

                                <div class="col-md-6">
                                    <input id="cost" type="text"
                                        class="form-control @error('cost') is-invalid @enderror" name="cost" required
                                        autocomplete="new-cost" value="{{ $dataPatients->cost }}" >

                                    @error('cost')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                             <div class="row mb-3">
                                <label for="treatment_date"
                                    class="col-md-4 col-form-label text-md-end">{{ __('TreatmentDate') }}</label>

                                <div class="col-md-6">
                                    <input id="treatment_date" type="date"
                                        class="form-control @error('treatment_date') is-invalid @enderror"
                                        name="treatment_date" required autocomplete="new-treatment_date" value="{{ $dataPatients->treatment_date }}">

                                    @error('treatment_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>




                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update') }}
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

@extends('layouts.appInvoices')

@section('content')
    <div class="container">


        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('Invoices.store') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="patient_id"
                                    class="col-md-4 col-form-label text-md-end">{{ __('PatientId') }}</label>

                                <div class="col-md-6">
                                    <select id="patient_id" type="text"
                                        class="form-control @error('patient_id') is-invalid @enderror" name="patient_id"
                                        value="{{ old('patient_id') }}" required autocomplete="patient_id">

                                        <option value="">Select</option>

                                        @foreach ($dataPatients as $dataPatient)
                                            <option value="{{ $dataPatient->patient_id }}">{{ $dataPatient->first_name }}
                                            </option>
                                        @endforeach


                                    </select>

                                    @error('patient_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="total_amount"
                                    class="col-md-4 col-form-label text-md-end">{{ __('TotalAmount') }}</label>

                                <div class="col-md-6">
                                    <input id="total_amount" type="text"
                                        class="form-control @error('total_amount') is-invalid @enderror" name="total_amount"
                                        value="{{ old('total_amount') }}" required autocomplete="total_amount">

                                    @error('total_amount')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="invoice_date"
                                    class="col-md-4 col-form-label text-md-end">{{ __('InvoiceDate') }}</label>

                                <div class="col-md-6">
                                    <input id="invoice_date" type="date"
                                        class="form-control @error('invoice_date') is-invalid @enderror" name="invoice_date"
                                        value="{{ old('invoice_date') }}" required autocomplete="invoice_date">

                                    @error('invoice_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="status"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Status') }}</label>

                                <div class="col-md-6">
                                    <select id="status" type="status"
                                        class="form-control @error('status') is-invalid @enderror" name="status" required
                                        autocomplete="new-status">

                                        <option value="">Select</option>
                                        <option value="paid">paid</option>
                                        <option value="unpaid">unpaid</option>
                                    </select>


                                    @error('status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
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

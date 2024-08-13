<?php

namespace App\Http\Controllers;

use App\Models\Invoices;
use App\Models\Patients;
use Illuminate\Http\Request;

use function Laravel\Prompts\select;
use function PHPUnit\Framework\isEmpty;

class InvoicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $invoices = Invoices::join('Patients', 'Invoices.patient_id', '=', 'Patients.patient_id')
            ->select('Invoices.invoice_id','Patients.first_name as patient_id', 'Invoices.total_amount', 'Invoices.status', 'Invoices.invoice_date')
            ->get();


        return view('invoices.index', compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $dataPatients = Patients::all();

        return view('invoices.create', compact('dataPatients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $invoices = Invoices::create(
            [
                'patient_id' => $request->patient_id,
                'total_amount' => $request->total_amount,
                'invoice_date' => $request->invoice_date,
                'status' => $request->status,
            ]
        );

        return redirect()->route('Invoices.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoices $invoices)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoices $invoices)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Invoices $invoices)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoices $invoices)
    {
        //
    }

    public function search(Request $request)
    {


        $query = $request->input('searchInvoices');

        $result = Invoices::join('Patients', 'Invoices.patient_id', '=', 'Patients.patient_id')

            ->select('Invoices.invoice_id', 'Patients.first_name as patient_id', 'Invoices.total_amount', 'Invoices.status', 'Invoices.invoice_date')
            ->where('Patients.first_name', 'LIKE', "%{$query}%")
            ->get();

        $empty = $result->isEmpty();


        return view('invoices.index', compact('result', 'empty'));
    }
}

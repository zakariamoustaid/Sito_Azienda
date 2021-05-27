<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Project;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    //blocco accesso se utente non è admin
    public function __construct()
    {
        $this->middleware('admin');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();

        return view('customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::all();

        return view('customers.create', compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $customers = new Customer();
        $customers->ragione_sociale = $input['ragione_sociale'];
        $customers->name_ref = $input['name_ref'];
        $customers->surname_ref = $input['surname_ref'];
        $customers->email_ref = $input['email_ref'];
        $customers->save();
        
        //return redirect('/customers');
        return json_encode(['status' => 'ok', 'customers' => $customers]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $input = $request->all();

        $validatedData = $request->validate([
            'ragione_sociale'       => 'required',
            'email_ref'             => 'required',
        ]);

        $customer->ragione_sociale = $input['ragione_sociale'];
        $customer->email_ref = $input['email_ref'];
        $customer->save();

        return redirect('customers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $projects = Project::all();
        $message = "Eliminazione avvenuta con successo";
        $t = 1;
        foreach($projects as $p)
        {
            if($p->customer->id == $customer->id)
            {
                $message = "Non è possibile chiudere il contratto con " . $customer->ragione_sociale;
                $t = 0;
                return redirect('customers')->with('alert', $message);
            }
        }

        if($t)
            $customer->delete();

            return json_encode(['status' => 'ok']);
    }
}

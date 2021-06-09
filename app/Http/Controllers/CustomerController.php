<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    public function edit(Request $request)
    {
        $input = $request->all();
        $cus = Customer::all();

        foreach($cus as $c)
        {
            if($c->id == $input['customer_id'])
            {
                $c->email_ref = $input['email_new'];
                $c->save();
                return json_encode(['status' => 'ok', 'customers' => $c]);
            }
        }

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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $input = $request->all();

        $projects = DB::table('projects')
        ->where('customer_id', $input['customer_id'])
        ->get();

        Log::info('ciaociao'.$input['customer_id']);

        if($projects == null)
        {
            $cus = DB::table('customers')
            ->where('id', $input['customer_id'])
            ->delete();

            return json_encode(['status' => 'ok']);
        }

    }
}

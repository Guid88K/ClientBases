<?php

namespace App\Http\Controllers;

use App\Client;
use App\Http\Resources\ClientResource;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;


class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();
        return view('index', ['clients' => $clients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'address' => 'required',
            'telephone' => 'required',
        ]);

        $user = User::find(Auth::user()->id);
        $conection = User::find($user->id);

        $clients = new Client();
        $clients->name = $request->name;
        $clients->surname = $request->surname;
        $clients->address = $request->address;
        $clients->telephone = $request->telephone;
        $user->clients()->save($clients);

        $check = Client::firstOrCreate([
            'telephone' => $request->telephone
        ], [
            'name' => $request->name,
            'surname' => $request->surname,
            'address' =>$request->address
        ]);


        if (($check->id)<($clients->id)){
            return redirect('/client/create')->with('notsuccess', 'this record exist');

        }else


        return redirect('/client')->with('success', 'Stock has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function sort(Request $request)
    {
//        $clients = Client::all();


//

        //
        if ($request->name) {

            $clients = Client::where('name', 'like', '%' . $request->name . '%');
        }
        if ($request->surname) {
            $clients = DB::table('client')->where('surname', 'like', '%' . $request->surname . '%');
        }
        if ($request->address) {
            $clients = DB::table('client')->where('surname', 'like', '%' . $request->surname . '%');
        }
        if ($request->telephone) {
            $clients = DB::table('client')->where('surname', 'like', '%' . $request->surname . '%');
        }
        $clients = $clients->get();

        return view('index', ['clients' => $clients]);
    }
}

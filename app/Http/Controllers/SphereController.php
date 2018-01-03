<?php

namespace App\Http\Controllers;

use App\Sphere;
use App\Http\Requests\StoreSphere;
use Illuminate\Http\Request;
use Input;
use Redirect;

class SphereController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	// get all spheres from the database
    	$spheres = Sphere::orderBy('sphere_name', 'asc')->get();
    	 
    	$data['spheres'] = $spheres;
    	 
    	return view('spheres', $data);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$data = [];
    	
    	return view('createSphere', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Sphere $sphere
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSphere $request, Sphere $sphere)
    {
    	$sphere->fill(Input::all());
    	$sphere->save();
    	
    	return Redirect::to('spheres');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

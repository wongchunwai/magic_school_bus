<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\BusStop;
use DB;

use Illuminate\Http\Request;

class BusStopController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{		
		$postal_result = BusStop::find($id);
		if (!is_null($postal_result))
		{
			$search_lat = $postal_result->lat;
			$search_lng = $postal_result->lng;
			
			if($search_lat != null && $search_lng != null)
			{
				$distance = DB::raw(' 
				ROUND(111111.1 *
				DEGREES(ACOS(COS(RADIANS('.$search_lat.'))
				* COS(RADIANS(lat))
				* COS(RADIANS('.$search_lng.' - lng))
				+ SIN(RADIANS('.$search_lat.'))
				* SIN(RADIANS(lat)))),0) AS distance_in_meter');
		
				$result = BusStop::orderBy('distance_in_meter', 'ASC')->take(10)->get(array('id','name','lat','lng',$distance));
			}
			
			if (!is_null($result))
				return $result;
			else
				return null;	
		}
		else
			return null;
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}

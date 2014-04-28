<?php

class UnitController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$units = Unit::all();
		return View::make('other.unit.index', compact('units'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('other.unit.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$unit = new Unit;

		$unit->name = Input::get('name');

		if ($unit->validate(Input::all())) {
			$unit->save();

			return Redirect::to('unit/create')->with('message', 'success');
		} else {
			return Redirect::to('unit/create')->withErrors($unit->error)->withInput();
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$model = Unit::find($id);

		return View::make('other.unit.update', compact('model'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$model = Unit::find($id);
		$model->name = Input::get('name');
		$model->save();

		return Redirect::to('unit');
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
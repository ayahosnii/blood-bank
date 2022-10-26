<?php

namespace App\Http\Controllers;

use App\Models\Governorate;
use Illuminate\Http\Request;

class GovernorateController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
      $governorates = Governorate::paginate(20);
      return view('admin.governorates.index', compact('governorates'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
      $governorates = Governorate::paginate(20);
      return view('admin.governorates.create', compact('governorates'));
  }
  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
      $rules = ['name_en' => 'required', 'name_ar' => 'required'];
      $messages = ['name_en.required' => 'En Name is required', 'name_ar.required' => 'Ar Name is required'];
      $this->validate($request,$rules, $messages);

     /* $governorates = new Governorate();
      $governorates->name_en = $request->input('name_en');
      $governorates->name_ar = $request->input('name_ar');
      $governorates->save();*/

      $governorates = Governorate::create($request->all());


      flash()->success('Governorate has added successfully');
      return redirect()->route('governorates.index', compact('governorates'));
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {

  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
      $governorate = Governorate::find($id);
      return view('admin.governorates.edit', compact('governorate'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(Request $request, $id)
  {
      $governorate = Governorate::findOrFail($id);
      $governorate->update($request->all());
      flash()->success('Governorate has updated successfully');
      return redirect()->route('governorates.index', compact('governorate'));
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
      $governorate = Governorate::findOrFail($id);
      $governorate->delete();
      flash()->success('Governorate has deleted successfully');
      return redirect()->route('governorates.index', compact('governorate'));

  }

}

?>

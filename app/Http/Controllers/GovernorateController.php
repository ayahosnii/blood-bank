<?php

namespace App\Http\Controllers;

use App\Models\Governorate;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use function get_default_lang;

class GovernorateController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function govIndex()
  {
      $governorate = get_g_lang();
      $response = returnSuccessMessage('success', '200', $governorate);
      return response() ->json($response);

  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {

  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {

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

  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {

  }

}

?>

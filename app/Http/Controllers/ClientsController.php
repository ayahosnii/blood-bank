<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Governorate;
use Illuminate\Http\Request;

class ClientsController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
      $clients = Client::paginate(20);
      return view('admin.clients.index', compact('clients'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
      $clients = Client::paginate(20);
      return view('admin.clients.create', compact('clients'));
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

     /* $clients = new Client();
      $clients->name_en = $request->input('name_en');
      $clients->name_ar = $request->input('name_ar');
      $clients->save();*/

      $clients = Client::create($request->all());


      flash()->success('Client has added successfully');
      return redirect()->route('clients.index', compact('clients'));
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
      $client = Client::find($id);
      return view('admin.clients.edit', compact('client'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(Request $request, $id)
  {
      $client = Client::findOrFail($id);
      $client->update($request->all());
      flash()->success('Client has updated successfully');
      return redirect()->route('clients.index', compact('client'));
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
      Client::destroy($id);
      flash()->success('Client has deleted successfully');
      return redirect()->route('clients.index');

  }

  public function changeStatus($id)
  {
    $client = Client::find($id);
    $status = $client->activation;
        if($status == '1'){
            $client->update(['activation' => 0]);
            return redirect()->route('clients.index')->with(['success' => 'تم تفعيل المستخدم بنجاح']);
        }elseif ($status == '0'){
            $client->update(['activation' => 1]);
            return redirect()->route('clients.index')->with(['success' => 'تم ايقاف المستخدم بنجاح']);
        }else{
            return redirect()->back();
        }
  }

}

?>

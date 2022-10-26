<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Governorate;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
      $categories = Category::paginate(20);
      return view('admin.categories.index', compact('categories'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
      $categories = Category::paginate(20);
      return view('admin.categories.create', compact('categories'));
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

     /* $categories = new Category();
      $categories->name_en = $request->input('name_en');
      $categories->name_ar = $request->input('name_ar');
      $categories->save();*/

      $categories = Category::create($request->all());


      flash('Message')->success('Category has added successfully');
      return redirect()->route('categories.index', compact('categories'));
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
      $category = Category::find($id);
      return view('admin.categories.edit', compact('category'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(Request $request, $id)
  {
      $governorate = Category::findOrFail($id);
      $governorate->update($request->all());
      flash()->success('Category has updated successfully');
      return redirect()->route('categories.index', compact('governorate'));
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
      $governorate = Category::findOrFail($id);
      $governorate->delete();
      flash()->success('Category has deleted successfully');
      return redirect()->route('categories.index', compact('governorate'));

  }

}

?>

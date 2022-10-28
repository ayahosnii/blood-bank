<?php

namespace App\Http\Controllers;

use App\Models\Governorate;
use App\Models\User;
use Illuminate\Http\Request;

class SearchsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function govSearch(Request $request)
    {
        if($request->ajax()) {
            $output = "";
            $governorates = Governorate::where('name_en', 'LIKE', '%'.$request->search.'%')
                ->orWhere('name_ar', 'LIKE', '%'.$request->search.'%')->get();

            if ($governorates) {
                foreach ($governorates as $governorate) {
                    $output .=
                        '<tr>' .
                        '<td>'.$governorate->id .'</td>' .
                        '<td>'.$governorate->name_en .'</td>' .
                    '<td>'. '<span class="badge bg-danger">'.$governorate->client->count().'</span>' . '</td>' .
                    '<td>'. '<a class="btn btn-app" href= "governorates/'.$governorate->id . '/edit">' .
                               '<i class="fas fa-edit"></i> Edit'.
                           '</a>' .
                            '<a class="btn btn-app" data-toggle="modal" id="smallDelete" data-target="#smallModal" title="Delete Category" data-attr= href= "governorates/'.$governorate->id . '">' .
                            '<i class="fas fa-trash"></i> Delete'.
                            '</a>'
                        . '</td>' .'</tr>';


                }

            }
            return response()->json($output);
        }
        return view('admin.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function userSearch(Request $request)
    {
        if($request->ajax()) {
            $output = "";
            $users = User::where('name', 'LIKE', '%' . $request->search . '%')
                ->orWhere('email', 'LIKE', '%' . $request->search . '%')->get();

                if ($users) {
                    foreach ($users as $user) {
                        $output .=
                            '<tr>' .
                            '<td>'.$user->id .'</td>' .
                            '<td>'.$user->name .'</td>' .
                            '<td>'. '<span class="badge bg-danger">'.$user->email.'</span>' . '</td>' .
                            '<td>'. '<a class="btn btn-app" href= "users/'.$user->id . '/edit">' .
                            '<i class="fas fa-edit"></i> Edit'.
                            '</a>' .
                            '<a class="btn btn-app" data-toggle="modal" id="smallDelete" data-target="#smallModal" title="Delete Category" data-attr= href= "users/'.$user->id . '">' .
                            '<i class="fas fa-trash"></i> Delete'.
                            '</a>'
                            . '</td>' .'</tr>';


                    }

                }
            return response()->json($output);
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

<?php 

namespace App\Http\Controllers;

use App\AcceptanceCriteria;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AcceptanceCriteriaController extends Controller 
{

  /**
   * Display a listing of the resource.
   * @param $id
   * @return Response
   */
  public function toggle($id)
  {
      $criteria = AcceptanceCriteria::find($id);
    if($criteria->complete){
        $criteria->complete = false;
        $criteria->save();
    }else{
        $criteria->complete = true;
        $criteria->save();
    }
    return response()->json(['success'=>true]);
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
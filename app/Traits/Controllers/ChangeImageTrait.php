<?php



namespace App\Traits\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


trait ChangeImageTrait
{


 /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Remota  $remota
     * @return \Illuminate\Http\Response
     */
 public function imagen(Request $request, User $user)
 {
        
    $image_name = $user->id.'.'.$request->image->getClientOriginalExtension();


    $status = 'success';
    $content = 'Imagen Cambiada Exitosamente';

  try {


        DB::beginTransaction();


        $user->image_path =  $image_name;

        $request->image->storeAs('public/image_profile', $image_name);

        $user->save();


        DB::commit();


} catch (\Throwable $th) {


        DB::rollback();

        $status = 'error';
        $content = 'Se produjo un error al momento de cargar la imagen';
}        
           // dd($request,$request->all(), $user);
           
           return redirect()
           ->route('tiendas')
           ->with('process_result',[
                'status' => $status,
                'content' => $content,
           ]);
  }




}
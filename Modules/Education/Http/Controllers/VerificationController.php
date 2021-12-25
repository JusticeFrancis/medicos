<?php

namespace Modules\Education\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Modules\Education\Entities\TutorVerification as EntitiesTutorVerification;
use Modules\Education\Entities\TutorVerificationFile;
use TutorVerification;
use TutorVerificationFiles;

class VerificationController extends Controller
{
   public function create(Request $request)
   {
       
      $verification = new EntitiesTutorVerification();
      $verification->user_id = '1';
      $verification->course_id = $request->course_id;
      $verification->description = $request->description;
      $verification->files_count = 0;
         $verification->save();

     
      
      foreach ($request->file('files') as  $key => $file) {
          
          $vfs = new TutorVerificationFile();
          $vfs->name = 'justicefrancis'.$verification->id.uniqid();
          $vfs-> tutor_verification_id = $verification->id;

          
          $extension = $file->getClientOriginalExtension();
          $filenamestore = time() . '.' . $extension;
          Storage::put('public/verifications/'.$filenamestore, fopen($file,'r+'));




          $vfs->path_name = 'a';
          $verification->files_count = $verification->files_count + 1;
          $vfs->save();
      }
     
      dd($verification->files);
   }

   public function ty()
   {
       echo csrf_token();
   }

  



    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}

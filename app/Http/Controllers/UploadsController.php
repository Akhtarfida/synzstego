<?php

namespace App\Http\Controllers;

//require_once(app_path().'\Library\php_image_magician.php');

use App\Steganography;
use Illuminate\Http\Request;
use App\library\ImageLib;
use App\Upload;
use App\Watermark;
use Auth;
use App\User;
use Session;




class UploadsController extends Controller
{


    public function watermarkView()
    {
        return view('admin.watermark.index');
    }





    public function watermark(Request $request)
    {


        $path = 'uploads/watermark/Temp/';
        $wpath = 'uploads/watermark/watermarked/';
        $photos = array();



           $this->validate($request, [

               'images' => 'required',
               'images.*' => 'image',
               'wposition' => 'required',
               'watermarkedlogo' => 'required|image'
           ]);

           $logo = $request->watermarkedlogo;
           $logo_new_name = time() . $logo->getClientOriginalName();

           if($logo->move($path, $logo_new_name))
           {
               $temp_path1 = $path.$logo_new_name;
           }



        if(!strcmp($request['selectwatermark'], "WatermarkText")) {
            $this->validate($request, [

                'images' => 'required',
                'images.*' => 'image',
                'wposition' => 'required',
                'selectwatermark' => 'required',
                'watermarkedtext' => 'required'
            ]);
        }




        $wposition = $request['wposition'];


// Renaming the uploaded images and watermarking
        $images = $request->file('images');
        if ($request->hasFile('images')) {

            foreach ($images as $image):
                $img = $image;

                $title = $img->getClientOriginalName();

                $imgName = time().$img->getClientOriginalName();

                // storing the temp path
                if($img->move($path, $imgName))
                {
                    $temp_path2 = $path.$imgName;
                }

                if(!strcmp($temp_path1,$temp_path2))
                {
                    unlink($temp_path1);
                    Session::flash('info', 'Image and logo are same');
                    return redirect()->back();
                }


                // selecting each image for watermark
                $magicObj = new ImageLib($temp_path2);


                // Adding Watermark to each image
                $magicObj->addWatermark($temp_path1, $wposition, 10);



                // Saving the watermarked image
                $magicObj->saveImage($wpath.$imgName);



                array_push($photos,$wpath.$imgName);

                $magicObj->__destruct();

                // removing the files from temp path
                if($temp_path2!=null)
                {
                    unlink($temp_path2);
                }




                // Saving into Database
                $upload_img = new Upload();

                $user = Auth::user();

                $upload_img->user_id =  $user->id;
                $upload_img->title = $title;
                $upload_img->name = $wpath.$imgName;
                $upload_img->isWatermark = 1;
                $upload_img->isData = 0;

                $upload_img->save();



                $watermark = new Watermark();

                $watermark->upload_id = $upload_img->id;

                $watermark->save();



            endforeach;

            if($temp_path1!=null)
            {
                unlink($temp_path1);
            }
        }


        return redirect()->route('user.watermark.download');

    }

    public function download()
    {
        $upload = new Upload();
        $user = Auth::user();

        $data = $upload->where('user_id', $user->id)
            ->where('iswatermark', 1)
            ->orderBy('id', 'DESC')->simplePaginate(6);



        return view('admin.watermark.download')->with('data', $data);
    }

    public function downloadImage($imageId){
        $download = Upload::where('id', $imageId)->firstOrFail();
        $path = public_path().'/' .$download->name;
        return response()->download($path, $download
            ->title, ['Content-Type' => $download->mime]);
    }

    public function trash($id)
    {
        $photo = Upload::find($id);

        $photo->delete();

        Session::flash('success', 'Image Trashed');

        return redirect()->back();

    }

    public function getTrashed()
    {
        $images = Upload::onlyTrashed()->orderBy('id', 'DESC')->simplePaginate(6);


        return view('admin.photos.trashed')->with('images', $images);
    }

    public function restore($id)
    {
        $image = Upload::withTrashed()->where('id', $id)->first();

        $image->restore();

        Session::flash('success', 'Image Restored!');

        return redirect()->route('folders');

    }

    public function kill($id)
    {

        $image = Upload::withTrashed()->where('id', $id)->first();


        if($image->iswatermark==1)
        {
            $img = $image->watermark->delete();
        }

        if($image->isData==1)
        {
            $image->steganography->delete();
        }

       $image->forceDelete();

        unlink($image->name);

        Session::flash('success', 'Image Deleted');

        return redirect()->back();


    }
}

<?php

namespace App\Http\Controllers;

use App\Steganography;
use App\Upload;
use Illuminate\Http\Request;

use App\Library\DataProcessing;
use App\Library\Processing;
use App\Library\AES;
use Auth;
use DB;
use Symfony\Component\Process\Process;
use Response;

class StegController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.stegimgs.index');
    }



    public function steganofy(Request $request)
    {

        $path = 'uploads/steganofy/steganofied/';
        $extension = "png";
        $path1 = 'uploads/steganofy/steganofied/';

        $this->validate($request, [

            'stegimg' => 'required|image',
            'enckey'  => 'required',
            'secretmessage' => 'required'
        ]);

        $img = $request->stegimg;
        $enckey = $request->enckey;
        $secmessage = $request->secretmessage;
        $title = $img->getClientOriginalName();
        // Show the title without extension
        $img_newname = time(). $img->getClientOriginalName();
        $name = time().rand(100,999).'.'. $extension;
        $img->move($path, $img_newname);
        $path = $path.$img_newname;
        $path1 = $path1.$name;

//         Encryption
        $aes = new AES($secmessage, $enckey, 256);
        $encdata = $aes->encrypt();

//        converting into binary

        $bdata = DataProcessing::stringToBinary($encdata);


        $bdatachunks = str_split($bdata, 2);

//        echo '<img src="'.asset($path).'">'; this is how to embed html in php
 //       echo '<img src="'.asset('uploads/steganofy/temp/1584177002Screenshot (8).png').'">';


        // Hiding Data into Image


        $steg_img =Processing::hide_data($path, $bdatachunks, $path1);
        
        // Saving into Database
        $upload_img = new Upload();

        $user = Auth::user();

        $upload_img->user_id =  $user->id;
        $upload_img->title = $title;
        $upload_img->name = $steg_img;
        $upload_img->isWatermark = 0;
        $upload_img->isData = 1;

        $upload_img->save();

        $steg_img = new Steganography();

        $steg_img->upload_id = $upload_img->id;
        $steg_img->enckey = $enckey;
        $steg_img->save();

        return redirect()->back();

    }




    public function viewDownloads()
    {
        $upload = new Upload();
        $user = Auth::user();

        $data = $upload->where('user_id', $user->id)
            ->where('isdata', 1)
            ->orderBy('id', 'DESC')->simplePaginate(5);

        return view('admin.stegimgs.download')->with('data', $data);
    }

    public function extract()
    {
        $upload = new Upload();
        $user = Auth::user();

        $data = $upload->where('user_id', $user->id)
            ->where('isdata', 1)
            ->orderBy('id', 'DESC')->simplePaginate(5);

        return view('admin.stegimgs.extract-view')->with('data', $data);
    }

    public function extractData(Request $request)
    {
        $id = $request->id;
        $enckey = $request->enckey;

        $img = Upload::where('id', $id)->firstOrFail();

        $image = $img->name;
        // Now We have image name/path and encryption key

        $data = Processing::showData($image);

        $data1 = DataProcessing::binToAscii($data);


        $dec = new AES($data1, $enckey, 256);

        $message = $dec->decrypt();

        return redirect()->back()->with(['message' => $message]);


    }



    public function downloadText(Request $request) {
        // prepare content
        $message = $request->secmessage;
        $content = "|=========Secret Message=======| \n";
//        foreach ($logs as $log) {
//            $content .= $logs;
//            $content .= "\n";
//        }
        $content .= $message;

        // file name that will be used in the download
        $fileName = "Message.txt";

        // use headers in order to generate the download
        $headers = [
            'Content-type' => 'text/plain',
            'Content-Disposition' => sprintf('attachment; filename="%s"', $fileName)

        ];

        // make a response, with the content, a 200 response code and the headers
        return Response::make($content, 200, $headers);
    }


    public function edit($id)
    {

        $user = Auth::user();

        // Here we use left join to extract data from 3 tables
        $stegImage = DB::table('uploads')
            ->leftJoin('steganographies', 'uploads.id', '=', 'steganographies.upload_id')
            ->select('uploads.id', 'uploads.user_id', 'uploads.title', 'uploads.name', 'steganographies.enckey')
            ->where('uploads.id', '=', $id, 'AND','user_id', '=', $user->id )
            ->first();


        $data = Processing::showData($stegImage->name);

        $data1 = DataProcessing::binToAscii($data);


        $dec = new AES($data1, $stegImage->enckey, 256);

        $message = $dec->decrypt();


//        echo "<pre>";
//        print_r($stegImage);
//        dd();

        return view('admin.stegimgs.edit', compact('stegImage', 'message'));
    }

    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'enckey' => 'required',
            'secretmessage' => 'required'
        ]);

        $upload_img = Upload::find($id);


        if($request->hasFile('file'))
        {
            unlink($upload_img->name);

            $image = $request->file;

            $image_new_name = time().$image->getClientOriginalName();

            $image->move('uploads/posts', $image_new_name);

            $upload_img->name= 'uploads/posts/' . $image_new_name;
            $upload_img->title = $image->getClientOriginalName();
            $upload_img->isData = 1;
            $upload_img->isWatermark = 0;
        }

        $enckey = $request->enckey;
        $message = $request->secretmessage;

        //         Encryption
        $aes = new AES($message, $enckey, 256);
        $encdata = $aes->encrypt();

//        converting into binary

        $bdata = DataProcessing::stringToBinary($encdata);


        $bdatachunks = str_split($bdata, 2);

        // Hiding Data into Image
        $steg_img =Processing::hide_data($upload_img->name, $bdatachunks);

        // Saving into Database

        $user = Auth::user();

        $upload_img->user_id =  $user->id;

        $upload_img->save();

        $steg_img = Steganography::find($upload_img->steganography->id);

        $steg_img->enckey = $enckey;
        $steg_img->save();

        return redirect('/stegimgs/view/download');

    }


}

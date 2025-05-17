<?php

 namespace App\Http\Controllers\Event;

 use App\Http\Controllers\Controller;
 use Illuminate\Http\Request;
 use App\Models\Graphs;
 use App\Models\Article;
 use Illuminate\Support\Str;
 use App\Models\Event\Media;

 class MediaController extends Controller
 {
     /**
      * Display a listing of the resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function index()
     {
        $mediaFiles = Media::orderBy('sequence_no', 'asc')->get();
        $newMediaArray = array();
        
        foreach ($mediaFiles as $merdiakey => $mediavalue) {
            $mediaFileType = explode(".",$mediavalue['files'])[1];
            $videoTypeArray = array('mp3','mp4');
            $pdfTypeArray = array('pdf');
             if(in_array($mediaFileType, $videoTypeArray))
             {
                $fileType = 'video';
             }elseif (in_array($mediaFileType, $pdfTypeArray)) {
                $fileType = 'pdf';
             }else{
                $fileType = 'image';
             }
            $newMediaArray[] =  array(
                'id' => $mediavalue['id'],
                'sequence_no' => $mediavalue['sequence_no'],
                'files' => $mediavalue['files'],
                'fileType' => $fileType,
                'created_at' => $mediavalue['created_at'],
                'updated_at' => $mediavalue['updated_at']
            );
        }
        $mediaFiles = $newMediaArray;
        // dd($mediaFiles);
        return view('admin.event.media.listing', compact('mediaFiles'));
     }

     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function create()
     {
       
     }

     /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
     public function store(Request $request)
     {

         $request->validate([
            'sequence' => 'required',
            'fileToUpload' => 'required|mimes:jpeg,png,pdf,mp3,mp4,video/mp4', // Adjust the allowed file types and size as per your requirements
         ]);
         $request = request()->all();
         $tmpFile = $_FILES['fileToUpload']['tmp_name'];
         // dd($tmpFile);
        $targetDirectory = "images/event/media/";
        if (!file_exists($targetDirectory)) {
            mkdir($targetDirectory, 0777, true);
        }

         $newFile = $targetDirectory . str_replace(' ', '_', $_FILES['fileToUpload']['name']);
         $result = move_uploaded_file($tmpFile, $newFile);
         $imageVal = str_replace(' ', '_', $_FILES['fileToUpload']['name']);
         $request['files'] = $imageVal;
         $request['sequence_no'] = $request['sequence'];
        

         Media::create($request);
        //  $createdLink = url('/'.$newFile);

        //  return redirect('yn-admin/event/media')
        //      ->with(['success' => 'Your File is uploaded.','message' => $createdLink]);
        return redirect('yn-admin/event/media')
            ->with('success', 'Your Media file is uploaded successfully.');
     }

     /**
      * Display the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function show($slug)
     {   
         

     }

     /**
      * Show the form for editing the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function edit($id)
     {
         $mediaFile = Media::where('id', $id)->first();
         
         $mediaFileType = explode(".",$mediaFile['files'])[1];
         $videoTypeArray = array('mp3','mp4');
         $pdfTypeArray = array('pdf');
          if(in_array($mediaFileType, $videoTypeArray))
          {
             $fileType = 'video';
          }elseif (in_array($mediaFileType, $pdfTypeArray)) {
             $fileType = 'pdf';
          }else{
             $fileType = 'image';
          }
         $newMediaFile =  array(
             'id' => $mediaFile['id'],
             'sequence_no' => $mediaFile['sequence_no'],
             'files' => $mediaFile['files'],
             'fileType' => $fileType,
             'created_at' => $mediaFile['created_at'],
             'updated_at' => $mediaFile['updated_at']
         );
         $mediaFile = $newMediaFile;
         return view('admin.event.media.edit', compact('mediaFile'));
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
         $request->validate([
             'sequence' => 'required'
         ]);

         $Media = Media::where('id', $id);

         if(isset($request['sequence']) && !empty($request['sequence'])){
             $request['sequence_no'] = $request['sequence'];
         }

         if($_FILES['fileToUpload']['name'] != ''){
            
            $tmpFile = $_FILES['fileToUpload']['tmp_name'];
            $targetDirectory = "images/event/media/";
            if (!file_exists($targetDirectory)) {
                mkdir($targetDirectory, 0777, true);
            }
            $newFile = $targetDirectory . str_replace(' ', '_', $_FILES['fileToUpload']['name']);
            $result = move_uploaded_file($tmpFile, $newFile);
            $imageVal = str_replace(' ', '_', $_FILES['fileToUpload']['name']);
         } else {
             $imageVal = $Media->first()->files;
         }
         $request['files'] = $imageVal;
         
         $Media->update([
             'sequence_no' => $request['sequence_no'],
             'files' => $imageVal
         ]);

         return redirect('yn-admin/event/media')
             ->with('success', 'Media file updated successfully.');
     }

     /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function destroy($id)
     {
         $Media = Media::where('id', $id);
         $Media->delete();

         return redirect('yn-admin/event/media')
             ->with('success', 'Media File deleted successfully');
     }

     public function check_if_used(Request $request)
     {
         $id = $request->id;
         $articles = Article::select('title','id', 'slug')->where('category', $id)->get();

         return $articles;
     }
 }
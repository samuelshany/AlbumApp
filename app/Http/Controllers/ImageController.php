<?php

namespace App\Http\Controllers;

use App\Album;
use App\image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function addImage($id)
    {
        return view('album/addImage',compact('id'));
    }
    public function addImageHandel(Request $request,$id)
    {
        
        $validated = $request->validate([
            'image' => 'required|mimes:jpg,bmp,png',
            'name' => 'required ',
        ]);
        
        $imageName="";
        if($request->hasFile('image'))
        {
            $image=$request->file('image');
            $name=time().'.'.$image->getClientOriginalExtension();
          
            $imageName='images/'.$name;
           $request->image->move(public_path('images'),$imageName);
            
            
        }
      
        $imagee = new image();

        $imagee->name=$request->name;
        $imagee->src=$imageName;
        $imagee->album_id=$id;
        $imagee->save();
        $album = Album::where('id',$id)->get();
       
        foreach($album as $alb)
        {
            $alb->imageCount = $alb->imageCount + 1;
            //dd($alb->imageCount);
            $alb->save();
        }
     
        return view('album/addImage',compact('id'));
    }
    public function deleteImage($id)
    {
        $album2 = image::where('id',$id)->get();
       
    foreach($album2 as $alb)
    {
        $album3 =Album::where('id',$alb->album_id)->get();
        foreach($album3 as $a)
        {
            $a->imageCount= $a->imageCount-1;
           
            $a->save();
        }

   
        
        $image = image::where('id',$id)->delete(); 
      
       
        return $this->openAlbum($alb->album_id);
       
    }
}
     
    public function openAlbum($id)
    {
      
        $album =Album::where('id',$id)->get();
        
        $albums =Album::get();
        $albums1 =Album::get();
       // dd($album);
       $images =image::where('album_id',$id)->get();
        return view('album/album',compact('album','images','albums','albums1','id'));
    }
  
    
    
}

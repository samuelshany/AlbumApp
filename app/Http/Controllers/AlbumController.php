<?php

namespace App\Http\Controllers;

use App\Album;
use App\image;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Whoops\Run;

class AlbumController extends Controller
{
    public function addAlbumForm()
    {
        return view('album/addAlbumForm');
    }
    public function addAlbumHandel(Request $request)
    {
        
        $validated = $request->validate([
            'cover' => 'required',
            'name' => 'required |mimes:jpg,bmp,png',
        ]);
        $imageName="";
        if($request->hasFile('cover'))
        {
            $image=$request->file('cover');
            $name=time().'.'.$image->getClientOriginalExtension();
          
            $imageName='images/'.$name;
           $request->cover->move(public_path('images'),$imageName);
            
            
        }
        $album = new Album();

        $album->Name=$request->name;
        $album->imageCover=$imageName;
        $album->user_id=Auth::user()->id;
        $album->imageCount=0;
        $album->save();
        $user = User::where('id',Auth::user()->id)->get();
        foreach($user as $use)
        {
            $use->album_count = $use->album_count +1;
            $use->save();
        }
     
        return redirect('/allAlbums');
    }
    
    public function openAlbum($id)
    {
      
        $album =Album::where('id',$id)->get();
        
        $albums =Album::get();
       // $albums1 =Album::get();
       // dd($album);
      // $images = Album::find(Auth::user()->id)->images;
       $images =image::where('album_id',$id)->get();
        return view('album/album',compact('album','images','albums','id'));
    }
    public function allAlbums()
    {
        //$albums = Album::where('user_id',Auth::user()->id)->get();
        $albums = User::find(Auth::user()->id)->albums;
        return view('album/allAlbums' ,compact('albums'));
    }
    
    public function deleteAlbumWithPic($id)
    {
        
        
        $images = image::where('album_id',$id)->delete();
        $album = Album::where('id',$id)->delete();
        $user = User::where('id',Auth::user()->id)->get();
        foreach($user as $use)
        {
            $use->album_count=$use->album_count-1;
            $use->save();
        }
       
        return redirect('/allAlbums');
       
    }
    public function updateHandel(Request $request,$id)
    {
        $validated = $request->validate([
            
            'name' => 'required ',
            'cover'=>'mimes:jpg,bmp,png'
        ]);
        $album = Album::where('id',$id)->get();
        foreach($album as $alb)
        {
        $imageName="";
        if($request->hasFile('cover'))
        {
            $image=$request->file('cover');
            $name=time().'.'.$image->getClientOriginalExtension();  
            $imageName='images/'.$name;
           $request->cover->move(public_path('images'),$imageName);
           $alb->imageCover = $imageName;
        }
     
       
            $alb->Name = $request->name;
            
            $alb->save();
        }
        return $this->openAlbum($id);
    }
    public function updateForm($id)
    {
        $album = Album::Where('id',$id)->get();
        return view('album/updateForm',compact('id','album'));
    }
    public function moveAll(Request $request,$id)
    {
        $newAlbum = image::where('album_id',$id)->get();
        $album=Album::where('id',$request->albumId)->get();
        foreach($newAlbum as $new)
        {
            foreach($album as $alb)
            {
                $new->album_id=$request->albumId;
                $alb->imageCount= $alb->imageCount+1;
                $alb->save();
                $new->save();
            }
         
        }
        $album = Album::where('id',$id)->delete();
        $user = User::where('id',Auth::user()->id)->get();
        foreach($user as $use)
        {
            $use->album_count=$use->album_count-1;
            $use->save();
        }
       
        
        return $this->allAlbums();
    }    
}

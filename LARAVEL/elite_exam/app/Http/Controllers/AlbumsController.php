<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Albums;

class AlbumsController extends Controller
{
    private $aRequest;

    public function __construct(Request $oRequest)
    {
        $this->aRequest = $oRequest->all();
    }
  
    public function createAlbum()
    {
        Albums::create([
            'artists_id' => $this->aRequest['artists_id'],
            'year' => $this->aRequest['year'],
            'name' => $this->aRequest['name'],
            'sales' => $this->aRequest['sales']
        ]);

    
        return response()->json(array(
            'bResult' => true,
            'message' => 'Data inserted successfully!'
        ));
    }

    public function getAlbumById($iAlbumId)
    {
        return response()->json(Albums::where('id', $iAlbumId)->first());
    }

    public function deleteAlbumById($iAlbumId)
    {
        return response()->json(Albums::where('id', $iAlbumId)->delete());
    }

    public function updateAlbumById($iAlbumId)
    {
        return response()->json(Albums::where('id', $iAlbumId)->update([
            'artists_id' => $this->aRequest['artists_id'],
            'year' => $this->aRequest['year'],
            'name' => $this->aRequest['name'],
            'sales' => $this->aRequest['sales']
        ]));
    }
}
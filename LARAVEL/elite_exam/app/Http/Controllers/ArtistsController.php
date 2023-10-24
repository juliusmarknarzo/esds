<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artists;
use App\Models\Albums;

class ArtistsController extends Controller
{
    private $aRequest;

    public function __construct(Request $oRequest)
    {
        $this->aRequest = $oRequest->all();
    }
    /**
     * Display total number of albums sold per artist
     */
    public function getAlbumsSoldTotalPerArtists()
    {
        $aArtists = $this->getSoldPerArtists('total_albums_sold');
        return response()->json($aArtists);
    }
    /**
     * Display combined album sales per artist
     */
    public function getCombinedSalesPerArtist()
    {
        $aArtists = $this->getSoldPerArtists('combined_sales');
        return response()->json($aArtists);
    }
    /**
     * common functionalities for two functions above
     */
    private function getSoldPerArtists($sKey)
    {
        $aArtists = Artists::with('albums')->get();
        foreach ($aArtists as $oArtist) {
            $oArtist[$sKey] = $oArtist->albums->sum('sales');
        }
        return $aArtists;
    }
    /**
     * Display the top 1 artist who sold most combined album sales
     */
    public function getTopOneArtistsBySold()
    {
        $aTopArtist = Artists::select('artists.id', 'artists.name')
        ->with('albums')
        ->join('albums', 'artists.id', '=', 'albums.artists_id')
        ->groupBy('artists.id', 'artists.name')
        ->orderByDesc(\DB::raw('SUM(albums.sales)'))
        ->limit(1)
        ->get();

        return response()->json($aTopArtist);
    }
    /**
     * Display list of albums based on the searched artist
     */
    public function searchArtist()
    {
        $aAlbums = Albums::join('artists', 'albums.artists_id', '=', 'artists.id')
        ->where('artists.name', 'like', '%' . $this->aRequest['name'] . '%')
        ->select('albums.*', 'artists.name as artist_name')
        ->get();

        return response()->json($aAlbums);
    }

    public function createArtist()
    {
        Artists::create([
            'code' => $this->aRequest['code'],
            'name' => $this->aRequest['name']
        ]);

        return response()->json(array(
            'bResult' => true,
            'message' => 'Data inserted successfully!'
        ));
    }

    public function getArtistById($iArtistId)
    {
        return response()->json(Artists::where('id', $iArtistId)->first());
    }

    public function deleteArtistById($iArtistId)
    {
        return response()->json(Artists::where('id', $iArtistId)->delete());
    }

    public function updateArtistById($iArtistId)
    {
        return response()->json(Artists::where('id', $iArtistId)->update([
            'code' => $this->aRequest['code'],
            'name' => $this->aRequest['name']
        ]));
    }
}
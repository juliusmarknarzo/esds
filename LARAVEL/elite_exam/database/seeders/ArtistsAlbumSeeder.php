<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Artists;
use App\Models\Albums;
use App\Services\CsvFileReader;
use Faker\Factory as Faker;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;

class ArtistsAlbumSeeder extends Seeder
{
    private $aCsvData;
    private function assignCsvData()
    {
        $sCsvFilePath = Storage::path('elite_exam_data.csv');
        if (($oHandle = fopen($sCsvFilePath, 'r')) !== FALSE) {
            while (($aRow = fgetcsv($oHandle, 1000, ',')) !== FALSE) {
                $this->aCsvData[] = $aRow;
            }
            fclose($oHandle);
        } else {
           echo "Failed to open the CSV file.";
        }
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->assignCsvData();

        $iColorCounter = 0;
        $sPath = 'app/albums_cover';
        $aColors = ['#FF0000', '#00FF00', '#0000FF'];
        $oFaker = Faker::create();
        foreach ($this->aCsvData as $iKey => $aData) {

            if ($iKey > 0) {
                $mArtists = Artists::where('name' , $aData[0])->first();
                if ($mArtists === null) {
                    $mArtists = Artists::create([
                        'code' => $aData[0],
                        'name' => $aData[0],
                    ]);
                } 
  
                $oImage = Image::canvas(200, 200, $aColors[$iColorCounter]);
                $oImageData = $oImage->encode('jpg');
    
                if ($iKey > 0) {
                    $oNewAlbum = Albums::create([
                        'artists_id' => $mArtists->id,
                        'year'      => $aData[3],
                        'name'      => $aData[1],
                        'sales'     => $aData[2],
                    ]);
                    $sFileName = $oNewAlbum->id . '.jpg';
                    Storage::put($sPath . '/' . $sFileName, $oImageData);
                }
                $iColorCounter++;
    
                if ($iColorCounter > 2) {
                    $iColorCounter = 0;
                } 
            }
        }
    }
}

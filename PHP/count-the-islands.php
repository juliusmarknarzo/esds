<?php
    /**
     * Island
     */
    class Island {
        /**
         * convertImage
         * used to convert the parameter from 1 to X and 0 to ~
         */
        public function convertImage($aInputImage) {
            $iRows = count($aInputImage);
            $iColumns = count($aInputImage[0]);
        
            for ($iRowsCounter = 0; $iRowsCounter < $iRows; $iRowsCounter++) {
                for ($iColumnsCounter = 0; $iColumnsCounter < $iColumns; $iColumnsCounter++) {
                    $aInputImage[$iRowsCounter][$iColumnsCounter] = ($aInputImage[$iRowsCounter][$iColumnsCounter] === 1) ? 'x' : '~';
                }
            }
        
            return $aInputImage;
        }
        /**
         * displayConvertedImage
         * used to display the convert image
         */
        public function displayConvertedImage($aConvertedImage)
        {
            foreach ($aConvertedImage as $sImage) {
                echo '"' . implode('', $sImage) . '"' . "<br>";
            }
        }
    }

    $aInputImage = [
        [1,1,1,1],
        [0,1,1,0],
        [0,1,0,1],
        [1,1,0,0]
    ];

    $oIsland = new Island();
    $aConvertedImage = $oIsland->convertImage($aInputImage);
    $oIsland->displayConvertedImage($aConvertedImage);
    
?>

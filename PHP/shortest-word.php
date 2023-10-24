<?php
    /**
     * Words
     */
    class Words {
        /**
         * $sWord
         * holds the input string
         */
        private $sWord;
        /**
         * $aWords
         * holds an array of words after splitting
         */
        private $aWords;
        /**
         * $iIndexOfShortWord
         * holds the index of the short word after filtering
         */
        private $iIndexOfShortWord;

        private $iShortestLength;

        public function __construct($sWord)
        {
            $this->sWord = $sWord;
            $this->aWords = explode(" ", $sWord);
            $this->iIndexOfShortWord = 0;
            $this->iShortestLength = $this->findShortestWord($sWord);
        }
        /**
         * findShortestWord
         * function that accepted string, find its shortest word then return the length of that shortest string
         */
        public function findShortestWord($sInputString)
        {
            $iShortestLength = PHP_INT_MAX;
            foreach ($this->aWords as $iWordIndex => $sWord) {
                $iLengthOfWord = strlen($sWord);
                if ($iLengthOfWord < $iShortestLength) {
                    $this->iIndexOfShortWord = $iWordIndex;
                    $iShortestLength = $iLengthOfWord;
                }
            }
            
            return $iShortestLength;
        }
        /**
         * displayShortestWordLength
         * used to display the shortest word length and the word
         */
        public function displayShortestWordLength()
        {
            if (empty(trim($this->sWord)) === true) {
                echo 'Error: Input will never be empty. Try again!<br><br>';
            } else {
                echo 'TEST CASE: "' . $this->sWord . '"<br>';
                echo "OUTPUT: " . $this->iShortestLength . ' - BECAUSE THE SHORTEST WORD IS "' . $this->aWords[$this->iIndexOfShortWord] . '"<br><br>';
            }
        }

    }

    $sFirstWord = 'TRUE FRIENDS ARE ME AND YOU';
    $sSecondWord = 'I AM THE LEGENDARY VILLAIN';

    $oFirstWords = new Words($sFirstWord);
    $oFirstWords->displayShortestWordLength();

    $oSecondWords = new Words($sSecondWord);
    $oSecondWords->displayShortestWordLength();

?>
<?php

class Word {
    private $aWords;
    private $sTargetWord;
    private $aTargetIndices;

    public function __construct($aWords, $sTargetWord)
    {
        $this->aWords = $aWords;
        $this->sTargetWord = $sTargetWord;
        $this->aTargetIndices = $this->findIndicesOfTarget();
    }
    /**
     * findIndicesOfTarget
     * used to find the word target in provided words
     */
    public function findIndicesOfTarget()
    {
        $aIndices = [];

        foreach($this->aWords as $iWordIndex => $sWord) {
            if ($sWord === $this->sTargetWord) {
                $aIndices[] = $iWordIndex;
            }
        }
        return $aIndices;
    }
    /**
     * displayIndices
     * used to display the filtered indeces of the target
     */
    public function displayIndices()
    {
        if (count($this->aWords) > 1000) {
            echo 'Words should be less than or equal to 1000';
            return;
        }
        if (empty($this->aTargetIndices) === false) {
            echo "INDEX " . implode(" and INDEX ", $this->aTargetIndices);
        } else {
            echo "Target not found in the list.";
        }
    }
}

$aWordsInput = ["I", "TWO", "FORTY", "THREE", "JEN", "TWO", "tWo", "Two"];
$sTargetInput = "TWO";

$oWord = new Word($aWordsInput , $sTargetInput);
$oWord->findIndicesOfTarget();
$oWord->displayIndices();


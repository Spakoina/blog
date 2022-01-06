<?php

class ArrayUtils {

    function __construct() {
        
    }

    public function sortArticleByDate(&$articles) {
        usort($articles, "ArrayUtils::cmp");
    }

    // Sorting articles by date
    private function cmp($a, $b) {
        $dateA = strtotime($a->date);
        $dateB = strtotime($b->date);
        if ($dateA == $dateB) {
            return 0;
        }
        return ($dateA > $dateB) ? -1 : 1;
    }

}

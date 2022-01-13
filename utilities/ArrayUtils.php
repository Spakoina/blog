<?php

class ArrayUtils {

    function __construct() {
        
    }

    public function sortArticleByDate(&$articles) {
        usort($articles, "ArrayUtils::cmp");
    }

    public function sort_categories(&$categories) {
        usort($categories, "ArrayUtils::cmp_sort_categories");
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

    // Sorting articles by date
    private function cmp_sort_categories($a, $b) {
        $dateA = strtotime($a->date);
        $dateB = strtotime($b->date);
        if ($a == $b) {
            return 0;
        }
        return ($a > $b) ? -1 : 1;
    }

}

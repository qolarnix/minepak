<?php

declare(strict_types=1);

/**
 * Search packages
 * 
 * @param string $term
 * @param array<string> $packages
 */
function similarSearch(string $term, array $packages): array|string {
    $length = count($packages);
    $results = [];

    for($i = 0; $i < $length; $i++) {
        similar_text($packages[$i], $term, $percent);
        
        if($percent >= 70) {
            $results[] = $packages[$i];
        }
    }

    return count($results) >= 1 ? $results : 'No results found';
}
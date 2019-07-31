<?php

function current_url() {

    $current_url = parse_url();
    if (isset($current_url['query'])) {
        parse_str($_SERVER['QUERY_STRING'], $query);
        return $current_url['query-variables'] = $query;
    }
}
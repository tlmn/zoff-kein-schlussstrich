<?php
function add_cors_http_header()
{
    header("Access-Control-Allow-Origin: *");
}

function api_override_per_page($params)
{
    if (isset($params) and isset($params['posts_per_page'])) {
        $params['posts_per_page'] = 500;
    }

    return $params;
}

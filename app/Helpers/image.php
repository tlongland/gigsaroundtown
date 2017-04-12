<?php


function get_image($url, $default) {

    if (isset($url) && !empty($url)) {

        return Storage::disk('s3')->url($url);

    } else if(isset($default) && !empty($default)) {

        return Storage::disk('s3')->url($default);

    }



}
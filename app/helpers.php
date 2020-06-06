<?php

use DivineOmega\SSHConnection\SSHConnection;

function getSlug($title)
{
    $slug = Illuminate\Support\Str::slug($title);

    return $slug != '' ? $slug : 'no-slug-available';
}
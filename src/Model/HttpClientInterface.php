<?php

namespace Model;

interface HttpClientInterface
{
    public function get(string $url) : string;
}

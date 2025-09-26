<?php

namespace App;

interface Middleware
{
    public function handle(callable $next): void;
}
<?php

class ProjectPage extends Page
{
    public function isReadable(): bool
    {
        static $readable = [];

        $template = $this->intendedTemplate()->name();

        if (isset($readable[$template]) === true) {
            return $readable[$template];
        }
        if ($this->author()->toUser() === kirby()->user() || kirby()->user()->role()->name() === 'admin') {
            return true;
        }
        return false;

    }
}
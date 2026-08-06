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

        $user = kirby()->user();

        if ($user && ($this->author()->toUser()?->id() === $user->id() || $user->role()->name() === 'admin')) {
            return true;
        }

        return false;

    }
}

<?php

namespace Dbwhddn10\FService\Validation;

class MessageLoader extends \Illuminate\Translation\FileLoader
{
    protected function loadPath($path, $locale, $group)
    {
        $full = "{$path}/{$locale}/{$group}.php";
        $full = str_replace('/validation.php', '.php', $full);

        if ($this->files->exists($full))
        {
            return $this->files->getRequire($full);
        }

        return [];
    }
}


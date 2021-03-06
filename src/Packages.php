<?php
abstract class Packages extends DBResultIterator
{
    function current()
    {
        $data = parent::current();
        if ($data === null) {
            return null;
        }

        $package = new Package();
        $package->synchronizeWithArray($data);
        if (isset($data['channel'])) {
            $package->channel = $data['channel'];
        }
        return $package;
    }
}
<?php

namespace App\Traits;

trait HasGravatar
{
    /**
     * Get the Gravatar URL for the model's email.
     */
    public function getGravatarUrl(int $size = 80): string
    {
        $email = strtolower(trim($this->email));
        $hash = md5($email);
        $fallback = 'mp'; // Options: 'mp', 'identicon', 'monsterid', 'wavatar', 'retro', 'robohash', 'blank'

        return "https://www.gravatar.com/avatar/{$hash}?s={$size}&d={$fallback}";
    }
}

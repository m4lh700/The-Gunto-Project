<?php

namespace App\Services;
use Cache;

/**
 * [Description HelperService]
 */
class HelperService
{

  public function createSlug(string $name) : string
  {
    return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name)));
  }


}

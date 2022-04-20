<?php

namespace App\Services;
use App\Models\Log;

/**
 * Services focussed on logging data to the DB
 * unused for now
 */
class LogService
{

  /**
   * Create a new log into the DB
   * 
   * @param string $message
   * @param string $type
   * @param int|null $user_id
   * 
   * @return bool
   */
  public function createLog(string $message, string $type, ?int $user_id = NULL) : bool
  {
    $log = Log::create([
      'message' => $message,
      'type'    => $type,
      'user_id' => $user_id
    ]);

    return true;
  }


}

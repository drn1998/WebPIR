<?php

function isDownload($format) {
  switch($format) {
    case "htmltabled":
    case "htmlmarqueed":
      return TRUE;
    default:
      return FALSE;
  }
}

?>

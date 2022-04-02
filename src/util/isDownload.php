<?php

function isDownload($format) {
  switch($format) {
    case "htmltabled":
    case "htmlmarqueed":
      return TRUE;
      break;
    default:
      return FALSE;
      break;
  }
}

?>

<?php

require_once("../methods/encode.php");

function test_encode($input, $expected_output) {
  $real_output = encode($input);

  if($real_output == $expected_output)
    echo("Passed!\n");
  else
    echo("Not passed!\n");
}

test_encode("", "");
test_encode("o", "75");
test_encode("O", "75");
test_encode("AbC", "51963");
test_encode("simple test", "436976681831483");
test_encode("Crêpe", "963781761");

?>

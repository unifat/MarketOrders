<?php
include regionalorders;

header("Content-type: application/json");
$method = preg_replace("/[^A-Za-z0-9._\-]/", '', $_SERVER['REQUEST_METHOD']);
$sane_input = preg_replace("/[^A-Za-z0-9._\-]/", '', urldecode($_SERVER['QUERY_STRING']));
if (strlen($sane_input) < 1) {
  die("{'error':500,'message':'Missing Arguments.'}");
}
$tmp = explode('.', $sane_input, 2);
$cmd = $tmp[0];

if (count($tmp) > 1) {
  $args = explode('.', $tmp[1]);
} else {
  $args = [];
}

//usage- a.php?command.args.args.args.poop
// $method="MYARR";
// $cmd="command";
// $args=["args","args","args","poop"];
$resu = ['method' => $method, 'command' => $cmd, 'args' => $args, 'time' => time(), 'query' => urldecode($_SERVER['QUERY_STRING'])];
switch ($method) {
    case "UPDATE":
   switch ($cmd) {
     case "regional_market":
       $resu['data'] = "UPDATE regional_market {$args[0]} called!";
       regionalorders ($args[0]);
       $resu['data'] .= '\nUPDATE regional_market completed!';
       break;
     default:
       $resu['error'] = 500;
       $resu['message'] = "$cmd is not valid at this endpoint.";
   }
   break;
  default:
    $resu['error'] = 500;
    $resu['message'] = "Method `$method` is not valid at this endpoint.";
}
echo json_encode($resu);
?>

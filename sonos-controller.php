<?php
/**
 * GT Sonos Controller
 *
 * @author Morgan Estes <morgan.estes@gmail.com>
 */

 // Get arguments from command-line
 $action = ucfirst($argv[1]);
 $param = isset($argv[2]) ? $argv[2] : '';

 echo "Executing Sonos->$action() with parameter: $param\n";

 require_once 'PHPSonos.inc.php';

 $Sonos = new PHPSonos('192.168.1.5');

 function mute( $param ) {
 	global $Sonos;

 	if('on' == $param) {
 		$mute = "1";
 	} else {
 		$mute = "0";
 	}

 	$Sonos->SetMute( $mute );
}

 switch( lcfirst($action) ) {
 	case 'mute':
 		mute('on');
 		break;
 	case 'unmute':
 		mute('off');
 		break;
 	case 'skip':
 		$Sonos->Next();
 		break;
 	default:
 		$Sonos->$action();
 }

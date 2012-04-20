<?php
class Twitter{

public $user; /* Nom d'utilisateur sur Twitter */
public $count = 3; /* Nombre de message à afficher */
public $oXML;

function Twitter($user = "LaboIntranet", $count = 4){
	$this->user = $user;
	$this->count = $count;
}
public static function parse($text)
{
 $text = preg_replace('#http://[a-z0-9._/-]+#i', '<a href="$0">$0</a>', $text);
 $text = preg_replace('#@([a-z0-9_]+)#i', '@<a href="http://twitter.com/$1">$1</a>', $text);
 $text = preg_replace('# \#([a-z0-9_-]+)#i', ' #<a href="http://search.twitter.com/search?q=%23$1">$1</a>', $text);
 return $text;
}

function collectTweets($echo = true){
	$url = "http://twitter.com/statuses/user_timeline/".$this->user.'.xml?count='.$this->count;
	$this->oXML = simplexml_load_file($url);
	$oXML=$this->oXML;
	$out='';
	$date_format = 'd M Y, H:i:s'; /* Format de la date à afficher */
if ($echo)	{
foreach( $oXML->status as $oStatus )
{
 $datetime = date_create($oStatus->created_at);
 $date = date_format($datetime, $date_format)."\n";
 
 $out.= ' (<a style="color:#F00;" href="http://twitter.com/'.$this->user.'/status/'.$oStatus->id.'">'.$date.'</a>)';
 $out.= $this->parse($oStatus->text ).'<br/>';
}
	return $out;
}else return $oXML;
}
}
?>
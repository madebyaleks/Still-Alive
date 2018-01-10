<?php
/**
 * @package Still Alive
 * @version 1.0.3
 */
/*
Plugin Name: Still Alive
Plugin URI: https://github.com/madebyaleks/Still-Alive
Description: This is not just a plugin, it symbolizes the hope and excitement of an entire generation of gamers summed up in two words sung most famously by Ellen McLain in the bitter end: Still Alive. When activated you will randomly see a lyric from <cite>Still Alive</cite> in the upper right of your admin screen on every page. <em>This plugin is based on the wonderful <b>Hello Dolly</b> plugin that’s included in every WordPress install.</em>
Author: Made by Aleks
Version: 1.0.2
Author URI: https://madebyaleks.no
*/

function still_alive_get_lyric() {
	$lyrics = "This was a triumph.
I'm making a note here: HUGE SUCCESS
It's hard to overstate my satisfaction.
Aperture Science: We do what we must because we can
For the good of all of us 
except for the ones who are dead
But there's no sense crying over every mistake
You just keep on trying 'till you run out of cake
And the science gets done and you make a neat gun
For the people who are still alive
I'm not even angry
I'm being so sincere right now
Even though you broke my heart and killed me
And torn it pieces
And threw every piece into a fire
As they burned it hurt because I was so happy for you! 
Now these points of data make a beautiful line
And we're out of beta, we're releasing on time
So I'm glad I got burned
Think of all the things we learned 
For the people that are still alive
Go ahead and leave me
I think I prefer to stay inside
Maybe you'll find someone else to help you
Maybe Black Mesa
That was a joke, ha ha, fat chance
Anyway this cake is great, it's so delicious and moist
Look at me still talking, when there's science to do
When I look out there it makes me glad I'm not you
I've experiments to run, there is research to be done
On the people who are still alive
And believe me I am still alive
I'm doing science and I'm still alive
I feel FANTASTIC and I'm still alive
While you are dying I'll be still alive
And when you're dead I'll be still alive
STILL ALIVE 
still alive"
;
	$lyrics = explode( "\n", $lyrics );

	return wptexturize( $lyrics[ mt_rand( 0, count( $lyrics ) - 1 ) ] );
}

function still_alive() {
	$chosen = still_alive_get_lyric();
	echo "<p id='alive'>$chosen</p>";
}

add_action( 'admin_notices', 'still_alive' );

function alive_css() {
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#alive {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;		
		margin: 0;
		font-size: 11px;
	}
	</style>
	";
}

add_action( 'admin_head', 'alive_css' );

?>

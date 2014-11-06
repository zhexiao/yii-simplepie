yii-simplepie
==================

yii-simplepie is a yii extension for parse rss feeds：
- simplepie：http://simplepie.org/
- simplepie document：http://simplepie.org/wiki/reference/start


Usage
==================
## install extension in yii
Download all file and put it into yii extension folder, then add the follow code in config/main.php
```ruby
	'simplepie' => array(
		'class' => 'ext.simplepie-library.bootstrap'
	),
```

## configuration and initialization
```ruby
	$feed = Yii::app()->simplepie->config(array(
		'set_feed_url' => $rssFeed,
		'enable_cache' => true,
		'set_cache_location' => Yii::app()->runtimePath . DIRECTORY_SEPARATOR . 'cache'
	))->parse();
```

## all default configuration 
```ruby
	array(
		// URL of the feed you want to parse
		'set_feed_url' => '',

		// Force SimplePie to parse the content, even if it doesn't believe it's a feed
		'force_feed' => true,

		// Enable/disable caching in SimplePie
		'enable_cache' => false,

		// Set the folder where the cache files should be written
		'set_cache_location' => './cache',

		// Set the minimum time for which a feed will be cached
		'set_cache_duration' => 3600,

		// Enable/disable the reordering of items into reverse chronological order
		'enable_order_by_date' => true,

		// Set a limit on how many items are returned per feed with Multifeeds
		'set_item_limit' => 0,

		// HTML attributes to strip
		'strip_attributes' => array('alt', 'bgsound', 'onclick'),

		// HTML tags to strip
		'strip_htmltags' => array('base', 'blink', 'body', 'doctype', 'embed', 'font', 'form', 'frame', 'frameset', 'html', 'iframe', 'input', 'marquee', 'meta', 'noscript', 'object', 'param', 'script', 'style'),

		// Override the character set within the feed
		'set_input_encoding' => false,

		// Set the output character set
		'set_output_encoding' => 'UTF-8',

		// Timeout for fetching remote files
		'set_timeout' => 30,
	);
```

## get feed attributes
```ruby
	$feed->author  // Get a single author for the feed. 
	$feed->copyright  // Get the feed copyright information.
	$feed->description  // Get the feed description.
	$feed->encoding  // Get the character set for the returned values.
	$feed->favicon  // Get the URL for the favicon of the feed's website.
	$feed->item  // Get a single item. 
	$feed->items  // Get all the items.
	$feed->item_quantity  // Get the number of items in the feed.
	$feed->language  // Get the feed language.
	$feed->link  // Get a single link.
	$feed->links  // Get all the links of a specific relation.
	$feed->permalink  // Get the first feed link (i.e. the permalink).
	$feed->title  // Get the feed title.
	$feed->type  // Get the type of feed.
```

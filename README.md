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
	$feed = Yii::app -> simplepie->config(array(
		'set_feed_url' => $rssFeed,
		'enable_cache' => true,
		'set_cache_location' => Yii::app()->runtimePath . DIRECTORY_SEPARATOR . 'cache'
	))->parse();
```

## get feed attributes
```ruby
	$feed->author — Get a single author for the feed. 
	$feed->copyright — Get the feed copyright information.
	$feed->description — Get the feed description.
	$feed->encoding — Get the character set for the returned values.
	$feed->favicon — Get the URL for the favicon of the feed's website.
	$feed->item — Get a single item. 
	$feed->items — Get all the items.
	$feed->item_quantity — Get the number of items in the feed.
	$feed->language — Get the feed language.
	$feed->link — Get a single link.
	$feed->links — Get all the links of a specific relation.
	$feed->permalink — Get the first feed link (i.e. the permalink).
	$feed->title — Get the feed title.
	$feed->type — Get the type of feed.
```
yii-simplepie
==================

yii-simplepie is a yii extension for parse rss feeds：
- simplepie：http://simplepie.org/
- simplepie document：http://simplepie.org/wiki/reference/start


Usage
==================
## install extension in yii
Download all file and put it in yii extension folder, then add the follow code in config/main.php
```ruby
	'simplepie' => array(
		'class' => 'ext.simplepie-library.bootstrap'
	),
```

## 图片比例重置
```ruby
	include 'zResetImage.php';
	$fileName = 'apple.png';

	try
	{
		$image = new zImage\zResetImage($fileName);
		
		// 长宽重置
		$image->resize(200, 300);
		
		// 百分比重置
		$image->resizePercent(0.5);
		
		// 显示图片
		$image->show();
		
		// 保存图片到另一文件
		$image->save('other file');
	}
	catch(Exception $e)
	{
		echo $e->getMessage();
	}
```

## 裁剪图片
```ruby
	include 'zResetImage.php';
	$fileName = 'apple.png';

	try
	{
		$image = new zImage\zResetImage($fileName);
		
		// 裁剪图片，4个参数分别表示裁剪开始X位置，开始Y位置，裁剪的宽度和高度
		$image->crop($startX, $startY, $cropWidth, $cropHeight);
		
		// 显示图片
		$image->show();
		
		// 保存图片到另一文件
		$image->save('other file');
	}
	catch(Exception $e)
	{
		echo $e->getMessage();
	}
```
<?php  
/**
 * bootstrap 入口文件 
 *
 * Author(s): Zhe Xiao <zhebegin@gmail.com>
 *
 * Licensed under the MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @author Zhe Xiao <zhebegin@gmail.com>
 */
class bootstrap extends CApplicationComponent
{
	private $_options = array();

	private $_default = array(
		// 需要解析的RSS
		'set_feed_url' => '',

		// 强制认定为RSS
		'force_feed' => true,

		// 开启缓存
		'enable_cache' => false,

		// 缓存位置
		'set_cache_location' => './cache',

		// 缓存时间
		'set_cache_duration' => 3600,

		// 按时间顺序排序
		'enable_order_by_date' => true,

		// 设置最大的items获取数，默认没有限制
		'set_item_limit' => 0,

		// 在内容里面移除的属性
		'strip_attributes' => array('alt', 'bgsound', 'onclick'),

		// 移除HTML的标签
		'strip_htmltags' => array('base', 'blink', 'body', 'doctype', 'embed', 'font', 'form', 'frame', 'frameset', 'html', 'iframe', 'input', 'marquee', 'meta', 'noscript', 'object', 'param', 'script', 'style'),

		// 设置编码
		'set_input_encoding' => false,

		// 设置输出编码
		'set_output_encoding' => 'UTF-8',

		// 设置超时时间
		'set_timeout' => 30,


	);

	/**
	 * 扩展初始化
	 * @return [type] [description]
	 */
	public function init()
	{

		spl_autoload_unregister(array('YiiBase','autoload'));
		include_once('autoloader.php');
		include_once('idn/idna_convert.class.php');
		spl_autoload_register(array('YiiBase','autoload'));

		//导入类
		Yii::import('ext.simplepie-library.*');

		parent::init();
	}

	/**
	 * 设置参数
	 */
	public function set($option = array())
	{
		$this->_options = $option + $this->_default;

		return $this;
	}

	/**
	 * 图片重置类
	 * @return [type] [description]
	 */
	public function parse()
	{
		if(empty($this->_options['set_feed_url']))
		{
			throw new CException('请在set方法里面使用set_feed_url键设置一个需要解析的rss值.');
		}

		$feed = new SimplePie();

		// 设置所有的参数
		foreach ($this->_options as $key => $val) 
		{
			$feed->{$key}($val);
		}

		// 初始化simplepie
		if( $feed->init() )
		{
			// 确保simplepie解析的是正确的mime-type类型
			$feed->handle_content_type();

			return $feed;
		}
		else
		{
			return false;
		}
	}
}
?>
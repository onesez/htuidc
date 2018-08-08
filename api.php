<?php
error_reporting(0);
error_reporting(E_ERROR | E_WARNING | E_PARSE);
error_reporting(E_ALL);

/**
 * 电联通信云主机API操作类
 */
class Api {

	private $api_id;
	private $api_key;
	private $url;
	private $action;
	private $timestamp;
	private $content;

	function __construct() {
		$this->api_id = '26';
		$this->api_key = 'a01437024dd3ad5ca8a79cd7ce385e5f';
		$this->url = 'http://yun.htuidc.com/api/';
		$this->timestamp = time();
	}

	/**
	 * 签名算法
	 *
	 * @author Wending <postmaster@g000.cn>
	 * @param  array $params 签名数据
	 * @return string         md5
	 */
	public function sign() {
		return md5($this->api_id . $this->api_key . $this->action . $this->timestamp);
	}

	/**
	 * 设置操作类型
	 *
	 * @author Wending <postmaster@g000.cn>
	 * @param  object $action $this
	 */
	public function setAction($action) {
		$this->action = $action;
	}

	/**
	 * 添加请求参数
	 *
	 * @author Wending <postmaster@g000.cn>
	 * @param  object $params $this
	 */
	public function setContent($params) {
		$this->content = $params;
	}

	/**
	 * 获得主机套餐列表
	 *
	 * @author Wending <postmaster@g000.cn>
	 * @return [type] [description]
	 */
	public function getPackages() {
		$this->setAction('getPackages');
		return $this->result();
	}

	/**
	 * 获得云主机列表
	 *
	 * @author Wending <postmaster@g000.cn>
	 * @return [type] [description]
	 */
	public function getHosts() {
		$this->setAction('getHosts');
		return $this->result();
	}

	/**
	 * 创建
	 *
	 * @author Wending <postmaster@g000.cn>
	 * @return [type] [description]
	 */
	public function add() {
		# code...
	}

	/**
	 * 续费
	 *
	 * @author Wending <postmaster@g000.cn>
	 * @return [type] [description]
	 */
	public function renewal() {
		# code...
	}

	/**
	 * 查看信息
	 *
	 * @author Wending <postmaster@g000.cn>
	 * @param  integer $id 主机ID
	 * @return json     主机信息
	 */
	public function getHost($id) {
		$this->setAction('getHost');
		$this->setContent(['id' => $id]);
		return $this->result();
	}

	/**
	 * 开机
	 *
	 * @author Wending <postmaster@g000.cn>
	 * @return [type] [description]
	 */
	public function boot() {
		# code...
	}

	/**
	 * 关机
	 *
	 * @author Wending <postmaster@g000.cn>
	 * @return [type] [description]
	 */
	public function shutdown() {
		# code...
	}

	/**
	 * 重装系统
	 *
	 * @author Wending <postmaster@g000.cn>
	 * @return [type]        [description]
	 */
	public function Revert() {
		# code...
	}

	/**
	 * 获得操作系统
	 *
	 * @author Wending <postmaster@g000.cn>
	 * @return [type] [description]
	 */
	public function getOsList() {
		# code...
	}

	/**
	 * 更换系统
	 *
	 * @author Wending <postmaster@g000.cn>
	 * @return [type] [description]
	 */
	public function Chos() {
		# code...
	}

	/**
	 * VNC
	 *
	 * @author Wending <postmaster@g000.cn>
	 * @return [type] [description]
	 *
	 */
	public function getVncCode() {
		# code...
	}

	/**
	 * 控制台
	 *
	 * @author Wending <postmaster@g000.cn>
	 * @return [type] [description]
	 */
	public function getTempToken() {
		# code...
	}

	/**
	 * 升级
	 *
	 * @author Wending <postmaster@g000.cn>
	 * @return [type] [description]
	 */
	public function upgrade() {
		# code...
	}

	/**
	 * 获得数据
	 *
	 * @author Wending <postmaster@g000.cn>
	 * @return [type] [description]
	 */
	public function result() {
		$params = array_merge([
			'api_id' => $this->api_id,
			'action' => $this->action,
			'timestamp' => $this->timestamp,
			'sign' => $this->sign(),
		], $this->content);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->url);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
		$res = curl_exec($ch);
		curl_close($ch);
		return $res;
	}
}

$api = new Api();
// $api->setAction('getPackages');
// echo $api->result();
echo $api->getHost('120004');

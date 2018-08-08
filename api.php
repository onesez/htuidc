<?php
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
	 * @param  array $params 增加请求的参数
	 * @return [type] [description]
	 */
	public function setContent($params = []) {
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
	 * @param  integer $grade 套餐级别
	 * @param  number $days 时间：天
	 * @param  string $os    操作系统
	 */
	public function add($grade, $days, $os) {
		$this->setAction('add');
		$this->setContent(compact('grade', 'days', 'os'));
		return $this->result();
	}

	/**
	 * 续费
	 *
	 * @author Wending <postmaster@g000.cn>
	 * @param  integer $id   主机ID
	 * @param  number $days 时间：天
	 * @return [type]       [description]
	 */
	public function renewal($id, $days) {
		$this->setAction('renewal');
		$this->setContent(compact('id', 'days'));
		return $this->result();
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
		$this->setContent(compact('id'));
		return $this->result();
	}

	/**
	 * 开机
	 *
	 * @author Wending <postmaster@g000.cn>
	 * @param  integer $id 主机ID
	 * @return [type] [description]
	 */
	public function On($id) {
		$this->setAction('On');
		$this->setContent(compact('id'));
		return $this->result();
	}

	/**
	 * 关机
	 *
	 * @author Wending <postmaster@g000.cn>
	 * @param  integer $id 主机ID
	 * @return [type] [description]
	 */
	public function Off($id) {
		$this->setAction('Off');
		$this->setContent(compact('id'));
		return $this->result();
	}

	/**
	 * 重启
	 *
	 * @author Wending <postmaster@g000.cn>
	 * @param  integer $id 主机ID
	 * @return [type] [description]
	 */
	public function Reset($id) {
		$this->setAction('Reset');
		$this->setContent(compact('id'));
		return $this->result();
	}

	/**
	 * 重装系统
	 *
	 * @author Wending <postmaster@g000.cn>
	 * @param  integer $id 主机ID
	 * @return [type] [description]
	 */
	public function Revert($id) {
		$this->setAction('Revert');
		$this->setContent(compact('id'));
		return $this->result();
	}

	/**
	 * 获得操作系统
	 *
	 * @author Wending <postmaster@g000.cn>
	 * @return [type] [description]
	 */
	public function getOsList() {
		$this->setAction('getOsList');
		return $this->result();
	}

	/**
	 * 更换系统
	 *
	 * @author Wending <postmaster@g000.cn>
	 * @param  integer $id 主机ID
	 * @param  integer $os 要更换的操作系统
	 * @return [type] [description]
	 */
	public function Chos($id, $os) {
		$this->setAction('Chos');
		$this->setContent(compact('id', 'os'));
		return $this->result();
	}

	/**
	 * VNC
	 *
	 * @author Wending <postmaster@g000.cn>
	 * @param  integer $id 主机ID
	 * @return [type]     [description]
	 */
	public function getVncCode($id) {
		$this->setAction('getVncCode');
		$this->setContent(compact('id'));
		return $this->result();
	}

	/**
	 * 控制台
	 *
	 * @author Wending <postmaster@g000.cn>
	 * @param  integer $id       主机ID
	 * @param  string $login_ip 客户登录IP地址
	 * @return [type]           [description]
	 */
	public function getTempToken($id, $login_ip) {
		$this->setAction('getTempToken');
		$this->setContent(compact('id', 'login_ip'));
		return $this->result();
	}

	/**
	 * 升级
	 *
	 * @author Wending <postmaster@g000.cn>
	 * @param  integer $id        主机ID
	 * @param  integer $new_grade 新套餐ID
	 * @return [type]            [description]
	 */
	public function upgrade($id, $new_grade) {
		$this->setAction('upgrade');
		$this->setContent(compact('id', 'new_grade'));
		return $this->result();
	}

	/**
	 * 获得数据
	 *
	 * @author Wending <postmaster@g000.cn>
	 * @return [type] [description]
	 */
	public function result() {
		$params = [
			'api_id' => $this->api_id,
			'action' => $this->action,
			'timestamp' => $this->timestamp,
			'sign' => $this->sign(),
		];
		if ($this->content) {
			$params = array_merge($params, $this->content);
		}
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

// 使用方法非常简单，自己看看代码就行了
$api = new Api();
// $api->setAction('getPackages');
// echo $api->result();
// echo $api->getHost('120004');
echo $api->getOsList();

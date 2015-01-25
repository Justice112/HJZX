<?php
include_once ('simple_html_dom.php');
class getCourses {
	protected $stuid;
	protected $stupwd;
	protected $stuty;
	protected $view;
	protected $url = 'http://jwc1.usst.edu.cn/default5.aspx';
	protected $coursesArray;
	protected $courseSection = array (
			1,
			3,
			6,
			8,
			10 
	);
	function setStudent($id, $password, $type) {
		$this->stuid = $id;
		$this->stupwd = $password;
		$this->stuty = $type;
	}
	function getCourseArray() {
		// $this->run();
		return $this->coursesArray;
	}
	function run() {
		$cookie_file = tempnam ( '../tmp', 'cookie' );
		/* 获得__VIEWSTATE */
		$ch = curl_init ();
		curl_setopt ( $ch, CURLOPT_URL, $this->url );
		curl_setopt ( $ch, CURLOPT_HEADER, 0 );
		curl_setopt ( $ch, CURLOPT_COOKIEJAR, $cookie_file );
		curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
		$contents = curl_exec ( $ch );
		curl_close ( $ch );
		$matches;
		preg_match ( '/<input\s*type="hidden"\s*name="__VIEWSTATE"\s*value="(.*)"\s*\/>/i', $contents, $matches );
		$arr = array (
				'+' => '%2B' 
		);
		$this->view = strtr ( $matches [1], $arr );
		/* 登录 */
		$ch = curl_init ();
		$request = "__VIEWSTATE=$this->view&TextBox1=$this->stuid&TextBox2=$this->stupwd&RadioButtonList1=$this->stuty&Button1=";
		curl_setopt ( $ch, CURLOPT_URL, $this->url );
		curl_setopt ( $ch, CURLOPT_POST, 1 );
		curl_setopt ( $ch, CURLOPT_POSTFIELDS, $request );
		curl_setopt ( $ch, CURLOPT_COOKIEFILE, $cookie_file );
		curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
		curl_setopt ( $ch, CURLOPT_HEADER, 0 );
		curl_setopt ( $ch, CURLOPT_FOLLOWLOCATION, 1 );
		curl_setopt ( $ch, CURLOPT_NOBODY, false );
		curl_exec ( $ch );
		/* 获得课表HTML */
		$ch = curl_init ();
		curl_setopt ( $ch, CURLOPT_URL, "http://jwc1.usst.edu.cn/xskbcx.aspx?xh=$this->stuid&gnmkdm=N121603" );
		curl_setopt ( $ch, CURLOPT_HEADER, 0 );
		curl_setopt ( $ch, CURLOPT_COOKIEFILE, $cookie_file );
		curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
		curl_setopt ( $ch, CURLOPT_FOLLOWLOCATION, 1 );
		curl_setopt ( $ch, CURLOPT_REFERER, "http://jwc1.usst.edu.cn/xskbcx.aspx?xh=$this->stuid&gnmkdm=N121603" );
		$contents = curl_exec ( $ch );
		curl_close ( $ch );
		unlink ( $cookie_file );
		/* 分析HTML */
		$html = new simple_html_dom ();
		$contents = mb_convert_encoding ( $contents, 'utf-8', 'gb2312' );
		$html->load ( $contents );
		$tr = $html->find ( '#Table1 tr' );
		$i = 0;
		foreach ( $this->courseSection as $count ) {
			$courses = $tr [$count + 1]->find ( 'td[align=Center]' );
			for($day = 0; $day < 7; $day ++) {
				$course = $courses [$day];
				if (mb_strlen ( $course->plaintext, 'utf-8' ) > 7) {
					preg_match_all ( '/.+?\s|.+?$/', $course->plaintext, $courseInfo );
					preg_match_all ( '/{第(.+?)-/', $courseInfo [0] [1], $start );
					preg_match_all ( '/-(.+?)周/', $courseInfo [0] [1], $end );
					preg_match_all ( '/单周|双周/', $courseInfo [0] [1], $single );
					$this->coursesArray [$i] [0] = preg_replace ( '/\s*?/i ', '', $courseInfo [0] [0] ); // 课程名
					$this->coursesArray [$i] [1] = $start [1] [0]; // 开始周
					$this->coursesArray [$i] [2] = $end [1] [0]; // 结束周
					$this->coursesArray [$i] [3] = $day + 1; // 星期
					$this->coursesArray [$i] [4] = $count; // 节
					$this->coursesArray [$i] [5] = $course->rowspan; // 节数
					if ($single [0] != null) {
						$this->coursesArray [$i] [6] = $single [0] [0]; // 单双周 （双周未确定）
					} else {
						$this->coursesArray [$i] [6] = 'all';
					}
					$this->coursesArray [$i] [7] = preg_replace ( '/\s*?/i ', '', $courseInfo [0] [2] ); // 老师
					$this->coursesArray [$i] [8] = preg_replace ( '/\s*?/i ', '', $courseInfo [0] [3] ); // 教室
					$i ++;
					if (strpos ( $course, '<br><br>' )) {
						preg_match_all ( '/{第(.+?)-/', $courseInfo [0] [6], $start );
						preg_match_all ( '/-(.+?)周/', $courseInfo [0] [6], $end );
						preg_match_all ( '/单周|双周/', $courseInfo [0] [6], $single );
						$this->coursesArray [$i] [0] = preg_replace ( '/\s*?/i ', '', $courseInfo [0] [5] ); // 课程名
						$this->coursesArray [$i] [1] = $start [1] [0]; // 开始周
						$this->coursesArray [$i] [2] = $end [1] [0]; // 结束周
						$this->coursesArray [$i] [3] = $day + 1; // 星期
						$this->coursesArray [$i] [4] = $count; // 节
						$this->coursesArray [$i] [5] = $course->rowspan; // 节数
						if ($single [0] != null) {
							$this->coursesArray [$i] [6] = $single [0] [0]; // 单双周 （双周未确定）
						} else {
							$this->coursesArray [$i] [6] = 'all';
						}
						$this->coursesArray [$i] [7] = preg_replace ( '/\s*?/i ', '', $courseInfo [0] [7] ); // 老师
						$this->coursesArray [$i] [8] = preg_replace ( '/\s*?/i ', '', $courseInfo [0] [8] ); // 教室
						$i ++;
					}
				}
			}
		}
	}
}
?>
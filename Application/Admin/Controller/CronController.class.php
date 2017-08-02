<?php
namespace Admin\Controller;
use Think\Controller;
/**
* 后台定时计划任务
*/
class CronController{
	public function dumpmysql(){ 
		if(APP_CRONTAB != 1){
            die('the_file_must_exec_crontab');
        }
		$res = D('Basic')->select();
		if($res['dumpmysql'] !=1){
			die('数据库更新已关闭');
		}
		$shell = 'mysqldump -u'.C('DB_USER').' -p'.C('DB_PWD').' '.C('DB_NAME').' > /tmp/cms'.date('Ymd').'.sql';
		exec($shell);
	}
	public function dumpmysql_fast(){
		$shell = 'mysqldump -u'.C('DB_USER').' -p'.C('DB_PWD').' '.C('DB_NAME').' > /webdata/cms'.date('Ymd').'.sql';
		exec($shell,$arr,$i);
		if($i == 0){
			return show(1,'备份成功');
		}
		return show(0,'备份失败');
	}
}
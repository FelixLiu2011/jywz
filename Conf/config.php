<?php

	//'配置项'=>'配置值'
	return array
	(
	    'URL_MODEL'                 =>  2, // 如果你的环境不支持PATHINFO 请设置为3
	    'DB_TYPE'                   =>  'mysql',
	    'DB_HOST'                   =>  'localhost',
	    'DB_NAME'                   =>  'jywz',
	    'DB_USER'                   =>  'root',
	    'DB_PWD'                    =>  '123456',
	    'DB_PORT'                   =>  '3306',
	    'DB_PREFIX'                 =>  '',
	
	    'APP_GROUP_LIST'            =>  'Home,Admin',  // // 项目分组设定,多个组之间用逗号分隔,例如'Home,Admin,cat,dog'
	    'DEFAULT_GROUP'             =>  'Home',//默认分组
	    'APP_GROUP_MODE'            =>  1,   //分组模式 0 普通分组 1 独立分组
	    
			
			//'配置项'=>'配置值'
        'LANG_SWITCH_ON'     =>     true,    //开启语言包功能       
        'LANG_AUTO_DETECT'     =>     true, // 自动侦测语言
        'DEFAULT_LANG'         =>     'zh-cn', // 默认语言       
        'LANG_LIST'            =>    'en-us,zh-cn,zh-tw', //必须写可允许的语言列表
        'VAR_LANGUAGE'     => 'l', // 默认语言切换变量
        
			
			
			
			
	    'APP_GROUP_PATH'        =>  'Modules' // 分组目录 独立分组模式下面有效
	)
?>
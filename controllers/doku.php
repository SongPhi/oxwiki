<?php

class OXWIKI_CTRL_Doku extends OW_ActionController
{
    public function index($params) {
    	$uri = implode('/', $params);
    	$query_string = $_SERVER['QUERY_STRING'];
    	$matches = array();

        define('DOKU_E_LEVEL',0);

    	$content = "";

    	// if (strpos($uri, '?')!==false) {
    	// 	$parts = explode('?', $uri);
    	// 	$uri = $part[0];
    	// 	$query_string = $parts[1];
    	// }

        if (substr($uri, 0, 6)=='_media') {
            $query_string = 'media=' . substr($uri, 7) . '&' . $query_string;
            $uri = 'lib/exe/fetch.php';

            $_SERVER['QUERY_STRING'] = $query_string;
            foreach (explode('&', $query_string) as $argument) {
                $pair = explode('=', $argument);
                $key = array_shift($pair);
                $value = implode('=', $pair);
                $_GET[$key] = $value;
            }
        }

    	if (strlen($uri)>=5 && substr($uri, -4) == '.php') {
    		if (file_exists(DOKUWIKI_DIR_ROOT . DS . $uri)) {
    			ob_start();
		        require_once ( DOKUWIKI_DIR_ROOT . DS . $uri );
		        $content = ob_get_contents();
		        ob_clean();

                if (strlen($uri)>=8 && substr($uri, -8) == 'ajax.php') {
                    echo $content; die();
                }
    		}
    	} if (preg_match('/\.(jpg|png|gif|js|css)$/i', $uri, $matches)) {
            if ($matches[1]=="jpg" || $matches[1]=="png" || $matches[1]=="gif") {
                header('Content-type: image/'.$matches[1]);
                echo file_get_contents(DOKUWIKI_DIR_ROOT . DS . $uri);
            } else {
                header('Content-type: text/'.$matches[1]);
                echo file_get_contents(DOKUWIKI_DIR_ROOT . DS . $uri);
            }
            die();
    	} else {
            $_SERVER['QUERY_STRING'] = 'id='.$uri;
            $_GET['id']=$uri;
    		ob_start();
	        require_once ( DOKUWIKI_DIR_ROOT . DS . "doku.php" );
	        $content = ob_get_contents();
	        ob_end_clean();
    	}

    	// var_dump(headers_list()); die();

        $this->assign('content',$content);
    }
}
<?php

function my_disable_redirect_canonical( $redirect_url ) {

    if ( is_archive() ) {
        $subject = $redirect_url;
        $pattern = '/\/page\//'; // URLに「/page/」があるかチェック
        preg_match($pattern, $subject, $matches);
        if ($matches) {
            //リクエストURLに「/page/」があれば、リダイレクトしない。
            $redirect_url = false;
            return $redirect_url;
        }
    }
}    
add_filter('redirect_canonical','my_disable_redirect_canonical');

?>
<?php


    /** Script permettant l'importatiooon du fichier de configuration du projet */
    
    
    require_once dirname(__DIR__).'/config/bootstrap.php';
    
    $url = $_GET['p'];
    
    switch($url){
        
        case '':
            if(!empty($_SESSION['auth'])){
                $pageName = "dashboard";
                $layout = "dashboard";
            }else{
                $pageName = "signin";
                $layout = "landing";
            }
            break;
        case 'signin':
            if(!empty($_SESSION['auth'])){
                $pageName = "dashboard";
                $layout = "dashboard";
            }else{
                $pageName = "signin";
                $layout = "landing";
            }
            break;
        case 'signup':
            if(!empty($_SESSION['auth'])){
                $pageName = "dashboard";
                $layout = "dashboard";
            }else{
                $pageName = "signup";
                $layout = "landing";
            }
            break;
        case 'dashboard':
            if(!empty($_SESSION['auth'])){
                $pageName = "dashboard";
                $layout = "dashboard";
            }else{
                Flash::setFlash('Vous devez vous connecter pour accéder à cette page');
                $pageName = "signin";
                $layout = "landing";
            }
            break;
        case 'test':
            if(!empty($_SESSION['auth'])){
                $pageName = "test";
                $layout = "dashboard";
            }else{
                Flash::setFlash('Vous devez vous connecter pour accéder à cette page');
                $pageName = "signin";
                $layout = "landing";
            }
            break;
        case 'preference':
            if(!empty($_SESSION['auth'])){
                $pageName = "preference";
                $layout = "landing";
            }else{
                Flash::setFlash('Vous devez vous connecter pour accéder à cette page');
                $pageName = "signin";
                $layout = "landing";
            }
            break;
        case 'search':
            if(!empty($_SESSION['auth'])){
                $pageName = "search";
                $layout = "dashboard";
            }else{
                Flash::setFlash('Vous devez vous connecter pour accéder à cette page');
                $pageName = "signin";
                $layout = "landing";
            }
            break;    
        case 'userpage':
            if(!empty($_SESSION['auth'])){
                $pageName = "userpage";
                $layout = "dashboard";
            }else{
                Flash::setFlash('Vous devez vous connecter pour accéder à cette page');
                $pageName = "signin";
                $layout = "landing";
            }
            break;  
        case 'publicUser':
            if(!empty($_SESSION['auth'])){
                $pageName = "publicUser";
                $layout = "dashboard";
            }else{
                Flash::setFlash('Vous devez vous connecter pour accéder à cette page');
                $pageName = "signin";
                $layout = "landing";
            }
            break;
        case 'logout':
            if(!empty($_SESSION['auth'])){
                $pageName = "logout";
                $layout = "landing";
            }else{
                Flash::setFlash('Vous devez vous connecter pour accéder à cette page');
                $pageName = "signin";
                $layout = "landing";
            }
            break;
        default:
            $pageName = "404";
            break;
    }
    
    
    
    ob_start();
    if(!empty($pageName)){
        require ROOT . 'view' . DS . 'page'. DS . $pageName  .'.php';
    }else{
        require ROOT . 'view' . DS . 'page'. DS  .'404.php';
    }
    $getContent = ob_get_clean();
    
    
    
    if(!empty($layout)){
        require ROOT.'view'.DS.'layout'.DS. $layout .'.php';
    }else{
        require ROOT.'view'.DS.'layout'.DS. "landing ".'.php';
    }
    
?> 
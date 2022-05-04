<?php
   require("videosData.php");
   require("paginacion.php");
    $request=str_replace("/Backend_PHP/backend.api-youtube-php/","",$_SERVER['REQUEST_URI']);
   
    
    switch($_SERVER['REQUEST_METHOD']){
        case 'GET':
            if($request=='/api/v1/videosPreview'){
                print_r( obtenerVideoPreview());
                http_response_code(200);
                
            }
            if (isset($_GET['video'])){
                if($request=='api/v1/videoDetails?video='.$_GET['video'].''){
                    $videoId=$_GET["video"];
                    print_r(obtenerVideoDetails($videoId));
                }
            }
            if($request=='api/v1/videos/recientes'){
                print_r( obtenerVideosRecientes());
                http_response_code(200);
            }
            if($request=='api/v1/videos/populares'){
                print_r( obtenerVideosPorPopularidad());
                http_response_code(200);
            }
            if($request=='api/v1/videos/valoracion'){
                print_r( obtenerVideosPorValoracion());
                http_response_code(200);
            }
            if($request=='api/v1/videos/abededario'){
                print_r( obtenerVideosPorAlfabeto());
                http_response_code(200);
            }
           
           if($request=='api/v1/videos/paginacion'){
               print_r(conseguirToken());
               http_response_code(200);
           }
            break;
    }



       
    
      
?>
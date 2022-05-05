<?php
   require("videosData.php");
    $request=str_replace("/apirest-youtuber/","",$_SERVER['REQUEST_URI']);
   
   
    switch($_SERVER['REQUEST_METHOD']){
        case 'GET':
            
            if($request=='api/v1/videosPreview?nextPage='.$_GET['nextPage']){
                print_r( siguientePaginaPreview($_GET['nextPage']));
                http_response_code(200);
                
            }
            if (isset($_GET['video'])){
                if($request=='api/v1/videoDetails?video='.$_GET['video'].''){
                    $videoId=$_GET["video"];
                    print_r(obtenerVideoDetails($videoId));
                }
            }
            if($request=='api/v1/videos/reciente?nextPage='.$_GET['nextPage']){
                print_r( obtenerVideosRecientes($_GET['nextPage']));
                http_response_code(200);
            }
            if($request=='api/v1/videos/populares?nextPage='.$_GET['nextPage']){
                print_r( obtenerVideosPorPopularidad($_GET['nextPage']));
                http_response_code(200);
            }
            if($request=='api/v1/videos/valoracion?nextPage='.$_GET['nextPage']){
                print_r( obtenerVideosPorValoracion($_GET['nextPage']));
                http_response_code(200);
            }
            if($request=='api/v1/videos/abededario?nextPage='.$_GET['nextPage']){
                print_r( obtenerVideosPorAlfabeto($_GET['nextPage']));
                http_response_code(200);
            }
          
           
            break;
          
    }

       
    
      
?>
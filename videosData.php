<?php

    
            function obtenerVideoPreview(){
                $API_KEY="AIzaSyADBdMwnFbN8YMPqTAEzR0wMdF_o4_VaYA";
                $CHANNEL_ID="UC3QuZuJr2_EOUak8bWUd74A";
                $MAX_RESULTS=50;
                $arrayVideoPreview=array();
                $ListaIds=json_decode(file_get_contents('https://www.googleapis.com/youtube/v3/search?channelId='.$CHANNEL_ID.'&part=snippet&type=video&maxResults='.$MAX_RESULTS.'&key='.$API_KEY.''));
                
                foreach($ListaIds->items as $item){
                
                    $videoPreview= new stdClass();
                    $VideoId=$item->id->videoId;
                    $nombreDelVideo=$item->snippet->title;
                    $autorDelVideo=$item->snippet->channelTitle;
                    $fechaDeSubida=$item->snippet->publishedAt;
                    $descripcionDelVideo=$item->snippet->description;
                    $miniaturaDelVideo=$item->snippet->thumbnails->high->url;
                
                    $videoPreview->nombre=$nombreDelVideo;
                    $videoPreview->id=$VideoId;
                    $videoPreview->autor=$autorDelVideo;
                    $videoPreview->fecha=$fechaDeSubida;
                    $videoPreview->descripcion=$descripcionDelVideo;
                    $videoPreview->miniatura=$miniaturaDelVideo;

                    array_push($arrayVideoPreview,$videoPreview);
                }
                return json_encode($arrayVideoPreview);
                }

            function obtenerVideoDetails($videoID){ 
                $API_KEY="AIzaSyADBdMwnFbN8YMPqTAEzR0wMdF_o4_VaYA";
                $videoDetails=new stdClass();
                $videoLista=json_decode(file_get_contents('https://www.googleapis.com/youtube/v3/videos?part=statistics,snippet,player,topicDetails&id='.$videoID.'&maxResults=1&key='.$API_KEY));
               foreach($videoLista->items as $detail){
                   $videoDetails->nombre_video=$detail->snippet->title;
                   $videoDetails->autor_video=$detail->snippet->channelTitle;
                   $videoDetails->fecha_subida=$detail->snippet->publishedAt;
                   $videoDetails->categorias=$detail->snippet->categoryId;
                   $videoDetails->tags=$detail->snippet->tags;
                   $videoDetails->description_video=$detail->snippet->description;
                   $videoDetails->iframe=$detail->player->embedHtml;
                   $videoDetails->visualizaciones=$detail->statistics->viewCount;
                   $videoDetails->likes=$detail->statistics->likeCount;
                   $videoDetails->comentarios=$detail->statistics->commentCount;
               };
                return json_encode($videoDetails);
                }


                function obtenerVideosRecientes(){
                    $API_KEY="AIzaSyADBdMwnFbN8YMPqTAEzR0wMdF_o4_VaYA";
                    $CHANNEL_ID="UC3QuZuJr2_EOUak8bWUd74A";
                    $MAX_RESULTS=50;
                    $arrayVideoPreview=array();
                    $ListaIds=json_decode(file_get_contents('https://www.googleapis.com/youtube/v3/search?channelId='.$CHANNEL_ID.'&part=snippet&type=video&maxResults='.$MAX_RESULTS.'&key='.$API_KEY.'&order=date'));
                    foreach($ListaIds->items as $item){
                
                        $videoPreview= new stdClass();
                        $VideoId=$item->id->videoId;
                        $nombreDelVideo=$item->snippet->title;
                        $autorDelVideo=$item->snippet->channelTitle;
                        $fechaDeSubida=$item->snippet->publishedAt;
                        $descripcionDelVideo=$item->snippet->description;
                        $miniaturaDelVideo=$item->snippet->thumbnails->high->url;
                    
                        $videoPreview->nombre=$nombreDelVideo;
                        $videoPreview->id=$VideoId;
                        $videoPreview->autor=$autorDelVideo;
                        $videoPreview->fecha=$fechaDeSubida;
                        $videoPreview->descripcion=$descripcionDelVideo;
                        $videoPreview->miniatura=$miniaturaDelVideo;
    
                        array_push($arrayVideoPreview,$videoPreview);
                    }
                    return json_encode($arrayVideoPreview);
                    }
                function obtenerVideosPorPopularidad(){
                    $API_KEY="AIzaSyADBdMwnFbN8YMPqTAEzR0wMdF_o4_VaYA";
                    $CHANNEL_ID="UC3QuZuJr2_EOUak8bWUd74A";
                    $MAX_RESULTS=50;
                    $arrayVideoPreview=array();
                    $ListaIds=json_decode(file_get_contents('https://www.googleapis.com/youtube/v3/search?channelId='.$CHANNEL_ID.'&part=snippet&type=video&maxResults='.$MAX_RESULTS.'&key='.$API_KEY.'&order=viewCount'));
                    
                    foreach($ListaIds->items as $item){
                
                        $videoPreview= new stdClass();
                        $VideoId=$item->id->videoId;
                        $nombreDelVideo=$item->snippet->title;
                        $autorDelVideo=$item->snippet->channelTitle;
                        $fechaDeSubida=$item->snippet->publishedAt;
                        $descripcionDelVideo=$item->snippet->description;
                        $miniaturaDelVideo=$item->snippet->thumbnails->high->url;
                    
                        $videoPreview->nombre=$nombreDelVideo;
                        $videoPreview->id=$VideoId;
                        $videoPreview->autor=$autorDelVideo;
                        $videoPreview->fecha=$fechaDeSubida;
                        $videoPreview->descripcion=$descripcionDelVideo;
                        $videoPreview->miniatura=$miniaturaDelVideo;
    
                        array_push($arrayVideoPreview,$videoPreview);
                    }
                    return json_encode($arrayVideoPreview);
                }
                function obtenerVideosPorValoracion(){
                    $API_KEY="AIzaSyADBdMwnFbN8YMPqTAEzR0wMdF_o4_VaYA";
                    $CHANNEL_ID="UC3QuZuJr2_EOUak8bWUd74A";
                    $MAX_RESULTS=50;
                    $arrayVideoPreview=array();
                    $ListaIds=json_decode(file_get_contents('https://www.googleapis.com/youtube/v3/search?channelId='.$CHANNEL_ID.'&part=snippet&type=video&maxResults='.$MAX_RESULTS.'&key='.$API_KEY.'&order=rating'));
                    
                    foreach($ListaIds->items as $item){
                
                        $videoPreview= new stdClass();
                        $VideoId=$item->id->videoId;
                        $nombreDelVideo=$item->snippet->title;
                        $autorDelVideo=$item->snippet->channelTitle;
                        $fechaDeSubida=$item->snippet->publishedAt;
                        $descripcionDelVideo=$item->snippet->description;
                        $miniaturaDelVideo=$item->snippet->thumbnails->high->url;
                    
                        $videoPreview->nombre=$nombreDelVideo;
                        $videoPreview->id=$VideoId;
                        $videoPreview->autor=$autorDelVideo;
                        $videoPreview->fecha=$fechaDeSubida;
                        $videoPreview->descripcion=$descripcionDelVideo;
                        $videoPreview->miniatura=$miniaturaDelVideo;
    
                        array_push($arrayVideoPreview,$videoPreview);
                    }
                    return json_encode($arrayVideoPreview);
                }
                function obtenerVideosPorAlfabeto(){
                    $API_KEY="AIzaSyADBdMwnFbN8YMPqTAEzR0wMdF_o4_VaYA";
                    $CHANNEL_ID="UC3QuZuJr2_EOUak8bWUd74A";
                    $MAX_RESULTS=50;
                    $arrayVideoPreview=array();
                    $ListaIds=json_decode(file_get_contents('https://www.googleapis.com/youtube/v3/search?channelId='.$CHANNEL_ID.'&part=snippet&type=video&maxResults='.$MAX_RESULTS.'&key='.$API_KEY.'&order=title'));
                    
                    foreach($ListaIds->items as $item){
                
                        $videoPreview= new stdClass();
                        $VideoId=$item->id->videoId;
                        $nombreDelVideo=$item->snippet->title;
                        $autorDelVideo=$item->snippet->channelTitle;
                        $fechaDeSubida=$item->snippet->publishedAt;
                        $descripcionDelVideo=$item->snippet->description;
                        $miniaturaDelVideo=$item->snippet->thumbnails->high->url;
                    
                        $videoPreview->nombre=$nombreDelVideo;
                        $videoPreview->id=$VideoId;
                        $videoPreview->autor=$autorDelVideo;
                        $videoPreview->fecha=$fechaDeSubida;
                        $videoPreview->descripcion=$descripcionDelVideo;
                        $videoPreview->miniatura=$miniaturaDelVideo;
    
                        array_push($arrayVideoPreview,$videoPreview);
                    }
                    return json_encode($arrayVideoPreview);
                }
               




        
            
?>
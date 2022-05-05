<?php
    function GetPetition($ListaIds){
       
                $MAX_RESULTS=10;
                $arrayVideoPreview=array();
        $tokens=new stdClass();
        if(isset($ListaIds->prevPageToken)){
            $prevPageToken=$ListaIds->prevPageToken;
            $tokens->prevPageToken=$prevPageToken;
        }else{
            $tokens->prevPageToken='null';
        }
        $nextPageToken=$ListaIds->nextPageToken;
        
       
        $totalRecords=$ListaIds->pageInfo->totalResults;
        $totalPages=ceil($totalRecords/$MAX_RESULTS);
        $tokens->TotalVideos=$totalRecords;
        $tokens->nextPageToken=$nextPageToken;
        $tokens->videosForPage=$MAX_RESULTS;
        $tokens->totalPages=$totalPages;
        
        array_push($arrayVideoPreview,$tokens);
    
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
    
           
            
            function siguientePaginaPreview($nextPage){
                
                
                
              
                $API_KEY="AIzaSyADBdMwnFbN8YMPqTAEzR0wMdF_o4_VaYA";
                $CHANNEL_ID="UC3QuZuJr2_EOUak8bWUd74A";
                $MAX_RESULTS=10;
                $ListaIds=json_decode(file_get_contents('https://www.googleapis.com/youtube/v3/search?channelId='.$CHANNEL_ID.'&part=snippet&type=video&maxResults='.$MAX_RESULTS.'&key='.$API_KEY.'&pageToken='.$nextPage));
                if(!$ListaIds){
                    $Lista=json_decode(file_get_contents('https://www.googleapis.com/youtube/v3/search?channelId='.$CHANNEL_ID.'&part=snippet&type=video&maxResults='.$MAX_RESULTS.'&key='.$API_KEY));
                    return GetPetition($Lista);
                }else{
                    return GetPetition($ListaIds);
                }
            
                    
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


                function obtenerVideosRecientes($nextPage){
                    $API_KEY="AIzaSyADBdMwnFbN8YMPqTAEzR0wMdF_o4_VaYA";
                    $CHANNEL_ID="UC3QuZuJr2_EOUak8bWUd74A";
                    $MAX_RESULTS=10;
                    
                    $ListaIds=json_decode(file_get_contents('https://www.googleapis.com/youtube/v3/search?channelId='.$CHANNEL_ID.'&part=snippet&type=video&maxResults='.$MAX_RESULTS.'&key='.$API_KEY.'&order=date&pageToken='.$nextPage));
                    if(!$ListaIds){
                        $Lista=json_decode(file_get_contents('https://www.googleapis.com/youtube/v3/search?channelId='.$CHANNEL_ID.'&part=snippet&type=video&maxResults='.$MAX_RESULTS.'&key='.$API_KEY.'&order=date'));
                        return GetPetition($Lista);
                    }else{
                        return GetPetition($ListaIds);
                    }
                    }
                function obtenerVideosPorPopularidad($nextPage){
                    $API_KEY="AIzaSyADBdMwnFbN8YMPqTAEzR0wMdF_o4_VaYA";
                    $CHANNEL_ID="UC3QuZuJr2_EOUak8bWUd74A";
                    $MAX_RESULTS=10;
                    
                    $ListaIds=json_decode(file_get_contents('https://www.googleapis.com/youtube/v3/search?channelId='.$CHANNEL_ID.'&part=snippet&type=video&maxResults='.$MAX_RESULTS.'&key='.$API_KEY.'&order=viewCount&pageToken='.$nextPage));
                     if(!$ListaIds){
                        $Lista=json_decode(file_get_contents('https://www.googleapis.com/youtube/v3/search?channelId='.$CHANNEL_ID.'&part=snippet&type=video&maxResults='.$MAX_RESULTS.'&key='.$API_KEY.'&order=viewCount'));
                        return GetPetition($Lista);
                    }else{
                        return GetPetition($ListaIds);
                    }
                    
                }
                function obtenerVideosPorValoracion($nextPage){
                    $API_KEY="AIzaSyADBdMwnFbN8YMPqTAEzR0wMdF_o4_VaYA";
                    $CHANNEL_ID="UC3QuZuJr2_EOUak8bWUd74A";
                    $MAX_RESULTS=10;
                
                    $ListaIds=json_decode(file_get_contents('https://www.googleapis.com/youtube/v3/search?channelId='.$CHANNEL_ID.'&part=snippet&type=video&maxResults='.$MAX_RESULTS.'&key='.$API_KEY.'&order=rating&pageToken='.$nextPage));
                     if(!$ListaIds){
                        $Lista=json_decode(file_get_contents('https://www.googleapis.com/youtube/v3/search?channelId='.$CHANNEL_ID.'&part=snippet&type=video&maxResults='.$MAX_RESULTS.'&key='.$API_KEY.'&order=rating'));
                        return GetPetition($Lista);
                    }else{
                        return GetPetition($ListaIds);
                    }
                   
                }
                function obtenerVideosPorAlfabeto($nextPage){
                    $API_KEY="AIzaSyADBdMwnFbN8YMPqTAEzR0wMdF_o4_VaYA";
                    $CHANNEL_ID="UC3QuZuJr2_EOUak8bWUd74A";
                    $MAX_RESULTS=10;
                    $ListaIds=json_decode(file_get_contents('https://www.googleapis.com/youtube/v3/search?channelId='.$CHANNEL_ID.'&part=snippet&type=video&maxResults='.$MAX_RESULTS.'&key='.$API_KEY.'&order=title&pageToken='.$nextPage));
                    if(!$ListaIds){
                        $Lista=json_decode(file_get_contents('https://www.googleapis.com/youtube/v3/search?channelId='.$CHANNEL_ID.'&part=snippet&type=video&maxResults='.$MAX_RESULTS.'&key='.$API_KEY.'&order=title'));
                        return GetPetition($Lista);
                    }else{
                        return GetPetition($ListaIds);
                    }
                }
                      
?>
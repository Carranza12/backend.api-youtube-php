<?php
                function conseguirToken(){
                    $API_KEY="AIzaSyADBdMwnFbN8YMPqTAEzR0wMdF_o4_VaYA";
                    $CHANNEL_ID="UC3QuZuJr2_EOUak8bWUd74A";
                    $MAX_RESULTS=50;
                    $ListaIds=json_decode(file_get_contents('https://www.googleapis.com/youtube/v3/search?channelId='.$CHANNEL_ID.'&part=snippet&type=video&maxResults='.$MAX_RESULTS.'&key='.$API_KEY.''));
                    
                    
                    //resultados por pagina
                    $ResultsPerPage = 50;
                    $paginas_array = array();

                    foreach($ListaIds -> items as $searchResult){
                        
                        print_r($ListaIds);
                        $objeto = new stdClass();
                        $objeto -> nextPageToken = $next;

                        array_push($paginas_array, $objeto);

                    }
                    return json_encode($paginas_array);
                }
                ?>
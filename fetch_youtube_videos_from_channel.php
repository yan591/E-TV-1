<?php 

$you_tube_data_api_key = 'AIzaSyDZ3Wxy3bBKeUYk8_oEi5dleBId8ZmRaW8';

$channel_id = 'UCmst562fALOY2cKb4IFgqEg';

$api_url = 'https://www.googleapis.com/youtube/v3/search?key=' . $you_tube_data_api_key 
. '&channelId=' . $channel_id 
. '&part=snippet,id&order=date';

$youtube_videos = file_get_contents($api_url);

if (!empty($youtube_videos)){
    $youtube_videos_arr = json_decode($youtube_videos, true);
    if(!empty($youtube_videos_arr['items'])){
        ?>
        <table>
        <?php
            foreach($youtube_videos_arr['items'] as $ytvideo){
                if($ytvideo['id']['kind'] == 'youtube#video'){
                    ?>
                        <tr>
                            <td>
                                <img src="<?=$ytvideo['snippet']['thumbnails']['high']['url']?>" />
                            <td>
                            <?=$ytvideo['snippet']['tittle']?>
                            </td>
                        </tr>
                    <?php
                }
            }
            ?>
        </table>
        <?php
    }
}
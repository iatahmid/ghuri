<?php 

//$queryResult = $result;
$finalResult = array();

//$i = 0;

foreach($reviewResult as $q)
{
    /*$photo = array( 'spot_name' => $q['SPOT_NAME'],
                    'file_name' => $q['PHOTO_FILE'],
                    'user' => $q['USER_ID']);
    
    $review = array('spot_name' => $q['SPOT_NAME'],
                    'description' => $q['DESCRIPTION'],
                    'rating' => $q['RATING']);

    $info = array(  'photo' => $photo,
                    'review' => $review);


    $finalResult[$q['SPOT_NAME']]['photo'][$q['USER_ID']][$i] = $photo;
    $finalResult[$q['SPOT_NAME']]['review'][$q['USER']][$i] = $review;

    $i++;*/

    echo $q['SPOT_NAME'], $q['DESCRIPTION'], $q['RATING'], $q['USER'];
    //echo $q['SPOT_NAME'], $q['DESCRIPTION'], $q['RATING'], $q['PHOTO_FILE'], $q['USER'], $q['USER_ID'];
    
    echo "<br>";
}


foreach($finalResult as $spot => $info)
{
    echo $spot;
    echo "<br>";
    foreach ($info as $value) {
        $photo_file = $value['photo']['file_name'];
        echo $photo_file;
        echo "<br>";
    }
    //echo $q['photo']['spot_name'], $q['photo']['file_name'], $q['photo']['user'];
    
    echo "<br>";
    echo "<br>";
}

foreach($finalResult as $spot => $info)
{
    echo $spot;
    echo "<br>";

    $photos = $finalResult[$spot]['photo'];
    foreach ($photos as $user => $photoInfo) {
        echo $user;
        echo "<br>";
        foreach ($photoInfo as $value) {
            echo $value['file_name'];
            echo "<br>";
        }
    }
    //echo $q['photo']['spot_name'], $q['photo']['file_name'], $q['photo']['user'];
    
    echo "<br>";
    echo "<br>";
}

foreach($finalResult as $spot => $info)
{
    echo $spot;
    echo "<br>";

    $reviews = $finalResult[$spot]['review'];
    foreach ($reviews as $user => $reviewInfo) {
        echo $user;
        echo "<br>";
        foreach ($reviewInfo as $value) {
            echo $value['description']." ".$value['rating'];
            echo "<br>";
        }
    }
    
    echo "<br>";
    echo "<br>";
}
?>
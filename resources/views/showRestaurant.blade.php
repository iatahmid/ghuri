<!DOCTYPE html>
<html>
    <head>
       
    </head>
    <body>
        <?php
            $queryResult=$result;
            foreach($queryResult as $q)
            {
                echo $q['RESTAURANT_NAME'], $q['RESTAURANT_NAME'], $q['SPECIALIZATION'], $q['ADDRESS'],
                $q['CONTACT_INFO'], $q['FACEBOOK_LINK'], $q['PRICE'], $q['PROPORTION'], $q['RATING'];
                
            }
            ?>
        
        <div class="container">
            <div class="content">
                <div class="title">Hello</div>
            </div>
        </div>
    </body>
</html>

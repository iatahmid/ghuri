<!DOCTYPE html>
<html>
    <head>
       
    </head>
    <body>
        <?php
            $queryResult=$result;
            foreach($queryResult as $q)
            {
                echo $q->PROVIDER_ID, $q->ACCOMODATION_NAME;
                
            }
            ?>
        
        <div class="container">
            <div class="content">
                <div class="title">Hello</div>
            </div>
        </div>
    </body>
</html>

<!DOCTYPE html>
<html>
    <head>
       
    </head>
    <body>
        <?php
            $queryResult=$result;
            
            foreach($queryResult as $q)
            {
                echo $q->TRANSPORT_NAME, $q->TRANSPORT_NAME,  $q->TYPE,  $q->ADDRESS,  $q->CONTACT_INFO,  $q->TICKET_PRICE_PER_PERSON,
                $q->TICKET_PRICE_PER_TRIP,$q->FROM_PLACE,  $q->TO_PLACE;
                
            }
            ?>
        
        <div class="container">
            <div class="content">
                <div class="title">Hello</div>
            </div>
        </div>
    </body>
</html>
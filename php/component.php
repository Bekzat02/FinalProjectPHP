<?php
function component($productname,$productprice,$productimg,$productid){
    $element="         
                <form action=\"chelsea.php\" method=\"post\">
          <div clas=\"card shadow\">
                <div>
                    <img src=\"$productimg\" style='width: 250px; height='250px'
                          class=\"img-fluid card-img-top\">
                </div>
                <div class=\"card-body\">
                    <h5 class=\"card-title\">$productname</h5>
                    <h6>
                        <i class=\"fas fa-star\"></i>
                        <i class=\"fas fa-star\"></i>
                        <i class=\"fas fa-star\"></i>
                        <i class=\"fas fa-star\"></i>
                        <i class=\"fas fa-star\"></i>
                    </h6>
                    <p class=\"card-text\">
                        Some quick example text to build on the card
                    </p>
                    <h5>
                        <span class=\"price\">$$productprice</span>
                    </h5>
                    <button type=\"submit\" name=\"add\" style=\"color: white\">Add cart <i  style=\"color: #2d3538\" class=\"fas fa-shopping-cart\"></i></button>
                    <input type='hidden' name='product_id' value='$productid'>
                </div>
            </div> 
            </form>
    ";
    echo $element;
}

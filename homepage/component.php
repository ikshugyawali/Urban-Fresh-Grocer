<?php
;
function component($productname, $productprice,$productimg,$productid){

    $element = "
            
    <div class=\"col-md-4\">
                <form action=\"index.php\" method=\"post\">
                    <div class=\"card shadow\">
                         <div class=\"card-body\">
                            <img src=\"images/$productimg\" alt=\"Image\" class=\"img-fluid card-img-top\" width=\"300px\" style=\"margin-top: -10px;\">
                        
                       
                            <h5 style=\"margin-left: -250px\"><strong>$productname</strong></h5>
                            <p class=\"card-text\"></p>
                            <h5 style=\"margin-left: -250px\"><strong>
                                <span class=\"\">£$productprice</span>
                            </strong></h5>

                           <button type=\"submit\" class=\"btn btn-warning my-3\" name=\"add\">Add to Cart<i class=\"fa fa-shopping-cart button\" aria-hidden=\"true\"></i></i></button>
                             <input type='hidden' name='product_id' value='$productid'>
                           </div>
                        </div>
                </form>
            </div>
    ";
    echo $element;
}

function cartElement($productimg, $productname, $productprice, $productid){
    $element = "

    <div id=\"wrap-ct\">
    
    <form action=\"cart.php?action=remove&id=$productid\" method=\"post\" class=\"cart-items\">
                    <div class=\"border rounded\">
                        <div class=\"row bg-white\">
                            <div class=\"col-md-3 pl-0\">
                                <img src=images/$productimg alt=\"Image1\" class=\"img-fluid\">
                            </div>
                            <div class=\"col-md-6\">
                                <h5 class=\"pt-2\">$productname</h5>
                                <small class=\"text-secondary\">Seller: dailytuition</small>
                                <h5 class=\"pt-2\">$$productprice</h5>
                                <button type=\"submit\" class=\"btn btn-danger mx-2\" name=\"remove\">Remove</button>
                            </div>
                            <div class=\"col-md-3 py-5\">
                                <div>
                                    <button type=\"button\" class=\"btn bg-light border rounded-circle\"><i class=\"fa fa-minus\"></i></button>
                                    <input type=\"text\" value=\"1\" class=\"form-control w-25 d-inline\">
                                    <button type=\"button\" class=\"btn bg-light border rounded-circle\"><i class=\"fa fa-plus\"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
    
    ";
    echo  $element;
}


















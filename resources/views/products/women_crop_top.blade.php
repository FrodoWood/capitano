@extends('layouts.app')
@section('content')

<style>
    .breadcrumb-item+.breadcrumb-item::before {
    content: ">"
}

.breadcrumb {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    padding: .1rem 0rem !important;
    margin-bottom: 0rem;
    list-style: none;
    background-color: #ffffff;
    border-radius: .25rem
}
 .image_list{list-style: none !important;}
</style>
    <div class="container">
    <div class="super_container">
    <header class="header" style="display: none;">
        <div class="header_main">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
                        <div class="header_search">
                            <div class="header_search_content">
                                <div class="header_search_form_container">
                                    <form action="#" class="header_search_form clearfix">
                                        <div class="custom_dropdown">
                                            <div class="custom_dropdown_list"> <span class="custom_dropdown_placeholder clc">All Categories</span> <i class="fas fa-chevron-down"></i>
                                                <ul class="custom_list clc">
                                                    <li><a class="clc" href="#">All Categories</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="single_product">
        <div class="container-fluid" style=" background-color: #fff; padding: 11px;">
            <div class="row">
                <div class="col-lg-2 order-lg-1 order-2">
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

                <script>
                    function changepic(img){ 
                        document.getElementById('image_selected').src= img.src;
                    }
                   
                    function addcart(){
						var  q = $('#quantitiy').val(); 
                        alert(q);
						$('.mycart').append(q);
                    } 

                </script>
                    <ul class="image_list" style="list-style:none;">
                    <li style="margin-top:50px;" data-image="<?=url('/images/productWomen1.jpg');?>"><img height="150" onClick="changepic(this);" src="<?=url('/images/productWomen1.jpg');?>" alt=""></li>
                        <li style="margin-top:50px;" data-image="<?=url('/images/woman\'s crop top and leggings 1.png');?>"><img height="150" onClick="changepic(this);" src="<?=url('/images/woman\'s crop top and leggings 1.png');?>" alt=""></li>
                        <li style="margin-top:50px;" data-image="<?=url('/images/woman\'s crop top and leggings 2.png');?>"><img height="150" onClick="changepic(this);"  src="<?=url('/images/woman\'s crop top and leggings 2.png');?>" alt=""></li>
                        
                    </ul>
                </div>
                <div class="col-lg-4 order-lg-2 order-1">


                <div id="myCarousel" class="carousel slide" data-ride="carousel" >
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" style="height:560px">
                
                <div class="item active" id="Black">
                    <img  style="height:560px" src="<?=url('/images/productWomen1.jpg');?>" alt="">
                    </div>
                    <div class="item active" id="Black">
                    <img  style="height:560px" src="<?=url('/images/woman\'s crop top and leggings 1.png');?>" alt="">
                    </div>

                    <div class="item" id="Red">
                    <img  style="height:560px" src="<?=url('/images/woman\'s crop top and leggings 2.png');?>" alt="">
                    </div>

                     
                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                </a>
                </div>
 
                </div>
                <div class="col-lg-5 order-3 text-center">
                    <div class="product_description ">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Products</a></li>
                                <li class="breadcrumb-item active">Accessories</li>
                            </ol>
                        </nav>
                        <div class="product_name"> 
                        Women's crop top and leggins

                        </div>
                        <div> <span class="product_price">£30</span> </div>
                         
                        <hr class="singleline">
                         
                            <div class="row">
                             <div class="col-2"></div>
                             <div class="col-8">
                             	<select name="size" id="size">
                                	<option value=""> Select Size</option>
                                    <option value="Small"> Small</option>
                                     <option value="Medium"> Medium</option>
                                     <option value="Large"> Large</option>
                                 </select><br><br>
                                 <select name="colour" id="colour" onChange="('#'+($(this).val()).addClass('active');">
                                 	<option value=""> Select Colour</option>
                                    <option value="Red"> Red</option>
                                     <option value="Black"> Black</option>
                                     <option value="Blue"> Blue</option>
                                 </select><br><br>
                                 <select name="quantitiy" id="quantitiy">
                                 <option value=""> Select Quantitiy</option>
                                 <?php for($i=1;$i<20;$i++){ ?>
                                 <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                 <?php } ?>
                                 </select><br>
							</div> <div class="col-2"></div>
                            </div>
                             
                        </div>
                        <hr class="singleline">
                         
                        <div class="row">
                            
                           
                            <button type="button" class="btn btn-primary shop-button" onClick="addcart();">Add to Cart</button>
                              
                              </div>
                              <div class="row text-justify"><p><br>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam laoreet, neque sit amet consequat
                                 facilisis, libero neque faucibus odio, vitae ultricies augue mi vitae elit. Sed venenatis porta
                                  mattis. Phasellus libero erat, iaculis sit amet enim id, tincidunt pulvinar lectus. Vivamus viverra
                                   mollis sapien, eget cursus mi dapibus eu. Nam vehicula sem ac ex convallis, et efficitur tellus 
                                   vehicula. Nam a mattis dolor, ut posuere tortor. Mauris vulputate nisi sem, in bibendum enim accumsan a.
                                    Aenean pretium augue eros, ut finibus purus pellentesque sit amet.</p></div>
                            </div>

                            </div>
                             
                        </div>
                    </div>
                </div>
            </div>
            
             
             
        </div>
 <div class="container">
            <div class="row row-underline">
                    <div class="col-md-6"> <h3 class=" deal-text">Featured Products</h3> </div>
                    <div class="col-md-6"> <a href="#" data-abc="true"> <span class="ml-auto view-all"></span> </a> </div>
             </div>
         	 <div class="row ">
                <div class="col-md-2  text-center">
                     
                             <a href="<?php echo url('matching_sports_bra_and_leggins');?>" style="color:black; text-decoration:none;">
                            <div class="text-center">
                                <div class="bbb_combo_image">
                                <img class="bbb_combo_image" height="200" src="<?=url('/images/woman\'s matching sports bra and leggings 1.png');?>" alt=""></div>
                                <p class=" "> <br> <h5>Women's matching sports bra and leggins <br>  £30</h5>  </p>
                           </div> 
                                 </a>
                </div>
                <div class="col-md-2  text-center">
                     
                <a href="<?php echo url('mens_joggers');?>" style="color:black; text-decoration:none;">
                     <div class="text-center">
                         <div class="bbb_combo_image">
                         <img class="bbb_combo_image" height="200" src="<?=url('/images/men\'s joggers 1.png');?>" alt=""></div>
                         <p class=" "> <br> <h5>Men's Joggers <br>  £15</h5>  </p>
                    </div> 
                    </a>
                 </div>
                 <div class="col-md-2  text-center">
                     
                 <a href="<?php echo url('women_crop_top');?>" style="color:black; text-decoration:none;">
                     <div class="text-center">
                         <div class="bbb_combo_image">
                         <img class="bbb_combo_image" height="200" src="<?=url('/images/productWomen1.jpg');?>" alt=""></div>
                         <p class=" "> <br> <h5>Women's crop top and leggins <br>  £30</h5>  </p>
                    </div>  
                </a>
         </div>
         <div class="col-md-2  text-center">
                     
            <a href="<?php echo url('mens_top');?>" style="color:black; text-decoration:none;">
                     <div class="text-center">
                         <div class="bbb_combo_image">
                         <img class="bbb_combo_image" height="200" src="<?=url('/images/Men\'s top 1.png');?>" alt=""></div>
                         <p class=" "> <br> <h5>Men's top <br>  £15</h5>  </p>
                    </div> 
                    </a>
         </div>
         <div class="col-md-2  text-center">
                     
         <a href="<?php echo url('Women_top');?>" style="color:black; text-decoration:none;">
                     <div class="text-center">
                         <div class="bbb_combo_image">
                         <img class="bbb_combo_image" height="200" src="<?=url('/images/Women\'s top 1.png');?>" alt=""></div>
                         <p class=" "> <br> <h5>Women's top <br>  £30</h5>  </p>
                    </div> 
                 </a>
         </div>
         <div class="col-md-2  text-center">
                     
         <a href="<?php echo url('men_shorts');?>" style="color:black; text-decoration:none;">
                     <div class="text-center">
                         <div class="bbb_combo_image">
                         <img class="bbb_combo_image" height="200" src="<?=url('/images/Men\'s shorts 1.png');?>" alt=""></div>
                         <p class=" "> <br> <h5>Men's Shorts <br>  £15</h5>  </p>
                    </div> 
                    </a>
         </div>
            </div>
      </div>
<style>
    .image_list{list-style:none !important;}
 
</style>

@endsection
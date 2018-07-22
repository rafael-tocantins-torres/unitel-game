<?php get_header(); ?>

<div class="section-product">
    <div class="container-fluid bg-header">
        <div class="row" style="padding:10px;"><!-- card row -->
            <div class="col-12 col-xs-12 col-sm-12 card-prod-rft">

                <div class="product-img pull-left">
                    <div class="prod-cat-title">Action</div>
                    <img class="prod-img" src="<?php echo get_template_directory_uri() . '/assets/images/1c6fff0b550a0f33bb2e39a1c70f0485.jpg'; ?>">
                </div>

                <div class="product-price-tag pull-left">
                    <div class="prod-title">
                        <h4 class="prd-title-rft">Cut the Rope</h4>
                        <p class="info-rft-par">Studio name</p>
                    </div>
                    <div class="tag-prices">
                        <div class="price-discount dis-rel">
                            <div class="overlay"></div>
                            <div class="trace"></div>
                            $4.5
                        </div>
                        <div class="price-discount">
                            $4.5
                        </div>
                        <div class="release-date">
                           <p> Release date <br> <span>01/01/2017</span> </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-12 col-xs-12 col-sm-12">
                <div class="container">
                    <div class="download-button-rft text-center" id="download-rft">
                        Download and Install (45mb)
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-xs-12 col-sm-12">
                <div class="game-screen">
                    <h4 class="game-title-info">Game Screenshot</h4>
                    <div class="line-info pull-right"></div>
                </div>
                <div class="game-slider-screen">
                    <div class="scroll-img">
                    <img class="game-img" src="<?php echo get_template_directory_uri() . '/assets/images/1c6fff0b550a0f33bb2e39a1c70f0485.jpg'; ?>">
                    <img class="game-img" src="<?php echo get_template_directory_uri() . '/assets/images/1c6fff0b550a0f33bb2e39a1c70f0485.jpg'; ?>">
                    <img class="game-img" src="<?php echo get_template_directory_uri() . '/assets/images/1c6fff0b550a0f33bb2e39a1c70f0485.jpg'; ?>">
                    <img class="game-img" src="<?php echo get_template_directory_uri() . '/assets/images/1c6fff0b550a0f33bb2e39a1c70f0485.jpg'; ?>">
                    <img class="game-img" src="<?php echo get_template_directory_uri() . '/assets/images/1c6fff0b550a0f33bb2e39a1c70f0485.jpg'; ?>"> 
                    </div>
                </div>

                <div class="game-desc-info">
                    <h4 class="game-desc-title">Description</h4>
                    <p class="game-info-desc">Lorem ipsum dolor set imun qual odmwi mswa  dwa wd dawdwaodwa modmwa omwda ,dmd aw,lmdwa ddaw dwadkwad wadwad awd awda</p>
                </div>

                <div id="extend" class="more-games">
                    <!-- Trigger Button HTML -->
                    <button type="button" class="btn collapsed rft-more-game" data-toggle="collapse" data-target="#toggleDemo"><i class="fa fa-plus"></i><span>Similar Games (same category)</span></button>
 
 <!-- Collapsible Element HTML -->
                    <div id="toggleDemo" class="collapse in rft-window">
                    <div class="section-available">
    <div class="container-fluid title-section-rft">
        <!-- card product -->
        <div class="row">


            <div class="col-4 col-xs-4 col-sm-4 pl-1 pr-1 mb-2">
                    <div class="card-rft">
                        <div class="card-head-rft">
                            <img class="img-responsive" src="<?php echo get_template_directory_uri() . '/assets/images/1c6fff0b550a0f33bb2e39a1c70f0485.jpg'; ?>">
                        </div>
                        <div class="card-body-rft">
                            <h5><strong>GAME ONE TWO</strong></h5>
                            <span>Rovio</span>
                        </div>
                    </div>
            </div>
            <div class="col-4 col-xs-4 col-sm-4 pl-1 pr-1 mb-2">
                    <div class="card-rft">
                        <div class="card-head-rft">
                            <img class="img-responsive" src="<?php echo get_template_directory_uri() . '/assets/images/1c6fff0b550a0f33bb2e39a1c70f0485.jpg'; ?>">
                        </div>
                        <div class="card-body-rft">
                            <h5><strong>GAME ONE TWO</strong></h5>
                            <span>Rovio</span>
                        </div>
                    </div>
            </div>
            <div class="col-4 col-xs-4 col-sm-4 pl-1 pr-1 mb-2">
                    <div class="card-rft">
                        <div class="card-head-rft">
                            <img class="img-responsive" src="<?php echo get_template_directory_uri() . '/assets/images/1c6fff0b550a0f33bb2e39a1c70f0485.jpg'; ?>">
                        </div>
                        <div class="card-body-rft">
                            <h5><strong>GAME ONE TWO</strong></h5>
                            <span>Rovio</span>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>



                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


<?php 
//Get links for product_id on category page 
 if( !isset($_GET['prod'])){ ?>




<?php }else{ ?>


<?php } //End of if statement ?> 

<?php get_footer(); ?>
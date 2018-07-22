<?php get_header(); ?>

<section class="section-new-releases">
<div class="container-fluid">
    <div class="row section-slider-element" id="slider-two">

        <?php for($i = 0; $i <= 5; $i++){ ?>
    <!--Card -->
    <div class="card-rft">
        <div class="card-head-rft">
            <img class="img-responsive" src="<?php echo get_template_directory_uri() . '/assets/images/1c6fff0b550a0f33bb2e39a1c70f0485.jpg'; ?>">
        </div>
        <div class="card-body-rft text-center">
            <h5><strong>GAME ONE TWO</strong></h5>
            <span>Rovio</span>
        </div>
    </div>
    <!--End of Card -->
        <?php } ?>

</div>  
</div>  

</section>
<section class="new-releases-catalog">

    <div class="section-available">
    <div class="container-fluid title-section-rft">
        <h5><strong><span style="text-decoration-line: underline">TODOS OS DISPONIVEIS</span><span> (ver tudo)<span></strong></h5>
        
        <!-- card product -->
        <div class="row">

            <?php for($i = 0; $i <= 11; $i++){ ?>

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

            <?php } ?>

        </div>
    </div>
</div>

</section>




<?php get_footer(); ?>
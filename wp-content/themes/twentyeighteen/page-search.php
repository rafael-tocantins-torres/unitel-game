<?php get_header(); ?>

<div class="section-available">
    <div class="container-fluid title-section-rft">
    <br>
        <h5><strong><span style="text-decoration-line: underline">SEARCH FOR :</span></strong></h5>
        
        <!-- card product -->
        <div class="row">

            <?php for ($i=0; $i <=12 ; $i++) { ?>
              
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


<?php get_footer(); ?>
<?php get_header(); ?>

<div class="section-listing">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-12 col-xs-12 col-sm-12">

                <?php for($i = 0; $i <= 10; $i++){ ?>


                <div class="list-rft">
                    <div class="img-list combine pull-left">
                        <img class="list-img" src="<?php echo get_template_directory_uri() . '/assets/images/1c6fff0b550a0f33bb2e39a1c70f0485.jpg'; ?>">
                    </div>
                    <div class="text-list combine pull-left">
                        <h4 class="list-title">Arcade</h4>
                        <p class="info-list">Info</p>
                    </div>
                    <div class="arrow-list combine pull-right">
                    <i class="fa fa-chevron-right"></i>
                    </div>
                </div>

                <?php } ?>
            </div>
        </div>
    </div>
</div>


<?php get_footer(); ?>
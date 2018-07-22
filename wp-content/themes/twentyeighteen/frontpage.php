<div class="header-rft" id="slider-one-rft">
    <?php for($i = 0; $i <= 5; $i++){ ?>
    <div><img class="img-responsive" src="<?php echo get_template_directory_uri() . '/assets/images/League_Of_Legends_Wallpaper_01.jpg'; ?>"></div>
    <?php }; ?>
</div>

<div class="section-available">
    <div class="container-fluid title-section-rft">
        <h5><strong><span style="text-decoration-line: underline">TODOS OS DISPONIVEIS</span><span> (ver tudo)<span></strong></h5>
        
        <!-- card product -->
        <div class="row">

            <?php for($i = 0; $i <=2 ; $i++){ ?>

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


<div class="section-available">
    <div class="container-fluid title-section-rft">
        <h5><strong><span style="text-decoration-line: underline">NOVOS LANÇAMENTOS</span><span> (ver tudo)<span></strong></h5>
        
        <!-- card product -->
        <div class="row">

                <?php for ($i=0; $i <= 8 ; $i++) { ?>

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


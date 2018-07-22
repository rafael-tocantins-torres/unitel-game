<footer class="rft-footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-4 col-xs-4 col-sm-4">

            </div>
            <div class="col-4 col-xs-4 col-sm-4">
                
            </div>
            <div class="col-4 col-xs-4 col-sm-4">
                
            </div>
        </div>
        <div class="text-center">
            <p><?php echo 'copywright'; ?></p>
        </div>
    </div>
</footer>

</div>


<!-- end of wrapper -->

<?php 
    wp_footer();
?>
    
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.0/js/bootstrap.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri() . '/assets/js/main.js'; ?>"></script>
    <script type="text/javascript" async>
        $('.header-rft').slick({
            dots: true,
            slidesToShow:1,
            infinite: true,
            arrows: false,
            draggable: true,
            swipe:true,
            autoplay: true
        });

        $('#slider-two').slick({
            centerMode: true,
            centerPadding: '0px',
            variableWidth: true,
            slidesToShow: 3,
            dots: true,
            slidesToShow:3,
            arrows: false,
            draggable: true,
            swipe:true,
            autoplay: true
        });
    </script>
	</body>
</html>
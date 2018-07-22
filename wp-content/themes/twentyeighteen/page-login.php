<?php get_header(); ?>

<div class="login-page">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12 col-xs-12 col-sm-12">

                <!--STEP ONE -->
                    
					<div class="wrap wrap-rft msisdn">
						<p class="form-title">
							Enter Your Number</p>
						<form method="POST" class="login">
						<input type="number" max="12" min="9" placeholder="+123xxxxxxxxx" name="msisdn"/>
                        <input type="submit" value="send msisdn" class="btn btn-success btn-sm" />
                        <p class="d-none error-msisdn text-center">Upss a mistake</p>
                        <p class="d-none wrong-msisdn text-center">Wrong Pin</p>
                        <p class="d-none service-unavailable text-center">Service unavailable</p>
						</form>
                    </div>

                    <div class="wrap wrap-rft pin d-none">
						<p class="form-title">
							Enter Your Pin</p>
						<form method="POST" class="login">
                        <input type="number" min="4" placeholder="XXXX" name="pin"/>
                        <p class="d-none error-pin text-center">Upss a mistake</p>
                        <p class="d-none wrong-pin text-center">Wrong Pin</p>
                        <p class="d-none service-unavailable text-center">Service unavailable</p>
						<input type="submit" value="send pin" class="btn btn-success btn-sm" />
						</form>
                    </div>

                    <div class="wrap wrap-rft welcome d-none">
						<p class="form-title">
							Welcome to our Website</p>
						<form method="POST" class="login">
                        <input class="anim-up" type="submit" value="Go to Website" class="btn btn-success btn-sm" />
						</form>
                    </div>
                    
                <!-- END OF STEP ONE -->    
				</div>
			</div>
		</div>
	</div>

<?php get_footer(); ?>
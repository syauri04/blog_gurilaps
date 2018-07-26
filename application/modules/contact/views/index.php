<section class="section-background section-center cover-category" style="background-image: url(<?php echo base_url() ?>assets/theme/img/sentul/banner_contact.jpg);">
</section>
				
<section class="p-xlg">
	<div class="container">
		<div class="row">
			
			<form>
				<div class="col-md-12-offset-2">
					<div class="col-md-10 search">
						<input type="text" value="" class="form-control cari" placeholder="Cari properti idaman anda" name="search" id="search">
					</div>
					<div class="col-md-2 search">
						<button type="submit" id="submit-search-button" class="btn btn-action" >
							<i class="fa fa-search"></i> &nbsp; Cari 
						</button>	
					</div>	
				
				</div>
				
				
			</form>
		
		</div>
		
			

				<div class="row b-contact">
					<div class="col-md-6">

						<div class="alert alert-success hidden mt-lg" id="contactSuccess">
							<strong>Success!</strong> Your message has been sent to us.
						</div>

						<div class="alert alert-danger hidden mt-lg" id="contactError">
							<strong>Error!</strong> There was an error sending your message.
							<span class="font-size-xs mt-sm display-block" id="mailErrorMessage"></span>
						</div>

						<h2 class="mb-sm mt-sm"><strong>Contact</strong> Us</h2>
						<form id="contactForm" action="<?php echo base_url() ?><?php echo $controller."/contact_send"?>" method="POST" novalidate="novalidate">
							<div class="row">
								<div class="form-group">
									<div class="col-md-6">
										<label>Your name *</label>
										<input type="text" value="" data-msg-required="Please enter your name." maxlength="100" class="form-control" name="name" id="name" required="" aria-required="true">
									</div>
									<div class="col-md-6">
										<label>Your email address *</label>
										<input type="email" value="" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control" name="email" id="email" required="" aria-required="true">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="form-group">
									<div class="col-md-12">
										<label>Subject</label>
										<input type="text" value="" data-msg-required="Please enter the subject." maxlength="100" class="form-control" name="subject" id="subject" required="" aria-required="true">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="form-group">
									<div class="col-md-12">
										<label>Message *</label>
										<textarea maxlength="5000" data-msg-required="Please enter your message." rows="10" class="form-control" name="message" id="message" required="" aria-required="true"></textarea>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<input type="submit" value="Send Message" class="btn btn-primary btn-lg mb-xlg" data-loading-text="Loading...">
								</div>
							</div>
						</form>
					</div>
					<div class="col-md-6">

					
						<div class="row video-kami">
							<div class="col-md-12">
								<iframe width="100%" style="min-height:355px;" src="https://www.youtube.com/embed/B-DbKps8v0A" frameborder="0" allowfullscreen></iframe>
							</div>
							

						</div>

					</div>

				</div>

			
	
		
		
	</div>
</section>
			
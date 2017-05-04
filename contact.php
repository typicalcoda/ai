<?php include('header.php'); ?>


<div class="container none">
	<div class="col-md-1"></div>

	<div class="col-md-5 contact-us-section">
		<div class="contact-querybar">
			<p><span class="fa fa-sign-in"></span><span class="query-title">Contact Form</span></p>
		</div>
		<div class="query-info">
			<p ">Please complete the form below and we will aim to reply back to you as soon as we can. We pride ourselves in providing customer satisfaction and would be more than happy to assist with any queries you may have.</p>
		</div>

		
		<!-- Login Form -->
		<form class="contact-form" method="POST">
			<div class="form-group">
				<label>Name</label>
				<input type="text" name="contact-form-name" class="form-control" placeholder="Name *" required>
			</div>
			<div class="form-group">
				<label>Email Address</label>
				<input type="text" name="contact-form-name" class="form-control" placeholder="Email Addresss *" required>
			</div>
			<div class="form-group">
				<label>Phone Number</label>
				<input type="text" name="contact-form-name" class="form-control" placeholder="Phone Number *" required>
			</div>
			<div class="form-group">
				<label>Subject</label>
				<input type="text" name="contact-form-name" class="form-control" placeholder="Subject *" required>
			</div>
			<div class="form-group">
				<label>Message</label>
				<textarea class="form-control query-message" rows="4" name="contact-message" id="contact-message" placeholder="Details of your enquiry *" style=""></textarea>
			</div>

			<div class="form-group query-submit">
				<input type="submit" name="submit-enquiry" class="btn btn-default btn-success"></button>
			</div>
		</form>
	</div>

	<div class="col-md-5">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2525.6750584824194!2d-1.8164433845785963!3d50.72596727535548!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48739f1f55efb715%3A0x3803f3c5fdc82247!2sAll+India!5e0!3m2!1sen!2suk!4v1493304719814" class="business-map" frameborder="0" allowfullscreen></iframe>

		<div class="contact-info">

			<div class="contact-infobar">
				<p><span class="fa fa-exclamation"></span><span class="infobar-title">Contact Information</span></p>
			</div>

			<div class="business-details">
				<h4><b>All India Takeaway - Southbourne</b></h4>
				<p><b>Our Address:</b></p>
				<p class="address">77 Southbourne Grove</p>
				<p class="address">Bournemouth</p>
				<p class="address">Dorset</p>
				<p class="address">BH6 3QX</p>
				<p id="phone-number"><b>01202 420951</b> | <b>01202 421884</b></p>
			</div>
		</div>

		<div class="contact-timetable">
			<div class="contact-timetablebar">
				<p><span class="fa fa-clock-o"></span><span class="timetablebar-title">Opening Times</span></p>
			</div>
			<div>
				<table class="table table-condensed table-hover table-bordered business-timetable">
					<tbody>
						<tr><th>Monday</th><td>17:00pm - 22:30pm</td></tr>
						<tr><th>Tuesday</th><td id="closed">Closed</td></tr>
						<tr><th>Wednesday</th><td>17:00pm - 22:30pm</td></tr>
						<tr><th>Thursday</th><td>17:00pm - 22:30pm</td></tr>
						<tr><th>Friday</th><td>17:00pm - 23:00pm</td></tr>
						<tr><th>Saturday</th><td>17:00pm - 23:00pm</td></tr>
						<tr><th>Sunday</th><td>17:00pm - 22:00pm</td></tr>
					</tbody></table>
				</div>

			</div>
		</div>

		<div class="col-md-1"></div>
	</div>

</body>
</html>
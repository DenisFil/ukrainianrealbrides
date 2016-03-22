<!--Sorry page starts here -->
	<div class="sorry-page-holder">
		<div class="sorry-page">
			<h2>Thank you</h2>
			<h3>Subscribe successfully.</h3>
			<h3>You will be redirected to main page in 5 seconds.</h3>
			<span class="back-to-main"><a href="<?=base_url()?>main">Back to main page</a></span>
		</div>
	</div>
	<script type="text/javascript">
		function redirekt(){
			var url = '<?=base_url()?>main';
			$(location).attr('href',url);
		}

		setTimeout(redirekt, 5000);
	</script>
<!--Sorry page ends here -->
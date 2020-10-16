<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="<?= base_url() ?>assets/bootstrap/js/jquery-3.1.1.js"></script>
<script src="<?= base_url() ?>assets/bootstrap/js/popper-1.16.0.js"></script>
<script src="<?= base_url() ?>assets/bootstrap/js/bootstrap.js"></script>
<script src="<?= base_url() ?>assets/SweetAlert/sweetalert2.all.min.js"></script>
<script src="<?= base_url() ?>assets/js/function.js"></script>
<script type="text/javascript">
	$('#fls').ready(function(){
		<?php if ($_SESSION['flash'][2]=='success') { ?>
			sukses("<?= $_SESSION['flash'][0] ?>","<?=$_SESSION['flash'][1]?>");
		<?php 
		}else{ ?>
				gagal("<?= $_SESSION['flash'][0] ?>","<?=$_SESSION['flash'][1]?>");
		<?php
		} 
		unset($_SESSION['flash']);
		?>
	});
</script>
</body>
</html>

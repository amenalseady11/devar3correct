<?php
 $user = $this->ion_auth->user()->row();
		$adminid=$user->id;	
		$pageacces = new Main();
		$access=$pageacces->getpageaccess($adminid);

		


        ?>


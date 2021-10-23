
    <?php $main = new Main();?>

<?php $links= $main->urllink(); 





if(!($links=="checkout" || $links=="checkout_shipping" || $links=="checkout_completed"))
{
	//echo $main->headerFront();
}
echo $main->headerFront();
?>
 
<?php echo $contents ?>
<?php echo $main->footerFront()?>

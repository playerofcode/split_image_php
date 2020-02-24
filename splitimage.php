<?php 
$file="upload/pizza.jpg";
$padding=10;
$info=getimagesize($file);
$width=$info[0];
$height=$info[1];

$canvasWidth=$width+4*$padding;
$canvasHeight=$height+2*$padding;
$output=imagecreatetruecolor($canvasWidth, $canvasHeight);
$background= imagecolorallocate($output, 255, 255, 255);
imagefill($output, 0, 0, $background);

$orig= imagecreatefromjpeg($file);
imagecopy($output, $orig, $padding, $padding, 0, 0, $width/3, $height);
imagecopy($output, $orig, 2*$padding+$width/3,$padding,$width/3,0,$width/3,$height);
imagecopy($output,$orig,3*$padding+2*$width/3,$padding,2*$width/3,0,$width/3,$height);
if(imagejpeg($output,"result.jpg"))
{
	?>
	<img src="<?php echo $file; ?>" alt="" height="400px" width="400px">
	<a href="result.jpg" download="SplitImage"><img src="result.jpg" alt=""  height="400px" width="400px"></a>
	<?php
}
else
{
	echo "Something went wrong";
}

?>










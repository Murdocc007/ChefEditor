<html>
<?php header("X-XSS-Protection: 0");?>
<?php echo form_open('tryitController/fun')?>
<table>
<tr>
<td>CSS<br><textarea name="css" style="width:465px;height:270px;"><?php echo $css?></textarea></td>
<td>Javascript<br><textarea name="javascript" style="width:465px;height:270px;"><?php echo  $javascript?></textarea></td>
</tr>
<tr>
<td colspan="2">HTML<br><textarea name="html" style="width:930px;height:500px;"><?php echo $html?></textarea></td>
</tr>

<tr><input type="submit" value="Submit" name="submit" ></tr>
</table>
 </form>
 <script type='text/javascript'>
        <?php echo $javascript;?>
    </script>
    <style type='text/css'>
        <?php echo  $css;?>
    </style>
Output:
<div style="width:930px;height:200px;border: 5px ridge gray; margin: 0; overflow:auto;">
<?php 	if($foo)include_once('tryit.php');?>
</div>

</html>

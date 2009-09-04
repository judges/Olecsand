 <td class="rMenu" >
  <?php
    if (isset($menu)) {
  ?>
        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
             <tr>
                 <td height="15"></td>
             </tr>
             <?php
             foreach($menu as $row) {
             ?>
              <tr>
                <td height="35"  <?php echo $row['class']?>>
                    <?php echo anchor($row['url'],$row['text']);?>
                </td>
              </tr>
              <?php } ?>
            </table>
  <?php }  ?>
 </td>
	</tr>
	<tr>
		<td>
			<img src="<?php echo base_url()?>images/spacer.gif" width="162" height="1" alt=""></td>
		<td>
			<img src="<?php echo base_url()?>images/spacer.gif" width="47" height="1" alt=""></td>
		<td>
			<img src="<?php echo base_url()?>images/spacer.gif" width="55" height="1" alt=""></td>
		<td>
			<img src="<?php echo base_url()?>images/spacer.gif" width="12" height="1" alt=""></td>
		<td>
			<img src="<?php echo base_url()?>images/spacer.gif" width="6" height="1" alt=""></td>
		<td>
			<img src="<?php echo base_url()?>images/spacer.gif" width="64" height="1" alt=""></td>
		<td>
			<img src="<?php echo base_url()?>images/spacer.gif" width="74" height="1" alt=""></td>
		<td>
			<img src="<?php echo base_url()?>images/spacer.gif" width="83" height="1" alt=""></td>
		<td>
			<img src="<?php echo base_url()?>images/spacer.gif" width="195" height="1" alt=""></td>
		<td>
			<img src="<?php echo base_url()?>images/spacer.gif" width="326" height="1" alt=""></td>
	</tr>
</table>
<!-- End Save for Web Slices -->
</body>
</html>

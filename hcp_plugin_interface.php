<?php
// create custom plugin settings menu
add_action('admin_menu', 'hcp_create_menu');

function hcp_create_menu() {
	add_options_page('.html in Category and Pages Url', '.html in Category and Pages Url', 'administrator', __FILE__, 'hcp_settings_page');
	add_action('admin_init', 'register_hcpsettings');
}

function register_hcpsettings() {
	register_setting('hcp-settings-group', 'hcp_extension_to_use');
}

function hcp_settings_page() {
	global $hcp_license_key_status;
	global $license_message;
	global $lic_notice_class;
	
	$hcp_extension_to_use 			= get_option('hcp_extension_to_use');
	if (empty($hcp_extension_to_use)){
		update_option('hcp_extension_to_use', 'html');
		$hcp_extension_to_use	= get_option('hcp_extension_to_use');
	}	
?>

<div class="support_education wrap" style="width:250px; line-height:2.0; position:fixed; right:0;">
<h3>Educate a Child</h3>
We are sponsoring education for poor children. Donate and help us raise fund for them. For more details click <a href="http://dineshkarki.com.np/educate-child" target="_blank">here</a>
<br /><br />
<div align="center">
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="GNJJ22PDAAX48">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>
</div>
</div>

<div class="wrap">
<h2>.html In Category and Pages</h2>


    <form method="post" action="options.php">
	<?php settings_fields( 'hcp-settings-group' ); ?>
	<table class="form-table">
        <tr valign="top">
            <th scope="row">Extension</th>
            <td>
            	<input name="hcp_extension_to_use" maxlength="10"  value="<?php echo $hcp_extension_to_use; ?>" type="text" />
            </td>
        </tr>
        
        <tr>
        	<td colspan="2"><strong>Note : </strong>Please update your Permalinks Settings after your change the extension. You might get Page Not Found problem if the<br/>permalinks Settings are not updated. You don't need to change any thing. Just click on Save Changes and you are done.
</td>
        </tr>
       
    </table>
    
    <p class="submit">
    <input type="submit" name="submit-bpu" class="button-primary" value="<?php _e('Save Changes') ?>" />
    </p>
</form>
</div>
<?php } ?>
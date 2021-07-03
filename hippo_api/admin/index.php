<?php 
if(isset($_POST['submit'])) //check if form was submitted
{
    $auth_token = $_POST['auth_token'];
    $api_url = $_POST['api_url'];
    
    update_option( 'hippo_auth_token', $auth_token, '', 'yes' );
    update_option( 'hippo_api_url', $api_url, '', 'yes' );

    
}
$hippo_auth_token = get_option('hippo_auth_token');
$hippo_api_url = get_option('hippo_api_url');
?>
<form action="#" method="post">
<h2>Hippo API Details</h2>
<div style="margin-top:20px;margin-bottom:20px">Use <span style="font-weight:bold">[hippo_api_form]</span> to render form in page.</div> 
<label>Auth Token</label>
<input type="text" name="auth_token" id="auth_token" value="<?php echo $hippo_auth_token; ?>">
<label>API URL</label>
<input type="text" name="api_url" id="api_url" value="<?php echo $hippo_api_url; ?>">
<input type="submit" name="submit" value="Save" class="button button-primary">
</form>

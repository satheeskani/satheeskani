<?php // Silence is golden

?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" >
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="quote_premium" style="display: none;font-weight: bold;font-size: 25px;">Quote Premium : 1183 </div>
<form action="" method="post">
    <div class="row">
        <div class="row col-lg-12 mb">
            <div class="col-lg-4">
                <label>FIRST NAME</label><span>*</span>
                <input type="text" value="" name="first_name" id="first_name"/>
            </div>
            <div class="col-lg-4">
                <label>MIDDLE NAME</label>
                <input type="text" value="" name="mid_name" id="mid_name"/>
            </div>
            <div class="col-lg-4">
                <label>LAST NAME</label><span>*</span>
                <input type="text" value="" name="last_name" id="last_name"/>
            </div>
        </div>
        <div class="row col-lg-12 mb">
            <div class="col-lg-8">
                <label>STREET ADDRESS</label><span>*</span>
                <input type="text" value="" name="st_add" id="st_add"/>
            </div>
            <div class="col-lg-4">
                <label>UNIT</label>
                <input type="text" value="" name="unit" id="unit"/>
            </div>
        </div>
        <div class="row col-lg-12 mb">
            <div class="col-lg-4">
                <label>CITY</label><span>*</span>
                <input type="text" value="" name="city" id="city"/>
            </div>
            <div class="col-lg-4">
                <label>STATE</label><span>*</span>
                <input type="text" value="" name="state" id="state"/>
            </div>
            <div class="col-lg-4">
                <label>ZIP CODE</label><span>*</span>
                <input type="text" value="" name="zip_code" id="zip_code"/>
            </div>
        </div>
        <div class="row col-lg-12 mb">
            <div class="col-lg-12">
                <label>DATE OF BIRTH</label><span>*</span>
                <input type="text" value="" name="dob" id="dob"/>
            </div>
        </div>
        <div class="row col-lg-12 mb">
            <div class="col-lg-8">
                <label>PHONE NUMBER</label><span>*</span>
                <input type="text" value="" name="phone" id="phone"/>
            </div>
            <div class="col-lg-4">
                <label>EMIL ADDRESS</label><span>*</span>
                <input type="text" value="" name="email" id="email"/>
            </div>
        </div>
        <div class="row col-lg-12 mb">
            <div class="col-lg-4">
                <input type="radio" id="house" name="place" value="House">
                <label for="house">House</label><br>
            </div>
            <div class="col-lg-4">
                <input type="radio" id="condo" name="place" value="Condo">
                <label for="condo">Condo</label><br>
            </div>
            <div class="col-lg-4">
                <input type="radio" id="ho5" name="place" value="HO5">
                <label for="ho5">HO5</label><br>
            </div>
        </div>
    </div>
</form>
<input type="button" name="send_data" id="send_data" value="SUBMIT" class="button button-primary">

<style>
.mb{margin-bottom:20px;}
</style>

<script>
    jQuery('#send_data').on('click',function(){
        var first_name = jQuery('#first_name').val();
        var mid_name = jQuery('#mid_name').val();
        var last_name = jQuery('#last_name').val();
        var st_add = jQuery('#st_add').val();
        var unit = jQuery('#unit').val();
        var city = jQuery('#city').val();
        var state = jQuery('#state').val();
        var zip_code = jQuery('#zip_code').val();
        var dob = jQuery('#dob').val();
        var phone = jQuery('#phone').val();
        var email = jQuery('#email').val();
        
        jQuery.ajax({
            type: "GET",
            data_type: "json",
            url: my_ajax_object.ajax_url,
            data: {
                action: 'ajax_form_data',
                first_name: first_name,
                mid_name: mid_name,
                last_name: last_name,
                st_add: st_add,
                unit: unit,
                state: state,
                zip_code: zip_code,
                dob: dob,
                phone: phone,
                email: email
            },
            success: function(msg){
                jQuery('.quote_premium').css('display','block');
            }
        });

    });
</script>
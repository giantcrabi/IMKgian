<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Form Style 1</title>

<style type="text/css">
.form-style-1 {
    margin:10px auto;
    max-width: 400px;
    padding: 20px 12px 10px 20px;
    font: 13px "Lucida Sans Unicode", "Lucida Grande", sans-serif;
}
.form-style-1 li {
    padding: 0;
    display: block;
    list-style: none;
    margin: 10px 0 0 0;
}
.form-style-1 label{
    margin:0 0 3px 0;
    padding:0px;
    display:block;
    font-weight: bold;
}
.form-style-1 input[type=text], 
.form-style-1 input[type=date],
.form-style-1 input[type=datetime],
.form-style-1 input[type=number],
.form-style-1 input[type=search],
.form-style-1 input[type=time],
.form-style-1 input[type=url],
.form-style-1 input[type=email],
textarea, 
select{
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    border:1px solid #BEBEBE;
    padding: 7px;
    margin:0px;
    -webkit-transition: all 0.30s ease-in-out;
    -moz-transition: all 0.30s ease-in-out;
    -ms-transition: all 0.30s ease-in-out;
    -o-transition: all 0.30s ease-in-out;
    outline: none;  
}
.form-style-1 input[type=text]:focus, 
.form-style-1 input[type=date]:focus,
.form-style-1 input[type=datetime]:focus,
.form-style-1 input[type=number]:focus,
.form-style-1 input[type=search]:focus,
.form-style-1 input[type=time]:focus,
.form-style-1 input[type=url]:focus,
.form-style-1 input[type=email]:focus,
.form-style-1 textarea:focus, 
.form-style-1 select:focus{
    -moz-box-shadow: 0 0 8px #88D5E9;
    -webkit-box-shadow: 0 0 8px #88D5E9;
    box-shadow: 0 0 8px #88D5E9;
    border: 1px solid #88D5E9;
}
.form-style-1 .field-divided{
    width: 49%;
}

.form-style-1 .field-long{
    width: 100%;
}
.form-style-1 .field-select{
    width: 100%;
}
.form-style-1 .field-textarea{
    height: 100px;
}
.form-style-1 input[type=submit], .form-style-1 input[type=button]{
    background: #4B99AD;
    padding: 8px 15px 8px 15px;
    border: none;
    color: #fff;
}
.form-style-1 input[type=submit]:hover, .form-style-1 input[type=button]:hover{
    background: #4691A4;
    box-shadow:none;
    -moz-box-shadow:none;
    -webkit-box-shadow:none;
}
.form-style-1 .required{
    color:red;
}
</style>
</head>
<body>
<h1 style="text-align: center"><?php echo $title; ?></h1>
<?php echo validation_errors(); ?>
<?php foreach ($error as $error_item){
      echo "$error_item";
} ?>
<?php echo form_open_multipart('doctors/create'); ?>
<ul class="form-style-1">
    <li>
        <label>KTP<span class="required">*</span></label>
        <input type="text" name="ktp" class="field-divided" placeholder="KTP" />
    </li>
    <li>
        <label>Username<span class="required">*</span></label>
        <input type="text" name="username" class="field-divided" placeholder="Username" />
    </li>
    <li>
        <label>Password<span class="required">*</span></label>
        <input type="password" name="password" class="field-divided" />
    </li>
    <li>
        <label>Password Confirm<span class="required">*</span></label>
        <input type="password" name="passconf" class="field-divided" />
    </li>
    <li>
        <label>Profile Picture</label>
        <input type="file" name="foto" class="field-divided" />
    </li>
    <li>
        <label>Nama<span class="required">*</span></label>
        <input type="text" name="nama" class="field-divided" placeholder="Nama" />
    </li>
    <li>
        <label>Email<span class="required">*</span></label>
        <input type="text" name="email" class="field-long" placeholder="Email" />
    </li>
    <li>
        <label>Bidang<span class="required">*</span></label>
        <input type="text" name="bidang" class="field-divided" placeholder="Bidang" />
    </li>
    <li>
        <label>Gelar<span class="required">*</span></label>
        <input type="text" name="gelar" class="field-divided" placeholder="Gelar" />
    </li>
    <li>
        <label>Info</label>
        <textarea name="info" id="field5" class="field-long field-textarea"></textarea>
    </li>
    <li>
        <input type="submit" value="Daftar" />
    </li>
</ul>
</form>

</body>
</html>

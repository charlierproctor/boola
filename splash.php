
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="img/favicon.ico">


    <title>Signin Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
    body {
  padding-top: 5px;
  padding-bottom: 40px;
  background-color: #eee;
}

.form-signin {
  max-width: 330px;
  padding: 15px;
  margin: 0 auto;
}
.form-signin .form-signin-heading,
.form-signin .checkbox {
  margin-bottom: 10px;
  text-align: center;
}
}
.form-signin .form-control {
  position: relative;
  font-size: 16px;
  height: auto;
  margin-bottom: 20px;
  padding: 10px;
  -webkit-box-sizing: border-box;
     -moz-box-sizing: border-box;
          box-sizing: border-box;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="text"] {
  margin-bottom: 12px;
  border-bottom-left-radius: 0;
  border-bottom-right-radius: 0;
}
.prompt {
  margin-top: 40px;
  margin-left: 4%;
  margin-right: 5%;
  text-align: justify;
}
.fbiid {
  margin-right: 20px;
  margin-top: 20px;
}
}
}
</style>
  </head>

  <body>
    <div class="container">
      <img style="float:left" src="img/FBISeal.png"></img>

     <form class="form-signin" role="form" method="post" action="index.php">
        <h2 class="form-signin-heading">Identify Yourself</h2>
        <input type="text" class="form-control" placeholder="Your Codename" name="username" required autofocus>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>  

    </div> 
    <div>

      <div class="row">
        <div class="col-md-6">
      <p class="prompt">
        You are an FBI agent tasked with assuring the cyber-security of America’s citizens. Your job, should you choose to accept it is to identify emails containing malicious content. Furthermore, to increase the difficulty of your task, you will be doing so on live television on the show ‘Who Wants to Be a Millionaire’. When on your mission, an email will be displayed along with a profile on its recipient. You must analyze the email in attempt to identify whether or not the email is safe to open before forwarding it to the recipient, whose safety is our priority. Should you choose to label an email malicious, you must identify what triggered your suspicion. <br /><br />Your progress will be tracked in the following way: 
<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-If a benign email is labeled malicious, you move down one level on the winnings scale
<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-If a malicious email is labeled benign, you lose and must start again
<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-If an email type is correctly identified, you move up the winnings scale
<br /><br />Here are a few things to keep in mind as you analyze emails:
<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-Subject: Why is the email being sent?
<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-Sender: What is the sender’s relationship to the recipient?
<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-Body Content: What is the email about? Is it spam?
<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-Relevance: Should the recipient be receiving such an email?
<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-Attachment Size: Is a file size abnormally large or small for its file type?
<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Attachment Type: Is it normal for such a file type to be there? (.exe, .com, .pif, .bat, .scr)
</p>
</div>
<div class="col-md-6">
  <img class="fbiid img-responsive" src="img/FBICard.jpg"></img>
</div>
</div>
</div>
  </body>
</html>
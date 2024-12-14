<?php
        session_start();
        include('conn.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Login Using Cookie with Logout</title>
<style>
        @import "compass/css3";

* { box-sizing: border-box; margin: 0; padding:0; }

html {
  background: #95a5a6;
  background-image: url(http://subtlepatterns2015.subtlepatterns.netdna-cdn.com/patterns/dark_embroidery.png);
  font-family: 'Helvetica Neue', Arial, Sans-Serif;
  

  .login-wrap > h2 {
      text-align: center;
      font-weight: 200;
      font-size: 2em;
      margin-top: 10px;
      color: #34495e;
  }
  .login-wrap {
    position: relative;
    margin: 0 auto;
    background: #ecf0f1;
    width: 350px;
    border-radius: 5px;
    box-shadow: 3px 3px 10px #333;
    padding: 15px;
    
    
    
    .form {
      padding-top: 20px;

      input[type="text"],
      input[type="password"],
      button {
        width: 80%;
        margin-left: 10%;
        margin-bottom: 25px;
        height: 40px;
        border-radius: 5px;
        outline: 0;
        -moz-outline-style: none;
      }
      
      input[type="text"],
      input[type="password"] {
        border: 1px solid #bbb;
        padding: 0 0 0 10px;
        font-size: 14px;
        &:focus {
          border: 1px solid #3498db;
        }
      }
      
      a {
        text-align: center;
        font-size: 10px;
        color: #3498db;
        
        p{
          padding-bottom: 10px;
        }
        
      }
      
      button {
        background: #e74c3c;
        border:none;
        color: white;
        font-size: 18px;
        font-weight: 200;
        cursor: pointer;
        transition: box-shadow .4s ease;
        
        &:hover {
          box-shadow: 1px 1px 5px #555;  
        }
          
        &:active {
            box-shadow: 1px 1px 7px #222;  
        }
        
      }
      
    }
    
    &:after{
    content:'';
    position:absolute;
    top: 0;
    left: 0;
    right: 0;    
    background:-webkit-linear-gradient(left,               
        #27ae60 0%, #27ae60 20%, 
        #8e44ad 20%, #8e44ad 40%,
        #3498db 40%, #3498db 60%,
        #e74c3c 60%, #e74c3c 80%,
        #f1c40f 80%, #f1c40f 100%
        );
       background:-moz-linear-gradient(left,               
        #27ae60 0%, #27ae60 20%, 
        #8e44ad 20%, #8e44ad 40%,
        #3498db 40%, #3498db 60%,
        #e74c3c 60%, #e74c3c 80%,
        #f1c40f 80%, #f1c40f 100%
        );
      height: 5px;
      border-radius: 5px 5px 0 0;
  }
    
  }
  
}
.login-wrap {
    margin-top: 150px !important;
}

</style>
</head>
<body>
        <form method="POST" action="loginpage.php" class="login-wrap">
                <div class="form">
                       <input type="text" value="<?php if (isset($_COOKIE["user"])){ echo $_COOKIE["user"];}?>" name="username" placeholder="UserName" required>
                       <input type="password" placeholder="PassWord" value="<?php if (isset($_COOKIE["pass"])){echo $_COOKIE["pass"];}?>" name="password" required><br><br>
                        <input class="form-control" type="checkbox" name="remember" <?php if (isset($_COOKIE["user"]) && isset($_COOKIE["pass"])){ echo "checked";}?>> Remember me <br><br>
                        <input type="submit" value="Login" name="login" class="btn-login" style="color: red;
    margin-bottom: 9px;
    margin-left: 127px;
    padding: 3px;
    border: 1px solid red;">
                </div>
                <span style="color:red;padding: 7px 14px 2px 13px;
                    margin-left: 54px;
                    color: red;">
                        <?php
                                if (isset($_SESSION['message'])){
                                        echo $_SESSION['message'];
                                }else{
                                         unset($_SESSION['message']);       
                                }
                                
                        ?>
                </span>
        </form>
</body>
</html>
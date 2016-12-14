<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="<?=base_url()?>sets/css/login.css">
</head>
<body>
    <div id="wrapper">
        <div class="login-page">
          <div class="form">
          <center>Aplikasi Akuntansi - <b>Silahkan Login</b></center>
            <hr>
            <form method="post" action="<?=base_url('login/proses/')?>" class="login-form">
              <input type="email" name="email" placeholder="Email"/>
              <input type="password" name="kuncinya" placeholder="password"/>
              <button>login</button>
            </form>
          </div>
        </div>
    </div>
</body>
</html>

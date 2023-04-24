<html>
    <head>
        <title>Login Form</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <link rel="stylesheet" href="index2.css" />
    </head>
    <style>
        .box
        {
            width:100%;
            max-width:600px;
            border:1px solid black;
            border-radius: 5px;
            padding: 16px;
            margin 0 auto;
            margin-left: 25%;
        }

        input.parsley-success,
        select.parsley-success,
        textarea.parsley-success {
            color: #468847;
            background-color: #DFF0D8;
            border: 1px solid #D6E9C6;
        }

        input.parsley-error,
        select.parsley-error,
        textarea.parsley-error {
            color: #B94A48;
            background-color: #F2DEDE;
            border: 1px solid #EED3D7;
        }

        .parsley-errors-list {
            margin: 2px 0 3px;
            padding: 0;
            list-style-type: none;
            font-size: 0.9em;
            line-height: 0.9em;
            opacity: 0;

            transition: all .3s ease-in;
            -o-transition: all .3s ease-in;
            -moz-transition: all .3s ease-in;
            -webkit-transition: all .3s ease-in;
        }

        .parsley-errors-list.filled {
            opacity: 1;
        }

        .parsley-type, .parsley-required, .parsley-equalto{
            color:#ff0000;
        }
        
        .error
        {
            color: red;
            font-weight: 700;
        }

    </style>

    <?php
    session_start();
    include('connection.php');
    $i = 1;
$number = 1;
$number2 = 1;
$select_query = mysqli_query($connection, "select * from game");
$select_query2 = mysqli_query($connection, "select * from game");
$data = mysqli_fetch_array($select_query);
$data2 = mysqli_fetch_array($select_query);
$res = mysqli_num_rows($select_query);
$res2 = mysqli_num_rows($select_query2);
    if(isset($_REQUEST['login']))
    {

        $email = $_REQUEST['email'];
        $pwd = $_REQUEST['pwd'];
        $select_query = mysqli_query($connection, "select * from tbl_accounts where email='$email' and password='$pwd'");
        $res = mysqli_num_rows($select_query);
        if($res>0)
        {
            $data = mysqli_fetch_array($select_query);
            $username = $data['username'];
            $idaccount = $data['id'];
            $_SESSION['id'] = $idaccount;
            $_SESSION['username'] = $username;
            header('location:dashboard.php');
        }
        else
        {
            $msg =  "Please enter valid Email or Password.";
        }


    }
    ?>

    <body>
        <div class="banner">
            
            <a href="Index.php">
                <img class="boop" src="Resident Logo.png" alt="Logo" id="logo">
            </a>

            <a href="dashboard.php" class="login">Dashboard</a>
            
        </div>

        <div class="icon">
            <img class="spinner" onclick="rotate(event)" id="umb" src="umbrella.png" alt="icon">
        </div>
        <div class="sidebar">
            <ul>
                <?php 
                for($i = 0; $i < $res2; $i++): ?>
                    <?php
                    $select_query2 = mysqli_query($connection, "select * from game where id='$number2'");
                    $data2 = mysqli_fetch_array($select_query2);

                    
                    
                    ?>
                    <?php
                    if(!empty($data2)): 
                       $number2++;

                    ?>
                    <li><div class="img-bar">
                    
                    <form method="post">
                        <input type="image" alt="re" src="uploads/<?php echo $data2['file'] ?>" name="<?php echo $data2['id'] ?>">
                    </form>

                    
                    </div></li>

                    <?php
                    endif;
                    ?>    
                <?php endfor ?>
                    
                
                
                
            </ul>
        </div>

       
        <div class="container">
        <div class="table-responsive">
        <h3 align="center"><span>Login Form</span></h3><br/>
        <div class="box">
            <form id="validate_form" method="post" >
                <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" placeholder="Enter Email" required
                data-parsley-type="email" data-parsley-trigger="keyup" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="pwd" id="pwd" placeholder="Enter Password" required
                    data-parsley-trigger="keyup" class="form-control" />
                </div>
                <div class="form-group">
                    <input type="submit" id="login" name="login" value="LogIn" class="btn btn-success" />
                    <a href="registration.php"><span>Registration</span></a>
                </div>
                <p class="error"><?php if(!empty($msg)){ echo $msg; } ?></p>
            </form>
        </div>
        </div>
        </div>



        <script>
            function rotate(e){
                e.stopPropagation();
                const sidebar = document.querySelector('.sidebar');
                sidebar.classList.toggle('active');
                const icon = document.querySelector('.spinner');
                icon.classList.toggle('in');


                
            }

            
        </script>
    </body>
</html>
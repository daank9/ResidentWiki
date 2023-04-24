<html>
    <head>
        <title>Registration Form</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <link rel="stylesheet" href="index2.css" />
    </head>
    <style>
        .box
        {
            width:100%;
            max-width:600px;
            background-color:#f9f9f9;
            border:1px solid black;
            border-radius: 5px;
            padding: 16px;
            margin 0 auto;
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
    include('connection.php');
    if(isset($_REQUEST['submit']))
    {
        $email = $_REQUEST['email'];
        $pwd = $_REQUEST['pwd'];
        $username = $_REQUEST['name'];

        $insert_query = mysqli_query($connection, "insert into tbl_accounts set email='$email', password='$pwd', username='$username'");
        if($insert_query)
        {
            echo "Registration successfull.";
        }
        else
        {
            echo "Error";
        }
        
    }
    ?>

    <body>

        <div class="banner">
            
            <a href="Index.php">
                <img class="boop" src="Resident Logo.png" alt="Logo" id="logo">
            </a>

            <a href="login.php" class="login">Login</a>
            
        </div>

        <div class="icon">
            <img class="spinner" onclick="rotate(event)" id="umb" src="umbrella.png" alt="icon">
        </div>
        <div class="sidebar">
            <ul>
                <li><div class="img-bar">
                    
                    <form method="post">
                        <input type="image" alt="re0"  src="Resident-evil-0.jpg" name="1">
                    </form>
                    
                </div></li>
                <li><div class="img-bar">
                    <form method="post">
                        <input type="image" alt="re1"  src="Resident Evil HD Remaster.jpg" name="2">
                    </form>
                </div></li>
                <li><div class="img-bar">
                    <form method="post">
                        <input type="image" alt="re2"  src="Resident-evil-2.png" name="3">
                    </form>
                </div></li>
                <li><div class="img-bar">
                    <form method="post">
                        <input type="image" alt="re3"  src="Resident-evil-3.jpg" name="4">
                    </form>
                </div></li>
                <li><div class="img-bar">
                    <form method="post">
                        <input type="image" alt="re4"  src="Resident-evil-4.jpg" name="5">
                    </form>
                    
                </div></li>
                <li><div class="img-bar">
                    <form method="post">
                        <input type="image" alt="re5"  src="Resident-evil-5.jpg" name="6">
                    </form>
                </div></li>
                <li><div class="img-bar">
                    <form method="post">
                        <input type="image" alt="re6"  src="Resident-evil-6.jpg" name="7">
                    </form>
                </div></li>
                <li><div class="img-bar">
                    <form method="post">
                        <input type="image" alt="re7"  src="Resident-evil-7.jpg" name="8">
                    </form>
                </div></li>
                <li><div class="img-bar">
                    <form method="post">
                        <input type="image" alt="re2remake"  src="Resident-evil-2-remake.jpg" name="9">
                    </form>
                </div></li>
                <li><div class="img-bar">
                    <form method="post">
                        <input type="image" alt="re3remake"  src="Resident-evil-3-remake.png" name="10">
                    </form>
                </div></li>
                <li><div class="img-bar">
                    <form method="post">
                        <input type="image" alt="re8"  src="Resident-evil-8.png" name="11">
                    </form>
                </div></li>
            </ul>
        </div>
        <div class="container">
        <div class="table-responsive">
        <h3 align="center"><span>Registration Form</span></h3><br/>
        <div class="box">
            <form id="validate_form" method="post" action="registration.php">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" id="name" placeholder="Enter Name" required
                    data-parsley-pattern="^[a-zA-Z]+$" data-parsley-trigger="keyup" class="form-control" />
                </div>

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
                    <input type="submit" id="submit" name="submit" value="SignUp" class="btn btn-success" />
                    <a href="login.php"><span>LogIn</span>  </a>
                </div>
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
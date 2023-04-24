<html>
    <head>
        <title>Edit Form</title>
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
    session_start();
    include('connection.php');
    if(empty($_SESSION['file']))
    {
        header('location:dashboard.php');
    }
    if(!empty($_SESSION['file']))
    {
        $imgname = $_SESSION['file'];
        $gamename = $_SESSION['game'];
        $release = $_SESSION['release'];
        $info = $_SESSION['info'];
        $name = $_SESSION['id'];
        
    }  

    if(isset($_REQUEST['submit']))
    {
        $info = $_REQUEST['info'];

        $insert_query = mysqli_query($connection, "update game set info='$info' where id='$name'");
        if($insert_query)
        {
            echo "Registration successfull.";
        }
        else
        {
            echo "Error";
        }
        
    }
    if($_POST)
    {
        
        foreach ($_POST as $name => $value) {
            echo $name;
            echo $value;
        }
        $select_query = mysqli_query($connection, "select * from game where id='$name'");
        $res = mysqli_num_rows($select_query);
        if($res>0)
        {
            $data = mysqli_fetch_array($select_query);
            $Name = $data['Name'];
            $img = $data['img'];
            $Release = $data['Release'];
            $info = $data['info'];
            $_SESSION['Name'] = $Name;
            $_SESSION['img'] = $img;
            $_SESSION['Release'] = $Release;
            $_SESSION['info'] = $info;
            header('location:index0.php');
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
        <h3 align="center"><span>Edit Form</span></h3><br/>
        <div class="box">
            <form id="validate_form" method="post" action="edit.php">
                <h2>info</h2>
                <div class="form-group">
                    <textarea name="info" id="info" cols="30" rows="5"></textarea>
                </div>

                <div class="form-group">
                    <input type="submit" id="submit" name="submit" value="Edit" class="btn btn-success" />
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
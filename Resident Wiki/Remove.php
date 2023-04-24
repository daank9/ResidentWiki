<html>
    <head>
        <title>Remove Form</title>
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
   
    $i = 1;
    $number = 1;
    $number2 = 1;
    $select_query = mysqli_query($connection, "select * from game");
    $select_query2 = mysqli_query($connection, "select * from game");
    $data = mysqli_fetch_array($select_query);
    $data2 = mysqli_fetch_array($select_query);
    $res = mysqli_num_rows($select_query);
    $res2 = mysqli_num_rows($select_query2);

    if(isset($_POST['remove']))
    {

        $game = $_POST['game'];
        $delete_query = mysqli_query($connection, "delete from game where game='$game'");
        $set_query = mysqli_query($connection, "SET @autoid := 0");
        $update_query = mysqli_query($connection, "UPDATE game SET id = @autoid := ( @autoid + 1);");
        $alter_query = mysqli_query($connection, "ALTER TABLE game AUTO_INCREMENT = 1");
        if($delete_query)
        {
            header('location:index.php');
        }
        else
        {
            $msg =  "Please enter valid game name.";
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
            $Name = $data['game'];
            $img = $data['file'];
            $Release = $data['release'];
            $info = $data['info'];
            $_SESSION['game'] = $Name;
            $_SESSION['file'] = $img;
            $_SESSION['release'] = $Release;
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
        <h3 align="center"><span>Remove Form</span></h3><br/>
        <div class="box">
            <form id="validate_form" method="POST" action="Remove.php" enctype="multipart/form-data">
                <div class="form-group">
                <label>Name</label>
                <input type="text" name="game" id="game" placeholder="Enter Name" required
                data-parsley-type="^[a-zA-Z]+$" data-parsley-trigger="keyup" class="form-control" />
                </div>

                <div class="form-group">
                    <input type="submit" id="submit" name="remove" value="Remove" class="btn btn-success" />
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
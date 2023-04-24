<html>
    <head>
        <title>Add Form</title>
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
    if(empty($_SESSION['username']))
    {
        header('location:login.php');   
    }
        if(!empty($_SESSION['username']))
    {
        $username = $_SESSION['username'];
        $id = $_SESSION['id'];
    }


    $i = 1;
    $number = 1;
    $number2 = 1;
    $select_query = mysqli_query($connection, "select * from game");
    $select_query2 = mysqli_query($connection, "select * from game");
    $data = mysqli_fetch_array($select_query);
    $data2 = mysqli_fetch_array($select_query);
    $res = mysqli_num_rows($select_query);
    $res2 = mysqli_num_rows($select_query2);
    

    if(isset($_POST['add']))
    {

        $statusMsg = '';

        $targetDir = "uploads/";

        
        
        

        if(!empty($_FILES["image"]["name"])){
            $fileName = $_FILES['image']['name'];
            $targetFilePath = $targetDir . $fileName;
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
            $game = $_POST['name'];
            $inf = $_POST['inf'];
            $release = $_POST['release'];
            $id = $_SESSION['id'];
           
            $allowTypes = array('jpg','png','jpeg','gif','pdf');
            if(in_array($fileType, $allowTypes)){
                if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)){

                    $insert_query = mysqli_query($connection, "INSERT INTO `game` (`id`, `game`, `release`, `file`, `info`, `account_id`) VALUES (NULL, '$game', '$release', '$fileName', '$inf', '$id')");
                    if($insert_query)
                    {
                        echo "game successfully added.";
                        $statusMsg = "The file ".$fileName. " has been uploaded succesfully.";
                    }
                    else
                    {
                        echo "Error";
                    }
                    
                    
                     
                }
            }
            
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
        <h3 align="center"><span>Add Form</span></h3><br/>
        <div class="box">
            <form id="validate_form" method="POST" action="add.php" enctype="multipart/form-data">
                <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" id="Name" placeholder="Enter Name" required
                data-parsley-type="^[a-zA-Z]+$" data-parsley-trigger="keyup" class="form-control" />
                </div>

                <div class="form-group">
                <label>Release</label>
                <input type="text" name="release" id="Release" placeholder="Enter Release Date" required
                data-parsley-type="Release" data-parsley-trigger="keyup" class="form-control" />
                </div>

                <?php if(!empty($statusMsg)){ ?>
                    <p class="status-msg"><?php echo $statusMsg; ?></p>
                <?php } ?>

                <div class="form-group">
                <label>Image</label>
                <input type="file" name="image" id="file">
                </div>

                <h2>info</h2>
                <div class="form-group">
                    <textarea name="inf" id="inf" cols="30" rows="1"></textarea>
                </div>

                <div class="form-group">
                    <input type="submit" id="submit" name="add" value="Add" class="btn btn-success" />
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


<?php
    session_start();
    include('connection.php');
    if(empty($_SESSION['file']))
    {
        header('location:index.php');
    }
    if(!empty($_SESSION['file']))
    {
        $imgname = $_SESSION['file'];
        $gamename = $_SESSION['game'];
        $release = $_SESSION['release'];
        $info = $_SESSION['info'];
        $account = $_SESSION['account'];
    }
    
      

    $i = 1;
   
    $number3 = 1;

    $select_query3 = mysqli_query($connection, "select * from game");
   
    $data3 = mysqli_fetch_array($select_query3);
    
    $res3 = mysqli_num_rows($select_query3);

    $select_query8 = mysqli_query($connection, "select username from tbl_accounts where id ='$account'");
    $data8 = mysqli_fetch_array($select_query8);

    $accountname = $data8['username'];
    if($_POST)
    {
    unset($_SESSION['name']);
    foreach ($_POST as $name => $value) {
        echo $name;
        echo $value;
    }
    $select_query = mysqli_query($connection, "select * from game where id='$name'");
    $res = mysqli_num_rows($select_query);
    if($res>0)
    {
        $data = mysqli_fetch_array($select_query);
        $gamename = $data['game'];
        $img = $data['file'];
        $release = $data['release'];
        $info = $data['info'];
        $_SESSION['game'] = $gamename;
        $_SESSION['file'] = $img;
        $_SESSION['release'] = $release;
        $_SESSION['info'] = $info;
        header('location:index0.php');
    }
    


    }
    

    
   



                    
                        
                   

                                 
?> 
        


<html>
    <head>
        <meta charset="utf-8">

        <link rel="stylesheet" href="index1.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Caveat&display=swap" rel="stylesheet">
        
    </head>
    <body>

    <div class="sidebar">
    <ul>
                <?php 
                for($i = 0; $i < $res3; $i++): ?>
                    <?php
                    $select_query3 = mysqli_query($connection, "select * from game where id='$number3'");
                    $data3 = mysqli_fetch_array($select_query3);
                    
                    $number3++;
                    
                    
                    ?>
                    
                    <li><div class="img-bar">
                    
                    <form method="post">
                        <input type="image" alt="re" src="uploads/<?php echo $data3['file'] ?>" name="<?php echo $data3['id'] ?>">
                    </form>
                    
                    </div></li>

                <?php endfor ?>
                    
                
                
                
            </ul>
        </div>

       

        <div class="banner">

            <a href="Index.php">
                <img class="boop" src="Resident Logo.png" alt="Logo" id="logo">
            </a>

            <a href="dashboard.php" class="login">Dashboard</a>
        </div>

        <div class="icon">
            <img class="spinner pic" onclick="rotate(event)" id="umb" src="umbrella.png" alt="icon">
        </div>


        <div class="img-page">
            
            <img src="uploads/<?php echo $imgname; ?>" alt="re0">
            
        </div>
        <div class="text">
            <table>
                <tbody>
                <h1 style='color:grey'> <span> <?php echo $gamename ?> </span> </h1><br><h1 style='color:grey'> <span> <?php echo $release ?> </span></h1><br> <div class="textbackground"><h2 style='color:black;max-width:750px'> <?php echo $info ?> Posted by <?php echo $accountname ?> </h2></div>
                </tbody>
            </table>
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

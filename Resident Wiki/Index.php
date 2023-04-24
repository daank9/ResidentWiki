<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <title>Resident Wiki</title>
        <link rel="stylesheet" href="index.css">

    </head>

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

foreach ($_POST as $name => $value) {
    echo $name;
    echo $value;
}

if($_POST)
{
    
    $select_query = mysqli_query($connection, "select * from game where id='$name'");
    $res = mysqli_num_rows($select_query);
    if($res>0)
    {
        $data = mysqli_fetch_array($select_query);
        $game = $data['game'];
        $img = $data['file'];
        $release = $data['release'];
        $info = $data['info'];
        $id = $data['id'];
        $account = $data['account_id'];
        $_SESSION['account'] = $account;
        $_SESSION['game'] = $game;
        $_SESSION['file'] = $img;
        $_SESSION['release'] = $release;
        $_SESSION['info'] = $info;
        $_SESSION['id'] = $id;
        header('location:index0.php');
    }
    


}




?>

    <body>

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

        <div class="banner">
            
            <a href="Index.php">
                <img class="boop" src="Resident Logo.png" alt="Logo" id="logo">
            </a>

            <a href="dashboard.php" class="login">Dashboard</a>
            
        </div>

        <div class="icon">
            <img class="spinner" onclick="rotate(event)" id="umb" src="umbrella.png" alt="icon">
        </div>

        
        <div class="GameTP">
            <div class="slide-images">
                <?php 
                for($i = 0; $i < $res2; $i++): ?>
                    <?php
                    $select_query = mysqli_query($connection, "select * from game where id='$number'");
                    $data = mysqli_fetch_array($select_query);
   
                    
                    ?>
                    <?php
                    if(!empty($data)): 
                       $number++;

                    ?>
                    <div class="img-container">
                        <form method="post">
                            <input type="image" alt="re"  src="uploads/<?php echo $data['file'] ?>" name="<?php echo $data['id'] ?>">
                        </form>
                    </div>

                    <?php
                    endif;
                    ?>    
                    

                <?php endfor ?>
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

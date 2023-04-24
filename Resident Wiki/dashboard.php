
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
$number4 = 1;
$select_query4 = mysqli_query($connection, "select * from game");
$data4 = mysqli_fetch_array($select_query4);
$res4 = mysqli_num_rows($select_query4);
$number5 = 1;
$select_query5 = mysqli_query($connection, "select * from game");
$data5 = mysqli_fetch_array($select_query5);
$res5 = mysqli_num_rows($select_query5);
 



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
        $_SESSION['game'] = $game;
        $_SESSION['file'] = $img;
        $_SESSION['release'] = $release;
        $_SESSION['info'] = $info;

        header('location:edit.php');
    }
        
        


}

?>



<html>
    <head>
    <link rel="stylesheet" href="index1.css" />
    </head>
    <body>
    <div class="sidebar">
    <ul>
                <?php 
                for($i = 0; $i < $res5; $i++): ?>
                    <?php
                    $select_query5 = mysqli_query($connection, "select * from game where id='$number5'");
                    $data5 = mysqli_fetch_array($select_query5);
                    
                    $number5++;
                    
                    
                    ?>
                    
                    <li><div class="img-bar">
                    
                    <form method="post">
                        <input type="image" alt="re" src="uploads/<?php echo $data5['file'] ?>" name="<?php echo $data5['id'] ?>">
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
            <img class="spinner" onclick="rotate(event)" id="umb" src="umbrella.png" alt="icon">
        </div>
        <div class="welcome">
            <h2><span>Welcome, <?php if(!empty($username)){ echo $username; }?> to the dashboard</span></h2>
        </div>
        <div class="logout">    
            <h3><a href="logout.php"><span>Logout</span></h3>
        </div>
        <div class="add">
        <h3><a href="add.php"><span>Add Game</span></a></h3>
        </div>
        <div class="remove">
        <h3><a href="remove.php"><span>Remove Game</span></a></h3>
        </div>


        <div class="gallery">
            <?php 
                for($i = 0; $i < $res4; $i++): ?>
                    <?php
                    $select_query4 = mysqli_query($connection, "select * from game where id='$number4'");
                    $data4 = mysqli_fetch_array($select_query4);
             
                    $number4++;
                    
                    
                    ?>
                    
                    <div class="img-container">
                    
                        <form method="post">
                            <input type="image" alt="re" src="uploads/<?php echo $data4['file'] ?>" name="<?php echo $data4['id'] ?>">
                        </form>
                    
                    </div>

            <?php endfor ?>


                 
        
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
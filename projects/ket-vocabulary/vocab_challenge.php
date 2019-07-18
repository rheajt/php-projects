<?php 
$page_title = "Do you know this word?";
include('includes/header.html');

include('includes/ket_vocab.inc.php');
include('includes/vocab_functions.inc.php');
include('vocab_mysql_conn.php');

$ket_length = count($ket_vocab);
$id = $_SESSION['school_id'];
if (!isset($_SESSION['school_id'])) {
    redirect_user();
}
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_SESSION['school_id'];
    $cw = $ket_vocab['curr_level'];
    
    $q = "SELECT school_id FROM vocab WHERE school_id='$id', vocab_word='$cw'";
    $r = mysqli_query($dbc, $q);
    
    if (mysqli_num_rows($r) == 0) {
    
	    if (isset($_POST['known'])) {
	        $vw = mysqli_escape_string($dbc, trim($ket_vocab[$_SESSION['curr_level']]));
	
	        $q = "INSERT INTO vocab (school_id, vocab_word, status) VALUES ('$id', '$vw', 'known')";
	        $r = mysqli_query($dbc, $q);
	
	        $_SESSION['score'] ++;
	    } else {
	        //If the word isn't known
	        $vw = mysqli_escape_string($dbc, trim($ket_vocab[$_SESSION['curr_level']]));
	
	        $q = "INSERT INTO vocab (school_id, vocab_word, status) VALUES ('$id', '$vw', 'unknown')";
	        $r = mysqli_query($dbc, $q);
	
	        $_SESSION['score'] += 2;
	    }
	    //push it to the database and get the next word
	    $q = "UPDATE students SET curr_level=".$_SESSION['curr_level'].", score=".$_SESSION['score']." WHERE school_id=".$_SESSION['school_id']."";
	    $r = mysqli_query($dbc, $q);
	
	    if ($_SESSION['curr_level'] < $ket_length){
	        $_SESSION['curr_level']++;
	    } else {
	        $_SESSION['curr_level'] = 0;
	    }
	    
	} else {
		echo "You have seen all the words";
	}
     
}

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $_SESSION['curr_level']++;
}
    
 ?>
<div id="vocab" style="text-align: center; display: none;">
<form action="" method="post">
    <h1>Welcome, <?php echo $_SESSION['first_name']." ".$_SESSION['last_name']." (".$_SESSION['school_id'].")"; ?>!</h1>
    <h2><?php echo $ket_vocab[$_SESSION['curr_level']]; ?></h2>    
    <button type="submit" class="btn btn-primary" name="known" value="known">I KNOW this word!</button></span>
    <button type="submit" class="btn btn-primary" name="unknown" value="unknown">I WANT to know this word!</button></span>
    <br>
    <h1>Your score is <?php echo $_SESSION['score']; ?></h1>
</form>
<br>
<h3><a href="words_you_dont_know.php">I want to LEARN some new words!</a></h3>
<h3><a href="kwl_chart.php?id=<?php echo $id; ?>">Check your KWL chart!</a></h3>

</div>


 <?php 
 
 include('includes/footer.html'); 
 ?>
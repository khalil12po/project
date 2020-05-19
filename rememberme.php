<?php
//if the user is not logged in and they have a remember me cokie in there devise
if (!isset($_SESSION['user_id']) && !empty($_COOKIE['rememberme'])) {
    //the same array_key_exists(user_id,_SESSION);
    //exxtrat $autountification 1&2 from the cookie
    //f1 cookies a1,bin2hex($b)
    //assigne the values of explode to autou1 and autou2
    list($autountificator1, $autountificator2) = explode(',', $_COOKIE['rememberme']);

    $autountificator2 = hex2bin($autountificator2);
    $f2authentificator2 = hash('sha256', $autountificator2);
    //look for authontificator1 in the remember me table
    $sql = "SELECT *FROM  rememberme WHERE authentificator1 ='$autountificator1'";
    $result = mysqli_query($link, $sql);
    if (!$result) {
        echo  '<div class="alert alert-danger">There was an error connecting to the data base.</div>';
        exit;
    }
    $count = mysqli_num_rows($result);
    if ($count !== 1) {
        echo '<div class="alert alert-danger">remember me procces failde</div>';
        exit;
    }
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    //if the autho2 does not match 
    if (!hash_equals($row['f2authentificator2'], $f2authentificator2)) {
        echo  '<div class="alert alert-danger">hash-equals returned false.</div>';
    } else {
        //this function is used when we compare 2 hashes
        //generate new authentificators 
        //store them in cookie and remember table
        //Create two variables $authentificator1 and $authentificator2
        $authentificator1 = bin2hex(openssl_random_pseudo_bytes(10));
        //2*2*...*2
        $authentificator2 = openssl_random_pseudo_bytes(20);
        //Store them in a cookie
        function f1($a, $b)
        {
            $c = $a . "," . bin2hex($b);
            return $c;
        }
        $cookieValue = f1($authentificator1, $authentificator2);
        setcookie(
            "rememberme",
            $cookieValue,
            time() + 1296000
        );

        //Run query to store them in rememberme table
        function f2($a)
        {
            $b = hash('sha256', $a);
            return $b;
        }
        $f2authentificator2 = f2($authentificator2);
        $user_id = $_SESSION['user_id'];
        $expiration = date('Y-m-d H:i:s', time() + 1296000);

        $sql = "INSERT INTO rememberme
          (`authentificator1`, `f2authentificator2`, `user_id`, `expires_date`)
          VALUES
          ('$authentificator1', '$f2authentificator2', '$user_id', '$expiration')";
        $result = mysqli_query($link, $sql);
        if (!$result) {
            echo  '<div class="alert alert-danger">There was an error storing data to remember you next time.</div>';
        }


        //we are going to log the user in
        $_SESSION['user_id'] = $row['user_id'];
        header("location:mainpagelogedin.php");
    }
}
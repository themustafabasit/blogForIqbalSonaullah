<?php
session_start();
session_regenerate_id(true);

require('../Authentication/verifyUserCredentials.inc.php');
authenticationSessionVariables();
authenticationSessionTimeout();
echo (session_id());
?>
<?php
require('../MasterFiles/adminMasterNav.inc.php');
?>

<section class="site_main ">
    <article class=article_container>
        <div class="article_inner_holder">
            <div class="article_middle_content">


                <div class="after_submit">
                    <li>
                        <?php  

                            //$newFileName  should be global because it is later required  in "handleSqlQuery" function ( insert into.......);
                            $newFileName = '';

                            //$dest_path  should be global because it is later required  in "rollbackFileUpload" function ( unlink(.........));
                            $dest_path = '';
                            
                            $sharedFunctionErrorMessage  = '';

                            $sharedRollbackFileUploadErrorMessage = '';


                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $message = '';
                            if (isset($_POST['name']) && isset($_POST['gender']) && isset($_POST['contact']) && isset($_POST['email']) && isset($_POST['fb']) && isset($_POST['insta']) && isset($_POST['twitter'])  && isset($_POST['intro']) && isset($_POST['description']) && isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK ) {
                                if (!empty($_POST['name']) && !empty($_POST['gender']) && !empty($_POST['contact']) && !empty($_POST['email']) && !empty($_POST['fb']) && !empty($_POST['insta']) && !empty($_POST['twitter']) && !empty($_POST['intro']) && !empty(['description'])) {

                                    $name = $gender = $contact = $email = $fb = $insta = $twitter = $intro = $description = "";
                        
                                    $name = strtoupper(TestInput($_POST['name']));
                                    $gender = TestInput($_POST['gender']);
                                    $contact = TestInput($_POST['contact']);
                                    $email = TestInput($_POST['email']);
                                    $fb = TestInput($_POST['fb']);
                                    $insta = TestInput($_POST['insta']);
                                    $twitter = TestInput($_POST['twitter']);
                                    $intro = TestInput($_POST['intro']);
                                    $description = TestInput($_POST['description']);

                                   if(handleFileUpload($name)){
                                     $sql = "insert into  id427109_blog.writer(name, gender, contact, mail, fb, twitter, insta, intro, description, dp) values('" . $name . "','" . $gender . "'," . $contact . ",'" . $email . "','" . $fb . "','" . $insta . "','" . $twitter . "','".$intro."','".$description."','".$newFileName."');";

                                    $result = db_query($sql);

                                    if ($result == true) {
                                        $message = "record sucessfully inserted into the database";
                                    }
                                    
                                    if ($result == false) {
                                        //rollback file upload 
                                        if(rollbackFileUpload()){
                                            $message = "error occured, please provide valid input " . db_error()."<br/>fileupload rollback sucessfull";

                                        }else{
                                            $message = $sharedRollbackFileUploadErrorMessage;
                                        }
                                    }

                                   }else{
                                    $message = $sharedFunctionErrorMessage;

                                   }
                                
                    
                                   
                                } else {
                                    $message = "all fields are required";
                                }
                            }
                            else{
                                $message = "some variables are not set";
                            }
                            echo $message;
                        }

                        function TestInput($data)
                        {
                            $data = trim($data);
                            $data = stripslashes($data);
                            $data = htmlspecialchars($data);
                            return $data;
                        }

                        
function handleFileUpload($name)
{
  global $newFileName;
  global $dest_path;
  global $sharedFunctionErrorMessage;

  // handle file upload first
  // get details of the uploaded file
  $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
  $fileName = $_FILES['uploadedFile']['name'];
  $fileSize = $_FILES['uploadedFile']['size'];
  $fileType = $_FILES['uploadedFile']['type'];
  $fileNameCmps = explode(".", $fileName);
  $fileExtension = strtolower(end($fileNameCmps));

  // sanitize file-name
  $newFileName = $name.' '.md5(time() . $fileName) . '.' . $fileExtension;

  // check if file has one of the following extensions
  $allowedFileExtensions = array('jpg', 'jpeg', 'gif', 'png');

  if (in_array($fileExtension, $allowedFileExtensions)) {
    // directory in which the uploaded file will be moved
    $uploadFileDir = '../../global/images/writers/';

    $dest_path = $uploadFileDir . $newFileName;


    //check whether or not *** upload directory *** is directory
    
    if (is_dir(($uploadFileDir))) {
      if (move_uploaded_file($fileTmpPath, $dest_path)) {
        //file upload is success, so move on to article 
        return 1;
      } else {
        $sharedFunctionErrorMessage  = 'file move operation failed, contact developer immediately';
        return 0;
      }
    } else {
      $sharedFunctionErrorMessage  =  'file director Not found, contact developer immediately';
      return 0;
    }

  } else {
    $sharedFunctionErrorMessage  =  'Allowed file types: ' . implode(',', $allowedFileExtensions);
    return 0;
  }
}



function rollbackFileUpload()
{
  global $dest_path;
  global $sharedRollbackFileUploadErrorMessage;
  if (file_exists($dest_path)) {
    if (unlink($dest_path)) {
      return 1;
    } else {
      $sharedRollbackFileUploadErrorMessage = "unlink() failed, please contact developer immediately ";
      return 0;
    }
  } else {
    $sharedRollbackFileUploadErrorMessage = "recently uploaded file is missing, please contact developer immediately ";
    return 0;
  }
}
                        ?>

                    </li>
                </div>




                <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" enctype="multipart/form-data">
                    <div class="row">
                        <label class="form_item_tittle" for="name">name</label>
                        <input id="name" class="form_type_text" name="name" type="text" value="" required />
                        <span class="error_message">*<p></p></span>
                    </div>

                    <div class="row">
                        <label class="form_item_tittle" for="gender">gender</label>
                        <select id="gender" name="gender" class="form_type_select" required>
                            <option value="">--choose gender--</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                        <span class="error_message">*<p></p></span>
                    </div>

                    <div class="row">
                        <label class="form_item_tittle" for="contact">contact</label>
                        <input id="contact" class="form_type_text" name="contact" type="text" value="" required pattern="^[0-9]{10}$" />
                        <span class="error_message">*<p></p></span>
                    </div>

                    <div class="row">
                        <label class="form_item_tittle" for="email">E-mail</label>
                        <input id="email" class="form_type_email" name="email" type="email" value="" required />
                        <span class="error_message">*<p></p></span>
                    </div>
                    <div class="row">
                        <label class="form_item_tittle" for="fb">Facebook prolife link</label>
                        <input id="fb" class="form_type_link" name="fb" type="link" value="" required />
                        <span class="error_message">*<p></p></span>
                    </div>

                    <div class="row">
                        <label class="form_item_tittle" for="insta">instagram profile link</label>
                        <input id="insta" class="form_type_link" name="insta" type="link" value="" required />
                        <span class="error_message">*<p></p></span>
                    </div>

                    <div class="row">
                        <label class="form_item_tittle" for="twitter">twitter prolife link</label>
                        <input id="twitter" class="form_type_link" name="twitter" type="link" value="" required />
                        <span class="error_message">*<p></p></span>
                    </div>

                     <div class="row">
                        <label class="form_item_tittle" for="uploadedFile" >Upload a File:</label>
                        <input type="file" accept="image/*" name="uploadedFile" class="form_type_file" required /> 
                        <span  class="error_message"><br>* <p></p></span>
                    </div>

                    <div class="row">
                        <label class="form_item_tittle" for="twitter">writer's short intro</label>
                        <input id="intro" class="form_type_link" name="intro" type="text" value="" required />
                        <span class="error_message">*<p></p></span>
                    </div>

                 <div class="row">
                    <label class="form_item_tittle" for="description">writer's Brief description</label>
                    <textarea class="form_type_textarea" id="description"  name="description" rows="10" cols="50" required></textarea>
                    <span class="error_message">*<p></p></span>
                </div>




                    <input type="submit" name="uploadBtn" class="form_type_submit" value="Upload" />
                </form>


            </div>




        </div>
    </article>
</section>

<?php
require('../MasterFiles/adminMasterFooter.inc.php');
?>
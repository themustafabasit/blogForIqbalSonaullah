<!--
  in article , heading should be something like interesting ,complex, 
  n in contrast to that subheading should be explained very well,

  notice heading is file name of article n should  not include any symbols
-->
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

<script>
  function convertPara() {
    if (!document.getElementById('mainArticleTextarea').value == " ") {
      var data = document.getElementById('mainArticleTextarea').value;
      var replaceString = /\n/gi;
      var newData = "<p>" + data.replace(replaceString, "</p><p>") + "</p>";
      document.getElementById('mainArticleTextarea').value = newData;
      document.getElementById("submitButton").disabled = false;
      document.getElementById("paraFormatButton").disabled = true;
    } else {
      alert('please write any thing in article box, no data found ');
      document.getElementById('mainArticleTextarea').focus();
    }
  }
</script>

<?php
$selectOptions = '';
$displayErrorMessage = '';
$displaySuccessMessage = '';

//$newFileName  should be global because it is later required  in "handleSqlQuery" function ( insert into.......);
$newFileName = '';

//$dest_path  should be global because it is later required  in "rollbackFileUpload" function ( unlink(.........));
$dest_path = '';


//$newArticleFile should be global because it is later required in "rollbackFileSystem" function( unlink(.......) file)
$newArticleFile = '';

//$newArticleDir should be global because it is later required in "rollbackFileSystem" function( rmdir(.......) folder)

$newArticleDir = '';

$sharedFunctionErrorMessage  = '';
$sharedRollbackFileUploadErrorMessage = '';
$sharedRollbackFileSystemErrorMessage = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['subheading']) && isset($_POST['heading']) && isset($_POST['by']) && isset($_POST['content']) && isset($_FILES['uploadedFile']) &&
		$_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK ) {
    if (!empty($_POST['subheading']) && !empty($_POST['heading']) && !empty($_POST['by'])  && !empty($_POST['content']) ) {
      $writerId = $subheading = $heading = $date = $content  = $uploadedFile = "";
      $sql = "";
      $writerId = $_POST['by'];
      $subheading = $_POST['subheading'];
      $heading = $_POST['heading'];
      $date = date("F, d Y");
      $content  = $_POST['content'];
      if (handleFileUpload()) {
        if (handleFileSystem()) {
          if (handleSqlQuery()) {
            $displaySuccessMessage = 'All three phases passed , record inserted.';
          } else {
            $displayErrorMessage = 'third phase failed [' . $sharedFunctionErrorMessage  . ' ] <br/> ';
            // this time we have to rollback two things, first fileUpload( , second filesystem()
            //also we have to use two shared rollback variables. if both the rollback() fails, store their error message in that variables.

            $rfu = '';
            $rfs = '';
            $rfu = rollbackFileUpload();
            $rfs = rollbackFileSystem();
            // if both rollback returns true , just append "rollback successful" to the error message
            if ($rfu && $rfs) {
              $displayErrorMessage = $displayErrorMessage  . ' <span class="rollback_s">Both Rollback successful, all operation aborted successfully</span>';
            } else {
              //if control is in this part, that means either one or both rollback has failed;
              $displayErrorMessage = $displayErrorMessage .  'Either one or both Rollback Failed. [ ' . $sharedRollbackFileUploadErrorMessage . ' ] ' . ' [ ' . $sharedRollbackFileSystemErrorMessage . ' ] ';
            }
          }
        } else {
          $displayErrorMessage = 'second phase failed [ ' . $sharedFunctionErrorMessage  . ' ]<br/> ';
          //just rollback fileUpload only
          if (rollbackFileUpload()) {
            //if rollback function returns true, just append to the displayErrorMessage, rollback successful;
            $displayErrorMessage = $displayErrorMessage  . ' <span class="rollback_s">Rollback successful, all operation aborted successfully</span>';
          } else {
            //if rollback function returns false, just append to the displayErrorMessage, sharedRollbackFileUploadErrorMessage;
            $displayErrorMessage = $displayErrorMessage . ' Rollback Failed to unlink file [ ' . $sharedRollbackFileUploadErrorMessage . ' ] ';
          }
        }
      } else {
        // no need to rollback anything
        $displayErrorMessage = 'First phase failed. [' . $sharedFunctionErrorMessage  . ' ] <br/> ' . '<span class="rollback_s">All operation aborted successfully</span>';
      }
    } else {
      $displayErrorMessage = "all fields are required";
    }
  } else {
    $displayErrorMessage = "some variables are not set, contact developer immediately";
  }
}


function getWriters()
{
  global $selectOptions;
  $writerId = '';
  $writerName = '';
  $sql = '';
  $result = '';
  $row = '';
  $sql = "select id,name from  id427109_blog.writer;";
  $result = db_select($sql);
  if ($result == false) {
    return 0;
  } else if ($result == true) {

    foreach ($result as $row) {
      $writerId = $row['id'];
      $writerName = $row['name'];
      $selectOptions = $selectOptions . "<option value='" . $writerId . "'>" . $writerName . "</option>";
    }
    return 1;
  }
}

function handleFileUpload()
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
  $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
  // check if file has one of the following extensions
  $allowedFileExtensions = array('jpg', 'jpeg', 'gif', 'png');

  if (in_array($fileExtension, $allowedFileExtensions)) {
    // directory in which the uploaded file will be moved
    $uploadFileDir = '../../user/images/';
    $dest_path = $uploadFileDir . $newFileName;
    //$fileTmpPath = "sldf";
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

function handleFileSystem()
{
  global $heading;
  global $sharedFunctionErrorMessage;
  global $newArticleFile;
  global $newArticleDir;

  $templateFile = '../MasterFiles/MasterArticleTemplate.php';
  $articleDir = '../../user/';
  // $newArticleDir = $articleDir . $heading . '/';   ---- this will also work;
  $newArticleDir = $articleDir . $heading;

  $newArticleFile =  $articleDir  . $heading . '/index.php';

  //verify template
  if (file_exists($templateFile)) {
    //verify article dir exists or not
    if (is_dir($articleDir)) {
      //check whether same folder exists or not 
      if (!file_exists($newArticleDir)) {
        // if not, make new folder
        if (mkdir($newArticleDir)) {
          //verify file System copy operation
          if (copy($templateFile, $newArticleFile)) {
            return 1;
          } else {
            $sharedFunctionErrorMessage  = 'file system copy failed, contact developer immediately';
            return 0;
          }
        } else {
          $sharedFunctionErrorMessage  =  'mkdir() failed, contact developer immediately';
          return 0;
        }
      } else {
        $sharedFunctionErrorMessage  =  'Article directory already exists with same heading, please use different article heading';
        return 0;
      }
    } else {
      $sharedFunctionErrorMessage  =  'article  director Not found, contact developer immediately';
      return 0;
    }
  } else {
    $sharedFunctionErrorMessage  =  'master template file is missing, contact developer immediately';
    return 0;
  }
}

function handleSqlQuery()
{
  global $sharedFunctionErrorMessage;
  global $writerId;
  global $subheading;
  global $heading;
  global $date;
  global $content;
  global $newFileName;

  $sql = "insert into  id427109_blog.article(writer_id,heading,date,content,img,subheading) values(" . $writerId  . ",'" . $heading . "','" . $date . "','" . $content . "','" . $newFileName . "','" . $subheading . "');";
  $result = db_query($sql);
  if ($result == true) {
    return 1;
  } else {
    $sharedFunctionErrorMessage  =  'Query execution failed';
    return 0;
  }
}

function rollbackFileUpload()
{
  global $dest_path;
  global $sharedRollbackFileUploadErrorMessage;
  //$dest_path = 'llkadjf';
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

function rollbackFileSystem()
{
  global $newArticleDir;
  global $newArticleFile;
  global $sharedRollbackFileSystemErrorMessage;
  if (file_exists($newArticleFile)) {
    if (unlink($newArticleFile)) {
      if (rmdir($newArticleDir)) {
        return 1;
      } else {
        $sharedRollbackFileSystemErrorMessage = "rmdir() failed, please contact developer immediately ";
        return 0;
      }
    } else {
      $sharedRollbackFileSystemErrorMessage = "unlink() failed, please contact developer immediately ";
      return 0;
    }
  } else {
    $sharedRollbackFileSystemErrorMessage = "recently uploaded file is missing, please contact developer immediately ";
    return 0;
  }
}

function rollbackSqlQuery()
{ }

?>

<section class="site_main ">
  <article class=article_container>
    <div class="article_inner_holder">
      <div class="article_middle_content">
        <div class="after_submit">
          <li class="successmessage">
            <?php
            echo ($displaySuccessMessage);
            ?>
          </li>
          <li class="errormessage">
            <?php
            echo ($displayErrorMessage);
            ?>
          </li>
        </div>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" enctype="multipart/form-data">
          <div class="row">
            <label class="form_item_tittle" for="heading">heading</label>
            <input id="heading" class="form_type_text" name="heading" type="text" value="" required />
            <span class="error_message">* short heading is prefered, without special symbols<p></p></span>
          </div>
          <div class="row">
            <label class="form_item_tittle" for="subheading">subheading</label>
            <input class="form_type_text" name="subheading" type="text" value="" required />
            <span class="error_message">* detailed sub heading is  recommened, for best results<p></p></span>
          </div>
          

          <div class="row">
            <label class="form_item_tittle" for="by">by</label>
            <select id="by" name="by" class="form_type_select" required>
              <option value="">--choose writer--</option>
              <?php
              if (getWriters()) {
                echo ($selectOptions);
              } else {
                echo ("<script>alert('failed to load writers list from ');</script>");
              }
              ?>
            </select>
            <span class="error_message">*<p></p></span>
          </div>

          <div class="row">
            <label class="form_item_tittle" for="name">Upload a File:</label><br />
            <input type="file" accept="image/*" name="uploadedFile" class="form_type_file" required> <br />
            <span id="name_validation" class="error_message"></span>
          </div>

          <div class="row">
            <label class="form_item_tittle" for="content">Your message:</label><br />
            <textarea class="form_type_textarea" id="mainArticleTextarea" required name="content" rows="10" cols="50"></textarea><br />
            <span id="message_validation" class="error_message"></span>
          </div>

          <div class="row">
            <input type="button" id="paraFormatButton" class="form_type_button" value="format" onclick="convertPara();" />
            <input type="submit" id="submitButton" class="form_type_submit" value="Upload" disabled />
          </div>

        </form>
      </div>
    </div>
  </article>
</section>

<?php
require('../MasterFiles/adminMasterFooter.inc.php');
?>
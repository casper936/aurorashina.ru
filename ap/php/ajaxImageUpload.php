 <?
 require_once $_SERVER['DOCUMENT_ROOT'].'/inc/global.inc.php'; 
// error_reporting(0);
error_reporting(E_ALL);
//session_start();
  
 $id = $_POST["id"];


//$session_id='1'; //$session id
define ("MAX_SIZE","2000"); 
function getExtension($str)
{
         $i = strrpos($str,".");
         if (!$i) { return ""; }
         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
}


$valid_formats = array("jpg", "png", "gif", "bmp","jpeg");
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") 
{
	
    $uploaddir = '/image/tyre/'; //a directory inside
    foreach ($_FILES['photos']['name'] as $name => $value)
    {
	
       $filename = stripslashes($_FILES['photos']['name'][$name]);
       $size=filesize($_FILES['photos']['tmp_name'][$name]);
       //get the extension of the file in a lower case format
       $ext = getExtension($filename);
       $ext = strtolower($ext);
     	
        if(in_array($ext,$valid_formats)) {
          
          if ($size < (MAX_SIZE*1024)) {
            $image_name=time().$filename;
            echo "<img src='".$uploaddir.$image_name."' class='imgList'>";
            $newname=$uploaddir.$image_name;

            if (move_uploaded_file($_FILES['photos']['tmp_name'][$name], $_SERVER['DOCUMENT_ROOT'].$newname)) {
              mysql_query("UPDATE item SET photo = '$image_name' WHERE id = '$id'");
            } else {
              echo '<span class="imgList">You have exceeded the size limit! so moving unsuccessful! </span>';
            }

          } else {
            echo '<span class="imgList">You have exceeded the size limit!</span>';
          }
        } else { 
          echo '<span class="imgList">Unknown extension!</span>'; 
        }
    }
}

?>
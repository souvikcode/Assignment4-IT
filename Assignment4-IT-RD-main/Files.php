<?php
$info=$_FILES["myfile"]; 
//print_r($info);//$info will be an associative array where values corresponding to each key will be an array
$count=count($info["name"]);//$info["name"][i], $info["size"][i] etc will have information about the i-th file

for ($i=0;$i<$count;$i++)//$count is the number of files 
{ if ($info["error"][$i]!=0) die ("error in uploading");
if (preg_match("/.+\.(php|jpg|pdf|doc|txt)$/",$info["name"][$i]))
  { $dir="uploads/".$info["name"][$i];//create the target location name
    if (move_uploaded_file($info["tmp_name"][$i],$dir))
    print "your file ".$info["name"][$i]." is uploaded <br>";
   else print "file upload failed <br>";
  }
else print "wrong file extension for ".$info["name"][$i]." <br>";
}

?>

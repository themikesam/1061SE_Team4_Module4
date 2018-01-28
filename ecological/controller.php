<?php
require_once("model.php"); 
$data_col = ['id','un','cl','k','kc','p','pc','c','cc','o','oc','f','fc','g','gc','s','sc','sn','snc','d','as','h','i'];
$num = count($data_col);
$op = $_POST['op'];

if(strcmp($op,'mod')==0)
{
	$data = array();
	for ($i=0;$i<$num;$i++)
	{
		if(isset($_POST[$data_col[$i]]))
		{
			array_push($data,$_POST[$data_col[$i]]);
		}
		else
		{
			array_push($data,"");
		}
	}
	if($_FILES["image"]["name"]!=NULL)
	{
		$target_dir = "uploads/";
		$target_file = $target_dir.basename($_FILES["image"]["name"]);
		$upload_check = true;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		$check = getimagesize($_FILES["image"]["tmp_name"]);
		if($check)
		{
			$upload_check = true;
		}
		else
		{
			$upload_check = false;
		}
		
		if (file_exists($target_file)) 
		{
		    //echo "該檔案已經存在，請再試一次";
		    $upload_check = false;
		} 
		if ($_FILES["image"]["size"] > 5000000) 
		{
		    //echo "檔案過大，請嘗試其他檔案";
		    $upload_check = false;
		}

		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) 
		{
		    //echo "請上傳 JPG, JPEG, PNG 或是 GIF 檔";
		    $upload_check = false;
		}
		if($upload_check)
		{
		    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) 
		    {
		        //echo "圖片上傳成功";
		        $image = $target_dir.basename( $_FILES["image"]["name"]);
		    } 
		} 
		else
		{
		    //echo "請再試一次";
		    $image = "";
		}
	}
	else
	{
		if(isset($_POST['i']))
		{
			$image = $_POST['i'];
		}
		else
		{
			$image = "";
		}
	}
	modify($data[0],$data[1],$data[2],$data[3],$data[4],$data[5],$data[6],$data[7],$data[8],$data[9],$data[10],$data[11],$data[12],$data[13],$data[14],$data[15],$data[16],$data[17],$data[18],$data[19],$data[20],$data[21],$image);
	header("Location: index.php");
}
else if(strcmp($op,'del')==0)
{
	delete($_POST['id']);
	header("Location: index.php");
}
else if(strcmp($op,'toAdd')==0)
{
	header("Location: add_data.php");
}
else if(strcmp($op,'add')==0)
{
	$data = array();
	for ($i=1;$i<$num-1;$i++)
	{
		if(isset($_POST[$data_col[$i]]))
		{
			array_push($data,$_POST[$data_col[$i]]);
		}
		else
		{
			array_push($data,"");
		}
	}
	
	if($_FILES["image"]["name"]!=NULL)
	{
		$target_dir = "uploads/";
		$target_file = $target_dir.basename($_FILES["image"]["name"]);
		$upload_check = true;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

		$check = getimagesize($_FILES["image"]["tmp_name"]);
		if($check)
		{
			$upload_check = true;
		}
		else
		{
			$upload_check = false;
		}
		
		if (file_exists($target_file)) 
		{
		    //echo "該檔案已經存在，請再試一次";
		    $upload_check = false;
		} 
		if ($_FILES["image"]["size"] > 5000000) 
		{
		    //echo "檔案過大，請嘗試其他檔案";
		    $upload_check = false;
		}

		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) 
		{
		    //echo "請上傳 JPG, JPEG, PNG 或是 GIF 檔";
		    $upload_check = false;
		}

		 
		if($upload_check)
		{
		    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) 
		    {
		        //echo "圖片上傳成功";
		        $image = $target_dir.basename( $_FILES["image"]["name"]);
		    }
		} 
		else
		{
		    //echo "請再試一次";
		    $image = "";
		}
	}
	else
	{
		$image = "";
	}
	add($data[0],$data[1],$data[2],$data[3],$data[4],$data[5],$data[6],$data[7],$data[8],$data[9],$data[10],$data[11],$data[12],$data[13],$data[14],$data[15],$data[16],$data[17],$data[18],$data[19],$data[20],$image);
	header("Location: index.php");
}
?>
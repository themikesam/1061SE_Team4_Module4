<?php
	require_once("connect_db.php"); 

	function get_All_Info()
	{
		global $con;
		$sql = "SELECT * FROM data";
		$result = mysqli_query($con,$sql);
		return $result;
	}

	function get_Info_by_ID($data_id)
	{
		global $con;
		$sql = "SELECT * FROM data WHERE ID = $data_id";
		$result = mysqli_query($con,$sql);
		return $result;
	}

  function get_class_image($classification)
  {
    $img = "";
    switch ($classification) 
    {
      case 1:
        $img = "frog.png";
        break;
      case 2:
        $img = "butterfly.png";
        break;
      case 3:
        $img = "leaf.png";
        break;
      case 4:
        $img = "others.png";
        break;
      default:
        break;
    }
    return $img;
  }

	function show_Info_list($result)
	{
		while($array = mysqli_fetch_assoc($result))
		{
			echo '<tr>
              <td align="center">
                <div style="height:85px;width:130px;">
                  <a href="data_info.php?id='.$array['ID'].'">';
      if(strcmp($array['image'],"")==0)
      {
        echo '<img src="src/no_img.png" class="thub">';
      }
      else
      {
        echo '<img src="'.$array['image'].'" class="thub">';
      }

      echo '</a>
                </div>
              </td>
              <td>'.$array['ID'].'</td>
              <td>
                <div><a href="data_info.php?id='.$array['ID'].'">'.$array['usual_name'].'</a></div>
                <div class="small text-muted">
                  <span>'.$array['scientific_name'].'</span>
                </div>
              </td>
              <td class="text-center">
                <img src="src/'.get_class_image($array['classification']).'" class="cl">
              </td>
              <td>'.$array['description'].'</td>
              <td>'.$array['acting_scope'].'</td>
              <td>'.$array['habit'].'</td>
          </tr>';
		}
	}

  function show_data_Info($data_id)
  {
    $data_col_chinese = ['編號','俗名','分類','界','界_中文','門','門_中文','綱','綱_名','目','目_中文','科','科_中文','屬','屬_中文','種','種_中文','學名','學名_中文','描述','活動範圍','習性','圖片'];
    $data_col = ['id','un','cl','k','kc','p','pc','c','cc','o','oc','f','fc','g','gc','s','sc','sn','snc','d','as','h','i'];
    $result = get_Info_by_ID($data_id);
    $row = mysqli_fetch_row($result);
    $num = count($data_col);
    if(strcmp($row[$num-1],"")==0)
    {
      echo "<img src='src/no_img.png' style='margin:20px;height:130px;width:185px;'>";
    }
    else
    {
      echo "<img src='".$row[$num-1]."' style='margin:20px;height:130px;width:185px;'>";
    }
    echo "<div class='container'><table class='table table-striped'>
          <thead><tr><th>#</th><th>Content</th></tr></thead>";
    
    for ($i=0;$i<$num-1;$i++)
    {
      if($i==2)
      {
        $c=["","","",""];
        $c[$row[$i]-1] = "selected";
        echo "<tr><td>".$data_col_chinese[$i]."</td><td><select name=".$data_col[$i].">
        <option value='1' ".$c[0].">青蛙</option>
        <option value='2' ".$c[1].">蝴蝶</option>
        <option value='3' ".$c[2].">植物</option>
        <option value='4' ".$c[3].">其他</option>
        </select></td></tr>";
      }
      else
      {
        echo "<tr>
            <td>".$data_col_chinese[$i]."</td>
            <td><input type='text' size='80' name='".$data_col[$i]."' value='".$row[$i]."'></td>
            </tr>";
      }
    }
    echo '<tr><td>'.$data_col_chinese[$num-1].'</td><td><input type="file" name="image" accept=".jpg, .png, .jpeg" /></td></tr>';

    echo "</table></div>";
    echo "<input type='hidden' name='".$data_col[$num-1]."' value='".$row[$num-1]."'>";
  }

  function delete($data_id)
  {
    global $con;
    $sql = "SELECT image FROM data WHERE ID = $data_id";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_row($result);
    if($row[0] != NULL)
    {
      $path = $row[0];
      if(file_exists($path))
      {
          unlink($path);
      }
    }
    $sql2 = "DELETE FROM data WHERE ID = $data_id";
    mysqli_query($con,$sql2);
  }

  function modify($data_id,$usual_name,$classification,$s_kingdom,$s_kingdom_chinese,$s_phylum,$s_phylum_chinese,$s_class,$s_class_chinese,$s_order,$s_order_chinese,$s_family,$s_family_chinese,$s_genus,$s_genus_chinese,$s_species,$s_species_chinese,$scientific_name,$scientific_name_chinese,$description,$acting_scope,$habit,$image)
  {
    global $con;
    $sql = "SELECT image FROM data WHERE ID = $data_id";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_row($result);
    if($row[0] != NULL)
    {
      $path = $row[0];
      if(file_exists($path))
      {
          unlink($path);
      }
    }
    $sql2 = "UPDATE data SET 
    usual_name='$usual_name',
    classification=$classification,
    s_kingdom='$s_kingdom',
    s_kingdom_chinese='$s_kingdom_chinese',
    s_phylum='$s_phylum',
    s_phylum_chinese='$s_phylum_chinese',
    s_class='$s_class',
    s_class_chinese='$s_class_chinese',
    s_order='$s_order',
    s_order_chinese='$s_order_chinese',
    s_family='$s_family',
    s_family_chinese='$s_family_chinese',
    s_genus='$s_genus',
    s_genus_chinese='$s_genus_chinese',
    s_species='$s_species',
    s_species_chinese='$s_species_chinese',
    scientific_name='$scientific_name',
    scientific_name_chinese='$scientific_name_chinese',
    description='$description',
    acting_scope='$acting_scope',
    habit='$habit',
    image='$image' WHERE ID=$data_id";
    mysqli_query($con,$sql2);
  }

  function show_add_form()
  {
    $data_col_chinese = ['編號','俗名','分類','界','界_中文','門','門_中文','綱','綱_名','目','目_中文','科','科_中文','屬','屬_中文','種','種_中文','學名','學名_中文','描述','活動範圍','習性','圖片'];
    $data_col = ['id','un','cl','k','kc','p','pc','c','cc','o','oc','f','fc','g','gc','s','sc','sn','snc','d','as','h','i'];
    $num = count($data_col);
    echo "<div class='container'><table class='table table-striped'>
          <thead><tr><th>#</th><th>Content</th></tr></thead><tbody>";
    
    for ($i=1;$i<$num-1;$i++)
    {
      if($i==2)
      {
        echo "<tr><td>".$data_col_chinese[$i]."</td>
        <td><select name=".$data_col[$i].">
        <option value='1'>青蛙</option>
        <option value='2'>蝴蝶</option>
        <option value='3'>植物</option>
        <option value='4'>其他</option>
        </select></td></tr>";
      }
      else
      {
        echo "<tr>
            <td>".$data_col_chinese[$i]."</td>
            <td><input type='text' size='80' name='".$data_col[$i]."'></td>
            </tr>";
      }
    }
    echo '<tr><td>'.$data_col_chinese[$num-1].'</td><td><input type="file" name="image" accept=".jpg, .png, .jpeg" /></td></tr>';
    echo "</tbody></table></div>";
    
  }

  function add($usual_name,$classification,$s_kingdom,$s_kingdom_chinese,$s_phylum,$s_phylum_chinese,$s_class,$s_class_chinese,$s_order,$s_order_chinese,$s_family,$s_family_chinese,$s_genus,$s_genus_chinese,$s_species,$s_species_chinese,$scientific_name,$scientific_name_chinese,$description,$acting_scope,$habit,$image)
  {
    global $con;
    $sql = "INSERT INTO data (usual_name,classification,s_kingdom,s_kingdom_chinese,s_phylum,s_phylum_chinese,s_class,s_class_chinese,s_order,s_order_chinese,s_family,s_family_chinese,s_genus,s_genus_chinese,s_species,s_species_chinese,scientific_name,scientific_name_chinese,description,acting_scope,habit,image) values ('$usual_name',$classification,'$s_kingdom','$s_kingdom_chinese','$s_phylum','$s_phylum_chinese','$s_class','$s_class_chinese','$s_order','$s_order_chinese','$s_family','$s_family_chinese','$s_genus','$s_genus_chinese','$s_species','$s_species_chinese','$scientific_name','$scientific_name_chinese','$description','$acting_scope','$habit','$image')";
    mysqli_query($con,$sql);
  }
?>
<script>
	function showConfirm(id){
		var c = confirm("Are you sure you wish to delete this item?");
		if(c)
			window.location = "CakeOverview.php?delete=" + id;
	}
</script>

<?php
include "CakeModel.class.php";

//Contains non-database related function for the Cake page.
class CakeControler {
	function CreateOverviewTable(){
		$result = "
			<table class='overviewTable'
				<tr>
					<td></td>
					<td></td>
					<td><b>Id</b></td>
					<td><b>Type</b></td>
					<td><b>Name</b></td>
					<td><b>Price</b></td>
				</tr>";
			
			$cakeArray = $this->GetCakeByType('%');
			
			foreach($cakeArray as $key => $value){
				$result = $result .
						"<tr>
							<td><a href='cakeAdd.php?update=$value->id'>Update</a></td>
							<td><a href='#' onclick='showConfirm($value->id)'>Delete</a></td>
							<td>$value->id</td>
							<td>$value->type</td>
							<td>$value->name</td>
							<td>$value->price</td>
						</tr>";
			}
			$result = $result . "</table>";
			return $result;
	}
	
	function CreateCakeDropdownList(){
		$cakeModel = new CakeModel();
		$result = "<form action = '' method = 'POST' width = '200px'>
					Please select a type:
					<select name = 'types' >
						<option value = '%' >All</option>
						".$this->CreateOptionValues($cakeModel->GetCakeTypes()).
					"</select>
					 <input type = 'submit' value = 'Search' />
					 </form>";
					 
		return $result;
	}
	
	function CreateOptionValues(array $valueArray){
		$result = "";
		
		foreach($valueArray as $value){
			$result = $result . "<option value='$value'>$value</option>";
		}
		return $result;
	}
	
	function CreateCakeTables($types){
		$cakeModel = new CakeModel();
		$cakeArray = $cakeModel->GetCakeByType($types);
		$result = "";
		
		//Generate a cakeTable for each cakeEntity in array
		foreach($cakeArray as $key => $cake){
			$result = $result . 
					"<table class='cake_table' >
						<tr>
							<th rowspan='6' width = '150px' ><img src='images/$cake->img' /></th>
							<th width = '75px'>Type: </th>
							<td>$cake->type</td>
						</tr>
						<tr>
							<th>Name: </th>
							<td>$cake->name</td>
						</tr>
						<tr>
							<th>Price: </th>
							<td>$cake->price</td>
						</tr>
						<tr>
							<td colspan='2'>$cake->text</td>
						</tr>
					</table>";
		}
		return $result;
	}
	
	//returns list of files in a folder
	function GetImages(){
		//select folder to scan 
		$handle = opendir("images/");
		//read all files and store names in array
		while($image = readdir($handle)){
			$images[] = $image;
		}
		
		closedir($handle);
		//exclude all filenames where filename length < 3
		$imageArray = array();
		foreach($images as $image){
			if(strlen($image) > 2){
				array_push($imageArray, $image);
			}
		}
		//create <select><option> values and return result
		$result = $this->CreateOptionValues($imageArray);
		return $result;
		
	}
	
	function InsertCake(){
		$type = $_POST["ddlType"];
		$name = $_POST["txtName"];
		$price = $_POST["txtPrice"];
		$img = $_POST["ddlImage"];
		$text = $_POST["txtReview"];
		
		$cake = new CakeEntity(-1, $type, $name, $price, $text, $img);
		$cakeModel = new CakeModel();
		$cakeModel->InsertCake($cake);
	}
	
	function UpdateCake($id){
		$type = $_POST["ddlType"];
		$name = $_POST["txtName"];
		$price = $_POST["txtPrice"];
		$img = $_POST["ddlImage"];
		$text = $_POST["txtReview"];
		
		$cake = new CakeEntity($id, $type, $name, $price, $text, $img);
		$cakeModel = new CakeModel();
		$cakeModel->UpdateCake($id, $cake);
	}
	
	function DeleteCake($id){
		$cakeModel = new CakeModel();
		$cakeModel->DeleteCake($id);
	}
	
	function GetCakeById($id){
		$cakeModel = new CakeModel();
		return $cakeModel->GetCakeById($id);
	}
	
	function GetCakeByType($type){
		$cakeModel = new CakeModel();
		return $cakeModel->GetCakeByType($type);
	}
	
	function GetCakeTypes(){
		$cakeModel = new CakeModel();
		return $cakeModel->GetCakeTypes();
	}
}
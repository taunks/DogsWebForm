<?php
/*     $breeds = $con->query('select * from breeds');
	
     foreach ($breeds as $breed) {
        $val = $breed['breed_id'];
        $text = $breed['breed_name'];
        echo "<option value=\"$val\">$text</option>";
    } */
?>

<?php
    // var_dump($_POST);
    $formName = '';
    $formAge = '';
	$formBreed = null;
//	$is_fixed = $_POST['is_fixed'];
//	$is_fixed=isset($_POST['is_fixed']);
    // get value for name textbox either from POST, or
    // pet we are editing
    if (isset($_POST['name'])) {
        $formName = $_POST['name'];
    } else {
        if (isset($pet)) {
            $formName = $pet->dog_name;
        }
    }
	
    // same for age
    if (isset($_POST['age'])) {
        $formAge = $_POST['age'];
    } else {
        if (isset($pet)) {
            $formAge = $pet->age;
        }
    }
	// same for breed
    if (isset($_POST['breed'])) {
        $formBreed = $_POST['breed'];
    } else {
        if (isset($pet)) {
            $formBreed = $pet->breed_id;
        }
    }
	if (isset($_POST['fixed'])) {
		$fixed = true;
    } else {
		$fixed=false;
        if (isset($pet)) {
            $formIs_fixed = $pet->dog_name;
        }
    }
?>
<form action="" method="post">
    <fieldset>
        <legend>Pet Manager</legend>
        <input type="text" name="name" maxlength="250"
            placeholder="pet name"
            value="<?= isset($formName) ? $formName : '' ?>">
			
			
<!-- MAKE THIS A LOOP FROM DOGS DB -->			
<?php

?>
<select name="breeds">
<option></option>


<?php
	$breeds = $con->query('select * from breeds');
    
	foreach($breeds as $breed) {
        $id = $breed['breed_id'];
        $text = $breed['breed_name'];
        $selected = $id == $formBreed ? 'selected' : '';
        echo "<option value=\"$id\" $selected>
		$text</option>";
	}
?>
</select>
<!-- end breed selection -->			
			

        <input type="number" name="age" maxlength="2"
            placeholder="pet age"
            value="<?= isset($formAge) ? $formAge : ''?>">
			
<!--		<input type="checkbox" name="fixed" value= $fixed>		
	-->				
		<p><input type="checkbox" name="fixed"> Pet is neutered (Spayed/Castrated)</p>
	
		<p><input type="checkbox" name="vax"> Pet is up to date on vaccines</p>
		
<!-- date created? -->



		<input type="submit" value="Save">
		<input type="button" value="Cancel" onclick="location = './'">
	</fieldset>
</form>

<?php
    $formName = '';
    $formAge = '';
	$formBreed = null;
	$formIs_fixed = '';

    if (isset($_POST['name'])) {
        $formName = $_POST['name'];
    } else {
        if (isset($pet)) {
            $formName = $pet->dog_name;
        }
    }
	
    if (isset($_POST['age'])) {
        $formAge = $_POST['age'];
    } else {
        if (isset($pet)) {
            $formAge = $pet->age;
        }
    }

    if (isset($_POST['breed'])) {
        $formBreed = $_POST['breed'];
    } else {
        if (isset($pet)) {
            $formBreed = $pet->breed_id;
        }
    }

//	$is_fixed = $_POST['is_fixed'];
//	$is_fixed=isset($_POST['is_fixed']);

	if (isset($_POST['is_fixed'])) {
		$is_fixed = true;
    } else {
		$is_fixed = false;
        if (isset($pet)) {
            $formIs_fixed = $pet->is_fixed;
        }
    }
	
	if (isset($_POST['is_vaccinated'])) {
		$is_vaccinated = true;
    } else {
		$is_vaccinated = false;
        if (isset($pet)) {
            $formIs_fixed = $pet->is_vaccinated;
        }
    }
?>
<?php if (isset($_POST)) { print_r($_POST); }?>
<form action="" method="post">
    <fieldset>
        <legend>Pet Manager</legend>
        <input type="text" name="name" maxlength="250"
            placeholder="Dog's Name"
            value="<?= isset($formName) ? $formName : '' ?>">

<label for="male">Breed: </label>			
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

        <input type="number" name="age" maxlength="2"
            placeholder="Dog's Age"
            value="<?= isset($formAge) ? $formAge : ''?>">
<?php
	if ($is_fixed == 1) {
		echo '<p><input type="checkbox" name="fixed" checked="checked"> Pet is neutered (Spayed/Castrated)</p>';
	} else {
		echo '<p><input type="checkbox" name="fixed"> Pet is neutered (Spayed/Castrated)</p>';
	}
	if ($is_vaccinated == 1) {
		echo '<p><input type="checkbox" name="vax" checked="checked"> Pet is up to date on vaccines</p>';
	} else {
		echo '<p><input type="checkbox" name="vax"> Pet is up to date on vaccines</p>';
	}
?>

		<input type="submit" value="Save">
		<input type="button" value="Cancel" onclick="location = './'">
	</fieldset>
</form>

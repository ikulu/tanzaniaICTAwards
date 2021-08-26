<?php
$input = filter_input_array(INPUT_POST);
if ($input['action'] == 'edit') {
$update_field='';
if(isset($input['name'])) {
$update_field.= "name='".$input['name']."'";
}
if($update_field && $input['id']) {
$sql_query = "UPDATE categories SET $update_field WHERE id='" . $input['id'] . "'";
mysqli_query($con, $sql_query) or die("database error:". mysqli_error($conn));
}
}
?>
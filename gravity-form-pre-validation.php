/**
 * Checks if certain form fields are empty, if so, add validation message.
 * @param  object $validation_result contains array of form validation values.
 * @return string Returns if age group is not selected on master contact form.
 */
add_filter( 'gform_validation_2', 'check_for_age_group' ); 
function check_for_age_group( $validation_result ) {
		$form = $validation_result['form'];
		if(empty($_POST["input_31_1"]) && empty($_POST["input_12_1"])){
			// Set the form validation to false
			$validation_result['is_valid'] = false;
			//finding Field with ID of 1 and marking it as failed validation
			foreach( $form['fields'] as &$field ) {
					if ( $field->id == '31') {
						$field->failed_validation = true;
						$field->validation_message = 'Oops! Please select either of these options.';
						continue;
					}
					if ($field->id == '12'){
						$field->failed_validation = true;
						$field->validation_message = 'Oops! Please select either of these options.';
						continue;
					}
			}
		}
		// Assign modified $form object back to the validation result
		$validation_result['form'] = $form;
		return $validation_result;
}

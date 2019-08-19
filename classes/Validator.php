<?php 

namespace App;

class Validator 
{
	/**
	 * Array for tracking validation errors 
	 * @var array
	 */
	
	protected $errors = [];

	protected $message;

	protected $post = [];

	/**
	 * Constructor
	 */
	public function __construct()
	{
		// Creating a local version of $_POST with trimmed values 
		foreach($_POST as $key => $value) {
			$this->post[$key] = trim($value);
		}
	}

	/**
	 * Single function that calls all other validation functions
	 */
	public function Validation()
	{

		// Calling the required function
		foreach($_POST as $key => $value) {
			$this->required($key);
			$this->lengthValidator($key);
			$this->stringValidator($key);
		}

		$this->validatePhone();
		$this->postalCodeValidator();
		$this->validateEmailAddress();


		return $this->getErrors();
	}

	/**
	 * Validate that all mandatory fields are filled
	 * @param  String $field [description]
	 * @return Self        	 [Error is set]
	 */
	public function required($field)
	{
		if(empty($this->post[$field])){	
			$label = $this->label($field);
			$this->setErrors($field,$this->label($field) . " is required");
		}
	}

	/**
	 * Return a label by replacing the underscore with a blank space
	 * @param  String $string [Field name]
	 * @return String         [Label]
	 */
	protected function label($string) 
	{	
		//replace underscores with a space 
		//uppercase each word
		//return the result
		return ucwords(str_replace('_',' ',$string) );
	}

	/**
	 * Validate a phone number
	 * @param  String $field [Phone Number]
	 * @return Self      	 [Error is set]
	 */
	public function validatePhone()
	{
		
		$pattern = '/^([0-9]{3})-?([0-9]{3})-?([0-9]{4})$/';
		$message = 'Please enter a valid phone number';
		if(preg_match($pattern, $_POST['phone']) !== 1){
			$this->setErrors('phone',$message);
		}
	}

	/**
	 * Validates if it is a string field and 
	 * there is a value passed by the user.
	 * Checks if each field is between 3 and 255 characters 
	 * @param  Mixed $field  [Field Name]
	 * @return Self          [Error is Set]
	 */
	public function lengthValidator($field)
	{

		if( ( !is_numeric($_POST[$field]))  && empty($errors[$field]) ){

			$len = strlen($_POST[$field]);

			if ( ($len < 3) || ($len > 255) ){
				$message = $this->label($field) . 
				' needs to be between 3 and 255 characters'; 

				$this->setErrors($field,$message);
			}
		}
	}

	/**
	 * Validate Email Address using filter_var() function and making sure
	 * length of email address does not exceed 100 characters
	 * @return Self 							[Error is Set]
	 */
	public function validateEmailAddress()
	{

		if( !(filter_var($_POST['email_address'], FILTER_VALIDATE_EMAIL)) || (strlen($_POST['email_address']) > 100)) {
			$message = 'Please enter a valid email address with a maximum of 100 characters';
			$this->setErrors('email_address',$message);
        }

	}

	/**
	 * Check if the postal code matches the valid pattern 
	 * @return self 					   [Error is set]
	 */
	public function postalCodeValidator()
	{
		
		$pattern = '/^([A-Za-z0-9]{3}\s?[A-Za-z0-9]{3})$/';
		$message = 'Please enter a valid postal code';
		if(preg_match($pattern, $this->post['postal_code']) !== 1){
			$this->setErrors('postal_code',$message);
		}
		
	}

	/**
	 * Validation to not allow special characters
	 * @param  String $field [Field Name]
	 * @return Self        	 [Error is set]
	 */
	public function stringValidator($field)
	{

		$pattern = '/[#$%^&*()+@]/';
		if( (preg_match($pattern, $_POST[$field]) == 1 )
			&& ($field != 'email_address' && 
				$field != 'phone'  &&
				$field != 'postal_code'&&
				$field != 'pass' && $field != 'confirm_pass') )
		{
			$message = 'Special characters are not allowed
			in the field '. $this->label($field);
			$this->setErrors($field,$message);
		}
	
	}

    /**
     * Get Validation errors
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * Set errors 
     * @param array $errors
     * @return self
     */
    public function setErrors($field, $message)
    {
    	if(empty($this->errors[$field]))
    	{
        	$this->errors[$field] = $message;
      	}
    }
}
<?php 

namespace App;

class Validator 
{
	/**
	 * 
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
	public function validatePhone($phone)
	{
		
		$pattern = '/^([0-9]{3})-?([0-9]{3})-?([0-9]{4})$/';
		$message = 'Please enter a valid phone number';
		if(preg_match($pattern, $phone) !== 1){
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


			$len = strlen($_POST[$field]);

			if ( ($len < 3) || ($len > 255) ){
				$message = $this->label($field) . 
				' needs to be between 3 and 255 characters'; 

				$this->setErrors($field,$message);
			}

	}


	/**
	 * Validates the password such that it meets the minimum requirements
	 * @return Self       								   [Error is set]
	 */
	public function passwordValidator(){
	
		$pattern = '/(?=.*[A-Z]+)(?=.*[a-z]+)(?=.*[0-9]+)(?=.*[\!\@\#\$\%\^\&\*\(\)]+).{6,}/';
		$message = 'Please enter a valid password';
		if(empty($this->errors['pass'])) {
			if(preg_match($pattern, $_POST['pass']) !== 1){
				$this->setErrors('pass',$message);
			}elseif($_POST['pass'] != $_POST['confirm_pass']){
				$message = 'Passwords do not match';
				$this->setErrors('pass',$message);
			}
		}

	}

	/**
	 * Validate Email Address using filter_var() function and making sure
	 * length of email address does not exceed 100 characters
	 * @return Self 							[Error is Set]
	 */
	public function emailValidator($email)
	{

		global $dbh;

		$email = esc($email);

		$query = "SELECT * from 
                    	users
                        WHERE 
                        email = :email
                        ";
            
            // Preparing the query
            $stmt = $dbh->prepare($query);
            
            // Adding parameters to be passed to the query
            $params = array(
                ':email'=> $email);

            // Execute the query
            $stmt->execute($params);

            $result = $stmt->fetchColumn();

            if($result == true){
            	$message = 'Email address already exists. To create a new user use another email address';
            	$this->setErrors('email_address',$message);
            }elseif( !(filter_var($_POST['email_address'], FILTER_VALIDATE_EMAIL)) || (strlen($_POST['email_address']) > 100)) {
			$message = 'Please enter a valid email address with a maximum of 100 characters';
			$this->setErrors('email_address',$message);
        }



	}

	/**
	 * Check if the postal code matches the valid pattern 
	 * @return self 					   [Error is set]
	 */
	public function postalCodeValidator($postal_code)
	{
		
		$pattern = '/^([A-Za-z0-9]{3}\s?[A-Za-z0-9]{3})$/';
		$message = 'Please enter a valid postal code';
		if(preg_match($pattern, $postal_code) !== 1){
			$this->setErrors('postal_code',$message);
		}
		
	}

	/**
	 * Checking if all form fields of login page are filled
	 * @return self 						[Error is set]
	 */	
	public function loginFormValidate(){
		if(empty($_POST['email_address']) || empty($_POST['pass'])) {
          $this->setErrors('login','Both email and password are required');
          return $this->getErrors();
        }
	}

	/**
	 * Validation to not allow special characters
	 * @param  String $field [Field Name]
	 * @return Self        	 [Error is set]
	 */
	public function stringValidator($field)
	{

		$pattern = '/[$%^&*()+@\d]/';
		if( preg_match($pattern, $_POST[$field]) == 1 )
		{
			$message = 'Special characters are not allowed
			in the field '. $this->label($field);
			$this->setErrors($field,$message);
		}
	
	}

	/**
	 * Checks if a value is numeric
	 * @param  String  $field [field name]
	 * @return self        	  [Error is set]
	 */
	public function isNumeric($field)
	{	

		if(!is_numeric($_POST[$field]))
		{	
			$message = 'Please enter a number in the field '. $this->label($field);
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
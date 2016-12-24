<?php
require 'session.php';



class User extends DHTMLSQL
{
    const STATUS_DELETED = '0';
    const STATUS_ACTIVE = '10';
    const UNVERIFIED = '00';
    
    public $session;
    
    private $app;
	
    function __construct(Cloned $app) {
    	$this->app = $app;
    	$this->session = new Session();
    	
    }
    
    
    public function register( &$post, &$validator ) {
    	
    	$email = $validator->email($post['email']);
    		
    	$lastname = $validator->sanitize_special_chars($post['lastname'], true);
    	
    	$firstname = $validator->sanitize_string($post['firstname']);
    	
   		$username = $validator->sanitize_string($post['username']);
   		
   		$gender = $validator->sanitize_string($post['gender']);
    					
    	$password_hash = $this->setPassword($post['password']);
    	
    	$auth_key = $this->generateAuthKey();
    	
    	$status = self::UNVERIFIED;
		
    	
    	$error = null;
    	
    	try {
    	
	    	$result = $this->app::$db->insert($this->tableName(), array(
	    			
	    			'firstname' => strtolower($firstname),
	    			'lastname' => strtolower($lastname),
	    			'gender' => strtolower($gender),
	    			'username' => strtolower($username),
	    			'auth_key' =>$auth_key,
	    			'status' => $status,
	    			'email' => strtolower($email),
	    			'password_hash' => $password_hash,
	    		)
	    	);
    	} catch (Exception $e) {
    		$error = $e->getMessage();
    		
    	}
    	
//     	$this->mail_auth_key($email, $auth_key);
    	
    	if (isset($error)) return false;
    	
    	return  $result;
    	
//     	if( $result->connection->error === '' && $result->connection->affected_rows === 1 )
//     		echo 'an';
    	
    	
    	
    }

    public function check_admission_status($jamb_number, &$validator) {
   		
   		$jamb_number = $validator->sanitize_string($jamb_number);
		
    	$error = null;
    	
    	try {
    	
	    	$result = $this->app::$db->select('*','aspirants', 'jamb_number = ?', array($jamb_number));
    	} catch (Exception $e) {
    		$error = $e->getMessage();
    		
    	}
    	
    	if (isset($error)) return $error;
    	
        return  $result->fetch_assoc_all()[0];

    }

    public function get_aspirant_data($jamb_number, &$validator) {
   		
   		$jamb_number = $validator->sanitize_string($jamb_number);
		
    	$error = null;
    	
    	try {
    	
	    	$result = $this->app::$db->select('*','admitted_candidates', 'jamb_number = ?', array($jamb_number));
    	} catch (Exception $e) {
    		$error = $e->getMessage();
    		
    	}
    	
    	if (isset($error)) return $error;
    	
        if ($result->affected_rows > 0) {
            return  $result->fetch_assoc_all()[0];
        } else return [];
        

    }
    
    
    
    public function login( &$post, &$validator ) {
		
    	
    	try {
    		$result = $this->get_hash( strtolower($post['email-username']) );
    		
    		if ( isset($result) && is_array($result) ) {
    			$validpassword = $this->validatePassword( strtolower($post['password']) , $result[0]['password_hash']);
    			
    			if ($validpassword) {
    				
    				return $this->get_all_data($post['email-username'])[0];
    			}
    		
    		}
    		
    		return false;
    	} catch (Exception $e) {
    		echo $e.getMessage();
    	}
    	
    }
    
    private function set_login_session(&$username) {
    	$data = $this->get_all_data($username)[0];
    	
    	return ;
//     		$this->session->set('username', $data['username']) ;
//     		&& 
//     		$this->session->set('user_id', $data['id']);
    	
    	
    }
    
    public function logout() {
    	return $this->session->destroy();
    }
    
    private function get_all_data($username) {
    	$result = $this->app::$db->select('*', $this->tableName(), 'username = ? OR email = ?', array( $username, $username ));
    	
    	return $result->fetch_assoc_all();
    	
    }
    
    
    
    private function get_hash($email_username) {
    	
    	if (!is_string($email_username))
    		return false;
    	
    	$result = $this->app::$db->select( 'password_hash', $this->tableName(), 'username = ? OR email = ?', array( strtolower($email_username ), strtolower($email_username )) );
    	
    	if (is_int($result->affected_rows) && $result->affected_rows === 1 )
    		return $result->fetch_assoc_all();
    	
    	return false;
    }
    public function mail_auth_key($to, $key) {
    	
    	$subject = 'Verify your AFCLONE account';
    	
    	$message = 
    		'<p style="text-align:center; font-weight: bold; font-size: 200%">Thanks for registering. <br /> <span>Click the link below to complete your registration </span> <a style="display:block; padding:5px 10px; background:green; border: 1px solid darkgrey; border-radius: 3px; text-decortion: none; color:white; width: 25%; margin:5px auto;" href= "http://'
    				. $_SERVER['SERVER_NAME'] . '/verify?key=' . $key . '&email=' . $to . '">Verify Me</a> </p>';
    	
    	echo $message;
    	mail($to, $subject, $message);
    	
    	
		
    	
    }
    
    

    
    public static function tableName()
    {
        return 'users';
    }


    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return boolean
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Cloned::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password, $hash)
    {
        return $this->app::$security->validatePassword($password, $hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        return $this->app::$security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        return $this->app::$security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        return $this->app::$security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->app::$db;
    }
}

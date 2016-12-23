<?php 

/**
 * 
 */
class Post
{
    public static $userid = null;
    private static $app = null;
    
    function __construct(Cloned $app)
    {
        self::$app = $app;
    }
    
    public function save ($userid, $body) {
        
    	$validator = new Validator();
        
        $body = $validator->sanitize_special_chars($body);

        
        $inserted = static::$app::$db->insert('post', array( 'user_id' => $userid, 'body' => $body,), true );
        
        if ($inserted->affected_rows === 1) 
        	return true;
        
        return false;
        
    }

    /**
     * @param $id
     * @return bool
     */
    public function get($id) {
    	// html_entity_decode('testeteta &#38;#34;Who are you&#62;?&#38;#34;', ENT_QUOTES | ENT_HTML5, 'utf-8'),
        /** @var Database $db */
        $result = self::$app::$db->select('*','post', 'id = ?', array($id));
    	
    	if ($result->affected_rows === 1 )
    		return $result->fetch_assoc();
    	
    	return false;
    }

    /**
     * @param $start
     * @param $end
     * @return bool
     */
    public function get_offset ($start, $end) {

        $result =
            self::$app::$db->
                query('SELECT p.id as post_id, p.body as body, CONCAT(u.lastname, " ", u.firstname) as created_by,
                        p.created_at as created_at, p.updated_at as updated_at, u.username as username, (SELECT COUNT(c.id) FROM comments as c WHERE c.post_id = p.id ) as total_comments, likes FROM post as p INNER JOIN users as u ON(p.user_id = u.id) 
                        ORDER BY p.updated_at DESC limit ' . $start . ', ' . $end);
        
    	if ($result->num_rows ===  count($result->fetch_assoc_all()) ){
            
            $result = $result->fetch_assoc_all();

            $count = count($result);

            for ($i = 0; $i < $count; $i++) {

                $result[$i]['created_by'] = ucwords($result[$i]['created_by']);
                $result[$i]['body'] = nl2br( html_entity_decode($result[$i]['body'], ENT_QUOTES | ENT_HTML5, 'utf-8') );
            }


            return $result;

        }
    		 
    		return false;
    }

    /**
     * @param $post_id
     * @return bool
     */
    public function get_comment ($post_id ) {
        
        $result =
            self::$app::$db->
                query('SELECT c.id as id, c.post_id as post_id, c.body as body, c.created_at as created_at, CONCAT(u.lastname, " ", u.firstname) as name, u.username as username, c.likes as likes FROM comments as c inner Join users as u ON (u.id = c.user_id) Where c.post_id IN (' . implode(',', $post_id) . ') ORDER BY c.created_at ASC' );
        
        if ($result->num_rows ===  count($result->fetch_assoc_all()) ) {

            $result = $result->fetch_assoc_all();

            $count = count($result);

            for ($i = 0; $i < $count; $i++) {

                $result[$i]['name'] = ucwords($result[$i]['name']);
                $result[$i]['body'] = html_entity_decode($result[$i]['body'], ENT_QUOTES | ENT_HTML5, 'utf-8');

            }

            return $result;

        }
             
            return false;
    }

    /**
     * @param $user_id
     * @param $post_id
     * @param $body
     * @return string
     */
    public function add_comment($user_id, $post_id, $body) {

         try {
        
            return self::$app::$db->insert('comments', array(
                    
                    'user_id' => strtolower($user_id),
                    'post_id' => strtolower($post_id),
                    'body' => Validator::sanitize_special_chars($body, true)
                )
            );
        } catch (Exception $e) {
            $error = $e->getMessage();
            
            return $error;
        }

    }

    /**
     * @param $id
     * @param $count
     * @return array|bool|string
     */
    public function increment_post_like($id, $count) {

        if ( (empty($id) || empty($count) )  && !( isset($id) || isset($count) ) ) {
            return  array('error' => 'Invalid parameters passed' );
        }

        try {

            $result = self::$app::$db->update( 'post', array( 'likes'   =>  $count ), 'id = ?', array($id) );

            if ($result) {
                $newCount = self::$app::$db->query('SELECT likes FROM post WHERE id = ' . $id);
                return $newCount->num_rows === 1 ? $newCount->fetch_assoc_all() : true;
            }

            return  array('error' => 'Unable to update comment count', 'result' => $result );

        } catch (Exception $e) {
            $error = $e->getMessage();
            
            return $error;
        }
    }

    /**
     * @param $id
     * @param $count
     * @return array|bool|string
     */
    public function increment_comment_like($id, $count) {

        if ( (empty($id) || empty($count) )  && !( isset($id) || isset($count) ) ) {
            return  array('error' => 'Invalid parameters passed' );
        }

        try {

            $result = self::$app::$db->update( 'comments', array( 'likes'   =>  $count ), 'id = ?', array($id) );

            if ($result) {
                $newCount = self::$app::$db->query('SELECT likes FROM comments WHERE id = ' . $id);
                return $newCount->num_rows === 1 ? $newCount->fetch_assoc_all() : true;
            }

            return  array('error' => 'Unable to update comment count', 'result' => $result );

        } catch (Exception $e) {
            $error = $e->getMessage();
            
            return $error;
        }
    }

}

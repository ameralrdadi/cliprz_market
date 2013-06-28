<?php

/**
 * Controler User
 *
 * Here you can Controller User
 *
 *
 * LICENSE: This program is released as free software under the Affero GPL license. You can redistribute it and/or
 * modify it under the terms of this license which you can read by viewing the included agpl.txt or online
 * at www.gnu.org/licenses/agpl.html. Removal of this copyright header is strictly prohibited without
 * written permission from the original author(s)
 *
 *
 * @author    Amer Alrdadi
 * @copyright copyrights (c) 2013 By Amer Alrdadi
 * @link      http://abosahar.com/cliprz_market
 * @since     Version 1.0.0
 */

class users
{

	public function index ()
	{
        $data = array(
            'title_page' => lang('list') . ' ' . lang('users')
        );

        cliprz::system(view)->display('static/header',$data,TRUE);
        
        $query_users  = cliprz::system(database)->select("users","*","active = 1");
        $num_users    = cliprz::system(database)->num_rows($query_users);

        $data_users = array(
            'query_users' => $query_users,
            'num_users'   => $num_users
        );

        cliprz::system(view)->display('users/home',$data_users);

        cliprz::system(view)->display('static/footer',NULL,TRUE);	
    }

    public function register ()
    {
        (cliprz::system(session)->get('login') == 1) ? header("Location:".URL) : NULL;

        $data = array( 
            'title_page' => lang('register') . ' ' . lang('user')
        );

        $error = NULL;
        $form  = TRUE;

        cliprz::system(view)->display('static/header',$data,TRUE);
        
        if(isset($_POST['user']) && $_POST['user'] == 'register')
        {
            $user_post = array(
                'username' => (isset($_POST['username'])) ? cliprz::system(database)->res($_POST['username']) : NULL,
                'email'    => (isset($_POST['email'])) ? cliprz::system(database)->res($_POST['email']) : NULL,
                'password' => (isset($_POST['password'])) ? cliprz::system(database)->res($_POST['password']) : NULL,
                'id_group'  => 2, //defult_groupid
                'active'   => 1,
            );

            if(empty($user_post['username']) || empty($user_post['email']) || empty($user_post['password']))
            {
                $error = lang('msg_empty_input');
            }
            elseif(!cliprz::system(validate)->is_email($user_post['email']))
            {
                $error = lang('msg_incoruuct_email');
            }
            elseif($user_post['password'] != $_POST['repassword'])
            {
                $error = lang('msg_pass_no_repass');
            }
            else
            {
                $form                  = FALSE;
                $user_post['salt']     = cliprz::system(encrypt)->generate_salt(15, TRUE);                
                $user_post['password'] = cliprz::system(encrypt)->salt_password($user_post['password'], $user_post['salt']);

                cliprz::system(database)->insert('users',$user_post);

                echo '<div class="alert alert-success">'.lang('msg_success_register').'</div>';
                $error = NULL;
                unset($post_user);
            }

        }

        $data_register = array(
            'error' => $error
        );
        
        ($form === TRUE) ? cliprz::system(view)->display('users/register',$data_register) : NULL;
        

        cliprz::system(view)->display('static/footer',NULL,TRUE);

    }

    public function login ()
    {
        (cliprz::system(session)->get('login') == 1) ? header("Location:".URL) : NULL;

        $data = array(
            'title_page' => lang('login') . ' ' . lang('user')
        );
        
        $form  = TRUE;
        $error = NULL;

        $user_post = array(
            'email'    => (isset($_POST['email'])) ? cliprz::system(database)->res($_POST['email']) : NULL,
            'password' => (isset($_POST['password'])) ? cliprz::system(database)->res($_POST['password']) : NULL
        );

        cliprz::system(view)->display('static/header',$data,TRUE);

        if(isset($_POST['user']) && $_POST['user'] == 'login')
        {
            if(empty($user_post['email']) || empty($user_post['password']))
            {
                $error = lang('msg_empty_input');
            }
            elseif(!cliprz::system(validate)->is_email($user_post['email']))
            {
                $error = lang('msg_incoruuct_email');
            }
            else
            {
                $query_check = cliprz::system(database)->select("users","*","email = '".$user_post["email"]."'");
                $num_check   = cliprz::system(database)->num_rows($query_check);
                
                if(!$num_check)
                {
                    $error = lang('msg_email_not_found');
                }
                else
                {
                    $row_account = cliprz::system(database)->fetch_assoc($query_check); 
                    
                    //$query_group = cliprz::system(database)->select("users,usergroup","*","users.id_group = '".$row["id_group"]."'");

                    $query_group = cliprz::system(database)->query("SELECT * FROM ".DATABASE_PREFIX."users
                        LEFT OUTER JOIN ".DATABASE_PREFIX."usergroup ON ".DATABASE_PREFIX."users.id_group = ".DATABASE_PREFIX."usergroup.groupid
                        WHERE ".DATABASE_PREFIX."users.id_group = " . $row_account["id_group"] ."");
                    $row_group   = cliprz::system(database)->fetch_assoc($query_group);

                    if((cliprz::system(encrypt)->salt_password($user_post["password"], $row_account["salt"]) != $row_account["password"]))
                    {
                        $error = lang('msg_error_pass');
                    }
                    elseif($row_group["can_login"] == 0)
                    {
                        $error = lang('msg_can_not_login');
                    }
                    else
                    {
                        $error = NULL;
                        $form  = FALSE; 
                       
                        unset($user_post);
                       
                        cliprz::system(session)->set('login', 1);
                        cliprz::system(session)->set('userid', $row_account["userid"]);
                        cliprz::system(session)->set('username', $row_account["username"]);
                        cliprz::system(session)->set('email', $row_account["email"]);
                        cliprz::system(session)->set('id_group', $row_account["id_group"]);
                        cliprz::system(session)->set('is_admin', $row_group["is_admin"]);
                  
                        echo '<div class="alert alert-success" style="width:300px; margin:0 auto; text-align:center;">'.lang('msg_success_login').'</div>';
                    }
                }
            }
        }      

        $data_login = array(
            'error' => $error
        );

        ($form === TRUE) ? cliprz::system(view)->display('users/login',$data_login) : NULL;
       
        cliprz::system(view)->display('static/footer',NULL,TRUE);

    }


    public function myaccount ()
    {
        (cliprz::system(session)->get('login') != 1) ? header("Location:".URL) : NULL;

        $form  = TRUE;
        $error = NULL;

        $data = array(
            'title_page' => lang('myaccount')
        );

        cliprz::system(view)->display('static/header',$data,TRUE);

        $user_post = array(
            'email'    => (isset($_POST['email'])) ? cliprz::system(database)->res($_POST['email']) : NULL,
            'password' => (isset($_POST['password'])) ? cliprz::system(database)->res($_POST['password']) : NULL
        );

        if(isset($_POST['user']) && $_POST['user'] == 'update_myaccount')
        {
            if(empty($user_post['email']) || empty($user_post['password']))
            {
                $error = lang('msg_empty_input');
            }
            elseif(!cliprz::system(validate)->is_email($_POST['email']))
            {
                $error = lang('msg_incoruuct_email');
            }
            elseif($user_post['password'] != $_POST['repassword'])
            {
                $error = lang('msg_pass_no_repass');
            }
            else
            {
                $user_post['salt']     = cliprz::system(encrypt)->generate_salt(15, TRUE);
                $user_post['password'] = cliprz::system(encrypt)->salt_password($user_post['password'], $user_post['salt']);

                // Cliprz Market Demo 
                //cliprz::system(database)->update('users',$user_post,'userid = "'.cliprz::system(session)->get('userid').'"');
                //echo '<div class="alert alert-success" style="width:300px; margin:0 auto; text-align:center;">'.lang('msg_update_account').'</div>';
                echo '<div class="alert alert-info" style="width:300px; margin:0 auto; text-align:center;">Cliprz Market Demo!</div>';

                $form  = FALSE;
                $error = NULL;    

                unset($user_post);                
            }

        }
        
        $data_user = array(
            'username' => cliprz::system(session)->get('username'),
            'email'    => cliprz::system(session)->get('email'),
            'error'    => $error
        );

        ($form === TRUE) ? cliprz::system(view)->display('users/myaccount',$data_user) : NULL ;
        
        cliprz::system(view)->display('static/footer',NULL,TRUE);

    }

    public function profile($get_userid)
    {

        $data = array(
            'title_page' => lang('show') . ' ' . lang('profile')
        );

        cliprz::system(view)->display('static/header',$data,TRUE);
        
       cliprz::system(validate)->is_id($get_userid);

        $query_user = cliprz::system(database)->select('users','*','userid = '.$get_userid.'');
        $num_user   = cliprz::system(database)->num_rows($query_user);  
        $row_user   = cliprz::system(database)->fetch_assoc($query_user);

        $data_profile = array(
                'num_user' => $num_user,
                'userid'   => $row_user['userid'],
                'username' => $row_user['username'],
                'email'    => $row_user['email'],
                );

        cliprz::system(view)->display('users/profile',$data_profile);

        cliprz::system(view)->display('static/footer',NULL,TRUE);
    }
   
    public function forgot()
    {
        cliprz::system(view)->display('static/header',$data,TRUE);
        
        cliprz::system(view)->display('static/footer',NULL,TRUE);
    }



    public function logout ()
    {
        (cliprz::system(session)->get('login') != 1) ? header("Location:".URL) : NULL;

        $data = array(
            'title_page' => lang('logout')
        );

        cliprz::system(view)->display('static/header',$data,TRUE);
        
        cliprz::system(view)->display('users/logout',NULL);

        cliprz::system(session)->destroy();

        cliprz::system(view)->display('static/footer',NULL,TRUE);
    }
}

/**
 * End of file users.controller.php
 *
 * @created  05/04/2013 04:30 am
 * @updated  27/06/2013 07:07 pm
 * @location ./application/project/users/users.controller.php
 */
?>
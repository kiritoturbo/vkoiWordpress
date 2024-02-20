<?php /* Template Name: Login Template */ ?>
<?php
   do_action('user_redirect_if_logged_in');

   // get_header();
   $login = home_url()."/login-new/";
   $dashboard = home_url()."/dashboard/";
   
   if(isset($_REQUEST['signin'])){
      $email = $_POST['username'];
      $password = $_POST['password'];
      $creds = array();
      $creds['user_login'] = $_POST['username'];
      $creds['user_password'] = $_POST['password'];
      $creds['remember'] = false;
      $user = wp_signon( $creds, false );
      $user = wp_signon( $creds);

      if(isset($user->errors)){
      // if(is_wp_error($user)) {
         echo $user->get_error_message();
         die;
      }else{ //successfully logged in
            session_start();  //check for wp_session storage 
            $_SESSION["new_dashboard"] = '1';  //if you want to redirect user to a new page or set any conditions on login
         
                if ($user->is_admin == '1') {
                  $dashboard = home_url()."/?page=old-dashboard";
                } else {
                  $dashboard = home_url()."/?page=new-dashboard";
                }
        
        //set cookie for remember me //save user login details as cookie if remember me is set, so that if user logs out next time and comes to this log in page, username & password auto fills by checking
        $user_login_details = $email.'_pass_'.$password;
        if(!empty($_POST["remember"])) {
          setcookie ("user_login_details",$user_login_details,time()+ (10 * 365 * 24 * 60 * 60)); //set cookie time as per you need
        } else {  //remove login details from cookie
          if(isset($_COOKIE["user_login_details"])) {
            setcookie ("user_login_details","");
          }
        }
         wp_redirect($dashboard);
         exit;
      }
   }
   
   if(isset($_COOKIE["user_login_details"])) {
          $login_details = $_COOKIE["user_login_details"];
          $login_details = explode('_pass_', $login_details);
          $email_set = $login_details[0];
          $pass_set = $login_details[1];
   }

   ?>
       <!-- value="<?php if(isset($email_set)){ echo $email_set; } ?>"  -->
       <!-- value="<?php if(isset($pass_set)){ echo $pass_set; } ?>" -->
           
<script>
function show_pass() {
  var x = document.getElementById("user_pass");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

<?php get_header()?>
<?php 
   global $wpdb;
   $db_name = $wpdb->dbname;
?>
<?php
    $home_url = get_home_url();
    if ( is_user_logged_in() ) {
        echo '<p class="container">Bạn đã đăng nhập rồi. <a href="'.wp_logout_url($home_url).'">Đăng xuất</a> ?</p>';
    }else{
      ?>
        <section class="section-login">
          <div class="login-wrap">
              <p class="welcome">Đăng nhập tài khoản</p>
              <p class="reg-account">Bạn chưa có tài khoản?
              <!-- <?php echo get_permalink( wc_get_page_id( 'myaccount' ) ); ?> -->
                  <a href="webWocommerce/dang-ky" title="đăng ký tại đây" aria-multiline="đăng ký tại đây">ĐĂng ký tại đây</a>
              </p>
              <div class="dang-ky">
                  <div id="message"></div>
                  <div class="gap16"></div>
                  <form action="" method="POST" name="form-login-register" class="woocommerce-form woocommerce-form-login login" id="form-login-register">
                      <p class="login-username">
                          <label for="user-login">
                              Email
                              <span class="required">*</span>
                          </label>
                          <input type="text" name="username" id="user_login" autocomplete="username" class="input" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" size="20" placeholder="Email">
                      </p>
                      <p class="login-password" >
                          <label for="user_pass" >Mật khẩu <span class="required">*</span></label>
                          <input type="password" name="password"  id="user_pass" autocomplete="current-password" spellcheck="false" class="input" value="<?php if(isset($pass_set)){ echo $pass_set; } ?>" size="20" placeholder="Mật khẩu">
                          <i  class="fas fa-eye" onClick="show_pass()"></i>
                      </p>
                      <p class="login-lostpassword">Quên mật khẩu? Nhấn vào 
                      <!-- <?php echo site_url(); ?>/password-reset/" -->
                          <a href="<?php echo site_url(); ?>/password-reset/" class="text-primary">đây</a>
                      </p>
                      <!-- <p class="login-submit">
                          <input type="submit" name="wp-submit" id="wp-submit" class="button button-primary" name="signin" value="Đăng nhập">
                          <input type="hidden" name="redirect_to" value="">
                      </p> -->
                      <button type="submit" id="signin" name="signin">
                          Đăng nhập
                      </button>
                    <?php do_action( 'woocommerce_login_form_end' ); ?>
                  </form>
              </div>
          </div>
        </section>
      <?php 
    }
?>

<?php get_footer()?>
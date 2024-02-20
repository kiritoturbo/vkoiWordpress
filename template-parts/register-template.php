<?php /* Template Name: Register Template */ ?>
<?php
global $wpdb, $user_ID;  
// if (!$user_ID) {  
//    //All code goes in here.  
// }  
// else {  
//    wp_redirect( home_url() ); exit;  
// }
// ?>
<?php 
    if (isset($_POST['btnregister']))
    {
        //registration_validation($_POST['username'], $_POST['useremail']);
        global $reg_errors;
        $reg_errors = new WP_Error;
        $username=$_POST['full_name'];
        $useremail=$_POST['email_user'];
        $phonenumber=$_POST['phone_user'];
        $password1=$_POST['pwd1'];
        $password2=$_POST['pwd2'];
        
        
        if(empty( $username ) || empty( $useremail ) || empty($password1))
        {
            $reg_errors->add('field', 'Required form field is missing');
        }    
        if ( 6 > strlen( $username ) )
        {
            $reg_errors->add('username_length', 'Username too short. At least 6 characters is required' );
        }
        if ( username_exists( $username ) )
        {
            $reg_errors->add('user_name', 'The username you entered already exists!');
        }
        if ( ! validate_username( $username ) )
        {
            $reg_errors->add( 'username_invalid', 'The username you entered is not valid!' );
        }
        if ( !is_email( $useremail ) )
        {
            $reg_errors->add( 'email_invalid', 'Email id is not valid!' );
        }
        
        if ( email_exists( $useremail ) )
        {
            $reg_errors->add( 'email', 'Email đã tồn tại!' );
        }
        if ( 5 > strlen( $password1 ) ) {
            $reg_errors->add( 'password', 'Password length must be greater than 5!' );
        }
        if( $password1 !== $password2){
            $reg_errors->add( 'password', 'đăng nhập thành công' );
        }
        if (is_wp_error( $reg_errors ))
        { 
            foreach ( $reg_errors->get_error_messages() as $error )
            {
                 $signUpError='<p style="color:#FF0000; text-aling:left;"><strong>ERROR</strong>: '.$error . '<br /></p>';
            } 
        }
        else{
            $reg_errors->add( 'mess', 'Password phải trùng nhau' );
        }
        
        if ( 1 > count( $reg_errors->get_error_messages() ) )
        {
            // sanitize user form input
            global $username, $useremail;
            $username   =   sanitize_user( $_POST['full_name'] );
            $useremail  =   sanitize_email( $_POST['email_user'] );
            $userphone   =   esc_attr( $_POST['phone_user'] );
            $password   =   esc_attr( $_POST['pwd1'] );
            
            $userdata = array(
                'user_login'    =>   $username,
                'user_email'    =>   $useremail,
                'user_phone'     =>   $userphone,
                'user_pass'     =>   $password,
                );
            $user = wp_insert_user( $userdata );
        }
    
    }
?>
<?php get_header()?>

<section class="section-login">
    <div class="login-wrap">
        <p class="welcome">Đăng ký tài khoản</p>
        <p class="reg-account">Bạn đã có tài khoản? <a href="<?php bloginfo('url'); ?>/dang-nhap" title="Đăng nhập tại đây" alt="Đăng nhập tại đây">Đăng nhập tại đây</a></p>
        <div class="gap45"></div>
        <p class="welcome welcome-v2">THÔNG TIN CÁ NHÂN</p>
        <div class="dang-ky">
            <!--display error/success message-->
            <div id="message"></div>
            <form method="post" id="form-login-register" name="user_registeration">
                <p>
                    <label>Họ tên <span class="required">*</span></label>
                    <input type="text" value="<?php echo ( ! empty( $_POST['full_name'] ) ) ? esc_attr( wp_unslash( $_POST['full_name'] ) ) : ''; ?>" name="full_name" id="full_name" placeholder="Họ tên" required="">
                </p>
                <p>
                    <label>Email <span class="required">*</span></label>
                    <input type="email" value="<?php echo ( ! empty( $_POST['email_user'] ) ) ? esc_attr( wp_unslash( $_POST['email_user'] ) ) : ''; ?>" name="email_user" id="email_user" placeholder="Email" required="">
                </p>
                <p>
                    <label>Số điện thoại <span class="required">*</span></label>
                    <input type="tel" value="" name="phone_user" id="phone_user" placeholder="Số điện thoại" required="">
                </p>
                <p>
                    <label>Mật khẩu <span class="required">*</span></label>
                    <input type="password" value="" name="pwd1" id="pwd1" placeholder="Mật khẩu" required="">
                </p>
                <p>
                    <label>Nhập lại mật khẩu <span class="required">*</span></label>
                    <input type="password" value="" name="pwd2" id="pwd2" placeholder="Nhập lại mật khẩu" required="">
                </p>
                <p class="gap16">
                    <button type="submit" name="btnregister" id="nut-dk" class="button">Đăng ký</button>
                    <input type="hidden" name="task" value="register">
                </p>							
            </form>
        </div>
    </form>
    <?php if(isset($signUpError)){echo '<div>'.$signUpError.'</div>';}?>
    </div>
</section>

<?php get_footer()?>
<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package FIMETECH
 */

?>

<footer id="footer" class="footer-wrapper mt-5">
        <div class="container d-flex align-items-center justify-content-between">
                <div class="dark-left d-flex ">
                    <div class="icon-society">
                        <div class="icon-society-item">
                            <a href="#"><img src="https://shopgym.antbone.vn/wp-content/themes/flatsome-child/lib/images/facebook.svg" alt=""></a>
                        </div>
                    </div>
                    <div class="icon-society">
                        <div class="icon-society-item">
                            <a href="#"><img src="https://shopgym.antbone.vn/wp-content/themes/flatsome-child/lib/images/zalo.svg" alt=""></a>
                        </div>
                    </div>
                    <div class="icon-society">
                        <div class="icon-society-item">
                            <a href="#"><img src="https://shopgym.antbone.vn/wp-content/themes/flatsome-child/lib/images/facebook.svg" alt=""></a>
                        </div>
                    </div>
                </div>

                <div class="dark-right d-flex ">
                    <div class="right-email d-flex ">
                        <img src="https://shopgym.antbone.vn/wp-content/themes/flatsome-child/lib/images/email-icon.webp" alt="">
                        <p class="ml-3 mb-0">Bạn muốn nhận khuyến mãi đặc biệt? Đăng ký ngay</p>
                    </div>
                    <div class="right-input">
                        <div class="input-group ">
                            <input type="text" class="form-control" placeholder="Thả email nhận ngay ưu đãi..." aria-label="Recipient's username" aria-describedby="button-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-email btn-outline-secondary" type="button" id="button-addon2">Đăng ký</button>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

        <section class="footer-main mt-5">
            <div class="container d-flex flex-wrap info-contact-company">
                <div class="contact-company col-lg-4 col-12">
                    <a href="#" class="logo-footer">
                        <img src="https://shopgym.antbone.vn/wp-content/uploads/2023/06/Screenshot-2023-06-11-223211-copy.png" alt="">
                    </a>
                    <ul>
                        <li class="mt-5">
                            <span class="mr-3 icon"><i class="fas fa-map-marker-alt"></i></span>
                            <span class="address"><strong>Địa chỉ:</strong>Phương Khuê,Hồng Hưng,Gia Lộc,Hải Dương</span>
                        </li>
                        <li class="mt-3">
                            <span class="mr-3 icon"><i class="fas fa-phone-alt"></i></span>
                            <span class="phone"><strong>Số điện thoại:</strong>0988 857 778</span>
                        </li>
                        <li class="mt-3">
                            <span class="mr-3 icon"><i class="fas fa-envelope"></i></i></span>
                            <span class="email"><strong>Email:</strong>manhtruong2001nt@gmail.com</span>
                        </li>
                    </ul>
                </div>

                <div class="support-customer col-lg col-12">
                    <h3>Hỗ trợ khách hàng</h3>
                    <ul>
                        <li>Giới thiệu</li>
                        <li>Liên Hệ</li>
                        <li>Hệ thống cửa hàng</li>
                        <li>Điều khoản sử dụng </li>
                        <li>Hướng dẫn mua hàng online</li>
                        <li>Kiểm tra đơn hàng</li>
                        <li>Câu hỏi thường gặp</li>
                    </ul>
                </div>

                <div class="policy col-lg col-12">
                    <h3>Chính sách</h3>
                    <ul>
                        <li>Chính sách bảo mật</li>
                        <li>Chính sách quyền riêng tư </li>
                        <li>Chính sách đổi trả hàng </li>
                        <li>Chính sách đặt cọc giữ hàng </li>
                        <li>Chính sách đại lý - CTV</li>
                    </ul>
                </div>

                <div class="support-switchboard col-lg col-12">
                    <h3>Tổng đài hỗ trợ</h3>
                    <ul>
                        <li>Gọi mua hàng : <strong>0988 857 778</strong>(8h-20h)</li>
                        <li>Gọi bảo hành : <strong>0988 857 778</strong>(8h-20h)</li>
                        <li>Gọi khiếu nại : <strong>0988 857 778</strong>(8h-20h)</li>
                    </ul>
                    <div class="payload">
                        <h3>Phương thức thanh toán</h3>
                        <ul>
                            <li><a href=""><img src="https://shopgym.antbone.vn/wp-content/uploads/2023/06/footer_trustbadge.webp" alt=""></a></li>
                           
                        </ul>
                    </div>
                </div>
            </div>
            <div class="container mt-5 col-12">
                <p class="copyright-footer">© Bản quyền thuộc về VIKOI</p>
            </div>
        </section>
    </footer>
   
    <a href="#" class="scroll-to-top"><i class="fa fa-angle-up"></i></a>
    <?php wp_footer(); ?>
    <script>
        var wc_cart_params = {
            ajax_url: '<?php echo esc_js( admin_url( 'admin-ajax.php' ) ); ?>'
        };
    </script>

    <script src="<?php bloginfo('url')?>/wp-content/themes/Gym2/js/action.js"></script>
</body>
</html>

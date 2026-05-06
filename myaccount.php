add_filter( 'woocommerce_account_menu_items', 'custom_final_menu_reorder', 999 );

function custom_final_menu_reorder( $items ) {
    // 1. Định nghĩa lại 6 mục
    $new_items = array(
        'edit-account'    => 'Tài khoản',            
        'orders'          => 'Đơn hàng',             
        'edit-address'    => 'Địa chỉ',              
        'payment-methods' => 'Phương thức thanh toán', 
        'lost-password'   => 'Quên mật khẩu', // Trả lại endpoint chuẩn            
    );

    return $new_items;
}

// 2. Cách cuối cùng: Dùng Javascript để gán link nếu PHP vẫn bị "lỳ"
add_action( 'wp_footer', function() {
    if ( ! is_account_page() ) return;
    ?>
    <script>
        document.querySelectorAll('#my-account-nav a').forEach(a => {
            if (a.innerText.includes('Quên mật khẩu')) a.href = '<?php echo home_url("/my-account/lost-password/"); ?>';
        });
    </script>
    <?php
}, 999 );

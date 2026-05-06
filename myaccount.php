add_filter( 'woocommerce_account_menu_items', 'custom_final_menu_reorder', 999 );

function custom_final_menu_reorder( $items ) {
    // 1. Định nghĩa lại 6 mục
    $new_items = array(
        'edit-account'    => 'Tài khoản',            
        'orders'          => 'Đơn hàng',             
        'edit-address'    => 'Địa chỉ',              
        'payment-methods' => 'Phương thức thanh toán',        
    );

    return $new_items;
}

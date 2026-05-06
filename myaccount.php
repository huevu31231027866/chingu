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

add_filter( 'woocommerce_account_menu_items', 'the365f_remove_wishlist_sidebar', 999 );
function the365f_remove_wishlist_sidebar( $items ) {
    // Gỡ bỏ wishlist dựa trên key thường gặp của các plugin
    unset( $items['wishlist'] ); 
    unset( $items['yith-wishlist'] ); // Nếu dùng plugin YITH
    return $items;
}

/**
 * Gỡ bỏ mục Wishlist khỏi menu WooCommerce (bao gồm cả dropdown header Flatsome)
 */
add_filter( 'woocommerce_account_menu_items', 'the365f_clean_my_account_menu', 999 );
function the365f_clean_my_account_menu( $items ) {
    // Danh sách các key wishlist phổ biến từ các plugin
    $target_keys = array( 'wishlist', 'yith-wishlist', 'ti-wishlist' );
    
    foreach ( $target_keys as $key ) {
        if ( isset( $items[ $key ] ) ) {
            unset( $items[ $key ] );
        }
    }
    
    return $items;
}

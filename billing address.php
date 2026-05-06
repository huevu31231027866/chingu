add_filter( 'woocommerce_billing_fields', 'the365f_clean_billing_fields' );
function the365f_clean_billing_fields( $fields ) {
    // 1. Xóa hoàn toàn các ô dư thừa
    unset($fields['billing_company']);   // Tên công ty
    unset($fields['billing_postcode']);  // Mã bưu điện
    unset($fields['billing_address_2']); // Căn hộ, dãy phòng (dòng 2)

    // 2. Thiết lập lại thứ tự hiển thị: Họ -> Tên -> Quốc gia -> Thành phố -> Địa chỉ -> SĐT -> Email
    $fields['billing_last_name']['priority']  = 10;
    $fields['billing_first_name']['priority'] = 20;
    $fields['billing_country']['priority']    = 30;
    $fields['billing_city']['priority']       = 40;
    $fields['billing_address_1']['priority']  = 50;
    $fields['billing_phone']['priority']      = 60;
    $fields['billing_email']['priority']      = 70;

    return $fields;
}
 

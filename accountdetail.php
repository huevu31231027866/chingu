/**
 * Thêm các trường và sắp xếp thứ tự chuẩn
 */
add_action( 'woocommerce_edit_account_form', 'meichan_final_custom_edit_account' );
function meichan_final_custom_edit_account() {
    $user = wp_get_current_user();
    $phone = get_user_meta( $user->ID, 'account_phone', true );
    $dob   = get_user_meta( $user->ID, 'account_dob', true );
    $gender = get_user_meta( $user->ID, 'gender', true );
    ?>
    
    <!-- Nhóm SĐT và Ngày sinh -->
    <div class="meichan-row-group">
        <p class="form-row form-row-first">
            <label>Số điện thoại</label>
            <input type="tel" class="input-text" name="account_phone" value="<?php echo esc_attr($phone); ?>" placeholder="0xxx xxx xxx">
        </p>
        <p class="form-row form-row-last">
            <label>Ngày sinh</label>
            <input type="date" class="input-text" name="account_dob" value="<?php echo esc_attr($dob); ?>">
        </p>
        <div class="clear"></div>
    </div>

    <!-- Nhóm Giới tính -->
    <div class="meichan-gender-group">
        <label class="main-label">Giới tính</label>
        <div class="gender-selection">
            <label class="gender-label">
                <input type="radio" name="gender" value="male" <?php checked($gender, 'male'); ?>> Male
            </label>
            <label class="gender-label">
                <input type="radio" name="gender" value="female" <?php checked($gender, 'female'); ?>> Female
            </label>
        </div>
    </div>
    <?php
}

// Lưu dữ liệu
add_action( 'woocommerce_save_account_details', 'meichan_save_data_final' );
function meichan_save_data_final( $user_id ) {
    update_user_meta( $user_id, 'account_phone', sanitize_text_field( $_POST['account_phone'] ) );
    update_user_meta( $user_id, 'account_dob', sanitize_text_field( $_POST['account_dob'] ) );
    update_user_meta( $user_id, 'gender', sanitize_text_field( $_POST['gender'] ) );
}

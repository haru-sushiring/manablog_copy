<?php require(dirname(__FILE__) . '/shared.php'); ?>
<style type="text/css">

</style>
<div class="wrap">
    <h1>mblog管理</h1>
    <form method="post" action="options.php">
        <?php
        settings_fields(ORIGINAL_FIELD_GROP_MANAGA);
        do_settings_sections(ORIGINAL_FIELD_GROP_MANAGA);
        wp_enqueue_media();
        ?>
        <table class="form-table">
            <tbody>
                <tr>
                    <th><h3>サイト名の設定</h3></th>
                </tr>
                <tr>
                    <th scope="row">
                        <label>サイト名</label>
                    </th>
                    <td>
                        <?php $field_name = ORIGINAL_FIELD_SITENAME_MAIN; ?>
                        <input type="text"
                               class="regular-text"
                               placeholder="Manablog Copy"
                               id="<?php echo $field_name; ?>"
                               name="<?php echo $field_name; ?>"
                               value="<?php echo esc_attr(get_option($field_name, 'Manablog Copy')); ?>">
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label>サイト名(サブ)</label>
                    </th>
                    <td>
                        <?php $field_name = ORIGINAL_FIELD_SITENAME_SUB; ?>
                        <input type="text"
                               class="regular-text"
                               placeholder="Written by Manabu Bannai"
                               id="<?php echo $field_name; ?>"
                               name="<?php echo $field_name; ?>"
                               value="<?php echo esc_attr(get_option($field_name, 'Written by Manabu Bannai')); ?>">
                    </td>
                </tr>
                <tr>
                    <th><h3>SNSシェアの設定</h3></th>
                </tr>
                <tr>
                    <th scope="row">
                        <label>Facebook App ID(fb:app_id)</label>
                    </th>
                    <td>
                        <?php $field_name = ORIGINAL_FIELD_FACEBOOK_APP_ID; ?>
                        <input type="text"
                               class="regular-text"
                               placeholder="1234561234561"
                               id="<?php echo $field_name; ?>"
                               name="<?php echo $field_name; ?>"
                               value="<?php echo esc_attr(get_option($field_name, '0000000000000')); ?>">
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label>Facebook admins ID(fb:admins)</label>
                    </th>
                    <td>
                        <?php $field_name = ORIGINAL_FIELD_FACEBOOK_ADMINS_ID; ?>
                        <input type="text"
                               class="regular-text"
                               placeholder="1234561234561"
                               id="<?php echo $field_name; ?>"
                               name="<?php echo $field_name; ?>"
                               value="<?php echo esc_attr(get_option($field_name, '0000000000000')); ?>">
                    </td>
                </tr>
                <tr>
                    <th><h3>SNSシェアの設定</h3></th>
                </tr>
                <tr>
                    <th scope="row">
                        <label>TwitterのOGP設定</label>
                    </th>
                    <td>
                        <?php $field_name = ORIGINAL_FIELD_TWITTER; ?>
                        <input type="text"
                               class="regular-text"
                               placeholder="@manabubannai"
                               id="<?php echo $field_name; ?>"
                               name="<?php echo $field_name; ?>"
                               value="<?php echo esc_attr(get_option($field_name, '@manabubannai')); ?>">
                    </td>
                </tr>
                <tr>
                    <th><h3>プロフィール設定</h3></th>
                </tr>
                <tr>
                    <th scope="row">
                        <label>プロフィール画像設定</label>
                    </th>
                    <td>
                        <?php $field_name = ORIGINAL_FIELD_PROFILE_IMG; ?>
                        <?php $option = esc_url(get_option($field_name, '')); ?>
                        <div class="FormImageFieldPreviewArea">
                            <img class="FormImageFieldPreview"
                                 src="<?php echo $option; ?>"
                                 id="<?php echo "{$field_name}-preview"; ?>">
                        </div>

                        <input type="hidden"
                               value="<?php echo $option; ?>"
                               name="<?php echo $field_name; ?>"
                               id="<?php echo "{$field_name}-value"; ?>">

                        <div class="FormImageFieldButtonArea">
                            <input type="button"
                                  class="button FormImageFieldUploadButton js-imageUploadButton"
                                  value="画像を選択"
                                  data-field-id="<?php echo "{$field_name}-value"; ?>"
                                  data-preview-id="<?php echo "{$field_name}-preview"; ?>">
                            <input type="button" 
                                    class="button js-imageClearButton" 
                                    value="クリア"
                                    data-field-id="<?php echo "{$field_name}-value"; ?>"
                                    data-preview-id="<?php echo "{$field_name}-preview"; ?>">
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label>プロフィール名前</label>
                    </th>
                    <td>
                        <?php $field_name = ORIGINAL_FIELD_PROFILE_NAME; ?>
                        <input type="text"
                               class="regular-text"
                               placeholder="Taro Yamada"
                               id="<?php echo $field_name; ?>"
                               name="<?php echo $field_name; ?>"
                               value="<?php echo esc_attr(get_option($field_name, 'Taro Yamada')); ?>">
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label>プロフィール文</label>
                    </th>
                    <td>
                        <?php $field_name = ORIGINAL_FIELD_PROFILE_DESCRIPTION; ?>
                        <textarea rows="4"
                                  class="regular-text"
                                  placeholder="自己紹介です。自己紹介です。&#13;&#10;自己紹介です。自己紹介です。自己紹介です。&#13;&#10;自己紹介です。自己紹介です。自己紹介です。自己紹介です。"<?php /* ← ここをプレースホルダに変更 */ ?>
                                  id="<?php echo $field_name; ?>"
                                  name="<?php echo $field_name; ?>"><?php echo esc_attr(get_option($field_name, '自己紹介です。自己紹介です。自己紹介です。自己紹介です。自己紹介です。自己紹介です。自己紹介です。自己紹介です。自己紹介です。')); ?></textarea>
                    </td>
                </tr>
                <tr>
                    <th><h3>TwitterIDの設定</h3></th>
                </tr>
                <tr>
                    <th scope="row">
                        <label>フッターTwitterIDの設定</label>
                    </th>
                    <td>
                        <?php $field_name = ORIGINAL_FIELD_TWITTER_ID_FOOTER; ?>
                        <input type="text"
                               class="regular-text"
                               placeholder="manabubannai"
                               id="<?php echo $field_name; ?>"
                               name="<?php echo $field_name; ?>"
                               value="<?php echo esc_attr(get_option($field_name, 'manabubannai')); ?>">
                        </td>
                </tr>                                 
                <tr>
                    <th><h3>ピックアップ設定</h3></th>
                </tr>
                <tr>
                    <th scope="row">
                        <label>ピックアップ記事設定</label>
                    </th>
                    <td>
                        <?php $field_name = ORIGINAL_FIELD_PICKUP; ?>
                        <input type="text"
                               class="regular-text"
                               id="<?php echo $field_name; ?>"
                               name="<?php echo $field_name; ?>"
                               value="<?php echo esc_attr(get_option($field_name, '')); ?>">
                        <p class="description">投稿IDを「,（カンマ）」 区切りで3件指定</p>
                    </td>
                </tr>
            </tbody>
        </table>
        <?php submit_button(); ?>
    </form>
</div>
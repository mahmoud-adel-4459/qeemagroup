<?php
/**
 * Required & Recommended Plugins for Qeema Group Theme
 * يتحقق من الإضافات المطلوبة ويعرض تنبيهات التثبيت
 */

if (!defined('ABSPATH')) {
    exit;
}

define('VISIONARY_REQUIRED_PLUGINS', array(
    'advanced-custom-fields' => array(
        'name'     => 'Advanced Custom Fields',
        'slug'     => 'advanced-custom-fields',
        'required' => true,
        'message'  => 'الثيم يستخدم حقول ACF للصفحة الرئيسية والخدمات والمشاريع وإعدادات الثيم.',
        'url'      => 'https://wordpress.org/plugins/advanced-custom-fields/',
    ),
    'one-click-demo-import' => array(
        'name'     => 'One Click Demo Import',
        'slug'     => 'one-click-demo-import',
        'required' => false,
        'message'  => 'لاستيراد المحتوى التجريبي بنقرة واحدة (صفحات، قوائم، محتوى تجريبي).',
        'url'      => 'https://wordpress.org/plugins/one-click-demo-import/',
    ),
));

/**
 * التحقق من وجود الإضافات المطلوبة وعرض تنبيه في لوحة التحكم
 */
function visionary_required_plugins_notice()
{
    $screen = get_current_screen();
    if (!$screen || $screen->id !== 'themes') {
        return;
    }

    $missing = array();
    foreach (VISIONARY_REQUIRED_PLUGINS as $slug => $plugin) {
        if ($plugin['required'] && !visionary_is_plugin_active($slug)) {
            $missing[] = $plugin;
        }
    }

    if (empty($missing)) {
        return;
    }

    $install_url = admin_url('plugin-install.php?s=' . urlencode('Advanced Custom Fields') . '&tab=search&type=term');
    ?>
    <div class="notice notice-warning is-dismissible">
        <p><strong><?php esc_html_e('ثيم Qeema Group:', 'qeema-theme'); ?></strong></p>
        <p><?php esc_html_e('يُنصح بتثبيت الإضافات التالية لاستخدام جميع ميزات الثيم:', 'qeema-theme'); ?></p>
        <ul style="list-style: disc; margin-right: 20px;">
            <?php foreach ($missing as $plugin) : ?>
                <li>
                    <a href="<?php echo esc_url($plugin['url']); ?>" target="_blank" rel="noopener"><?php echo esc_html($plugin['name']); ?></a>
                    — <?php echo esc_html($plugin['message']); ?>
                </li>
            <?php endforeach; ?>
        </ul>
        <p>
            <a href="<?php echo esc_url($install_url); ?>" class="button button-primary"><?php esc_html_e('تثبيت Advanced Custom Fields', 'qeema-theme'); ?></a>
            <a href="<?php echo esc_url(admin_url('plugin-install.php?s=one+click+demo+import&tab=search&type=term')); ?>" class="button"><?php esc_html_e('تثبيت One Click Demo Import', 'qeema-theme'); ?></a>
        </p>
    </div>
    <?php
}

/**
 * التحقق من تفعيل إضافة (بالاسم أو slug)
 */
function visionary_is_plugin_active($slug)
{
    if ($slug === 'advanced-custom-fields') {
        return function_exists('acf_add_local_field_group');
    }
    if ($slug === 'one-click-demo-import') {
        return class_exists('OCDI\OneClickDemoImport');
    }
    return false;
}

add_action('admin_notices', 'visionary_required_plugins_notice');

/**
 * إرجاع قائمة الإضافات المطلوبة للمطورين
 */
function visionary_get_required_plugins()
{
    return VISIONARY_REQUIRED_PLUGINS;
}

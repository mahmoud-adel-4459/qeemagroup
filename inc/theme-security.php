<?php
/**
 * تحسينات أمان الثيم (Theme Security Hardening)
 * - منع التنفيذ المباشر للملفات
 * - إزالة إصدار ووردبريس من الـ head (اختياري)
 * - تأمين الـ redirect بعد النماذج
 */

defined('ABSPATH') || exit;

/**
 * إزالة عرض إصدار ووردبريس في الـ head (تقليل سطح الهجوم)
 */
function visionary_remove_version_strings($src)
{
    if (strpos($src, 'ver=' . get_bloginfo('version'))) {
        $src = remove_query_arg('ver', $src);
    }
    return $src;
}
add_filter('style_loader_src', 'visionary_remove_version_strings', 9999);
add_filter('script_loader_src', 'visionary_remove_version_strings', 9999);

/**
 * إزالة meta generator من الـ head
 */
function visionary_remove_wp_version_meta()
{
    remove_action('wp_head', 'wp_generator');
}
add_action('init', 'visionary_remove_wp_version_meta');

/**
 * التأكد من أن redirectات النماذج تستخدم wp_safe_redirect (مُطبّق بالفعل في contact, quotation, vendor, careers)
 * هذا الملف يوثّق أن الثيم يلتزم بـ: nonce، sanitize، escape، و safe_redirect في النماذج.
 */

<?php
/**
 * Custom Nav Walker للقائمة الرئيسية — دعم قوائم فرعية (dropdown) بنفس تصميم الهيدر
 * يستخدم مع wp_nav_menu في الهيدر والموبايل
 */

if (!defined('ABSPATH')) {
    exit;
}

class Visionary_Nav_Walker extends Walker_Nav_Menu {

    public function start_lvl(&$output, $depth = 0, $args = null) {
        if (isset($args->item_spacing) && 'discard' === $args->item_spacing) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        $indent = str_repeat($t, $depth);

        if ($depth === 0 && isset($args->visionary_desktop) && $args->visionary_desktop) {
            $output .= "{$n}{$indent}<div class=\"absolute top-full pt-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 translate-y-1 group-hover:translate-y-0 right-0\">";
            $output .= "{$n}{$indent}<div class=\"header-dropdown bg-white rounded-2xl shadow-xl border border-gray-100 min-w-[300px] overflow-hidden\">";
            $output .= "{$n}{$indent}<div class=\"px-5 py-3.5 bg-gray-50 border-b border-gray-100\">";
            $output .= "{$n}{$indent}<p class=\"text-xs font-bold uppercase tracking-wider text-blue-600\">" . esc_html__('اختر الخدمة', 'qeema-theme') . "</p>";
            $output .= "{$n}{$indent}<p class=\"text-sm text-gray-500 mt-0.5\">" . esc_html__('حلول هندسية متكاملة', 'qeema-theme') . "</p>";
            $output .= "{$n}{$indent}</div>";
            $output .= "{$n}{$indent}<div class=\"py-2\">";
        } else {
            $output .= "{$n}{$indent}<ul class=\"sub-menu space-y-1 pl-4\">{$n}";
        }
    }

    public function end_lvl(&$output, $depth = 0, $args = null) {
        if (isset($args->item_spacing) && 'discard' === $args->item_spacing) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        $indent = str_repeat($t, $depth);

        if ($depth === 0 && isset($args->visionary_desktop) && $args->visionary_desktop) {
            $archive = get_post_type_archive_link('service');
            $output .= "{$n}{$indent}</div>";
            $output .= "{$n}{$indent}<div class=\"px-5 py-2.5 bg-gray-50 border-t border-gray-100\">";
            $output .= "{$n}{$indent}<a href=\"" . esc_url($archive ?: home_url('/#services')) . "\" class=\"text-xs font-semibold text-blue-600 hover:text-blue-700 transition\">" . esc_html__('عرض كل الخدمات ←', 'qeema-theme') . "</a>";
            $output .= "{$n}{$indent}</div>";
            $output .= "{$n}{$indent}</div>";
            $output .= "{$n}{$indent}</div>";
        } else {
            $output .= "{$n}{$indent}</ul>{$n}";
        }
    }

    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        if (isset($args->item_spacing) && 'discard' === $args->item_spacing) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        $indent = str_repeat($t, $depth);

        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        $is_desktop = $depth === 0 && isset($args->visionary_desktop) && $args->visionary_desktop;
        $has_children = in_array('menu-item-has-children', $classes, true);

        if ($is_desktop && $has_children) {
            $output .= $indent . '<li class="' . esc_attr(implode(' ', $classes)) . '"><div class="relative group">';
            $output .= '<button type="button" class="flex items-center gap-1 px-5 py-2.5 rounded-xl font-semibold text-sm text-gray-900 hover:text-blue-600 hover:bg-blue-50 transition border-b-2 border-transparent hover:border-blue-600">';
            $output .= esc_html($item->title);
            $output .= '<svg class="w-4 h-4 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>';
            $output .= '</button>';
            return;
        }

        if ($depth === 1 && isset($args->visionary_desktop) && $args->visionary_desktop) {
            $atts = array();
            $atts['href']   = !empty($item->url) ? $item->url : '#';
            $atts['class']  = 'header-dropdown-item flex items-center gap-4 px-5 py-3 text-right hover:bg-blue-50 transition group/item border-r-4 border-transparent hover:border-blue-500';
            $output .= $indent . '<a ' . $this->build_atts($atts) . '>';
            $output .= '<span class="w-9 h-9 rounded-lg bg-blue-100 text-blue-600 flex items-center justify-center text-sm font-bold flex-shrink-0 group-hover/item:bg-blue-600 group-hover/item:text-white transition">●</span>';
            $output .= '<span class="flex-1 min-w-0"><span class="block font-semibold text-gray-900 group-hover/item:text-blue-600 transition text-sm">' . esc_html($item->title) . '</span></span>';
            $output .= '<svg class="w-4 h-4 text-gray-400 group-hover/item:text-blue-500 flex-shrink-0 rtl:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>';
            $output .= '</a>';
            return;
        }

        if ($depth === 0 && $is_desktop) {
            $atts = array();
            $atts['href']   = !empty($item->url) ? $item->url : '#';
            $atts['class']  = 'px-5 py-2.5 rounded-xl font-semibold text-sm text-gray-900 hover:text-blue-600 hover:bg-blue-50 transition';
            $output .= $indent . '<li class="' . esc_attr(implode(' ', $classes)) . '"><a ' . $this->build_atts($atts) . '>' . esc_html($item->title) . '</a>';
            return;
        }

        if (isset($args->visionary_mobile) && $args->visionary_mobile) {
            $atts = array();
            $atts['href']   = !empty($item->url) ? $item->url : '#';
            $atts['class']  = 'block py-3.5 px-4 font-semibold text-gray-900 hover:bg-blue-50 hover:text-blue-600 rounded-xl transition';
            if ($depth > 0) {
                $atts['class'] .= ' pl-8';
            }
            $output .= $indent . '<li class="' . esc_attr(implode(' ', $classes)) . '"><a ' . $this->build_atts($atts) . '>' . esc_html($item->title) . '</a>';
            return;
        }

        $output .= $indent . '<li class="' . esc_attr(implode(' ', $classes)) . '"><a href="' . esc_url($item->url) . '" class="px-5 py-2.5 rounded-xl font-semibold text-sm text-gray-900 hover:text-blue-600 hover:bg-blue-50 transition">' . esc_html($item->title) . '</a>';
    }

    public function end_el(&$output, $item, $depth = 0, $args = null) {
        $is_desktop = $depth === 0 && isset($args->visionary_desktop) && $args->visionary_desktop;
        $has_children = in_array('menu-item-has-children', (array) $item->classes, true);
        if ($depth === 1 && isset($args->visionary_desktop) && $args->visionary_desktop) {
            return;
        }
        if ($is_desktop && $has_children) {
            $output .= '</div></li>';
        } else {
            $output .= '</li>';
        }
    }

    protected function build_atts($atts = array()) {
        $html = '';
        foreach ($atts as $k => $v) {
            $html .= ' ' . esc_attr($k) . '="' . esc_attr($v) . '"';
        }
        return $html;
    }
}

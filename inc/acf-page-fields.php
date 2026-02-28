<?php
/**
 * حقول ACF للصفحات — لتعديل النصوص من لوحة تحكم ووردبريس (تحرير الصفحة)
 * تظهر عند تحرير: الصفحة الرئيسية، من نحن، تواصل معنا
 */

if (!defined('ABSPATH') || !function_exists('acf_add_local_field_group')) {
    return;
}

// ——— الصفحة الرئيسية (التي معينة في الإعدادات كـ Homepage) ———
acf_add_local_field_group(array(
    'key' => 'group_page_front_editable',
    'title' => __('نصوص الصفحة الرئيسية', 'qeema-theme'),
    'fields' => array(
        array(
            'key' => 'field_fp_hero_tab',
            'label' => __('قسم البانر (الهيرو)', 'qeema-theme'),
            'type' => 'tab',
        ),
        array(
            'key' => 'field_fp_hero_tag',
            'label' => __('شعار صغير فوق العنوان', 'qeema-theme'),
            'name' => 'hero_tag',
            'type' => 'text',
            'default_value' => 'نبتكر لغدٍ أفضل',
        ),
        array(
            'key' => 'field_fp_hero_line1',
            'label' => __('سطر العنوان الأول', 'qeema-theme'),
            'name' => 'hero_heading_1',
            'type' => 'text',
            'default_value' => 'نحوّل الرؤى إلى',
        ),
        array(
            'key' => 'field_fp_hero_line2',
            'label' => __('سطر العنوان الرئيسي (ملوّن)', 'qeema-theme'),
            'name' => 'hero_heading_2',
            'type' => 'text',
            'default_value' => 'واقع ملموس',
        ),
        array(
            'key' => 'field_fp_hero_line3',
            'label' => __('سطر العنوان الفرعي', 'qeema-theme'),
            'name' => 'hero_heading_3',
            'type' => 'text',
            'default_value' => 'هندسة متكاملة.. دقة لا متناهية',
        ),
        array(
            'key' => 'field_fp_hero_desc',
            'label' => __('وصف البانر', 'qeema-theme'),
            'name' => 'hero_description',
            'type' => 'textarea',
            'rows' => 3,
            'default_value' => 'شريكك الهندسي الموثوق لتصميم وإدارة مشاريعك باحترافية. ندمج الإبداع المعماري مع الدقة الإنشائية لضمان نتائج تتجاوز التوقعات.',
        ),
        array(
            'key' => 'field_fp_cta_primary',
            'label' => __('نص الزر الرئيسي', 'qeema-theme'),
            'name' => 'cta_primary_text',
            'type' => 'text',
            'default_value' => 'ابدأ مشروعك',
        ),
        array(
            'key' => 'field_fp_cta_secondary',
            'label' => __('نص الزر الثانوي', 'qeema-theme'),
            'name' => 'cta_secondary_text',
            'type' => 'text',
            'default_value' => 'أعمالنا',
        ),
        array(
            'key' => 'field_fp_trust_label',
            'label' => __('نص "عميل يثق بنا"', 'qeema-theme'),
            'name' => 'trust_label',
            'type' => 'text',
            'default_value' => 'عميل يثق بنا',
        ),
        array(
            'key' => 'field_fp_experience_value',
            'label' => __('قيمة "سنوات الخبرة" (مثل 15+)', 'qeema-theme'),
            'name' => 'experience_value',
            'type' => 'text',
            'default_value' => '15+',
        ),
        array(
            'key' => 'field_fp_experience_label',
            'label' => __('نص تحت سنوات الخبرة', 'qeema-theme'),
            'name' => 'experience_label',
            'type' => 'text',
            'default_value' => 'عاماً من الخبرة',
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'page_type',
                'operator' => '==',
                'value' => 'front_page',
            ),
        ),
    ),
));

// ——— صفحة من نحن ———
acf_add_local_field_group(array(
    'key' => 'group_page_about_editable',
    'title' => __('نصوص صفحة من نحن', 'qeema-theme'),
    'fields' => array(
        array(
            'key' => 'field_about_hero_tab',
            'label' => __('بانر الصفحة', 'qeema-theme'),
            'type' => 'tab',
        ),
        array(
            'key' => 'field_about_hero_title',
            'label' => __('عنوان البانر', 'qeema-theme'),
            'name' => 'hero_title',
            'type' => 'text',
            'default_value' => 'نحن نصمم المستقبل بقيم راسخة وخبرة عميقة',
        ),
        array(
            'key' => 'field_about_hero_subtitle',
            'label' => __('وصف البانر', 'qeema-theme'),
            'name' => 'hero_subtitle',
            'type' => 'textarea',
            'rows' => 2,
            'default_value' => 'شريكك الهندسي الموثوق. حلول متكاملة تجمع بين الجودة والابتكار والكفاءة لتشكيل عالم أفضل.',
        ),
        array(
            'key' => 'field_about_story_tab',
            'label' => __('قسم قصتنا', 'qeema-theme'),
            'type' => 'tab',
        ),
        array(
            'key' => 'field_about_story_label',
            'label' => __('تسمية القسم (مثل: قصتنا)', 'qeema-theme'),
            'name' => 'story_label',
            'type' => 'text',
            'default_value' => 'قصتنا',
        ),
        array(
            'key' => 'field_about_story_heading',
            'label' => __('عنوان القسم', 'qeema-theme'),
            'name' => 'story_heading',
            'type' => 'text',
            'default_value' => 'شراكة حقيقية.. لا مجرد خدمة',
        ),
        array(
            'key' => 'field_about_story_content',
            'label' => __('محتوى القسم (نص أو فقرات)', 'qeema-theme'),
            'name' => 'story_content',
            'type' => 'wysiwyg',
            'default_value' => 'تأسست شركتنا على مبدأ بسيط ولكنه قوي: أن الاستشارات الهندسية يجب أن تكون شراكة حقيقية، وليست مجرد خدمة. انطلقنا برؤية تهدف إلى سد الفجوة بين التصاميم الطموحة والتنفيذ الواقعي على الأرض.',
        ),
        array(
            'key' => 'field_about_story_cta',
            'label' => __('نص رابط "تواصل معنا"', 'qeema-theme'),
            'name' => 'story_cta_text',
            'type' => 'text',
            'default_value' => 'تواصل معنا لنبدأ الرحلة',
        ),
        array(
            'key' => 'field_about_vision_tab',
            'label' => __('الرؤية والرسالة', 'qeema-theme'),
            'type' => 'tab',
        ),
        array(
            'key' => 'field_about_vision_heading',
            'label' => __('عنوان قسم الرؤية والرسالة', 'qeema-theme'),
            'name' => 'vision_mission_heading',
            'type' => 'text',
            'default_value' => 'ما الذي يحركنا؟',
        ),
        array(
            'key' => 'field_about_vision_intro',
            'label' => __('نص توضيحي تحت العنوان', 'qeema-theme'),
            'name' => 'vision_mission_intro',
            'type' => 'text',
            'default_value' => 'بوصلتنا نحو المستقبل وهدفنا الذي لا نحيد عنه',
        ),
        array(
            'key' => 'field_about_vision_text',
            'label' => __('نص الرؤية', 'qeema-theme'),
            'name' => 'vision_text',
            'type' => 'textarea',
            'rows' => 3,
        ),
        array(
            'key' => 'field_about_mission_text',
            'label' => __('نص الرسالة', 'qeema-theme'),
            'name' => 'mission_text',
            'type' => 'textarea',
            'rows' => 3,
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'page_template',
                'operator' => '==',
                'value' => 'page-about.php',
            ),
        ),
    ),
));

// ——— صفحة تواصل معنا ———
acf_add_local_field_group(array(
    'key' => 'group_page_contact_editable',
    'title' => __('نصوص ومعلومات صفحة تواصل معنا', 'qeema-theme'),
    'fields' => array(
        array(
            'key' => 'field_contact_hero_tab',
            'label' => __('بانر الصفحة', 'qeema-theme'),
            'type' => 'tab',
        ),
        array(
            'key' => 'field_contact_hero_title',
            'label' => __('عنوان البانر', 'qeema-theme'),
            'name' => 'hero_title',
            'type' => 'text',
            'default_value' => 'تواصل معنا',
        ),
        array(
            'key' => 'field_contact_hero_desc',
            'label' => __('وصف البانر', 'qeema-theme'),
            'name' => 'hero_description',
            'type' => 'text',
            'default_value' => 'نحن هنا لمساعدتك في تحقيق مشروعك الهندسي. تواصل معنا اليوم',
        ),
        array(
            'key' => 'field_contact_info_tab',
            'label' => __('معلومات التواصل', 'qeema-theme'),
            'type' => 'tab',
        ),
        array(
            'key' => 'field_contact_phone',
            'label' => __('رقم الهاتف', 'qeema-theme'),
            'name' => 'contact_phone',
            'type' => 'text',
            'default_value' => '01009148383',
        ),
        array(
            'key' => 'field_contact_email',
            'label' => __('البريد الإلكتروني', 'qeema-theme'),
            'name' => 'contact_email',
            'type' => 'email',
            'default_value' => 'info@qeema-group.com',
        ),
        array(
            'key' => 'field_contact_address',
            'label' => __('العنوان', 'qeema-theme'),
            'name' => 'contact_address',
            'type' => 'textarea',
            'rows' => 2,
            'default_value' => "٣ مكرم عبيد - مدينة نصر - القاهرة\n(بجوار محجوب)",
        ),
        array(
            'key' => 'field_contact_work_hours',
            'label' => __('ساعات العمل', 'qeema-theme'),
            'name' => 'work_hours',
            'type' => 'text',
            'default_value' => 'الأحد - الخميس، 8:00 ص - 5:00 م',
        ),
        array(
            'key' => 'field_contact_form_heading',
            'label' => __('عنوان نموذج الرسالة', 'qeema-theme'),
            'name' => 'form_heading',
            'type' => 'text',
            'default_value' => 'أرسل لنا رسالة',
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'page_template',
                'operator' => '==',
                'value' => 'page-contact.php',
            ),
        ),
    ),
));

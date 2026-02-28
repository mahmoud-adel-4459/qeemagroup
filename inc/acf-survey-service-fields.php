<?php
/**
 * حقول ACF لمحتوى صفحة خدمة هندسة المساحة (صفحة منفردة)
 * تظهر عند تحرير أي خدمة؛ املأها لخدمة المساحة فقط. الباقي يترك فارغاً.
 */
if (!defined('ABSPATH') || !function_exists('acf_add_local_field_group')) {
    return;
}

acf_add_local_field_group(array(
    'key' => 'group_survey_service_content',
    'title' => __('محتوى صفحة هندسة المساحة (تفصيلي)', 'qeema-theme'),
    'fields' => array(
        array('key' => 'tab_survey_intro', 'label' => __('تمهيد', 'qeema-theme'), 'type' => 'tab'),
        array('key' => 'field_survey_intro_heading', 'label' => __('هيرو — السطر الأول', 'qeema-theme'), 'name' => 'survey_intro_heading', 'type' => 'text', 'default_value' => 'المساحة ليست مجرد قياسات', 'instructions' => __('يظهر في الهيرو أعلى الصفحة.', 'qeema-theme')),
        array('key' => 'field_survey_intro_highlight', 'label' => __('هيرو — السطر الثاني (بتدرج أزرق)', 'qeema-theme'), 'name' => 'survey_intro_highlight', 'type' => 'text', 'default_value' => 'هي أساس اليقين لمشروعك'),
        array('key' => 'field_survey_intro_text', 'label' => __('هيرو — النص تحت العنوان', 'qeema-theme'), 'name' => 'survey_intro_text', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'بيانات مساحية دقيقة تعني تصميمًا سليمًا، وتراخيص سريعة، وتنفيذًا خاليًا من النزاعات. نحن نمنحك هذا اليقين عبر فريق معتمد وأحدث تقنيات GNSS/LiDAR/Drone.'),

        array('key' => 'tab_survey_why', 'label' => __('لماذا الدقة مصيرية؟', 'qeema-theme'), 'type' => 'tab'),
        array('key' => 'field_survey_why_heading', 'label' => __('عنوان القسم', 'qeema-theme'), 'name' => 'survey_why_heading', 'type' => 'text', 'default_value' => 'لماذا الدقة المساحية مصيرية؟'),
        array('key' => 'field_survey_why_sub', 'label' => __('نص تحت العنوان', 'qeema-theme'), 'name' => 'survey_why_sub', 'type' => 'text', 'default_value' => 'تجنب النزاعات والهدر المالي يبدأ ببيانات مكانية صحيحة.'),
        array('key' => 'field_survey_why_1_title', 'label' => __('البطاقة 1 — العنوان', 'qeema-theme'), 'name' => 'survey_why_1_title', 'type' => 'text', 'default_value' => 'تجنب نزاعات الحدود'),
        array('key' => 'field_survey_why_1_text', 'label' => __('البطاقة 1 — النص', 'qeema-theme'), 'name' => 'survey_why_1_text', 'type' => 'textarea', 'rows' => 2, 'default_value' => 'تحديد قانوني دقيق وحدود ملكية مؤكدة تجنبك قضايا التعديات وتوقف الأعمال المكلف، مما يمنحك راحة البال القانونية.'),
        array('key' => 'field_survey_why_2_title', 'label' => __('البطاقة 2 — العنوان', 'qeema-theme'), 'name' => 'survey_why_2_title', 'type' => 'text', 'default_value' => 'ضبط كميات الحفر والردم'),
        array('key' => 'field_survey_why_2_text', 'label' => __('البطاقة 2 — النص', 'qeema-theme'), 'name' => 'survey_why_2_text', 'type' => 'textarea', 'rows' => 2, 'default_value' => 'رفع طبوغرافي دقيق يحسب كميات الحفر والردم بدقة متناهية، مما يضبط ميزانية المقاولات ويمنع الهدر المالي في المواد.'),
        array('key' => 'field_survey_why_3_title', 'label' => __('البطاقة 3 — العنوان', 'qeema-theme'), 'name' => 'survey_why_3_title', 'type' => 'text', 'default_value' => 'سرعة إصدار التراخيص'),
        array('key' => 'field_survey_why_3_text', 'label' => __('البطاقة 3 — النص', 'qeema-theme'), 'name' => 'survey_why_3_text', 'type' => 'textarea', 'rows' => 2, 'default_value' => 'مخططات مطابقة تمامًا لاشتراطات البلدية والأمانات، مما يضمن اعتمادًا سريعًا وتجنب رفض المعاملات.'),
        array('key' => 'field_survey_why_cta', 'label' => __('نص زر CTA', 'qeema-theme'), 'name' => 'survey_why_cta', 'type' => 'text', 'default_value' => 'احجز رفعًا طبوغرافيًا'),

        array('key' => 'tab_survey_main', 'label' => __('خدماتنا المساحية — عنوان القسم', 'qeema-theme'), 'type' => 'tab'),
        array('key' => 'field_survey_main_heading', 'label' => __('عنوان قسم الخدمات', 'qeema-theme'), 'name' => 'survey_main_heading', 'type' => 'text', 'default_value' => 'خدماتنا المساحية المتكاملة'),
        array('key' => 'field_survey_main_sub', 'label' => __('وصف تحت العنوان', 'qeema-theme'), 'name' => 'survey_main_sub', 'type' => 'textarea', 'rows' => 2, 'default_value' => 'نستخدم أحدث التقنيات لتقديم كافة الحلول المساحية ضمن قسمين أساسيين، تحت كل قسم خدمات متخصصة:'),

        array('key' => 'tab_survey_s1', 'label' => __('القسم الأول — المساحة الهندسية والتقليدية', 'qeema-theme'), 'type' => 'tab'),
        array('key' => 'field_survey_s1_title', 'label' => __('عنوان القسم الأول', 'qeema-theme'), 'name' => 'survey_s1_title', 'type' => 'text', 'default_value' => 'المساحة الهندسية والتقليدية (Engineering & Traditional Surveying)'),
        array('key' => 'field_survey_s1_desc', 'label' => __('وصف القسم الأول', 'qeema-theme'), 'name' => 'survey_s1_desc', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'الأعمال الأساسية التي تعتمد عليها الإنشاءات والمشاريع الميدانية باستخدام أجهزة الرصد الأرضي والفضائي الأساسية.'),
        array('key' => 'field_survey_s1_terms', 'label' => __('المصطلحات التقنية (سطر واحد، مفصولة بفاصلة)', 'qeema-theme'), 'name' => 'survey_s1_terms', 'type' => 'text', 'default_value' => 'Total Station, GPS/GNSS, Leveling, DTM'),
        array('key' => 'field_survey_s1_cap1', 'label' => __('نص فوق الصورة — سطر 1', 'qeema-theme'), 'name' => 'survey_s1_cap1', 'type' => 'text', 'default_value' => 'المساحة الهندسية والتقليدية'),
        array('key' => 'field_survey_s1_cap2', 'label' => __('نص فوق الصورة — سطر 2', 'qeema-theme'), 'name' => 'survey_s1_cap2', 'type' => 'text', 'default_value' => 'أجهزة الرصد الأرضي والفضائي الأساسية'),
        array('key' => 'field_survey_s1_image', 'label' => __('صورة القسم الأول (المساحة الهندسية والتقليدية)', 'qeema-theme'), 'name' => 'survey_s1_image', 'type' => 'image', 'return_format' => 'array', 'preview_size' => 'medium', 'instructions' => __('إن ترك فارغاً تُستخدم صورة "تفاصيل الخدمة" أو الافتراضية.', 'qeema-theme')),
        array('key' => 'field_s1_services_img_help', 'label' => __('صور الخدمات الفرعية الخمس (عند استخدام القائمة الافتراضية)', 'qeema-theme'), 'type' => 'message', 'message' => __('يمكنك تغيير صورة كل خدمة فرعية من الحقول التالية. 1: شبكات التحكم — 2: الرفع الطبوغرافي — 3: الميزانيات الشبكية — 4: الرفع التفصيلي — 5: مساحة الطرق.', 'qeema-theme')),
        array('key' => 'field_section_1_service_1_image', 'label' => __('صورة الخدمة 1 — إنشاء شبكات المثلثات والتحكم الأرضي', 'qeema-theme'), 'name' => 'section_1_service_1_image', 'type' => 'image', 'return_format' => 'array', 'preview_size' => 'medium'),
        array('key' => 'field_section_1_service_2_image', 'label' => __('صورة الخدمة 2 — الرفع الطبوغرافي الشامل', 'qeema-theme'), 'name' => 'section_1_service_2_image', 'type' => 'image', 'return_format' => 'array', 'preview_size' => 'medium'),
        array('key' => 'field_section_1_service_3_image', 'label' => __('صورة الخدمة 3 — الميزانيات الشبكية وحساب الكميات', 'qeema-theme'), 'name' => 'section_1_service_3_image', 'type' => 'image', 'return_format' => 'array', 'preview_size' => 'medium'),
        array('key' => 'field_section_1_service_4_image', 'label' => __('صورة الخدمة 4 — الرفع المساحي التفصيلي', 'qeema-theme'), 'name' => 'section_1_service_4_image', 'type' => 'image', 'return_format' => 'array', 'preview_size' => 'medium'),
        array('key' => 'field_section_1_service_5_image', 'label' => __('صورة الخدمة 5 — مساحة الطرق والبنية التحتية', 'qeema-theme'), 'name' => 'section_1_service_5_image', 'type' => 'image', 'return_format' => 'array', 'preview_size' => 'medium'),
        array('key' => 'field_survey_s1_services', 'label' => __('قائمة الخدمات الفرعية (بديل مرن — إضافة عناصر يغيّر القائمة بالكامل)', 'qeema-theme'), 'name' => 'survey_s1_services', 'type' => 'repeater', 'layout' => 'block', 'button_label' => __('إضافة خدمة', 'qeema-theme'), 'instructions' => __('إن ترك فارغاً تظهر الخدمات الافتراضية الخمس مع صورها من الحقول أعلاه. إن أضفت عناصر هنا تُعرض بدلاً منها وكل عنصر يمكن أن يحتوي على صورة.', 'qeema-theme'),
            'sub_fields' => array(
                array('key' => 'f_s1s_image', 'label' => __('صورة الخدمة', 'qeema-theme'), 'name' => 'image', 'type' => 'image', 'return_format' => 'array', 'preview_size' => 'medium'),
                array('key' => 'f_s1s_title_ar', 'label' => __('العنوان (عربي)', 'qeema-theme'), 'name' => 'title_ar', 'type' => 'text'),
                array('key' => 'f_s1s_title_en', 'label' => __('العنوان (إنجليزي بين قوسين)', 'qeema-theme'), 'name' => 'title_en', 'type' => 'text'),
                array('key' => 'f_s1s_description', 'label' => __('الوصف المختصر', 'qeema-theme'), 'name' => 'description', 'type' => 'textarea', 'rows' => 2),
            ),
        ),

        array('key' => 'tab_survey_s2', 'label' => __('القسم الثاني — المساحة المتقدمة', 'qeema-theme'), 'type' => 'tab'),
        array('key' => 'field_survey_s2_title', 'label' => __('عنوان القسم الثاني', 'qeema-theme'), 'name' => 'survey_s2_title', 'type' => 'text', 'default_value' => 'المساحة المتقدمة والجيوماتكس (Advanced Surveying & Geomatics)'),
        array('key' => 'field_survey_s2_desc', 'label' => __('وصف القسم الثاني', 'qeema-theme'), 'name' => 'survey_s2_desc', 'type' => 'textarea', 'rows' => 2, 'default_value' => 'حلول ذكية تعتمد على التكنولوجيا الرقمية، الاستشعار عن بعد، والنمذجة ثلاثية الأبعاد.'),
        array('key' => 'field_survey_s2_cap1', 'label' => __('نص فوق صورة القسم الثاني — سطر 1', 'qeema-theme'), 'name' => 'survey_s2_cap1', 'type' => 'text', 'default_value' => 'تقنيات رقمية واستشعار عن بعد'),
        array('key' => 'field_survey_s2_cap2', 'label' => __('نص فوق صورة القسم الثاني — سطر 2', 'qeema-theme'), 'name' => 'survey_s2_cap2', 'type' => 'text', 'default_value' => 'النمذجة ثلاثية الأبعاد والجيوماتكس'),
        array('key' => 'field_survey_s2_image', 'label' => __('صورة القسم الثاني', 'qeema-theme'), 'name' => 'survey_s2_image', 'type' => 'image', 'return_format' => 'array', 'preview_size' => 'medium'),

        array('key' => 'tab_survey_sub_services', 'label' => __('الخدمات الفرعية (تحت القسم الثاني)', 'qeema-theme'), 'type' => 'tab'),
        array('key' => 'field_s1_img_help', 'label' => __('صور الخدمات الفرعية الست (إن لم تستخدم القائمة المرنة أدناه)', 'qeema-theme'), 'type' => 'message', 'message' => __('يمكنك تغيير صورة كل خدمة فرعية من الحقول التالية. الخدمة 1: المسح بالليزر — 2: GIS — 3: الاستشعار عن بعد — 4: النمذجة الجيوديسية — 5: المسح الجوي — 6: المساحة المائية.', 'qeema-theme')),
        array('key' => 'field_section_2_service_1_image', 'label' => __('صورة الخدمة الفرعية 1 — المسح بالليزر ثلاثي الأبعاد', 'qeema-theme'), 'name' => 'section_2_service_1_image', 'type' => 'image', 'return_format' => 'array', 'preview_size' => 'medium'),
        array('key' => 'field_section_2_service_2_image', 'label' => __('صورة الخدمة الفرعية 2 — نظم المعلومات الجغرافية GIS', 'qeema-theme'), 'name' => 'section_2_service_2_image', 'type' => 'image', 'return_format' => 'array', 'preview_size' => 'medium'),
        array('key' => 'field_section_2_service_3_image', 'label' => __('صورة الخدمة الفرعية 3 — الاستشعار عن بعد', 'qeema-theme'), 'name' => 'section_2_service_3_image', 'type' => 'image', 'return_format' => 'array', 'preview_size' => 'medium'),
        array('key' => 'field_section_2_service_4_image', 'label' => __('صورة الخدمة الفرعية 4 — النمذجة الجيوديسية ونقاط المرجعية', 'qeema-theme'), 'name' => 'section_2_service_4_image', 'type' => 'image', 'return_format' => 'array', 'preview_size' => 'medium'),
        array('key' => 'field_section_2_service_5_image', 'label' => __('صورة الخدمة الفرعية 5 — المسح الجوي / الدرون', 'qeema-theme'), 'name' => 'section_2_service_5_image', 'type' => 'image', 'return_format' => 'array', 'preview_size' => 'medium'),
        array('key' => 'field_section_2_service_6_image', 'label' => __('صورة الخدمة الفرعية 6 — المساحة المائية', 'qeema-theme'), 'name' => 'section_2_service_6_image', 'type' => 'image', 'return_format' => 'array', 'preview_size' => 'medium'),
        array('key' => 'field_survey_sub_services', 'label' => __('قائمة الخدمات الفرعية (بديل مرن)', 'qeema-theme'), 'name' => 'survey_sub_services', 'type' => 'repeater', 'layout' => 'block', 'button_label' => __('إضافة خدمة فرعية', 'qeema-theme'), 'instructions' => __('إن أضفت عناصر هنا تُعرض بدل الست الثابتة أعلاه. كل عنصر يمكن أن يحتوي على صورة وعنوان ووصف.', 'qeema-theme'),
            'sub_fields' => array(
                array('key' => 'f_ss_title_ar', 'label' => __('العنوان (عربي)', 'qeema-theme'), 'name' => 'title_ar', 'type' => 'text'),
                array('key' => 'f_ss_title_en', 'label' => __('العنوان (إنجليزي بين قوسين)', 'qeema-theme'), 'name' => 'title_en', 'type' => 'text'),
                array('key' => 'f_ss_description', 'label' => __('الوصف', 'qeema-theme'), 'name' => 'description', 'type' => 'textarea', 'rows' => 3),
                array('key' => 'f_ss_terms', 'label' => __('المصطلحات التقنية (مفصولة بفاصلة)', 'qeema-theme'), 'name' => 'terms', 'type' => 'text'),
                array('key' => 'f_ss_image', 'label' => __('الصورة', 'qeema-theme'), 'name' => 'image', 'type' => 'image', 'return_format' => 'array', 'preview_size' => 'medium'),
                array('key' => 'f_ss_cap1', 'label' => __('نص فوق الصورة — سطر 1', 'qeema-theme'), 'name' => 'cap1', 'type' => 'text'),
                array('key' => 'f_ss_cap2', 'label' => __('نص فوق الصورة — سطر 2', 'qeema-theme'), 'name' => 'cap2', 'type' => 'text'),
                array('key' => 'f_ss_notice', 'label' => __('تنبيه (مثل: متاح بفرع السعودية فقط) — اترك فارغاً إن لم يكن مطلوباً', 'qeema-theme'), 'name' => 'notice', 'type' => 'text'),
            ),
        ),

        array('key' => 'tab_survey_process', 'label' => __('منهجية العمل', 'qeema-theme'), 'type' => 'tab'),
        array('key' => 'field_survey_process_heading', 'label' => __('عنوان منهجية العمل', 'qeema-theme'), 'name' => 'survey_process_heading', 'type' => 'text', 'default_value' => 'منهجية العمل'),
        array('key' => 'field_survey_process_sub', 'label' => __('نص تحت العنوان', 'qeema-theme'), 'name' => 'survey_process_sub', 'type' => 'text', 'default_value' => 'خطوات منظمة تضمن دقة النتائج وسرعة التسليم.'),
        array('key' => 'field_survey_process_steps', 'label' => __('الخطوات', 'qeema-theme'), 'name' => 'survey_process_steps', 'type' => 'repeater', 'layout' => 'table', 'button_label' => __('إضافة خطوة', 'qeema-theme'),
            'sub_fields' => array(
                array('key' => 'f_sp_title', 'label' => __('العنوان', 'qeema-theme'), 'name' => 'title', 'type' => 'text'),
                array('key' => 'f_sp_desc', 'label' => __('الوصف', 'qeema-theme'), 'name' => 'description', 'type' => 'textarea', 'rows' => 2),
            ),
        ),

        array('key' => 'tab_survey_outputs', 'label' => __('مخرجات الخدمة', 'qeema-theme'), 'type' => 'tab'),
        array('key' => 'field_survey_outputs_heading', 'label' => __('عنوان المخرجات', 'qeema-theme'), 'name' => 'survey_outputs_heading', 'type' => 'text', 'default_value' => 'مخرجات الخدمة'),
        array('key' => 'field_survey_outputs_sub', 'label' => __('نص تحت العنوان', 'qeema-theme'), 'name' => 'survey_outputs_sub', 'type' => 'text', 'default_value' => 'بيانات موثقة ومعتمدة تبني عليها مشاريعك'),
        array('key' => 'field_survey_outputs', 'label' => __('قائمة المخرجات', 'qeema-theme'), 'name' => 'survey_outputs', 'type' => 'repeater', 'layout' => 'table', 'button_label' => __('إضافة مخرج', 'qeema-theme'),
            'sub_fields' => array(
                array('key' => 'f_so_icon', 'label' => __('أيقونة (emoji أو نص)', 'qeema-theme'), 'name' => 'icon', 'type' => 'text', 'placeholder' => '🗺️'),
                array('key' => 'f_so_title', 'label' => __('العنوان', 'qeema-theme'), 'name' => 'title', 'type' => 'text'),
                array('key' => 'f_so_desc', 'label' => __('الوصف', 'qeema-theme'), 'name' => 'description', 'type' => 'text'),
            ),
        ),

        array('key' => 'tab_survey_faq', 'label' => __('الأسئلة الشائعة', 'qeema-theme'), 'type' => 'tab'),
        array('key' => 'field_survey_faq_heading', 'label' => __('عنوان الأسئلة الشائعة', 'qeema-theme'), 'name' => 'survey_faq_heading', 'type' => 'text', 'default_value' => 'أسئلة شائعة مساحية'),
        array('key' => 'field_survey_faq', 'label' => __('الأسئلة والأجوبة', 'qeema-theme'), 'name' => 'survey_faq', 'type' => 'repeater', 'layout' => 'block', 'button_label' => __('إضافة سؤال', 'qeema-theme'),
            'sub_fields' => array(
                array('key' => 'f_faq_q', 'label' => __('السؤال', 'qeema-theme'), 'name' => 'question', 'type' => 'text'),
                array('key' => 'f_faq_a', 'label' => __('الإجابة', 'qeema-theme'), 'name' => 'answer', 'type' => 'textarea', 'rows' => 3),
            ),
        ),

        array('key' => 'tab_survey_cta', 'label' => __('CTA ختامي', 'qeema-theme'), 'type' => 'tab'),
        array('key' => 'field_survey_cta_heading', 'label' => __('عنوان CTA', 'qeema-theme'), 'name' => 'survey_cta_heading', 'type' => 'text', 'default_value' => 'هل أنت مستعد لبدء مشروعك على أساس دقيق؟'),
        array('key' => 'field_survey_cta_sub', 'label' => __('نص فرعي', 'qeema-theme'), 'name' => 'survey_cta_sub', 'type' => 'text', 'default_value' => 'ابدأ مشروعك من نقطة دقيقة.'),
        array('key' => 'field_survey_cta_paragraph', 'label' => __('فقرة تحت النص الفرعي', 'qeema-theme'), 'name' => 'survey_cta_paragraph', 'type' => 'textarea', 'rows' => 2, 'default_value' => 'تواصل معنا اليوم للحصول على استشارة وتقدير تكلفة لخدمات المساحة التي تحتاجها.'),
        array('key' => 'field_survey_cta_btn1', 'label' => __('نص الزر الأول', 'qeema-theme'), 'name' => 'survey_cta_btn1', 'type' => 'text', 'default_value' => 'احجز استشارة مجانية'),
        array('key' => 'field_survey_cta_btn2', 'label' => __('نص الزر الثاني', 'qeema-theme'), 'name' => 'survey_cta_btn2', 'type' => 'text', 'default_value' => 'اطلب عرض سعر لخدمات المساحة'),
    ),
    'location' => array(
        array(
            array('param' => 'post_type', 'operator' => '==', 'value' => 'service'),
        ),
    ),
));

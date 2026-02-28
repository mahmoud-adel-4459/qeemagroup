<?php
/**
 * محتوى صفحة خدمة هندسة المساحة — كل النصوص والصور قابلة للتعديل من الداشبورد (ACF)
 */
if (!defined('ABSPATH')) exit;
$survey_post_id = get_query_var('current_service_id', 0);
if (!$survey_post_id) $survey_post_id = get_the_ID();
$GLOBALS['survey_post_id'] = $survey_post_id;
$quotation_url = home_url('/quotation');
$contact_url = home_url('/contact');
$projects_url = get_post_type_archive_link('project') ?: home_url('/#projects');

function _survey_f($name, $default = '', $post_id = null) {
    if ($post_id === null && isset($GLOBALS['survey_post_id'])) $post_id = $GLOBALS['survey_post_id'];
    $v = (function_exists('get_field') && $post_id) ? get_field($name, $post_id) : (function_exists('get_field') ? get_field($name) : null);
    return ($v !== '' && $v !== null) ? $v : $default;
}

function _survey_image_url($field_name, $post_id = null) {
    if ($post_id === null && isset($GLOBALS['survey_post_id'])) $post_id = $GLOBALS['survey_post_id'];
    $img = (function_exists('get_field') && $post_id) ? get_field($field_name, $post_id) : (function_exists('get_field') ? get_field($field_name) : null);
    if (is_array($img) && !empty($img['url'])) return $img['url'];
    if (is_numeric($img)) return wp_get_attachment_image_url((int) $img, 'full');
    return '';
}
?>
<div id="service-details" class="visionary-content-wrap service-survey-page">

<!-- Hero — بنفس أسلوب الهوم بيدج -->
<section id="survey-hero" class="relative min-h-[85vh] md:min-h-screen flex items-center overflow-hidden bg-white">
    <div class="absolute inset-0 bg-grid-pattern opacity-[0.03] z-0 pointer-events-none"></div>
    <div class="absolute top-[-10%] right-[-5%] w-[500px] h-[500px] bg-blue-100/40 rounded-full blur-[100px] pointer-events-none -z-10"></div>
    <div class="absolute bottom-[-10%] left-[-10%] w-[600px] h-[600px] bg-indigo-50/60 rounded-full blur-[120px] pointer-events-none -z-10"></div>
    <div class="container relative z-10 px-4 sm:px-6 py-16 lg:py-0">
        <div class="max-w-4xl mx-auto text-center md:text-right">
            <div class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-white border border-blue-100 shadow-sm text-blue-600 mb-8">
                <span class="flex h-2 w-2 rounded-full bg-blue-500"></span>
                <span class="font-bold text-sm tracking-wide">خدمة هندسة المساحة</span>
            </div>
            <h1 class="leading-[1.15] mb-6">
                <span class="block text-4xl sm:text-5xl lg:text-6xl font-bold text-gray-900 mb-3 tracking-tight"><?php echo esc_html(_survey_f('survey_intro_heading', 'المساحة ليست مجرد قياسات')); ?></span>
                <span class="block text-4xl sm:text-5xl lg:text-6xl font-black text-transparent bg-clip-text bg-gradient-to-r from-blue-600 via-indigo-600 to-blue-800"><?php echo esc_html(_survey_f('survey_intro_highlight', 'هي أساس اليقين لمشروعك')); ?></span>
            </h1>
            <p class="text-lg md:text-xl text-gray-600 leading-relaxed max-w-2xl mb-10 <?php echo is_rtl() ? 'md:mr-0 md:ml-auto' : 'md:ml-0 md:mr-auto'; ?>">
                <?php echo esc_html(_survey_f('survey_intro_text', 'بيانات مساحية دقيقة تعني تصميمًا سليمًا، وتراخيص سريعة، وتنفيذًا خاليًا من النزاعات. نحن نمنحك هذا اليقين عبر فريق معتمد وأحدث تقنيات GNSS/LiDAR/Drone.')); ?>
            </p>
            <div class="flex flex-wrap justify-center md:justify-start gap-4">
                <a href="<?php echo esc_url($quotation_url); ?>" class="group inline-flex items-center gap-3 px-8 py-4 bg-gray-900 text-white rounded-2xl font-bold text-lg hover:bg-blue-600 transition-all duration-300 shadow-lg hover:shadow-blue-500/30 hover:-translate-y-1">
                    <span>طلب عرض سعر</span>
                    <svg class="w-5 h-5 rtl:rotate-180 group-hover:translate-x-[-4px] transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
                <a href="<?php echo esc_url($contact_url); ?>" class="inline-flex items-center gap-3 px-8 py-4 bg-white text-gray-900 border border-gray-200 rounded-2xl font-bold text-lg hover:border-blue-200 hover:bg-blue-50 hover:text-blue-600 transition-all duration-300 hover:-translate-y-1">
                    <span>تواصل معنا</span>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- إحصائيات — مثل الهوم بيدج (تنسيق عددي موحّد) -->
<section class="relative py-12 sm:py-16 md:py-20 bg-gradient-to-b from-white via-blue-50/20 to-white overflow-hidden">
    <div class="container px-4 sm:px-6">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6">
            <div class="p-5 md:p-6 rounded-2xl bg-white border-2 border-gray-200 shadow-sm hover:border-blue-300 hover:shadow-xl transition-all duration-500 text-center">
                <div class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-blue-600 mb-2 tabular-nums tracking-tight">+<span>100</span></div>
                <p class="text-sm md:text-base font-semibold text-gray-500">مشروع مساحي منجز</p>
            </div>
            <div class="p-5 md:p-6 rounded-2xl bg-white border-2 border-gray-200 shadow-sm hover:border-blue-300 hover:shadow-xl transition-all duration-500 text-center">
                <div class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-blue-600 mb-2 tabular-nums">±<span>2</span> سم</div>
                <p class="text-sm md:text-base font-semibold text-gray-500">دقة قياس سنتيمترية</p>
            </div>
            <div class="p-5 md:p-6 rounded-2xl bg-white border-2 border-gray-200 shadow-sm hover:border-blue-300 hover:shadow-xl transition-all duration-500 text-center">
                <div class="text-2xl md:text-3xl lg:text-4xl font-extrabold text-blue-600 mb-2 tabular-nums">GNSS</div>
                <p class="text-sm md:text-base font-semibold text-gray-500">LiDAR &amp; Drone</p>
            </div>
            <div class="p-5 md:p-6 rounded-2xl bg-white border-2 border-gray-200 shadow-sm hover:border-blue-300 hover:shadow-xl transition-all duration-500 text-center">
                <div class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-blue-600 mb-2 tabular-nums"><span>15</span>+</div>
                <p class="text-sm md:text-base font-semibold text-gray-500">عام خبرة</p>
            </div>
        </div>
    </div>
</section>

<!-- لماذا الدقة المساحية مصيرية؟ — قسم بأسلوب الهوم -->
<section class="py-20 md:py-28 bg-slate-50/80 relative overflow-hidden" id="why">
    <div class="absolute inset-0 bg-grid-pattern opacity-[0.04] pointer-events-none"></div>
    <div class="container px-4 sm:px-6 max-w-6xl mx-auto text-right relative z-10">
        <div class="text-center mb-14 md:mb-16">
            <p class="text-xs font-bold text-blue-600 uppercase tracking-widest mb-3">لماذا نحن</p>
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-4"><?php echo esc_html(_survey_f('survey_why_heading', 'لماذا الدقة المساحية مصيرية؟')); ?></h2>
            <div class="w-20 h-1 bg-blue-600 mx-auto rounded-full mb-4"></div>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto"><?php echo esc_html(_survey_f('survey_why_sub', 'تجنب النزاعات والهدر المالي يبدأ ببيانات مكانية صحيحة.')); ?></p>
        </div>
        <div class="grid md:grid-cols-3 gap-6 lg:gap-8">
            <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100 group hover:border-blue-100">
                <div class="w-14 h-14 rounded-2xl bg-blue-600 text-white flex items-center justify-center text-xl font-black tabular-nums mb-6 group-hover:scale-110 transition-transform duration-300">01</div>
                <h3 class="text-xl font-bold text-gray-900 mb-3"><?php echo esc_html(_survey_f('survey_why_1_title', 'تجنب نزاعات الحدود')); ?></h3>
                <p class="text-gray-600 leading-relaxed"><?php echo esc_html(_survey_f('survey_why_1_text', 'تحديد قانوني دقيق وحدود ملكية مؤكدة تجنبك قضايا التعديات وتوقف الأعمال المكلف، مما يمنحك راحة البال القانونية.')); ?></p>
            </div>
            <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100 group hover:border-blue-100">
                <div class="w-16 h-16 rounded-2xl bg-blue-600 text-white flex items-center justify-center text-2xl font-bold mb-6 group-hover:scale-110 transition-transform duration-300">2</div>
                <h3 class="text-xl font-bold text-gray-900 mb-3"><?php echo esc_html(_survey_f('survey_why_2_title', 'ضبط كميات الحفر والردم')); ?></h3>
                <p class="text-gray-600 leading-relaxed"><?php echo esc_html(_survey_f('survey_why_2_text', 'رفع طبوغرافي دقيق يحسب كميات الحفر والردم بدقة متناهية، مما يضبط ميزانية المقاولات ويمنع الهدر المالي في المواد.')); ?></p>
            </div>
            <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100 group hover:border-blue-100">
                <div class="w-14 h-14 rounded-2xl bg-blue-600 text-white flex items-center justify-center text-xl font-black tabular-nums mb-6 group-hover:scale-110 transition-transform duration-300">03</div>
                <h3 class="text-xl font-bold text-gray-900 mb-3"><?php echo esc_html(_survey_f('survey_why_3_title', 'سرعة إصدار التراخيص')); ?></h3>
                <p class="text-gray-600 leading-relaxed"><?php echo esc_html(_survey_f('survey_why_3_text', 'مخططات مطابقة تمامًا لاشتراطات البلدية والأمانات، مما يضمن اعتمادًا سريعًا وتجنب رفض المعاملات.')); ?></p>
            </div>
        </div>
        <div class="mt-14 text-center">
            <a href="<?php echo esc_url($contact_url); ?>" class="inline-flex items-center gap-2 px-8 py-4 rounded-xl font-bold bg-blue-600 text-white hover:bg-blue-700 transition shadow-lg hover:-translate-y-1">
                <?php echo esc_html(_survey_f('survey_why_cta', 'احجز رفعًا طبوغرافيًا')); ?> <span class="rtl:rotate-180">→</span>
            </a>
        </div>
    </div>
</section>

<!-- خدماتنا المساحية — قسمين أساسيين (هوم ستايل) -->
<section class="py-20 md:py-28 bg-gradient-to-b from-white via-slate-50/30 to-white" id="services-list">
    <div class="container px-4 sm:px-6 max-w-6xl mx-auto text-right">
        <div class="text-center mb-14 md:mb-16">
            <p class="text-xs font-bold text-blue-600 uppercase tracking-widest mb-3">ما نقدمه</p>
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-4"><?php echo esc_html(_survey_f('survey_main_heading', 'خدماتنا المساحية المتكاملة')); ?></h2>
            <div class="w-20 h-1 bg-blue-600 mx-auto rounded-full mb-4"></div>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto"><?php echo esc_html(_survey_f('survey_main_sub', 'نستخدم أحدث التقنيات لتقديم كافة الحلول المساحية ضمن قسمين أساسيين، تحت كل قسم خدمات متخصصة:')); ?></p>
        </div>

        <!-- القسم الأول: المساحة الهندسية والتقليدية -->
        <div class="mb-20 md:mb-24">
            <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">
                <div class="order-2 lg:order-1">
                    <span class="inline-block text-sm font-semibold text-blue-600 uppercase tracking-wider mb-3">القسم الأول</span>
                    <h3 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4"><?php echo esc_html(_survey_f('survey_s1_title', 'المساحة الهندسية والتقليدية (Engineering & Traditional Surveying)')); ?></h3>
                    <p class="text-gray-600 leading-relaxed mb-6"><?php echo esc_html(_survey_f('survey_s1_desc', 'الأعمال الأساسية التي تعتمد عليها الإنشاءات والمشاريع الميدانية باستخدام أجهزة الرصد الأرضي والفضائي الأساسية.')); ?></p>
                    <p class="text-sm font-semibold text-gray-500 mb-2">المصطلحات التقنية:</p>
                    <div class="flex flex-wrap gap-2">
                        <?php
                        $terms1 = _survey_f('survey_s1_terms', 'Static GPS, RTK, VRS Network');
                        $terms1_arr = array_map('trim', explode(',', $terms1));
                        foreach ($terms1_arr as $t) {
                            if ($t) echo '<span class="px-4 py-2 rounded-xl bg-blue-50 text-blue-700 font-medium text-sm border border-blue-100">' . esc_html($t) . '</span>';
                        }
                        ?>
                    </div>
                </div>
                <?php
                $url_s1 = _survey_image_url('survey_s1_image', $survey_post_id);
                if (!$url_s1) $url_s1 = _survey_image_url('section_image_1', $survey_post_id);
                if (!$url_s1) $url_s1 = file_exists(get_theme_file_path('assets/images/geodetic-control-networks.png')) ? get_theme_file_uri('assets/images/geodetic-control-networks.png') : get_template_directory_uri() . '/assets/images/service-surveying.jpg';
                ?>
                <div class="order-1 lg:order-2 relative h-full min-h-[340px] rounded-2xl overflow-hidden shadow-xl border border-gray-100 group">
                    <img src="<?php echo esc_url($url_s1); ?>" alt="المساحة الهندسية والتقليدية" class="absolute inset-0 w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute bottom-0 left-0 right-0 p-6 bg-gradient-to-t from-black/75 to-transparent text-white">
                        <p class="font-bold text-lg"><?php echo esc_html(_survey_f('survey_s1_cap1', 'المساحة الهندسية والتقليدية')); ?></p>
                        <p class="text-sm text-gray-200"><?php echo esc_html(_survey_f('survey_s1_cap2', 'أجهزة الرصد الأرضي والفضائي الأساسية')); ?></p>
                    </div>
                </div>
            </div>

            <!-- خدمات تحت القسم الأول (المساحة الهندسية والتقليدية) -->
            <?php
            $s1_services = array(
                array('title_ar' => 'إنشاء شبكات المثلثات والتحكم الأرضي', 'title_en' => 'Geodetic Control Networks - GPS', 'description' => 'تأسيس ورصد شبكات التحكم الجيوديسية (الثوابت الأرضية) بدقة عالية باستخدام أجهزة GPS/GNSS، لربط الموقع بالإحداثيات العالمية والمحلية المعتمدة. المصطلحات: Static GPS, RTK, VRS Network.'),
                array('title_ar' => 'الرفع الطبوغرافي الشامل', 'title_en' => 'Topographic Surveying', 'description' => 'رصد وتمثيل كافة تضاريس ومعالم سطح الأرض (طبيعية وصناعية) لإنتاج خرائط طبوغرافية وكنتورية دقيقة تخدم المصممين والمهندسين. المصطلحات: Contour Lines, DTM (Digital Terrain Model), Total Station Survey.'),
                array('title_ar' => 'الميزانيات الشبكية وحساب الكميات', 'title_en' => 'Grid Leveling & Earthwork', 'description' => 'عمل الميزانيات الشبكية والطولية لحساب كميات الحفر والردم (Cut & Fill) بدقة متناهية، مما يساهم في ضبط تكاليف المشروع. المصطلحات: Digital Level, Cross Sections, Volume Calculation.'),
                array('title_ar' => 'الرفع المساحي التفصيلي', 'title_en' => 'Detailed & Cadastral Surveying', 'description' => 'تحديد حدود الملكيات، فصل الأراضي، والرفع التفصيلي للمباني والمنشآت القائمة بغرض التسجيل العقاري أو التطوير. المصطلحات: Boundary Survey, Parcel Split, Site Plan.'),
                array('title_ar' => 'مساحة الطرق والبنية التحتية', 'title_en' => 'Roads & Infrastructure', 'description' => 'تخطيط مسارات الطرق، توقيع المحاور، وضبط مناسيب طبقات الرصف وشبكات المرافق بدقة عالية. المصطلحات: Road Alignment, Setting Out, As-Built.'),
            );
            $custom_s1 = function_exists('get_field') && $survey_post_id ? get_field('survey_s1_services', $survey_post_id) : null;
            if (is_array($custom_s1) && count($custom_s1) > 0) {
                $s1_services = array();
                foreach ($custom_s1 as $row) {
                    $img = '';
                    if (isset($row['image'])) {
                        if (is_array($row['image']) && !empty($row['image']['url'])) $img = $row['image']['url'];
                        elseif (is_numeric($row['image'])) $img = wp_get_attachment_image_url((int) $row['image'], 'full');
                    }
                    $s1_services[] = array(
                        'title_ar' => isset($row['title_ar']) ? $row['title_ar'] : '',
                        'title_en' => isset($row['title_en']) ? $row['title_en'] : '',
                        'description' => isset($row['description']) ? $row['description'] : '',
                        'image' => $img,
                    );
                }
            }
            $s1_fallback_img = 'https://placehold.co/800x500/1e40af/ffffff?text=صورة+توضيحية';
            if (file_exists(get_theme_file_path('assets/images/service-surveying.jpg'))) {
                $s1_fallback_img = get_theme_file_uri('assets/images/service-surveying.jpg');
            } elseif (file_exists(get_template_directory() . '/assets/images/service-surveying.jpg')) {
                $s1_fallback_img = get_template_directory_uri() . '/assets/images/service-surveying.jpg';
            }
            ?>
            <div class="mt-14 pt-14 border-t border-gray-100">
                <p class="text-xs font-bold text-blue-600 uppercase tracking-widest mb-8 text-right">خدمات تحت القسم الأول</p>
                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8 md:gap-10">
                    <?php foreach ($s1_services as $i => $srv) :
                        $num = $i + 1;
                        if (!empty($srv['image'])) {
                            $s1_img_src = $srv['image'];
                        } else {
                            $s1_img_src = _survey_image_url('section_1_service_' . $num . '_image', $survey_post_id);
                            if (!$s1_img_src) $s1_img_src = $s1_fallback_img;
                        }
                    ?>
                    <article class="survey-subcard bg-white rounded-3xl overflow-hidden border border-gray-100/80 shadow-md hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 text-right group">
                        <div class="relative aspect-[5/3] overflow-hidden bg-slate-50">
                            <img src="<?php echo esc_url($s1_img_src); ?>" alt="<?php echo esc_attr($srv['title_ar']); ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" onerror="this.onerror=null; this.src='https://placehold.co/800x500/1e40af/ffffff?text=<?php echo esc_attr(rawurlencode($srv['title_ar'])); ?>';">
                            <span class="absolute top-4 right-4 w-9 h-9 rounded-full bg-blue-600/95 text-white flex items-center justify-center font-bold text-sm tabular-nums shadow-md"><?php echo str_pad($num, 2, '0', STR_PAD_LEFT); ?></span>
                            <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-l from-blue-600 to-blue-400"></div>
                        </div>
                        <div class="p-7">
                            <h4 class="text-lg font-bold text-gray-900 mb-2 leading-snug"><?php echo esc_html($srv['title_ar']); ?></h4>
                            <?php if (!empty($srv['title_en'])) : ?><p class="text-blue-600/90 font-medium text-sm mb-4"><?php echo esc_html($srv['title_en']); ?></p><?php endif; ?>
                            <p class="text-gray-600 text-[15px] leading-relaxed"><?php echo esc_html($srv['description']); ?></p>
                        </div>
                    </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <!-- القسم الثاني: المساحة المتقدمة والجيوماتكس -->
        <div class="border-t border-gray-200 pt-20 md:pt-24">
            <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">
                <?php
                $url_s2 = _survey_image_url('survey_s2_image', $survey_post_id);
                if (!$url_s2) $url_s2 = _survey_image_url('section_image_2', $survey_post_id);
                if (!$url_s2) $url_s2 = file_exists(get_theme_file_path('assets/images/topographic-surveying.png')) ? get_theme_file_uri('assets/images/topographic-surveying.png') : get_template_directory_uri() . '/assets/images/service-surveying.jpg';
                ?>
                <div class="relative h-full min-h-[340px] rounded-2xl overflow-hidden shadow-xl border border-gray-100 group">
                    <img src="<?php echo esc_url($url_s2); ?>" alt="المساحة المتقدمة والجيوماتكس" class="absolute inset-0 w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute bottom-0 left-0 right-0 p-6 bg-gradient-to-t from-black/75 to-transparent text-white">
                        <p class="font-bold text-lg"><?php echo esc_html(_survey_f('survey_s2_cap1', 'تقنيات رقمية واستشعار عن بعد')); ?></p>
                        <p class="text-sm text-gray-200"><?php echo esc_html(_survey_f('survey_s2_cap2', 'النمذجة ثلاثية الأبعاد والجيوماتكس')); ?></p>
                    </div>
                </div>
                <div>
                    <span class="inline-block text-sm font-semibold text-blue-600 uppercase tracking-wider mb-3">القسم الثاني</span>
                    <h3 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4"><?php echo esc_html(_survey_f('survey_s2_title', 'المساحة المتقدمة والجيوماتكس (Advanced Surveying & Geomatics)')); ?></h3>
                    <p class="text-gray-600 leading-relaxed"><?php echo esc_html(_survey_f('survey_s2_desc', 'حلول ذكية تعتمد على التكنولوجيا الرقمية، الاستشعار عن بعد، والنمذجة ثلاثية الأبعاد.')); ?></p>
                </div>
            </div>

            <div class="mt-20">
                <p class="text-xs font-bold text-blue-600 uppercase tracking-widest mb-8 text-right">خدمات تحت القسم الثاني</p>
                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8 md:gap-10">
            <?php
            $fallback_img = get_template_directory_uri() . '/assets/images/service-surveying.jpg';
            $subs_data = array(
                array('title_ar' => 'المسح بالليزر ثلاثي الأبعاد', 'title_en' => '3D Laser Scanning', 'desc' => 'تقنية مسح فائقة الدقة لعمل "توأم رقمي" للمنشآت والمباني المعقدة، تُستخدم في التوثيق والترميم ومطابقة التنفيذ (BIM).', 'terms' => array('LiDAR', 'Terrestrial Laser Scanner', '3D Modeling'), 'notice' => '', 'def_img' => '3d-laser-scanning.png'),
                array('title_ar' => 'نظم المعلومات الجغرافية', 'title_en' => 'GIS Services', 'desc' => 'بناء وإدارة قواعد البيانات المكانية الذكية، وتحليل البيانات الجغرافية لدعم اتخاذ القرارات التخطيطية.', 'terms' => array('Spatial Analysis', 'Geodatabase', 'Mapping Layers'), 'notice' => '', 'def_img' => 'gis-services.png'),
                array('title_ar' => 'الاستشعار عن بعد', 'title_en' => 'Remote Sensing', 'desc' => 'تحليل صور الأقمار الصناعية لدراسة استخدامات الأراضي، ومراقبة التغيرات البيئية والعمرانية على نطاق واسع.', 'terms' => array('Satellite Imagery Analysis', 'Spectral Classification'), 'notice' => '', 'def_img' => 'remote-sensing.png'),
                array('title_ar' => 'النمذجة الجيوديسية ونقاط المرجعية', 'title_en' => 'Geoid Model & CRP', 'desc' => 'تطوير نماذج الجيود للمرجع الرأسي، وتثبيت نقاط المرجعية الدقيقة (CRP) لمراقبة تشوهات المنشآت الحساسة.', 'terms' => array('Vertical Datum', 'Deformation Monitoring', 'Geodetic Reference Frame'), 'notice' => '', 'def_img' => 'geoid-crp.png'),
                array('title_ar' => 'المسح الجوي', 'title_en' => 'UAV / Drone Surveying', 'desc' => 'استخدام الطائرات المسيرة لمسح المساحات الكبيرة بسرعة فائقة، وإنتاج خرائط مصورة (Orthophotos) ونماذج تضاريس رقمية.', 'terms' => array('Photogrammetry', 'Aerial Mapping', 'Point Cloud'), 'notice' => 'متاح بفرع السعودية فقط', 'def_img' => 'drone-surveying.png'),
                array('title_ar' => 'المساحة المائية', 'title_en' => 'Hydrographic Surveying', 'desc' => 'مسح قيعان المسطحات المائية وتحديد الأعماق لخدمة مشاريع الموانئ، الجسور البحرية، وأعمال التكريك.', 'terms' => array('Bathymetric Survey', 'Sonar', 'Dredging Support'), 'notice' => 'متاح بفرع السعودية فقط', 'def_img' => 'hydrographic-surveying.png'),
            );
            foreach ($subs_data as $idx => $sub) :
                $num = $idx + 1;
                $img_src = _survey_image_url('section_2_service_' . $num . '_image', $survey_post_id);
                if (!$img_src && !empty($sub['def_img']) && file_exists(get_theme_file_path('assets/images/' . $sub['def_img']))) $img_src = get_theme_file_uri('assets/images/' . $sub['def_img']);
                if (!$img_src) $img_src = $fallback_img;
            ?>
                    <article class="survey-subcard bg-white rounded-3xl overflow-hidden border border-gray-100/80 shadow-md hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 text-right group">
                        <div class="relative aspect-[5/3] overflow-hidden bg-slate-50">
                            <img src="<?php echo esc_url($img_src); ?>" alt="<?php echo esc_attr($sub['title_ar']); ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            <span class="absolute top-4 right-4 w-9 h-9 rounded-full bg-blue-600/95 text-white flex items-center justify-center font-bold text-sm tabular-nums shadow-md"><?php echo str_pad($num, 2, '0', STR_PAD_LEFT); ?></span>
                            <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-l from-blue-600 to-blue-400"></div>
                        </div>
                        <div class="p-7">
                            <h4 class="text-lg font-bold text-gray-900 mb-2 leading-snug"><?php echo esc_html($sub['title_ar']); ?></h4>
                            <p class="text-blue-600/90 font-medium text-sm mb-4"><?php echo esc_html($sub['title_en']); ?></p>
                            <p class="text-gray-600 text-[15px] leading-relaxed mb-4"><?php echo esc_html($sub['desc']); ?></p>
                            <div class="flex flex-wrap gap-2">
                                <?php foreach (array_slice($sub['terms'], 0, 3) as $t) : ?><span class="px-3 py-1.5 rounded-full bg-slate-100 text-slate-600 font-medium text-xs"><?php echo esc_html($t); ?></span><?php endforeach; ?>
                            </div>
                            <?php if (!empty($sub['notice'])) : ?>
                            <p class="mt-4 text-xs font-bold text-amber-800 bg-amber-50/90 px-3 py-2 rounded-xl inline-block border border-amber-200/80"><?php echo esc_html($sub['notice']); ?></p>
                            <?php endif; ?>
                        </div>
                    </article>
            <?php endforeach; ?>
                </div>
            </div>
            </div>
        </div>
    </div>
</section>

<!-- منهجية العمل — هوم ستايل -->
<section class="py-20 md:py-28 bg-slate-50/80 relative overflow-hidden" id="process">
    <div class="absolute inset-0 bg-grid-pattern opacity-[0.04] pointer-events-none"></div>
    <div class="container px-4 sm:px-6 max-w-5xl mx-auto relative z-10">
        <div class="text-center mb-14 md:mb-16">
            <p class="text-xs font-bold text-blue-600 uppercase tracking-widest mb-3">كيف نعمل</p>
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-4"><?php echo esc_html(_survey_f('survey_process_heading', 'منهجية العمل')); ?></h2>
            <div class="w-20 h-1 bg-blue-600 mx-auto rounded-full mb-4"></div>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto"><?php echo esc_html(_survey_f('survey_process_sub', 'خطوات منظمة تضمن دقة النتائج وسرعة التسليم.')); ?></p>
        </div>

        <div class="relative">
            <div class="hidden md:block absolute right-1/2 transform translate-x-1/2 h-full w-0.5 bg-gray-200"></div>

            <?php
            $steps = array(
                array('title' => 'التخطيط ودراسة الوثائق', 'desc' => 'تحليل وثائق الملكية والمخططات القديمة وتحديد أهداف المسح ونوع الدقة المطلوبة.'),
                array('title' => 'العمل الميداني (Field Work)', 'desc' => 'نزول الفريق المختص للموقع وجمع البيانات باستخدام محطات الرصد المتكاملة (Total Station) وأجهزة GNSS.'),
                array('title' => 'المعالجة والتحليل المكتبي', 'desc' => 'نقل البيانات لأجهزة الحاسب ورسم الخرائط باستخدام برامج CAD/GIS ومعالجة سحابة النقاط.'),
                array('title' => 'مراقبة الجودة (QA/QC)', 'desc' => 'مراجعة صارمة للنتائج ومقارنتها بنقاط مرجعية ثابتة للتأكد من مطابقتها للمعايير.'),
                array('title' => 'التسليم والتقارير', 'desc' => 'تسليم المخططات النهائية بصيغة ورقية ورقمية (DWG/PDF) مع التقارير المساحية المعتمدة.'),
            );
            $custom_steps = function_exists('get_field') && $survey_post_id ? get_field('survey_process_steps', $survey_post_id) : null;
            if (is_array($custom_steps) && count($custom_steps) > 0) {
                $steps = array();
                foreach ($custom_steps as $row) {
                    $steps[] = array('title' => isset($row['title']) ? $row['title'] : '', 'desc' => isset($row['description']) ? $row['description'] : '');
                }
            }
            foreach ($steps as $i => $p) :
                $step_num = str_pad($i + 1, 2, '0', STR_PAD_LEFT);
                $is_even = ($i % 2 == 0);
            ?>
                <div class="relative mb-12 md:mb-0 flex md:items-center <?php echo $is_even ? 'md:flex-row' : 'md:flex-row-reverse'; ?>">
                    <div class="hidden md:flex absolute right-1/2 transform translate-x-1/2 w-11 h-11 bg-blue-600 rounded-full border-4 border-white shadow-lg items-center justify-center text-white font-black text-sm tabular-nums z-10"><?php echo $step_num; ?></div>
                    <div class="hidden md:block w-1/2"></div>
                    <div class="w-full md:w-1/2 <?php echo $is_even ? 'md:pl-12' : 'md:pr-12'; ?> pl-10 md:pl-0 border-r-2 md:border-r-0 border-gray-200 md:border-none pr-6 md:pr-0">
                        <div class="bg-white p-6 rounded-2xl shadow-lg border border-gray-100 hover:shadow-xl transition">
                            <span class="md:hidden inline-flex w-9 h-9 bg-blue-600 text-white rounded-full items-center justify-center font-black text-sm tabular-nums mb-3"><?php echo $step_num; ?></span>
                            <h3 class="text-xl font-bold text-gray-900 mb-2"><?php echo esc_html($p['title']); ?></h3>
                            <p class="text-gray-600 leading-relaxed text-sm"><?php echo esc_html($p['desc']); ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- مخرجات الخدمة — هوم ستايل -->
<section class="py-20 md:py-28 bg-gradient-to-b from-white via-blue-50/10 to-white" id="outputs">
    <div class="container px-4 sm:px-6 max-w-5xl mx-auto text-right">
        <div class="text-center mb-14">
            <p class="text-xs font-bold text-blue-600 uppercase tracking-widest mb-3">ما تحصل عليه</p>
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-4"><?php echo esc_html(_survey_f('survey_outputs_heading', 'مخرجات الخدمة')); ?></h2>
            <div class="w-20 h-1 bg-blue-600 mx-auto rounded-full mb-4"></div>
            <p class="text-lg text-gray-600"><?php echo esc_html(_survey_f('survey_outputs_sub', 'بيانات موثقة ومعتمدة تبني عليها مشاريعك')); ?></p>
        </div>
        <?php
        $default_outputs = array(
            array('icon' => '🗺️', 'title' => 'خرائط طبوغرافية', 'description' => 'توضح التضاريس والمناسيب والمعالم الطبيعية.'),
            array('icon' => '📍', 'title' => 'مخططات التوقيع', 'description' => 'نقاط محددة على الأرض لبدء الحفر والبناء.'),
            array('icon' => '📋', 'title' => 'تقارير عقارية', 'description' => 'تقارير تحديد وفرز الأراضي معتمدة للدوائر الحكومية.'),
            array('icon' => '☁️', 'title' => 'سحابة النقاط (Point Cloud)', 'description' => 'نموذج ثلاثي الأبعاد دقيق للموقع الحالي.'),
            array('icon' => '✅', 'title' => 'مخططات As-Built', 'description' => 'توثيق الوضع النهائي للمشروع بعد التنفيذ.'),
            array('icon' => '🔢', 'title' => 'حساب الكميات', 'description' => 'تقرير دقيق بكميات الحفر والردم المطلوبة.'),
        );
        $outputs = $default_outputs;
        $custom_outputs = function_exists('get_field') && $survey_post_id ? get_field('survey_outputs', $survey_post_id) : null;
        if (is_array($custom_outputs) && count($custom_outputs) > 0) {
            $outputs = array();
            foreach ($custom_outputs as $row) {
                $outputs[] = array('icon' => !empty($row['icon']) ? $row['icon'] : '•', 'title' => isset($row['title']) ? $row['title'] : '', 'description' => isset($row['description']) ? $row['description'] : '');
            }
        }
        ?>
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($outputs as $out) : ?>
            <div class="bg-slate-50 p-6 rounded-2xl border border-slate-100 flex gap-4 items-start hover:shadow-md hover:border-blue-100 transition">
                <div class="text-blue-600 text-2xl mt-1"><?php echo esc_html($out['icon']); ?></div>
                <div>
                    <h4 class="font-bold text-gray-900 mb-1"><?php echo esc_html($out['title']); ?></h4>
                    <p class="text-sm text-gray-600"><?php echo esc_html($out['description']); ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- الأسئلة الشائعة — هوم ستايل -->
<section class="py-20 md:py-28 bg-slate-50/80 relative overflow-hidden" id="faq">
    <div class="absolute inset-0 bg-grid-pattern opacity-[0.04] pointer-events-none"></div>
    <div class="container px-4 sm:px-6 max-w-4xl mx-auto text-right relative z-10">
        <div class="text-center mb-10">
            <p class="text-xs font-bold text-blue-600 uppercase tracking-widest mb-3">دعمك</p>
            <h2 class="text-2xl md:text-4xl font-bold text-gray-900"><?php echo esc_html(_survey_f('survey_faq_heading', 'أسئلة شائعة مساحية')); ?></h2>
        </div>
        <div class="space-y-4">
            <?php
            $faq_items = array(
                array('متى أحتاج إلى خدمة الرفع المساحي؟', 'تحتاج إليها قبل شراء أي أرض للتأكد من حدودها ومساحتها، وقبل البدء في أي تصميم هندسي (لأخذ المناسيب)، وأثناء البناء لتوجيه التنفيذ (توقيع المحاور)، وبعد الانتهاء لتوثيق الوضع القائم (As-Built).'),
                array('ما الفرق بين الرفع المساحي والتوقيع المساحي؟', 'الرفع: نقل الواقع الطبيعي إلى الخريطة (قياس ما هو موجود). التوقيع: نقل التصميم من الخريطة إلى الواقع (تحديد مكان القواعد والأعمدة على الأرض).'),
                array('هل خدماتكم معتمدة؟', 'نعم، نحن مكتب هندسي معتمد، وجميع تقاريرنا ومخططاتنا مقبولة لدى الأمانات، البلديات، وهيئات التخطيط، والكاتب العدل (للفرز).'),
                array('ما هي دقة الأجهزة المستخدمة؟', 'نستخدم أجهزة GNSS و Total Station حديثة بدقة تصل إلى ملليمترات، ونقدم تقرير دقة (Accuracy Report) مع كل مشروع.'),
            );
            $custom_faq = function_exists('get_field') && $survey_post_id ? get_field('survey_faq', $survey_post_id) : null;
            if (is_array($custom_faq) && count($custom_faq) > 0) {
                $faq_items = array();
                foreach ($custom_faq as $row) {
                    $faq_items[] = array(isset($row['question']) ? $row['question'] : '', isset($row['answer']) ? $row['answer'] : '');
                }
            }
            foreach ($faq_items as $faq) : ?>
            <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm hover:shadow-md transition">
                <h3 class="font-bold text-gray-900 mb-2"><?php echo esc_html($faq[0]); ?></h3>
                <p class="text-gray-600 text-sm leading-relaxed"><?php echo esc_html($faq[1]); ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>


<!-- CTA ختامي — مثل الهوم بيدج -->
<section class="relative py-24 md:py-32 bg-gradient-to-br from-slate-900 via-blue-950 to-slate-900 overflow-hidden">
    <div class="absolute inset-0 opacity-20 blueprint-grid"></div>
    <div class="container relative z-10 px-4 sm:px-6 text-center">
        <h2 class="text-2xl md:text-4xl lg:text-5xl font-bold text-white mb-4"><?php echo esc_html(_survey_f('survey_cta_heading', 'هل أنت مستعد لبدء مشروعك على أساس دقيق؟')); ?></h2>
        <p class="text-blue-200 font-medium mb-2"><?php echo esc_html(_survey_f('survey_cta_sub', 'ابدأ مشروعك من نقطة دقيقة.')); ?></p>
        <p class="text-slate-300 mb-10 max-w-2xl mx-auto"><?php echo esc_html(_survey_f('survey_cta_paragraph', 'تواصل معنا اليوم للحصول على استشارة وتقدير تكلفة لخدمات المساحة التي تحتاجها.')); ?></p>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="<?php echo esc_url($contact_url); ?>" class="group inline-flex items-center gap-3 px-8 py-4 rounded-2xl font-bold text-lg bg-white text-gray-900 hover:bg-blue-50 transition-all shadow-lg hover:-translate-y-1">
                <?php echo esc_html(_survey_f('survey_cta_btn1', 'احجز استشارة مجانية')); ?>
                <svg class="w-5 h-5 rtl:rotate-180 group-hover:translate-x-[-4px] transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
            </a>
            <a href="<?php echo esc_url($quotation_url); ?>" class="inline-flex items-center gap-3 px-8 py-4 rounded-2xl font-bold text-lg border-2 border-white/80 text-white hover:bg-white/10 transition-all hover:-translate-y-1"><?php echo esc_html(_survey_f('survey_cta_btn2', 'اطلب عرض سعر')); ?></a>
        </div>
    </div>
</section>

<?php
$faq_schema = array(
    '@context' => 'https://schema.org',
    '@type' => 'FAQPage',
    'mainEntity' => array(
        array('@type' => 'Question', 'name' => 'متى أحتاج إلى خدمة الرفع المساحي؟', 'acceptedAnswer' => array('@type' => 'Answer', 'text' => 'تحتاج إليها قبل شراء أي أرض للتأكد من حدودها ومساحتها، وقبل البدء في أي تصميم هندسي، وأثناء البناء لتوجيه التنفيذ، وبعد الانتهاء من المشروع للتوثيق.')),
        array('@type' => 'Question', 'name' => 'ما الفرق بين الرفع المساحي والتوقيع المساحي؟', 'acceptedAnswer' => array('@type' => 'Answer', 'text' => 'الرفع المساحي هو عملية قياس ما هو موجود بالفعل على الأرض ونقله إلى خريطة. أما التوقيع المساحي فهو العكس، أي نقل ما هو موجود على الخريطة (التصميم) إلى نقاط محددة على أرض الواقع.')),
        array('@type' => 'Question', 'name' => 'هل خدماتكم معتمدة لدى الجهات الرسمية؟', 'acceptedAnswer' => array('@type' => 'Answer', 'text' => 'نعم، نحن مكتب مساحة معتمد، وجميع تقاريرنا ومخططاتنا مقبولة لدى الجهات الحكومية والتخطيطية.')),
        array('@type' => 'Question', 'name' => 'ما مستوى الدقة الذي تقدّمونه؟', 'acceptedAnswer' => array('@type' => 'Answer', 'text' => 'حسب النطاق؛ حتى ±1 مم أفقيًا ورأسيًا مع تقرير دقة مفصّل ونظام إحداثي مُعلن.')),
        array('@type' => 'Question', 'name' => 'هل يمكن تسليم ملفات متوافقة مع استشاري المشروع؟', 'acceptedAnswer' => array('@type' => 'Answer', 'text' => 'نعم—DWG/DXF/SHP/LAZ، وإسناد جغرافي وفق CRS المطلوب.')),
        array('@type' => 'Question', 'name' => 'متى أطلب As-Built؟', 'acceptedAnswer' => array('@type' => 'Answer', 'text' => 'بعد كل عنصر مخفي (أساسات/شبكات/سقوف) وقبل الإغلاق لضمان التطابق مع المخططات.')),
        array('@type' => 'Question', 'name' => 'هل تدمجون الرفع مع BIM؟', 'acceptedAnswer' => array('@type' => 'Answer', 'text' => 'نعم—Scan-to-BIM ونموذج LOD 300/350/400 قابل للتنسيق مع المعماري/MEP.')),
        array('@type' => 'Question', 'name' => 'كم المدة المتوقعة؟', 'acceptedAnswer' => array('@type' => 'Answer', 'text' => 'تبعًا للمساحة وطبيعة الموقع.')),
    ),
);
?>
</div>
<script type="application/ld+json"><?php echo wp_json_encode($faq_schema); ?></script>

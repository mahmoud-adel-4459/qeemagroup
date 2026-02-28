<?php
/* Template Name: Quotation Page - مطابق React QuotationPage */
get_header();
?>

<!-- Hero - مطابق React (صورة من assets) -->
<section class="pt-32 pb-16 relative overflow-hidden min-h-[280px] flex items-center">
    <div class="absolute inset-0">
        <img src="<?php echo esc_url(visionary_get_hero_image_url('quotation')); ?>" alt="" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-l from-blue-900/95 via-blue-800/90 to-blue-900/95"></div>
    </div>
    <div class="absolute inset-0 blueprint-grid opacity-20"></div>
    <div class="container relative z-10">
        <div class="max-w-3xl">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-6">اطلب عرض سعر</h1>
            <p class="text-xl text-blue-100">
                أكمل النموذج التالي وسيتواصل معك أحد خبرائنا خلال 24 ساعة
            </p>
        </div>
    </div>
</section>

<!-- Form - مطابق React (نفس الحقول والعناوين بالعربي) -->
<section class="py-24 bg-background">
    <div class="container">
        <div class="max-w-4xl mx-auto">
            <div class="bg-white rounded-3xl border border-gray-200 p-8 md:p-12 shadow-medium">
                <?php
                if (isset($_GET['quotation_error'])) {
                    $err = sanitize_text_field(wp_unslash($_GET['quotation_error']));
                    $msg = $err === 'nonce' ? 'خطأ في التحقق. حاول مرة أخرى.' : ($err === 'required' ? 'يرجى تعبئة الاسم والجوال والبريد.' : ($err === 'email' ? 'البريد الإلكتروني غير صحيح.' : 'حدث خطأ. حاول مرة أخرى.'));
                    echo '<div class="mb-8 p-4 rounded-lg bg-red-50 border border-red-200 text-red-800">' . esc_html($msg) . '</div>';
                }
                ?>
                <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post" class="space-y-12">
                    <input type="hidden" name="action" value="qeema_quotation_submit">
                    <?php wp_nonce_field('qeema_quotation_form', 'qeema_quotation_nonce'); ?>

                    <!-- 1. نوع المشروع -->
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900 mb-6">ما نوع مشروعك؟</h2>
                        <div class="grid md:grid-cols-2 gap-4">
                            <label class="cursor-pointer block">
                                <input type="radio" name="project_type" value="residential" class="peer sr-only">
                                <div class="p-6 rounded-2xl border-2 border-gray-200 peer-checked:border-blue-600 peer-checked:bg-blue-50 hover:border-blue-300 transition-all h-full text-right">
                                    <h3 class="font-bold text-gray-900 mb-1">سكني</h3>
                                    <p class="text-sm text-gray-500">فلل، شقق، مجمعات سكنية</p>
                                </div>
                            </label>
                            <label class="cursor-pointer block">
                                <input type="radio" name="project_type" value="commercial" class="peer sr-only">
                                <div class="p-6 rounded-2xl border-2 border-gray-200 peer-checked:border-blue-600 peer-checked:bg-blue-50 hover:border-blue-300 transition-all h-full text-right">
                                    <h3 class="font-bold text-gray-900 mb-1">تجاري</h3>
                                    <p class="text-sm text-gray-500">مكاتب، محلات، مراكز تجارية</p>
                                </div>
                            </label>
                            <label class="cursor-pointer block">
                                <input type="radio" name="project_type" value="industrial" class="peer sr-only">
                                <div class="p-6 rounded-2xl border-2 border-gray-200 peer-checked:border-blue-600 peer-checked:bg-blue-50 hover:border-blue-300 transition-all h-full text-right">
                                    <h3 class="font-bold text-gray-900 mb-1">صناعي</h3>
                                    <p class="text-sm text-gray-500">مصانع، مستودعات، ورش</p>
                                </div>
                            </label>
                            <label class="cursor-pointer block">
                                <input type="radio" name="project_type" value="hospitality" class="peer sr-only">
                                <div class="p-6 rounded-2xl border-2 border-gray-200 peer-checked:border-blue-600 peer-checked:bg-blue-50 hover:border-blue-300 transition-all h-full text-right">
                                    <h3 class="font-bold text-gray-900 mb-1">ضيافة</h3>
                                    <p class="text-sm text-gray-500">فنادق، منتجعات، مطاعم</p>
                                </div>
                            </label>
                            <label class="cursor-pointer block">
                                <input type="radio" name="project_type" value="healthcare" class="peer sr-only">
                                <div class="p-6 rounded-2xl border-2 border-gray-200 peer-checked:border-blue-600 peer-checked:bg-blue-50 hover:border-blue-300 transition-all h-full text-right">
                                    <h3 class="font-bold text-gray-900 mb-1">صحي</h3>
                                    <p class="text-sm text-gray-500">مستشفيات، عيادات، مراكز طبية</p>
                                </div>
                            </label>
                            <label class="cursor-pointer block">
                                <input type="radio" name="project_type" value="educational" class="peer sr-only">
                                <div class="p-6 rounded-2xl border-2 border-gray-200 peer-checked:border-blue-600 peer-checked:bg-blue-50 hover:border-blue-300 transition-all h-full text-right">
                                    <h3 class="font-bold text-gray-900 mb-1">تعليمي</h3>
                                    <p class="text-sm text-gray-500">مدارس، جامعات، مراكز تدريب</p>
                                </div>
                            </label>
                        </div>
                    </div>

                    <!-- 2. الخدمات المطلوبة -->
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900 mb-6">ما الخدمات التي تحتاجها؟</h2>
                        <p class="text-gray-500 mb-6">يمكنك اختيار أكثر من خدمة</p>
                        <div class="grid md:grid-cols-2 gap-4">
                            <label class="flex items-center gap-3 p-5 rounded-xl border-2 border-gray-200 hover:border-blue-300 cursor-pointer has-[:checked]:border-blue-600 has-[:checked]:bg-blue-50 transition-all text-right">
                                <input type="checkbox" name="services[]" value="interior" class="w-5 h-5 text-blue-600 rounded">
                                <span class="font-medium text-gray-900">التصميم الداخلي والتشطيبات</span>
                            </label>
                            <label class="flex items-center gap-3 p-5 rounded-xl border-2 border-gray-200 hover:border-blue-300 cursor-pointer has-[:checked]:border-blue-600 has-[:checked]:bg-blue-50 transition-all text-right">
                                <input type="checkbox" name="services[]" value="architectural" class="w-5 h-5 text-blue-600 rounded">
                                <span class="font-medium text-gray-900">التصميم المعماري والإنشائي</span>
                            </label>
                            <label class="flex items-center gap-3 p-5 rounded-xl border-2 border-gray-200 hover:border-blue-300 cursor-pointer has-[:checked]:border-blue-600 has-[:checked]:bg-blue-50 transition-all text-right">
                                <input type="checkbox" name="services[]" value="mep" class="w-5 h-5 text-blue-600 rounded">
                                <span class="font-medium text-gray-900">أنظمة الإليكتروميكانيكال (MEP)</span>
                            </label>
                            <label class="flex items-center gap-3 p-5 rounded-xl border-2 border-gray-200 hover:border-blue-300 cursor-pointer has-[:checked]:border-blue-600 has-[:checked]:bg-blue-50 transition-all text-right">
                                <input type="checkbox" name="services[]" value="surveying" class="w-5 h-5 text-blue-600 rounded">
                                <span class="font-medium text-gray-900">هندسة المساحة والرفع المساحي</span>
                            </label>
                            <label class="flex items-center gap-3 p-5 rounded-xl border-2 border-gray-200 hover:border-blue-300 cursor-pointer has-[:checked]:border-blue-600 has-[:checked]:bg-blue-50 transition-all text-right">
                                <input type="checkbox" name="services[]" value="supervision" class="w-5 h-5 text-blue-600 rounded">
                                <span class="font-medium text-gray-900">الإشراف الهندسي</span>
                            </label>
                            <label class="flex items-center gap-3 p-5 rounded-xl border-2 border-gray-200 hover:border-blue-300 cursor-pointer has-[:checked]:border-blue-600 has-[:checked]:bg-blue-50 transition-all text-right">
                                <input type="checkbox" name="services[]" value="consultation" class="w-5 h-5 text-blue-600 rounded">
                                <span class="font-medium text-gray-900">الاستشارات الهندسية</span>
                            </label>
                        </div>
                    </div>

                    <!-- 3. تفاصيل المشروع -->
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900 mb-6">تفاصيل المشروع</h2>
                        <div class="space-y-8">
                            <div>
                                <label class="block text-gray-900 font-medium mb-4">الميزانية المتوقعة</label>
                                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-3">
                                    <?php
                                    $budgets = array('under500k' => 'أقل من 500,000 ريال', '500k-1m' => '500,000 - 1,000,000 ريال', '1m-5m' => '1,000,000 - 5,000,000 ريال', '5m-10m' => '5,000,000 - 10,000,000 ريال', 'over10m' => 'أكثر من 10,000,000 ريال');
                                    foreach ($budgets as $val => $lbl) : ?>
                                        <label class="cursor-pointer block">
                                            <input type="radio" name="budget" value="<?php echo esc_attr($val); ?>" class="peer sr-only">
                                            <div class="p-4 rounded-xl border-2 border-gray-200 peer-checked:border-blue-600 peer-checked:bg-blue-50 hover:border-blue-300 transition-all text-center">
                                                <span class="font-medium text-gray-900"><?php echo esc_html($lbl); ?></span>
                                            </div>
                                        </label>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div>
                                <label class="block text-gray-900 font-medium mb-4">الجدول الزمني المتوقع للبدء</label>
                                <div class="grid md:grid-cols-2 gap-3">
                                    <?php
                                    $timelines = array('immediate' => 'فوري (خلال شهر)', '1-3months' => '1-3 أشهر', '3-6months' => '3-6 أشهر', '6months+' => 'أكثر من 6 أشهر');
                                    foreach ($timelines as $val => $lbl) : ?>
                                        <label class="cursor-pointer block">
                                            <input type="radio" name="timeline" value="<?php echo esc_attr($val); ?>" class="peer sr-only">
                                            <div class="p-4 rounded-xl border-2 border-gray-200 peer-checked:border-blue-600 peer-checked:bg-blue-50 hover:border-blue-300 transition-all text-center">
                                                <span class="font-medium text-gray-900"><?php echo esc_html($lbl); ?></span>
                                            </div>
                                        </label>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div>
                                <label class="block text-gray-900 font-medium mb-2">وصف المشروع (اختياري)</label>
                                <textarea name="project_description" rows="4" placeholder="أخبرنا المزيد عن مشروعك ومتطلباتك..." class="w-full rounded-lg border border-gray-300 p-4 focus:ring-2 focus:ring-blue-500 outline-none"></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- 4. بيانات التواصل -->
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900 mb-6">بيانات التواصل</h2>
                        <div class="space-y-6">
                            <div class="grid md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-900 mb-2">الاسم الكامل *</label>
                                    <input type="text" name="name" required placeholder="أدخل اسمك" class="w-full h-12 rounded-lg border border-gray-300 px-4 focus:ring-2 focus:ring-blue-500 outline-none">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-900 mb-2">اسم الشركة (اختياري)</label>
                                    <input type="text" name="company" placeholder="اسم الشركة" class="w-full h-12 rounded-lg border border-gray-300 px-4 focus:ring-2 focus:ring-blue-500 outline-none">
                                </div>
                            </div>
                            <div class="grid md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-900 mb-2">رقم الجوال *</label>
                                    <input type="tel" name="phone" required placeholder="٠١٠٠٩١٤٨٣٨٣" dir="ltr" class="w-full h-12 rounded-lg border border-gray-300 px-4 focus:ring-2 focus:ring-blue-500 outline-none">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-900 mb-2">البريد الإلكتروني *</label>
                                    <input type="email" name="email" required placeholder="example@domain.com" dir="ltr" class="w-full h-12 rounded-lg border border-gray-300 px-4 focus:ring-2 focus:ring-blue-500 outline-none">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="pt-8 border-t border-gray-200">
                        <button type="submit" class="w-full bg-blue-600 text-white text-lg font-bold py-4 rounded-xl hover:bg-blue-700 transition shadow-lg">
                            إرسال الطلب
                        </button>
                        <p class="text-center text-gray-500 text-sm mt-4 flex items-center justify-center gap-2">
                            <span class="text-blue-600">✓</span> بياناتك آمنة ولن نشاركها مع أي طرف ثالث
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>

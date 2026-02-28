<?php
/* Template Name: Contact Page - مطابق React ContactPage
 * النصوص ومعلومات التواصل قابلة للتعديل من تحرير الصفحة (حقول ACF).
 */
get_header();
$contact_id = get_queried_object_id();
$c_hero_title   = (function_exists('get_field') && get_field('hero_title', $contact_id)) ? get_field('hero_title', $contact_id) : 'تواصل معنا';
$c_hero_desc    = (function_exists('get_field') && get_field('hero_description', $contact_id)) ? get_field('hero_description', $contact_id) : 'نحن هنا لمساعدتك في تحقيق مشروعك الهندسي. تواصل معنا اليوم';
$c_phone        = (function_exists('get_field') && get_field('contact_phone', $contact_id)) ? get_field('contact_phone', $contact_id) : '01009148383';
$c_email        = (function_exists('get_field') && get_field('contact_email', $contact_id)) ? get_field('contact_email', $contact_id) : 'info@qeema-group.com';
$c_address      = (function_exists('get_field') && get_field('contact_address', $contact_id)) ? get_field('contact_address', $contact_id) : "٣ مكرم عبيد - مدينة نصر - القاهرة\n(بجوار محجوب)";
$c_work_hours   = (function_exists('get_field') && get_field('work_hours', $contact_id)) ? get_field('work_hours', $contact_id) : 'الأحد - الخميس، 8:00 ص - 5:00 م';
$c_form_heading = (function_exists('get_field') && get_field('form_heading', $contact_id)) ? get_field('form_heading', $contact_id) : 'أرسل لنا رسالة';
$c_phone_clean = preg_replace('/[^0-9+]/', '', $c_phone);
$c_phone_tel   = $c_phone_clean ? 'tel:' . (strpos($c_phone_clean, '+') === 0 ? $c_phone_clean : '+' . $c_phone_clean) : 'tel:+201009148383';
?>

<!-- Hero - مطابق React (صورة من assets) -->
<section class="pt-32 pb-16 relative overflow-hidden min-h-[280px] flex items-center">
    <div class="absolute inset-0">
        <img src="<?php echo esc_url(visionary_get_hero_image_url('contact')); ?>" alt="" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-l from-blue-900/95 via-blue-800/90 to-blue-900/95"></div>
    </div>
    <div class="absolute inset-0 blueprint-grid opacity-20"></div>
    <div class="container relative z-10">
        <div class="max-w-3xl">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-6"><?php echo esc_html($c_hero_title); ?></h1>
            <p class="text-xl text-blue-100">
                <?php echo esc_html($c_hero_desc); ?>
            </p>
        </div>
    </div>
</section>

<!-- Contact Content - مطابق React -->
<section class="py-24 bg-background">
    <div class="container">
        <div class="grid lg:grid-cols-3 gap-12">
            <!-- Contact Info - 4 بطاقات مطابقة React -->
            <div class="lg:col-span-1 space-y-6">
                <div class="p-6 rounded-2xl bg-white border border-gray-200 hover:border-blue-200 hover:shadow-medium transition-all">
                    <div class="w-12 h-12 rounded-xl bg-blue-50 flex items-center justify-center text-blue-600 mb-4">📞</div>
                    <h3 class="font-bold text-gray-900 mb-2">اتصل بنا</h3>
                    <p class="text-gray-600">
                        <a href="<?php echo esc_attr($c_phone_tel); ?>" class="hover:text-blue-600 transition" dir="ltr"><?php echo esc_html($c_phone); ?></a>
                    </p>
                </div>
                <div class="p-6 rounded-2xl bg-white border border-gray-200 hover:border-blue-200 hover:shadow-medium transition-all">
                    <div class="w-12 h-12 rounded-xl bg-blue-50 flex items-center justify-center text-blue-600 mb-4">✉</div>
                    <h3 class="font-bold text-gray-900 mb-2">راسلنا</h3>
                    <p class="text-gray-600">
                        <a href="mailto:<?php echo esc_attr($c_email); ?>" class="hover:text-blue-600 transition"><?php echo esc_html($c_email); ?></a>
                    </p>
                </div>
                <div class="p-6 rounded-2xl bg-white border border-gray-200 hover:border-blue-200 hover:shadow-medium transition-all">
                    <div class="w-12 h-12 rounded-xl bg-blue-50 flex items-center justify-center text-blue-600 mb-4">📍</div>
                    <h3 class="font-bold text-gray-900 mb-2">زرنا</h3>
                    <p class="text-gray-600"><?php echo wp_kses_post(nl2br(esc_html($c_address))); ?></p>
                </div>
                <div class="p-6 rounded-2xl bg-white border border-gray-200 hover:border-blue-200 hover:shadow-medium transition-all">
                    <div class="w-12 h-12 rounded-xl bg-blue-50 flex items-center justify-center text-blue-600 mb-4">🕐</div>
                    <h3 class="font-bold text-gray-900 mb-2">ساعات العمل</h3>
                    <p class="text-gray-600"><?php echo esc_html($c_work_hours); ?></p>
                </div>
            </div>

            <!-- Form - مطابق React -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-3xl border border-gray-200 p-8 md:p-10 shadow-medium">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6"><?php echo esc_html($c_form_heading); ?></h2>
                    <?php
                    if (isset($_GET['contact_sent']) && $_GET['contact_sent'] === '1') {
                        echo '<div class="mb-6 p-4 rounded-lg bg-green-50 border border-green-200 text-green-800">تم إرسال رسالتك بنجاح. سنتواصل معك قريباً.</div>';
                    }
                    if (isset($_GET['contact_error'])) {
                        $err = sanitize_text_field(wp_unslash($_GET['contact_error']));
                        $msg = $err === 'nonce' ? 'خطأ في التحقق. حاول مرة أخرى.' : ($err === 'required' ? 'يرجى تعبئة الاسم والبريد والرسالة.' : ($err === 'email' ? 'البريد الإلكتروني غير صحيح.' : 'حدث خطأ. حاول مرة أخرى.'));
                        echo '<div class="mb-6 p-4 rounded-lg bg-red-50 border border-red-200 text-red-800">' . esc_html($msg) . '</div>';
                    }
                    ?>
                    <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post" class="space-y-6">
                        <input type="hidden" name="action" value="qeema_contact_submit">
                        <?php wp_nonce_field('qeema_contact_form', 'qeema_contact_nonce'); ?>
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-900 mb-2">الاسم الكامل</label>
                                <input type="text" name="name" required placeholder="أدخل اسمك" class="w-full h-12 rounded-lg border border-gray-300 px-4 focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-900 mb-2">البريد الإلكتروني</label>
                                <input type="email" name="email" required placeholder="example@domain.com" dir="ltr" class="w-full h-12 rounded-lg border border-gray-300 px-4 focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none">
                            </div>
                        </div>
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-900 mb-2">رقم الجوال</label>
                                <input type="tel" name="phone" required placeholder="٠١٠٠٩١٤٨٣٨٣" dir="ltr" class="w-full h-12 rounded-lg border border-gray-300 px-4 focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-900 mb-2">الموضوع</label>
                                <input type="text" name="subject" required placeholder="موضوع الرسالة" class="w-full h-12 rounded-lg border border-gray-300 px-4 focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none">
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-900 mb-2">الرسالة</label>
                            <textarea name="message" rows="5" required placeholder="اكتب رسالتك هنا..." class="w-full rounded-lg border border-gray-300 p-4 focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none"></textarea>
                        </div>
                        <button type="submit" class="w-full md:w-auto bg-blue-600 text-white px-8 py-3 rounded-lg font-bold hover:bg-blue-700 transition h-12 flex items-center justify-center gap-2">
                            إرسال الرسالة
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Google Maps - ٣ مكرم عبيد - مدينة نصر - القاهرة -->
<section class="w-full overflow-hidden rounded-2xl border border-gray-200 shadow-sm">
    <iframe
        src="https://www.google.com/maps?q=3%20Makram%20Ebeid%20St%2C%20Nasr%20City%2C%20Cairo%2C%20Egypt&z=16&output=embed"
        width="100%"
        height="450"
        style="border:0; display:block;"
        allowfullscreen=""
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"
        title="خريطة الموقع - ٣ مكرم عبيد - مدينة نصر - القاهرة">
    </iframe>
    </div>
</section>

<?php get_footer(); ?>

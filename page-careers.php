<?php
/**
 * Template Name: Careers Page - صفحة التوظيف
 * انضم إلى فريقنا: حيث يلتقي الشغف بالخبرة
 */
if (!defined('ABSPATH')) exit;
get_header();

$contact_url = home_url('/contact');
$form_anchor = '#careers-form';
$careers_sent = isset($_GET['careers_sent']) && $_GET['careers_sent'] === '1';
$careers_ref  = isset($_GET['careers_ref']) ? sanitize_text_field(wp_unslash($_GET['careers_ref'])) : '';
$careers_err  = isset($_GET['careers_error']) ? sanitize_text_field(wp_unslash($_GET['careers_error'])) : '';

$careers_emails = array(
    array('الهندسة المعمارية', 'careers.arch@qeema-group.com', 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4'),
    array('التصميم الداخلي', 'careers.interior@qeema-group.com', 'M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z'),
    array('MEP Systems', 'careers.mep@qeema-group.com', 'M13 10V3L4 14h7v7l9-11h-7z'),
    array('المساحة و GIS', 'careers.survey@qeema-group.com', 'M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7'),
    array('إدارة المشاريع', 'careers.pm@qeema-group.com', 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2'),
    array('الإدارة والتسويق', 'careers.admin@qeema-group.com', 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z'),
);

$specializations = array(
    'الهندسة المعمارية والتصميم الإنشائي',
    'التصميم الداخلي والتشطيبات',
    'أنظمة الكهروميكانيكال (MEP)',
    'هندسة المساحة ونظم المعلومات الجغرافية',
    'إدارة المشاريع',
    'الوظائف الإدارية والتسويق',
);
?>

<!-- Hero Section -->
<section class="relative min-h-[50vh] flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img src="<?php echo esc_url(visionary_get_hero_image_url('default')); ?>" alt="Join team" class="w-full h-full object-cover transform scale-105 transition-transform duration-1000">
        <div class="absolute inset-0 bg-gradient-to-r from-blue-900/95 via-blue-800/80 to-blue-900/60"></div>
        <div class="absolute inset-0 blueprint-grid opacity-10"></div>
    </div>
    <div class="container relative z-10 text-center px-4">
        <div class="max-w-4xl mx-auto space-y-6 animate-fade-in-up">
            <h1 class="text-4xl md:text-6xl font-bold text-white tracking-tight">
                ابنِ مستقبلك مع <span class="text-blue-400">قيمة جروب</span>
            </h1>
            <p class="text-xl md:text-2xl text-blue-100 leading-relaxed max-w-2xl mx-auto opacity-90">
                حيث يلتقي الشغف بالخبرة. انضم لفريق من المبدعين والخبراء واعمل على مشاريع تعيد تشكيل الأفق.
            </p>
            <div class="pt-4">
                 <a href="<?php echo esc_url($form_anchor); ?>" class="inline-flex items-center gap-2 px-8 py-4 rounded-full font-bold bg-white text-blue-600 hover:bg-blue-50 transition shadow-lg hover:shadow-xl hover:-translate-y-1">
                    قدّم طلبك الآن
                    <svg class="w-5 h-5 rtl:-scale-x-100" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                 </a>
            </div>
        </div>
    </div>
</section>

<div class="visionary-content-wrap">
    
    <!-- Why Join Us -->
    <section class="py-20 bg-white">
        <div class="container px-4 sm:px-6">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 !mb-4 !border-0 text-center">لماذا تنضم إلينا؟</h2>
                <p class="text-gray-600 text-lg">بيئة عمل محفزة النمو والتطور والإبداع</p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto">
                <div class="group p-8 rounded-3xl bg-gray-50 border border-gray-100 hover:bg-white hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                    <div class="w-14 h-14 bg-blue-100 text-blue-600 rounded-2xl flex items-center justify-center mb-6 text-2xl group-hover:bg-blue-600 group-hover:text-white transition-colors">🚀</div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">نمو مستمر</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">تطوير مهني وتدريب مستمر على أحدث التقنيات الهندسية.</p>
                </div>
                <div class="group p-8 rounded-3xl bg-gray-50 border border-gray-100 hover:bg-white hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                    <div class="w-14 h-14 bg-blue-100 text-blue-600 rounded-2xl flex items-center justify-center mb-6 text-2xl group-hover:bg-blue-600 group-hover:text-white transition-colors">💡</div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">بيئة مبتكرة</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">نقدر الأفكار الجديدة ونشجع الإبداع في حل المشكلات.</p>
                </div>
                <div class="group p-8 rounded-3xl bg-gray-50 border border-gray-100 hover:bg-white hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                    <div class="w-14 h-14 bg-blue-100 text-blue-600 rounded-2xl flex items-center justify-center mb-6 text-2xl group-hover:bg-blue-600 group-hover:text-white transition-colors">🤝</div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">روح الفريق</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">نعمل معًا كعائلة واحدة في جو من التعاون والاحترام المتبادل.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Application Form -->
    <section class="py-20 bg-gray-50 relative" id="careers-form">
        <div class="absolute inset-0 blueprint-grid opacity-5"></div>
        <div class="container px-4 sm:px-6 max-w-5xl mx-auto relative z-10">
            <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden">
                <div class="bg-blue-600 p-8 md:p-10 text-center text-white">
                    <h2 class="text-2xl md:text-3xl font-bold mb-2 text-white !border-0">نموذج التقديم</h2>
                    <p class="text-blue-100">ابدأ رحلتك معنا اليوم</p>
                </div>

                <div class="p-8 md:p-12">
                    <?php if ($careers_sent && $careers_ref) : ?>
                        <div class="mb-8 p-6 rounded-2xl bg-green-50 border border-green-200 text-green-800 flex items-start gap-4">
                            <svg class="w-6 h-6 text-green-600 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <div>
                                <p class="font-bold mb-1">تم استلام طلبك بنجاح!</p>
                                <p class="text-sm">رقم الطلب: <strong><?php echo esc_html($careers_ref); ?></strong>. سنراجع بياناتك ونتواصل معك قريبًا.</p>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if ($careers_err) : ?>
                        <div class="mb-8 p-4 rounded-xl bg-red-50 border border-red-200 text-red-800 flex items-center gap-3">
                            <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <span>خطأ: يرجى التحقق من المدخلات والمحاولة مرة أخرى.</span>
                        </div>
                    <?php endif; ?>

                    <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post" enctype="multipart/form-data" class="space-y-8 visionary-form">
                        <input type="hidden" name="action" value="<?php echo esc_attr(QEEMA_CAREERS_ACTION); ?>">
                        <?php wp_nonce_field('qeema_careers_form', 'qeema_careers_nonce'); ?>

                        <!-- Section 1 -->
                        <div class="space-y-6">
                            <h3 class="text-lg font-bold text-gray-900 border-b border-gray-100 pb-2 mb-4">البيانات الشخصية</h3>
                            <div class="grid md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">الاسم الكامل <span class="text-red-500">*</span></label>
                                    <input type="text" name="full_name" required class="visionary-input w-full bg-gray-50 focus:bg-white transition-colors" placeholder="الاسم ثلاثي">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">البريد الإلكتروني <span class="text-red-500">*</span></label>
                                    <input type="email" name="email" required class="visionary-input w-full bg-gray-50 focus:bg-white transition-colors" placeholder="email@example.com" dir="ltr">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">رقم الهاتف <span class="text-red-500">*</span></label>
                                    <input type="tel" name="phone" required class="visionary-input w-full bg-gray-50 focus:bg-white transition-colors" placeholder="+966 5x xxx xxxx" dir="ltr">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">المدينة / الدولة</label>
                                    <input type="text" name="city" class="visionary-input w-full bg-gray-50 focus:bg-white transition-colors" placeholder="الرياض، السعودية">
                                </div>
                            </div>
                        </div>

                        <!-- Section 2 -->
                        <div class="space-y-6">
                            <h3 class="text-lg font-bold text-gray-900 border-b border-gray-100 pb-2 mb-4">الخبرة المهنية</h3>
                            <div class="grid md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">التخصص <span class="text-red-500">*</span></label>
                                    <div class="relative">
                                        <select name="specialization" required class="visionary-input w-full bg-gray-50 focus:bg-white appearance-none cursor-pointer">
                                            <option value="">— اختر التخصص —</option>
                                            <?php foreach ($specializations as $s) : ?>
                                                <option value="<?php echo esc_attr($s); ?>"><?php echo esc_html($s); ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center px-3 text-gray-500">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">سنوات الخبرة</label>
                                    <input type="text" name="years_experience" class="visionary-input w-full bg-gray-50 focus:bg-white" placeholder="مثال: حديث التخرج، 3 سنوات...">
                                </div>
                                <div class="md:col-span-2">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">المهارات والبرامج</label>
                                    <textarea name="skills" rows="3" class="visionary-input w-full bg-gray-50 focus:bg-white" placeholder="AutoCAD, Revit, PMP, Communication Skills..."></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Section 3 -->
                        <div class="space-y-6">
                            <h3 class="text-lg font-bold text-gray-900 border-b border-gray-100 pb-2 mb-4">المرفقات</h3>
                            <div class="p-6 border-2 border-dashed border-gray-300 rounded-xl bg-gray-50 text-center hover:bg-blue-50 hover:border-blue-300 transition-colors cursor-pointer relative">
                                <input type="file" name="cv_file" required accept=".pdf" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                                <div class="space-y-2">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true"><path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /></svg>
                                    <div class="text-sm text-gray-600">
                                        <span class="font-medium text-blue-600 hover:text-blue-500">اختر ملف السيرة الذاتية (PDF)</span>
                                        <p class="text-xs text-gray-500 mt-1">الحد الأقصى 15 ميجابايت</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="grid md:grid-cols-2 gap-6 pt-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">رابط لينكدإن</label>
                                    <input type="url" name="linkedin" class="visionary-input w-full bg-gray-50 focus:bg-white" placeholder="https://linkedin.com/in/..." dir="ltr">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">رابط معرض الأعمال (Portfolio)</label>
                                    <input type="url" name="portfolio_url" class="visionary-input w-full bg-gray-50 focus:bg-white" placeholder="https://behance.net/..." dir="ltr">
                                </div>
                            </div>
                        </div>

                        <!-- Submit -->
                        <div class="pt-6 border-t border-gray-100">
                            <label class="flex gap-3 items-start cursor-pointer mb-6">
                                <input type="checkbox" name="privacy_agree" required class="mt-1 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                <span class="text-sm text-gray-600">أوافق على سياسة الخصوصية وأن البيانات المدخلة صحيحة.</span>
                            </label>
                            <button type="submit" class="w-full md:w-auto px-10 py-4 rounded-xl font-bold bg-blue-600 text-white hover:bg-blue-700 transition shadow-lg hover:shadow-blue-500/30 flex items-center justify-center gap-2 group">
                                <span>إرسال الطلب</span>
                                <svg class="w-5 h-5 rtl:-scale-x-100 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Emails Grid -->
    <section class="py-20 bg-white border-t border-gray-100">
        <div class="container px-4 sm:px-6">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-8 !border-0 text-center">أو تواصل مباشرة مع القسم المختص</h2>
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 max-w-6xl mx-auto">
                <?php foreach ($careers_emails as $item) : ?>
                    <div class="bg-gray-50 rounded-2xl p-6 border border-gray-100 hover:border-blue-200 hover:shadow-md transition group">
                        <div class="w-10 h-10 bg-white rounded-lg flex items-center justify-center text-blue-600 shadow-sm mb-4 group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="<?php echo esc_attr($item[2]); ?>"></path></svg>
                        </div>
                        <h3 class="font-bold text-gray-900 mb-2"><?php echo esc_html($item[0]); ?></h3>
                        <a href="mailto:<?php echo esc_attr($item[1]); ?>" class="text-blue-600 text-sm hover:underline flex items-center gap-1 dir-ltr">
                            <?php echo esc_html($item[1]); ?>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Final CTA -->
    <section class="py-20 bg-gradient-to-br from-gray-900 to-blue-900 text-white text-center rounded-t-[3rem] mt-10">
        <div class="container px-4">
            <h2 class="text-3xl font-bold mb-6">لديك استفسار آخر؟</h2>
            <div class="flex justify-center gap-4">
                <a href="<?php echo esc_url($contact_url); ?>" class="px-8 py-3 rounded-full bg-white text-blue-900 font-bold hover:bg-blue-50 transition">تواصل معنا</a>
            </div>
        </div>
    </section>

</div>

<?php get_footer(); ?>

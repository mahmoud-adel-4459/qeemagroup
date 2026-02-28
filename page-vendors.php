<?php
/**
 * Template Name: صفحة الموردين - Vendors / Supplier Registration
 * كن شريكًا في نجاحنا: سجل في قاعدة بيانات الموردين
 */
if (!defined('ABSPATH')) exit;
get_header();

$contact_url = home_url('/contact');
$form_anchor = '#vendor-form';
$vendor_sent = isset($_GET['vendor_sent']) && $_GET['vendor_sent'] === '1';
$vendor_ref  = isset($_GET['vendor_ref']) ? sanitize_text_field(wp_unslash($_GET['vendor_ref'])) : '';
$vendor_err  = isset($_GET['vendor_error']) ? sanitize_text_field(wp_unslash($_GET['vendor_error'])) : '';
?>

<!-- Hero Section -->
<section class="relative min-h-[50vh] flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img src="<?php echo esc_url(visionary_get_hero_image_url('default')); ?>" alt="Partnership" class="w-full h-full object-cover transform scale-105 transition-transform duration-1000 grayscale opacity-80">
        <div class="absolute inset-0 bg-gradient-to-r from-slate-900/95 via-slate-800/80 to-slate-900/60"></div>
        <div class="absolute inset-0 blueprint-grid opacity-10"></div>
    </div>
    <div class="container relative z-10 text-center px-4">
        <div class="max-w-4xl mx-auto space-y-6 animate-fade-in-up">
            <h1 class="text-4xl md:text-6xl font-bold text-white tracking-tight leading-tight">
                كن شريكًا في <span class="text-blue-400">النجاح</span>
            </h1>
            <p class="text-xl md:text-2xl text-slate-200 leading-relaxed max-w-2xl mx-auto opacity-90">
                سجل في شبكة موردينا المعتمدين وشاركنا بناء مشاريع استثنائية بمعايير عالمية.
            </p>
            <div class="pt-4">
                 <a href="<?php echo esc_url($form_anchor); ?>" class="inline-flex items-center gap-2 px-8 py-4 rounded-full font-bold bg-white text-slate-900 hover:bg-blue-50 transition shadow-lg hover:shadow-xl hover:-translate-y-1">
                    ابدأ التسجيل
                    <svg class="w-5 h-5 rtl:-scale-x-100" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path></svg>
                 </a>
            </div>
        </div>
    </div>
</section>

<div class="visionary-content-wrap">

    <!-- Partnership Values -->
    <section class="py-20 bg-white">
        <div class="container px-4 sm:px-6">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 !mb-4 !border-0 text-center">ماذا نبحث عنه في شركائنا؟</h2>
                <p class="text-gray-600 text-lg">معاييرنا التي تضمن التميز لنا ولكم</p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto">
                <div class="bg-slate-50 p-8 rounded-3xl border border-slate-100 hover:border-blue-200 hover:shadow-lg transition-all duration-300 text-center group">
                    <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center mx-auto mb-6 shadow-sm text-3xl group-hover:scale-110 transition-transform">🛡️</div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">الجودة والموثوقية</h3>
                    <p class="text-gray-600 leading-relaxed">الالتزام بأعلى معايير الجودة في المواد والخدمات المقدمة هو أساس أي شراكة معنا.</p>
                </div>
                <div class="bg-slate-50 p-8 rounded-3xl border border-slate-100 hover:border-blue-200 hover:shadow-lg transition-all duration-300 text-center group">
                    <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center mx-auto mb-6 shadow-sm text-3xl group-hover:scale-110 transition-transform">⏱️</div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">الالتزام بالوقت</h3>
                    <p class="text-gray-600 leading-relaxed">احترام الجداول الزمنية للتوريد والتنفيذ لضمان سير المشروع دون تأخير.</p>
                </div>
                <div class="bg-slate-50 p-8 rounded-3xl border border-slate-100 hover:border-blue-200 hover:shadow-lg transition-all duration-300 text-center group">
                    <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center mx-auto mb-6 shadow-sm text-3xl group-hover:scale-110 transition-transform">💡</div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">الابتكار والمرونة</h3>
                    <p class="text-gray-600 leading-relaxed">القدرة على تقديم حلول مبتكرة والتكيف مع متطلبات المشاريع المتغيرة.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Registration Form -->
    <section class="py-20 bg-slate-100 relative" id="vendor-form">
        <div class="absolute inset-0 blueprint-grid opacity-5"></div>
        <div class="container px-4 sm:px-6 max-w-4xl mx-auto relative z-10">
            
            <div class="flex items-center justify-between mb-8">
                <div>
                     <h2 class="text-2xl md:text-3xl font-bold text-gray-900 !mb-2 !border-0">تسجيل مورد جديد</h2>
                     <p class="text-gray-600">يرجى تعبئة البيانات بدقة لتسريع عملية الاعتماد</p>
                </div>
                <div class="hidden md:block text-5xl opacity-20">📝</div>
            </div>

            <?php if ($vendor_sent && $vendor_ref) : ?>
                <div class="mb-8 p-6 rounded-2xl bg-green-50 border border-green-200 text-green-800 flex items-start gap-4 shadow-sm">
                    <svg class="w-6 h-6 text-green-600 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <div>
                        <p class="font-bold text-lg mb-1">تم إرسال الطلب بنجاح</p>
                        <p>رقم التسجيل المرجعي: <code class="bg-green-100 px-2 py-1 rounded font-bold"><?php echo esc_html($vendor_ref); ?></code></p>
                        <p class="text-sm mt-2">سنقوم بمراجعة الملفات والتواصل معكم قريبًا.</p>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ($vendor_err) : ?>
                 <div class="mb-8 p-4 rounded-xl bg-red-50 border border-red-200 text-red-800 flex items-center gap-3">
                    <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span>حدث خطأ أثناء الإرسال. يرجى التأكد من البيانات وحجم المرفقات.</span>
                </div>
            <?php endif; ?>

            <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post" enctype="multipart/form-data" class="space-y-6 visionary-form">
                <input type="hidden" name="action" value="<?php echo esc_attr(QEEMA_VENDOR_ACTION); ?>">
                <?php wp_nonce_field('qeema_vendor_form', 'qeema_vendor_nonce'); ?>

                <!-- Step 1: Info -->
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-200 relative overflow-hidden group hover:shadow-md transition-shadow">
                    <div class="absolute top-0 right-0 w-1 h-full bg-blue-500"></div>
                    <div class="flex items-center gap-3 mb-6">
                        <span class="flex items-center justify-center w-8 h-8 rounded-full bg-blue-100 text-blue-600 font-bold text-sm">1</span>
                        <h3 class="text-xl font-bold text-gray-900 !m-0">بيانات المنشأة</h3>
                    </div>
                    
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">اسم الشركة التجاري <span class="text-red-500">*</span></label>
                            <input type="text" name="company_name" required class="visionary-input w-full bg-slate-50 focus:bg-white transition-colors" placeholder="اسم الشركة">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">رقم السجل التجاري / الضريبي</label>
                            <input type="text" name="tax_id" class="visionary-input w-full bg-slate-50 focus:bg-white transition-colors" placeholder="السجل التجاري">
                        </div>
                        <div class="md:col-span-2">
                             <label class="block text-sm font-medium text-gray-700 mb-2">العنوان والموقع</label>
                             <div class="grid md:grid-cols-2 gap-4">
                                <input type="text" name="country" class="visionary-input w-full bg-slate-50 focus:bg-white" placeholder="الدولة">
                                <input type="text" name="city" class="visionary-input w-full bg-slate-50 focus:bg-white" placeholder="المدينة">
                             </div>
                             <textarea name="address" rows="2" class="visionary-input w-full bg-slate-50 focus:bg-white mt-4" placeholder="العنوان التفصيلي..."></textarea>
                        </div>
                        <div class="md:col-span-2 border-t border-slate-100 pt-4 mt-2">
                            <label class="block text-sm font-bold text-gray-900 mb-3">بيانات مسؤول التواصل</label>
                            <div class="grid md:grid-cols-3 gap-4">
                                <input type="text" name="contact_name" class="visionary-input w-full bg-slate-50 focus:bg-white" placeholder="الاسم">
                                <input type="tel" name="contact_phone" class="visionary-input w-full bg-slate-50 focus:bg-white" placeholder="الجوال" dir="ltr">
                                <input type="email" name="contact_email" class="visionary-input w-full bg-slate-50 focus:bg-white" placeholder="البريد الإلكتروني" dir="ltr">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Step 2: Classification -->
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-200 relative overflow-hidden group hover:shadow-md transition-shadow">
                    <div class="absolute top-0 right-0 w-1 h-full bg-blue-500"></div>
                     <div class="flex items-center gap-3 mb-6">
                        <span class="flex items-center justify-center w-8 h-8 rounded-full bg-blue-100 text-blue-600 font-bold text-sm">2</span>
                        <h3 class="text-xl font-bold text-gray-900 !m-0">النشاط والتصنيف</h3>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-3">نوع النشاط:</label>
                        <div class="flex flex-wrap gap-4">
                            <label class="inline-flex items-center gap-2 cursor-pointer bg-slate-50 px-4 py-2 rounded-lg border border-slate-200 hover:bg-blue-50 hover:border-blue-200 transition">
                                <input type="checkbox" name="entity_type[]" value="مورّد مواد" class="rounded text-blue-600 w-5 h-5">
                                <span class="text-sm font-medium">مورّد مواد</span>
                            </label>
                            <label class="inline-flex items-center gap-2 cursor-pointer bg-slate-50 px-4 py-2 rounded-lg border border-slate-200 hover:bg-blue-50 hover:border-blue-200 transition">
                                <input type="checkbox" name="entity_type[]" value="مقاول باطن" class="rounded text-blue-600 w-5 h-5">
                                <span class="text-sm font-medium">مقاول باطن</span>
                            </label>
                            <label class="inline-flex items-center gap-2 cursor-pointer bg-slate-50 px-4 py-2 rounded-lg border border-slate-200 hover:bg-blue-50 hover:border-blue-200 transition">
                                <input type="checkbox" name="entity_type[]" value="خدمات استشارية" class="rounded text-blue-600 w-5 h-5">
                                <span class="text-sm font-medium">خدمات استشارية</span>
                            </label>
                        </div>
                    </div>
                
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-3">مجالات التخصص:</label>
                        <div class="grid sm:grid-cols-2 gap-3">
                            <label class="flex items-center gap-3 p-3 rounded-lg border border-transparent hover:bg-slate-50 transition">
                                <input type="checkbox" name="classification[]" value="أعمال مدنية وإنشائية" class="rounded text-blue-600 w-4 h-4">
                                <span class="text-sm text-gray-700">أعمال مدنية وإنشائية (خرسانة/حديد)</span>
                            </label>
                            <label class="flex items-center gap-3 p-3 rounded-lg border border-transparent hover:bg-slate-50 transition">
                                <input type="checkbox" name="classification[]" value="تشطيبات وديكور" class="rounded text-blue-600 w-4 h-4">
                                <span class="text-sm text-gray-700">تشطيبات وديكور (أرضيات/دهانات)</span>
                            </label>
                            <label class="flex items-center gap-3 p-3 rounded-lg border border-transparent hover:bg-slate-50 transition">
                                <input type="checkbox" name="classification[]" value="أعمال كهربائية" class="rounded text-blue-600 w-4 h-4">
                                <span class="text-sm text-gray-700">أعمال كهربائية (كابلات/إضاءة)</span>
                            </label>
                            <label class="flex items-center gap-3 p-3 rounded-lg border border-transparent hover:bg-slate-50 transition">
                                <input type="checkbox" name="classification[]" value="أعمال ميكانيكية" class="rounded text-blue-600 w-4 h-4">
                                <span class="text-sm text-gray-700">أعمال ميكانيكية (تكييف/حريق/صحي)</span>
                            </label>
                            <label class="flex items-center gap-3 p-3 rounded-lg border border-transparent hover:bg-slate-50 transition">
                                <input type="checkbox" name="classification[]" value="تيار خفيف وأنظمة أمنية" class="rounded text-blue-600 w-4 h-4">
                                <span class="text-sm text-gray-700">تيار خفيف وأنظمة أمنية</span>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Step 3: Documents -->
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-200 relative overflow-hidden group hover:shadow-md transition-shadow">
                    <div class="absolute top-0 right-0 w-1 h-full bg-blue-500"></div>
                     <div class="flex items-center gap-3 mb-6">
                        <span class="flex items-center justify-center w-8 h-8 rounded-full bg-blue-100 text-blue-600 font-bold text-sm">3</span>
                        <h3 class="text-xl font-bold text-gray-900 !m-0">المستندات</h3>
                    </div>

                    <div class="space-y-4">
                        <div class="p-4 border border-dashed border-slate-300 rounded-xl bg-slate-50 hover:bg-white hover:border-blue-300 transition-colors">
                            <label class="block text-sm font-bold text-gray-700 mb-1">الملف التعريفي (Profile) <span class="text-red-500">*</span></label>
                            <input type="file" name="doc_profile" required accept=".pdf" class="w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                        </div>
                        <div class="p-4 border border-dashed border-slate-300 rounded-xl bg-slate-50 hover:bg-white hover:border-blue-300 transition-colors">
                            <label class="block text-sm font-bold text-gray-700 mb-1">السجل التجاري وشهادات التصنيف</label>
                            <input type="file" name="doc_registration" accept=".pdf,.zip,.rar" class="w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                        </div>
                    </div>
                </div>

                <!-- Submit -->
                <div class="p-4">
                    <label class="flex gap-3 items-start cursor-pointer mb-6">
                        <input type="checkbox" name="privacy_agree" required class="mt-1 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                        <span class="text-sm text-gray-600">أوافق على صحة البيانات المقدمة وعلى سياسة الخصوصية.</span>
                    </label>
                    <button type="submit" class="w-full py-4 rounded-xl font-bold bg-slate-900 text-white hover:bg-blue-600 transition-colors shadow-lg text-lg flex justify-center items-center gap-2">
                        إرسال طلب التسجيل
                        <svg class="w-5 h-5 rtl:-scale-x-100" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </button>
                    <p class="text-center text-xs text-gray-400 mt-4">سيتم التعامل مع جميع البيانات بسرية تامة.</p>
                </div>
            </form>
        </div>
    </section>

</div>

<?php get_footer(); ?>

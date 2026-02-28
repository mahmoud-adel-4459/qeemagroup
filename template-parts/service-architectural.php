<?php
/**
 * محتوى صفحة خدمة التصميم المعماري والإنشائي والإشراف - داتا كاملة
 */
if (!defined('ABSPATH')) exit;
$quotation_url = home_url('/quotation');
$contact_url = home_url('/contact');
?>
<div id="service-details" class="visionary-content-wrap">

<!-- تمهيد قصير -->
<section class="py-16 md:py-24 bg-white">
    <div class="container px-4 sm:px-6 max-w-4xl mx-auto text-right">
        <div class="prose prose-lg md:prose-xl max-w-none text-gray-600 leading-relaxed">
            <p class="font-medium text-2xl md:text-3xl text-gray-900 mb-6 leading-relaxed">
                نحوّل فكرتك إلى مبنى <span class="visionary-gradient-text font-bold">آمن وفعّال واقتصادي</span>.
            </p>
            <p>
                ندمج العمارة بالهندسة وبإشراف موقعي صارم، مدعوم بأدوات رقمية (BIM/CDE) لضمان تسليم في الموعد وضمن الميزانية—دون مفاجآت.
            </p>
        </div>
    </div>
</section>

<!-- لماذا التصميم والإشراف الاحترافي مهم؟ -->
<section class="py-16 md:py-24 bg-slate-50 relative overflow-hidden">
    <div class="absolute inset-0 bg-grid-pattern opacity-50 pointer-events-none"></div>
    <div class="container px-4 sm:px-6 max-w-6xl mx-auto text-right relative z-10">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">لماذا تختارنا؟</h2>
            <div class="w-16 h-1 bg-blue-600 mx-auto rounded-full"></div>
            <p class="text-gray-600 mt-4 max-w-2xl mx-auto">التصميم الهندسي المدروس والإشراف الدقيق ليسا تكلفة إضافية، بل هما بوليصة تأمين لمشروعك.</p>
        </div>
        
        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl transition-shadow duration-300 border border-gray-100 group">
                <div class="w-14 h-14 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center text-2xl mb-6 group-hover:scale-110 transition-transform duration-300">
                    <span class="font-bold">1</span>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">تجنب تجاوز الميزانية</h3>
                <p class="text-gray-600 leading-relaxed">
                     تشير الإحصاءات إلى أن <strong class="text-red-500">9 من 10</strong> مشاريع تتجاوز ميزانيتها بدون تخطيط دقيق. نحن نضمن لك ضبط التكاليف من اليوم الأول.
                </p>
            </div>

            <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl transition-shadow duration-300 border border-gray-100 group">
                <div class="w-14 h-14 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center text-2xl mb-6 group-hover:scale-110 transition-transform duration-300">
                     <span class="font-bold">2</span>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">منع أخطاء التصميم</h3>
                <p class="text-gray-600 leading-relaxed">
                    أخطاء التصميم قد تضيف <strong class="text-red-500">14%</strong> تكاليف إضافية. استخدامنا لتقنيات BIM يكتشف التعارضات قبل البناء.
                </p>
            </div>

            <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl transition-shadow duration-300 border border-gray-100 group">
                <div class="w-14 h-14 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center text-2xl mb-6 group-hover:scale-110 transition-transform duration-300">
                     <span class="font-bold">3</span>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">الالتزام بالجدول الزمني</h3>
                <p class="text-gray-600 leading-relaxed">
                    نتجنب التأخيرات التي تصل إلى <strong class="text-red-500">20%</strong> في المشاريع التقليدية عبر إدارة مشاريع احترافية ومتابعة دقيقة.
                </p>
            </div>
        </div>

        <div class="mt-12 text-center">
            <a href="<?php echo esc_url($contact_url); ?>" class="inline-flex items-center gap-2 px-8 py-4 rounded-xl font-bold bg-blue-600 text-white hover:bg-blue-700 transition shadow-lg hover:-translate-y-1">
                اطلب مراجعة سريعة لمخططاتك <span class="rtl:rotate-180">→</span>
            </a>
        </div>
    </div>
</section>

<!-- ما الذي نقدمه؟ (نطاق خدماتنا) -->
<section class="py-16 md:py-24 bg-white">
    <div class="container px-4 sm:px-6 max-w-6xl mx-auto text-right">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">ما الذي نقدمه؟</h2>
                <p class="text-lg text-gray-600 mb-8">نقدم حزمة متكاملة تغطي كافة الجوانب المعمارية والإنشائية لضمان مبنى متكامل الوظائف:</p>
                <ul class="space-y-6">
                    <li class="flex gap-4">
                        <div class="flex-shrink-0 w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-bold">
                            <!-- Icon: Architecture -->
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                        </div>
                        <div>
                            <h4 class="text-lg font-bold text-gray-900">التصميم المعماري المتكامل</h4>
                            <p class="text-gray-600 mt-1">من الفكرة الأولية والرسومات التخطيطية إلى الواجهات الجذابة والتوزيع الوظيفي الأمثل للفراغات.</p>
                        </div>
                    </li>
                    <li class="flex gap-4">
                        <div class="flex-shrink-0 w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-bold">
                            <!-- Icon: Structural -->
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                        </div>
                        <div>
                            <h4 class="text-lg font-bold text-gray-900">التصميم الإنشائي الدقيق</h4>
                            <p class="text-gray-600 mt-1">تصميم هياكل آمنة واقتصادية تضمن استدامة المبنى وقدرته على تحمل كافة الأحمال.</p>
                        </div>
                    </li>
                    <li class="flex gap-4">
                        <div class="flex-shrink-0 w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-bold">
                            <!-- Icon: Permits -->
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        </div>
                        <div>
                            <h4 class="text-lg font-bold text-gray-900">إصدار التراخيص والموافقات</h4>
                            <p class="text-gray-600 mt-1">إعداد وتقديم كافة المخططات والوثائق اللازمة للجهات الرسمية لضمان الحصول على تراخيص البناء.</p>
                        </div>
                    </li>
                    <li class="flex gap-4">
                        <div class="flex-shrink-0 w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-bold">
                           <!-- Icon: Supervision -->
                           <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                        </div>
                        <div>
                            <h4 class="text-lg font-bold text-gray-900">الإشراف الهندسي على التنفيذ</h4>
                            <p class="text-gray-600 mt-1">نحن عيناك في الموقع لضمان الجودة، ومراقبة الجدول الزمني، والتحكم في التكاليف.</p>
                        </div>
                    </li>
                </ul>
            </div>
<?php 
            $img_offer = function_exists('get_field') ? get_field('section_image_1') : null;
            $default_img_offer = get_template_directory_uri() . '/assets/images/service-architectural.jpg';
            $img_url = ($img_offer && !empty($img_offer['url'])) ? $img_offer['url'] : $default_img_offer;
            ?>
            <div class="relative h-full min-h-[400px] rounded-3xl overflow-hidden shadow-2xl group">
                 <div class="absolute inset-0 bg-gray-900/10 group-hover:bg-transparent transition-colors duration-500 z-10"></div>
                 <img src="<?php echo esc_url($img_url); ?>" alt="Architectural Design" class="absolute inset-0 w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700">
                 
                 <div class="absolute bottom-0 left-0 right-0 p-8 bg-gradient-to-t from-black/80 to-transparent text-white z-20">
                      <p class="font-bold text-xl">هندسة دقيقة</p>
                      <p class="text-sm text-gray-300">كل خط مرسوم له معنى ووظيفة.</p>
                 </div>
            </div>
        </div>
    </div>
</section>

<!-- كيف ننفذ ذلك؟ (Zigzag Timeline) -->
<section class="py-16 md:py-24 bg-slate-50">
    <div class="container px-4 sm:px-6 max-w-5xl mx-auto">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">كيف ننفذ ذلك؟</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">نؤمن بالشفافية الكاملة. رحلتنا معك تتبع خطوات واضحة تضمن تحقيق رؤيتك.</p>
        </div>

        <div class="relative">
            <!-- Central Line for Desktop -->
            <div class="hidden md:block absolute right-1/2 transform translate-x-1/2 h-full w-0.5 bg-gray-200"></div>

            <?php
            $phases = array(
                array(
                    'title' => 'مرحلة التخطيط الأولي',
                    'desc' => 'نجلس معك لفهم أهدافك، متطلباتك الوظيفية، وتحليل الموقع والميزانية المتاحة لوضع أساس متين للمشروع.',
                    'icon' => '1'
                ),
                array(
                    'title' => 'مرحلة التصميم التخطيطي (SD)',
                    'desc' => 'يقوم مهندسونا المعماريون بتحويل أفكارك إلى مفاهيم تصميم أولية، مع عرضها كنماذج ثلاثية الأبعاد لتصور واضح.',
                    'icon' => '2'
                ),
                array(
                    'title' => 'مرحلة تطوير التصميم (DD)',
                    'desc' => 'ندمج التفاصيل المعمارية والإنشائية باستخدام تقنية نمذجة معلومات البناء (BIM) لاكتشاف التعارضات مبكراً.',
                    'icon' => '3'
                ),
                array(
                    'title' => 'مرحلة إعداد وثائق البناء (CD)',
                    'desc' => 'نقوم بإنتاج مجموعة كاملة من الرسومات التنفيذية والمواصفات الفنية الدقيقة لطرحها للمقاولين.',
                    'icon' => '4'
                ),
                array(
                    'title' => 'مرحلة الإشراف على التنفيذ',
                    'desc' => 'يتواجد فريقنا في الموقع لمتابعة كل خطوة، وإدارة الجودة، وحل أي تحديات فنية لضمان التنفيذ طبقاً للمخططات.',
                    'icon' => '5'
                ),
                 array(
                    'title' => 'التحوّل الرقمي (CDE)',
                    'desc' => 'نستخدم بيئة بيانات مشتركة لضمان تدفق المعلومات بين المالك والمصمم والمقاول بسلاسة وشفافية.',
                    'icon' => '6'
                ),
            );
            
            foreach ($phases as $i => $p) : 
                $is_even = ($i % 2 == 0);
            ?>
                <div class="relative mb-12 md:mb-0 flex md:items-center <?php echo $is_even ? 'md:flex-row' : 'md:flex-row-reverse'; ?>">
                    <!-- Timeline Dot -->
                    <div class="hidden md:flex absolute right-1/2 transform translate-x-1/2 w-10 h-10 bg-blue-600 rounded-full border-4 border-white shadow-lg items-center justify-center text-white font-bold z-10">
                        <?php echo $p['icon']; ?>
                    </div>
                    
                    <!-- Content Spacer -->
                    <div class="hidden md:block w-1/2"></div>
                    
                    <!-- Content Card -->
                    <div class="w-full md:w-1/2 <?php echo $is_even ? 'md:pl-12' : 'md:pr-12'; ?> pl-10 md:pl-0 border-r-2 md:border-r-0 border-gray-200 md:border-none pr-6 md:pr-0">
                        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition">
                            <span class="md:hidden inline-block w-8 h-8 bg-blue-600 text-white rounded-full text-center leading-8 font-bold text-sm mb-3"><?php echo $p['icon']; ?></span>
                            <h3 class="text-xl font-bold text-gray-900 mb-2"><?php echo esc_html($p['title']); ?></h3>
                            <p class="text-gray-600 leading-relaxed text-sm"><?php echo esc_html($p['desc']); ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ما الذي ستحصل عليه؟ (Grid Cards like Interior) -->
<section class="py-16 md:py-24 bg-white">
    <div class="container px-4 sm:px-6 max-w-5xl mx-auto text-right">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">ما الذي ستحصل عليه؟</h2>
            <p class="text-gray-600">وثائق هندسية احترافية تضمن حقوقك وتوضح أدق التفاصيل</p>
        </div>
        
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-slate-50 p-6 rounded-xl border border-slate-100 flex gap-4 items-start">
                <div class="text-blue-600 text-xl mt-1">📐</div>
                <div>
                    <h4 class="font-bold text-gray-900 mb-1">مخططات معمارية</h4>
                    <p class="text-sm text-gray-600">رسومات تفصيلية للمساقط والواجهات والقطاعات.</p>
                </div>
            </div>
            <div class="bg-slate-50 p-6 rounded-xl border border-slate-100 flex gap-4 items-start">
                <div class="text-blue-600 text-xl mt-1">🏗️</div>
                <div>
                    <h4 class="font-bold text-gray-900 mb-1">مخططات إنشائية</h4>
                    <p class="text-sm text-gray-600">حسابات دقيقة للأعمدة والأسقف لضمان الأمان.</p>
                </div>
            </div>
            <div class="bg-slate-50 p-6 rounded-xl border border-slate-100 flex gap-4 items-start">
                <div class="text-blue-600 text-xl mt-1">🧱</div>
                <div>
                    <h4 class="font-bold text-gray-900 mb-1">نماذج 3D</h4>
                    <p class="text-sm text-gray-600">تصورات واقعية للمبنى قبل البدء في التنفيذ.</p>
                </div>
            </div>
             <div class="bg-slate-50 p-6 rounded-xl border border-slate-100 flex gap-4 items-start">
                <div class="text-blue-600 text-xl mt-1">📋</div>
                <div>
                    <h4 class="font-bold text-gray-900 mb-1">جداول الكميات (BOQ)</h4>
                    <p class="text-sm text-gray-600">حصر دقيق لكافة المواد لضبط الميزانية.</p>
                </div>
            </div>
            <div class="bg-slate-50 p-6 rounded-xl border border-slate-100 flex gap-4 items-start">
                <div class="text-blue-600 text-xl mt-1">📝</div>
                <div>
                    <h4 class="font-bold text-gray-900 mb-1">المواصفات الفنية</h4>
                    <p class="text-sm text-gray-600">توصيف دقيق لطريقة التنفيذ والمواد المستخدمة.</p>
                </div>
            </div>
            <div class="bg-slate-50 p-6 rounded-xl border border-slate-100 flex gap-4 items-start">
                <div class="text-blue-600 text-xl mt-1">👷</div>
                <div>
                    <h4 class="font-bold text-gray-900 mb-1">تقارير إشراف</h4>
                    <p class="text-sm text-gray-600">تقارير دورية مصورة عن تقدم سير العمل.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- أدواتنا لضبط الجودة - مصفوفة إدارة المخاطر -->
<section class="py-16 md:py-24 bg-gray-50">
    <div class="container px-4 sm:px-6 max-w-5xl mx-auto text-right">
        <h2 class="text-2xl md:text-3xl font-bold text-blue-600 mb-6">أدواتنا لضبط الجودة وحماية استثمارك</h2>
        
        <div class="mb-12">
            <h3 class="text-xl font-bold text-gray-900 mb-4 flex items-center gap-2">
                <span class="w-8 h-8 rounded-lg bg-blue-100 text-blue-600 flex items-center justify-center text-sm">1</span>
                مصفوفة إدارة المخاطر
            </h3>
            <p class="text-gray-700 mb-6">الإشراف الهندسي الفعال يحول المخاطر العالية إلى مخاطر يمكن التحكم بها:</p>
            <div class="overflow-x-auto rounded-xl border border-gray-200 bg-white shadow-sm mb-10">
                <table class="w-full text-sm text-right min-w-[600px]">
                    <thead>
                        <tr class="bg-blue-50 border-b border-gray-200">
                            <th class="px-4 py-3 font-bold text-gray-900">المخاطر</th>
                            <th class="px-4 py-3 font-bold text-gray-900">الاحتمالية (بدون إشراف)</th>
                            <th class="px-4 py-3 font-bold text-gray-900">التأثير (بدون إشراف)</th>
                            <th class="px-4 py-3 font-bold text-blue-600">الاحتمالية (مع إشرافنا)</th>
                            <th class="px-4 py-3 font-bold text-blue-600">التأثير (مع إشرافنا)</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        <tr class="border-b border-gray-100"><td class="px-4 py-3 font-medium">أخطاء في التنفيذ</td><td class="px-4 py-3 text-red-500">مرجح</td><td class="px-4 py-3 text-red-500">كارثي</td><td class="px-4 py-3 text-green-600">نادر</td><td class="px-4 py-3 text-green-600">متوسط</td></tr>
                        <tr class="border-b border-gray-100"><td class="px-4 py-3 font-medium">تجاوز الميزانية</td><td class="px-4 py-3 text-red-500">شبه مؤكد</td><td class="px-4 py-3 text-red-500">كبير</td><td class="px-4 py-3 text-green-600">محتمل</td><td class="px-4 py-3 text-green-600">طفيف</td></tr>
                        <tr class="border-b border-gray-100"><td class="px-4 py-3 font-medium">تأخير الجدول الزمني</td><td class="px-4 py-3 text-red-500">شبه مؤكد</td><td class="px-4 py-3 text-red-500">كبير</td><td class="px-4 py-3 text-green-600">محتمل</td><td class="px-4 py-3 text-green-600">متوسط</td></tr>
                        <tr><td class="px-4 py-3 font-medium">جودة مواد رديئة</td><td class="px-4 py-3 text-red-500">مرجح</td><td class="px-4 py-3 text-red-500">كبير</td><td class="px-4 py-3 text-green-600">نادر</td><td class="px-4 py-3 text-green-600">طفيف</td></tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<!-- الأسئلة الشائعة (Layout Update) -->
<section class="py-16 md:py-24 bg-white" id="faq">
    <div class="container px-4 sm:px-6 max-w-4xl mx-auto text-right">
        <h2 class="text-2xl md:text-3xl font-bold text-blue-600 mb-10">أسئلة شائعة</h2>
        <div class="space-y-6">
            <?php
            $faq_items = array(
                array('ما الفرق بين التصميم المعماري والإنشائي؟', 'التصميم المعماري يركز على الجانب الجمالي والوظيفي للمبنى، مثل توزيع الغرف وشكل الواجهات. أما التصميم الإنشائي فيركز على الهيكل العظمي للمبنى (الأساسات، الأعمدة، الأسقف) لضمان سلامته واستقراره.'),
                array('لماذا أحتاج للإشراف إذا كان التصميم جيداً؟', 'التصميم الجيد هو نصف الطريق فقط. الإشراف يضمن أن هذا التصميم يتم تنفيذه بدقة، وباستخدام مواد عالية الجودة، وفي حدود الميزانية والوقت. كما أنه ضروري لحل أي مشاكل فنية تظهر في الموقع بشكل فوري وصحيح.'),
                array('كم تبلغ تكلفة التصميم والإشراف؟', 'تختلف التكلفة بناءً على حجم المشروع وتعقيده. لكن الأهم هو اعتبارها استثمارًا وليس تكلفة، حيث إنها توفر عليك أضعاف قيمتها عن طريق تجنب الأخطاء المكلفة التي قد تحدث بدون وجود فريق هندسي محترف.'),
            );
            foreach ($faq_items as $faq) : ?>
                 <div class="bg-gray-50 rounded-xl p-5 border border-gray-100">
                    <h3 class="font-bold text-gray-900 mb-2"><?php echo esc_html($faq[0]); ?></h3>
                    <p class="text-gray-600 text-sm leading-relaxed"><?php echo esc_html($faq[1]); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>


<!-- CTA ختامي -->
<section class="py-20 md:py-24 bg-blue-600">
    <div class="container px-4 sm:px-6 text-center">
        <h2 class="text-2xl md:text-3xl font-bold text-white mb-4">هل أنت مستعد لبناء مشروعك على أساس متين؟</h2>
        <p class="text-blue-100 mb-8">تواصل معنا اليوم لمناقشة رؤيتك واحصل على استشارة مبدئية لمشروعك.</p>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="<?php echo esc_url($contact_url); ?>" class="inline-flex items-center gap-2 px-8 py-4 rounded-xl font-bold bg-white text-blue-600 hover:bg-blue-50 transition shadow-lg">احجز استشارة مجانية</a>
            <a href="<?php echo esc_url($quotation_url); ?>" class="inline-flex items-center gap-2 px-8 py-4 rounded-xl font-bold border-2 border-white text-white hover:bg-white/10 transition">اطلب عرض سعر للتصميم والإشراف</a>
        </div>
    </div>
</section>

<?php
$faq_schema = array(
    '@context' => 'https://schema.org',
    '@type' => 'FAQPage',
    'mainEntity' => array(
        array('@type' => 'Question', 'name' => 'ما الفرق بين التصميم المعماري والإنشائي؟', 'acceptedAnswer' => array('@type' => 'Answer', 'text' => 'التصميم المعماري يركز على الجانب الجمالي والوظيفي للمبنى، مثل توزيع الغرف وشكل الواجهات. أما التصميم الإنشائي فيركز على الهيكل العظمي للمبنى (الأساسات، الأعمدة، الأسقف) لضمان سلامته واستقراره.')),
        array('@type' => 'Question', 'name' => 'لماذا أحتاج للإشراف إذا كان التصميم جيداً؟', 'acceptedAnswer' => array('@type' => 'Answer', 'text' => 'التصميم الجيد هو نصف الطريق فقط. الإشراف يضمن أن هذا التصميم يتم تنفيذه بدقة، وباستخدام مواد عالية الجودة، وفي حدود الميزانية والوقت.')),
        array('@type' => 'Question', 'name' => 'كم تبلغ تكلفة التصميم والإشراف؟', 'acceptedAnswer' => array('@type' => 'Answer', 'text' => 'تختلف التكلفة بناءً على حجم المشروع وتعقيده. لكن الأهم هو اعتبارها استثمارًا وليس تكلفة، حيث إنها توفر عليك أضعاف قيمتها عن طريق تجنب الأخطاء المكلفة.')),
    ),
);
?>
</div>
<script type="application/ld+json"><?php echo wp_json_encode($faq_schema); ?></script>

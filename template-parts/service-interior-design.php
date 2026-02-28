<?php
/**
 * محتوى صفحة خدمة التصميم الداخلي والتشطيبات - داتا كاملة
 * يُحمّل من single-service.php عند عرض هذه الخدمة.
 */
if (!defined('ABSPATH')) exit;
$quotation_url = home_url('/quotation');
$contact_url = home_url('/contact');
?>
<div id="service-details" class="visionary-content-wrap">

<!-- تمهيد (Intro) -->
<section class="py-16 md:py-24 bg-white" aria-label="تمهيد">
    <div class="container px-4 sm:px-6 max-w-4xl mx-auto text-right">
        <div class="prose prose-lg md:prose-xl max-w-none text-gray-600 leading-relaxed">
            <p class="font-medium text-2xl md:text-3xl text-gray-900 mb-6 leading-relaxed">
                نحوّل رؤيتك إلى مساحات حيّة <span class="visionary-gradient-text font-bold">تجمع بين الأناقة والكفاءة</span> وراحة الاستخدام.
            </p>
            <p>
                سواء كانت فيلا سكنية، مكتبًا يزيد إنتاجية فريقك، أو متجرًا يجذب العملاء، يعمل مهندسونا ومصمّمونا بمنهجية واضحة، ونماذج ثلاثية الأبعاد قبل التنفيذ، وإدارة مشروع دقيقة من أول يوم حتى التسليم.
            </p>
        </div>
    </div>
</section>

<!-- لماذا هذه الخدمة؟ -->
<section class="py-16 md:py-24 bg-slate-50 relative overflow-hidden">
    <div class="absolute inset-0 bg-grid-pattern opacity-50 pointer-events-none"></div>
    <div class="container px-4 sm:px-6 max-w-6xl mx-auto text-right relative z-10">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">لماذا تختارنا؟</h2>
            <div class="w-16 h-1 bg-blue-600 mx-auto rounded-full"></div>
        </div>
        
        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl transition-shadow duration-300 border border-gray-100 group">
                <div class="w-14 h-14 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center text-2xl mb-6 group-hover:scale-110 transition-transform duration-300">
                    <i class="fa-solid fa-eye"></i> <!-- Assumes FontAwesome or similar, utilizing text char as fallback if needed -->
                    <span class="font-bold">1</span>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">تقليل المفاجآت</h3>
                <p class="text-gray-600 leading-relaxed">
                     تقليل مفاجآت الموقع وإعادة العمل حتى <strong class="text-blue-600">97%</strong> عبر نماذج 3D&2D ومراجعات مبكرة.
                </p>
            </div>

            <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl transition-shadow duration-300 border border-gray-100 group">
                <div class="w-14 h-14 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center text-2xl mb-6 group-hover:scale-110 transition-transform duration-300">
                     <span class="font-bold">2</span>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">ضبط الميزانية</h3>
                <p class="text-gray-600 leading-relaxed">
                    تحكّم كامل في التكاليف بجدول كميات ومواصفات (BoQ/Specs) دقيق وواضح من البداية.
                </p>
            </div>

            <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl transition-shadow duration-300 border border-gray-100 group">
                <div class="w-14 h-14 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center text-2xl mb-6 group-hover:scale-110 transition-transform duration-300">
                     <span class="font-bold">3</span>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">تسليم أسرع</h3>
                <p class="text-gray-600 leading-relaxed">
                    نلتزم بالوقت عبر جدول تنفيذ ومعالم (Milestones) وتتبّع أسبوعي دقيق لسير العمل.
                </p>
            </div>
        </div>

        <div class="mt-12 text-center">
            <a href="<?php echo esc_url($contact_url); ?>" class="inline-flex items-center gap-2 px-8 py-4 rounded-xl font-bold bg-blue-600 text-white hover:bg-blue-700 transition shadow-lg hover:-translate-y-1">
                اطلب معاينة أولية لمشروعك <span class="rtl:rotate-180">→</span>
            </a>
        </div>
    </div>
</section>

<!-- ما الذي نقدمه؟ -->
<section class="py-16 md:py-24 bg-white">
    <div class="container px-4 sm:px-6 max-w-6xl mx-auto text-right">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">ما الذي نقدمه؟</h2>
                <p class="text-lg text-gray-600 mb-8">نقدم حلول تصميم داخلي وتشطيبات متكاملة وشاملة، من الفكرة الأولية حتى تسليم المفتاح:</p>
                <ul class="space-y-6">
                    <li class="flex gap-4">
                        <div class="flex-shrink-0 w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-bold">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2 2 4-4m6 2a9 9 0 11-9-9 9 9 0 019 9z"></path></svg>
                        </div>
                        <div>
                            <h4 class="text-lg font-bold text-gray-900">التصميم الداخلي السكني</h4>
                            <p class="text-gray-600 mt-1">تصميم وتشطيب الفلل، القصور، والشقق لخلق منازل عصرية ومريحة تعكس شخصيتك الفريدة.</p>
                        </div>
                    </li>
                    <li class="flex gap-4">
                        <div class="flex-shrink-0 w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-bold">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                        </div>
                        <div>
                            <h4 class="text-lg font-bold text-gray-900">التصميم الداخلي التجاري</h4>
                            <p class="text-gray-600 mt-1">تصميم المكاتب الإدارية، المحلات، المطاعم، والفنادق لدعم علامتك التجارية وتعزز تجربة العملاء.</p>
                        </div>
                    </li>
                    <li class="flex gap-4">
                        <div class="flex-shrink-0 w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-bold">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.384-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                        </div>
                        <div>
                            <h4 class="text-lg font-bold text-gray-900">التصميم للمشاريع المتخصصة</h4>
                            <p class="text-gray-600 mt-1">تصميم العيادات، المعارض، وصالونات التجميل مع فهم كامل للمتطلبات الوظيفية.</p>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="relative h-full min-h-[400px] rounded-3xl overflow-hidden shadow-2xl">
                 <!-- Placeholder for a dynamic image if available, else a nice gradient/pattern -->
                 <div class="absolute inset-0 bg-gradient-to-br from-blue-600 to-slate-800"></div>
                 <div class="absolute inset-0 flex items-center justify-center text-white/10">
                    <svg class="w-64 h-64" fill="currentColor" viewBox="0 0 24 24"><path d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/></svg>
                 </div>
                 <div class="absolute bottom-0 left-0 right-0 p-8 bg-gradient-to-t from-black/80 to-transparent text-white">
                      <p class="font-bold text-xl">تنفيذ متقن</p>
                      <p class="text-sm text-gray-300">نلتزم بأعلى معايير الجودة في كل تفصيل.</p>
                 </div>
            </div>
        </div>
    </div>
</section>

<!-- كيف ننفّذ؟ (Timeline) -->
<section class="py-16 md:py-24 bg-slate-50">
    <div class="container px-4 sm:px-6 max-w-5xl mx-auto">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">كيف ننفّذ؟</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">نؤمن بالشفافية الكاملة. رحلتنا معك تتبع خطوات واضحة تضمن تحقيق رؤيتك.</p>
        </div>

        <div class="relative">
            <!-- Central Line for Desktop -->
            <div class="hidden md:block absolute right-1/2 transform translate-x-1/2 h-full w-0.5 bg-gray-200"></div>

            <?php
            $phases = array(
                array(
                    'title' => 'الفكرة والاستشارة',
                    'desc' => 'تبدأ بجلسة استماع معمقة لفهم رؤيتك، أسلوب حياتك، وأهدافك المالية. نجمع الإلهام ونضع الأهداف الاستراتيجية للمشروع.',
                    'icon' => '1'
                ),
                array(
                    'title' => 'التصميم الأولي والمخططات',
                    'desc' => 'نستخدم أدوات رقمية متقدمة لتطوير مفاهيم أولية ومخططات توزيع الفراغات (Space Planning). نقدم لوحات إلهام (Mood Boards).',
                    'icon' => '2'
                ),
                array(
                    'title' => 'تطوير التصميم والتفاصيل',
                    'desc' => 'بعد موافقتك، ننتقل للتفاصيل الدقيقة. نساعدك في اختيار كل عنصر بعناية فائقة—من مواد الأرضيات إلى الإضاءة.',
                    'icon' => '3'
                ),
                array(
                    'title' => 'التنفيذ والإشراف',
                    'desc' => 'يتولى مديرو المشاريع لدينا التنسيق الكامل مع الموردين والمقاولين، وإدارة جميع أعمال التشطيبات في الموقع.',
                    'icon' => '4'
                ),
                array(
                    'title' => 'التسليم والضمان',
                    'desc' => 'بعد تركيب الأثاث واللمسات النهائية، نجري فحصًا نهائيًا للجودة ونسلمك مفتاح مساحتك الجديدة.',
                    'icon' => '5'
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
                    
                    <!-- Mobile Timeline Line/Dot handled by CSS padding/borders usually, but here simplicity is key -->

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

        <div class="text-center mt-12">
            <a href="<?php echo esc_url($contact_url); ?>" class="inline-flex items-center gap-2 px-8 py-4 rounded-xl font-bold bg-blue-600 text-white hover:bg-blue-700 transition shadow-lg">
                احجز زيارة موقع / معاينة خامات
            </a>
        </div>
    </div>
</section>

<!-- ما الذي ستحصل عليه فعليًا؟ -->
<section class="py-16 md:py-24 bg-white">
    <div class="container px-4 sm:px-6 max-w-5xl mx-auto text-right">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">ما الذي ستحصل عليه؟</h2>
            <p class="text-gray-600">حزمة متكاملة من الوثائق والمخرجات تضمن لك الوضوح والتحكم الكامل</p>
        </div>
        
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-slate-50 p-6 rounded-xl border border-slate-100 flex gap-4 items-start">
                <div class="text-blue-600 text-xl mt-1"><i class="fa-solid fa-palette"></i></div>
                <div>
                    <h4 class="font-bold text-gray-900 mb-1">لوحات الإلهام</h4>
                    <p class="text-sm text-gray-600">لتحديد الطابع اللوني والمادي للمشروع.</p>
                </div>
            </div>
            <div class="bg-slate-50 p-6 rounded-xl border border-slate-100 flex gap-4 items-start">
                <div class="text-blue-600 text-xl mt-1"><i class="fa-solid fa-couch"></i></div>
                <div>
                    <h4 class="font-bold text-gray-900 mb-1">مخططات الأثاث</h4>
                    <p class="text-sm text-gray-600">Furniture Layouts لتحقيق أقصى استفادة من المساحة.</p>
                </div>
            </div>
            <div class="bg-slate-50 p-6 rounded-xl border border-slate-100 flex gap-4 items-start">
                <div class="text-blue-600 text-xl mt-1"><i class="fa-solid fa-cube"></i></div>
                <div>
                    <h4 class="font-bold text-gray-900 mb-1">رندرات 3D</h4>
                    <p class="text-sm text-gray-600">لتصور واقعي للنتيجة النهائية قبل التنفيذ.</p>
                </div>
            </div>
             <div class="bg-slate-50 p-6 rounded-xl border border-slate-100 flex gap-4 items-start">
                <div class="text-blue-600 text-xl mt-1"><i class="fa-solid fa-list-check"></i></div>
                <div>
                    <h4 class="font-bold text-gray-900 mb-1">قائمة المواصفات</h4>
                    <p class="text-sm text-gray-600">Spec Sheet تفصيلية بكل المواد والتشطيبات.</p>
                </div>
            </div>
            <div class="bg-slate-50 p-6 rounded-xl border border-slate-100 flex gap-4 items-start">
                <div class="text-blue-600 text-xl mt-1"><i class="fa-solid fa-file-invoice-dollar"></i></div>
                <div>
                    <h4 class="font-bold text-gray-900 mb-1">جداول كميات (BOQ)</h4>
                    <p class="text-sm text-gray-600">لشفافية مالية كاملة وضبط التكاليف.</p>
                </div>
            </div>
            <div class="bg-slate-50 p-6 rounded-xl border border-slate-100 flex gap-4 items-start">
                <div class="text-blue-600 text-xl mt-1"><i class="fa-solid fa-calendar-day"></i></div>
                <div>
                    <h4 class="font-bold text-gray-900 mb-1">جدول زمني</h4>
                    <p class="text-sm text-gray-600">لمتابعة سير العمل خطوة بخطوة.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- نطاق أعمالنا (Simple Cards) -->
<section class="py-16 bg-slate-100">
    <div class="container px-4 sm:px-6 max-w-4xl mx-auto text-center">
        <h2 class="text-2xl font-bold text-blue-600 mb-8">نطاق أعمالنا</h2>
        <div class="grid md:grid-cols-3 gap-6">
            <div class="bg-white p-6 rounded-2xl shadow-sm">
                <div class="text-4xl mb-4">🏠</div>
                <h3 class="font-bold text-gray-900 mb-2">سكني</h3>
                <p class="text-gray-500 text-sm">فلل، قصور، شقق<br>راحة وخصوصية</p>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-sm">
                <div class="text-4xl mb-4">🏢</div>
                <h3 class="font-bold text-gray-900 mb-2">تجاري</h3>
                <p class="text-gray-500 text-sm">مكاتب، محلات، فنادق<br>هوية وتجربة عميل</p>
            </div>
             <div class="bg-white p-6 rounded-2xl shadow-sm">
                <div class="text-4xl mb-4">🏥</div>
                <h3 class="font-bold text-gray-900 mb-2">متخصص</h3>
                <p class="text-gray-500 text-sm">عيادات، صالونات<br>اشتراطات دقيقة</p>
            </div>
        </div>
    </div>
</section>

<!-- لمسة قيمة جروب المميّزة -->
<section class="py-16 md:py-24 bg-white">
    <div class="container px-4 sm:px-6 max-w-5xl mx-auto text-right">
        <div class="bg-gradient-to-br from-blue-600 to-blue-800 rounded-3xl p-8 md:p-12 text-white relative overflow-hidden shadow-2xl">
            <!-- Decorative circles -->
            <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full blur-3xl -mr-16 -mt-16"></div>
            <div class="absolute bottom-0 left-0 w-64 h-64 bg-black/10 rounded-full blur-3xl -ml-16 -mb-16"></div>
            
            <div class="relative z-10 grid lg:grid-cols-2 gap-10 items-center">
                <div>
                    <h2 class="text-3xl md:text-4xl font-bold mb-6 text-white">لمسة قيمة جروب المميّزة</h2>
                    <ul class="space-y-4">
                        <li class="flex gap-3 items-start">
                            <span class="flex-shrink-0 w-6 h-6 rounded-full bg-white/20 flex items-center justify-center text-sm">✓</span>
                            <span class="text-blue-50"><strong>جمال + وظيفة:</strong> تصميم يَسعد العين ويخدم الاستخدام.</span>
                        </li>
                        <li class="flex gap-3 items-start">
                            <span class="flex-shrink-0 w-6 h-6 rounded-full bg-white/20 flex items-center justify-center text-sm">✓</span>
                            <span class="text-blue-50"><strong>إدارة محترفة:</strong> شفافية واتصال عبر نقطة واحدة.</span>
                        </li>
                        <li class="flex gap-3 items-start">
                            <span class="flex-shrink-0 w-6 h-6 rounded-full bg-white/20 flex items-center justify-center text-sm">✓</span>
                            <span class="text-blue-50"><strong>قوة المورّدين:</strong> مواد أصلية بأسعار تنافسية.</span>
                        </li>
                         <li class="flex gap-3 items-start">
                            <span class="flex-shrink-0 w-6 h-6 rounded-full bg-white/20 flex items-center justify-center text-sm">✓</span>
                            <span class="text-blue-50"><strong>تكامل هندسي:</strong> تنسيق مع الإنشائي وMEP.</span>
                        </li>
                    </ul>
                    <div class="mt-8">
                         <a href="<?php echo esc_url($quotation_url); ?>" class="inline-flex items-center gap-2 px-6 py-3 rounded-xl font-bold bg-white text-blue-600 hover:bg-gray-100 transition shadow-lg">
                            اطلب تسعيرًا تقديريًا لمساحتك
                         </a>
                    </div>
                </div>
                <div class="hidden lg:flex justify-end">
                    <!-- Icon or Abstract Illustration -->
                    <div class="w-48 h-48 bg-white/10 backdrop-blur-md rounded-full flex items-center justify-center border border-white/20">
                        <span class="text-6xl">💎</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- أدوات تفاعلية -->
<section class="py-16 md:py-20 bg-gray-50">
    <div class="container px-4 sm:px-6 max-w-4xl mx-auto text-right">
        <h2 class="text-2xl md:text-3xl font-bold text-blue-600 mb-8">أدوات تفاعلية لمساعدتك على التخطيط</h2>
        <div class="space-y-6">
            <div class="bg-white rounded-2xl p-6 border border-gray-100">
                <h3 class="font-bold text-gray-900 mb-2">حاسبة التكاليف التقديرية</h3>
                <p class="text-gray-600 mb-4">هل تخطط لمشروعك؟ استخدم حاسبتنا التفاعلية للحصول على تقدير سريع لتكاليف التشطيب (لكل متر مربع) والمدة الزمنية المتوقعة لمساحتك السكنية أو المكتبية.</p>
                <a href="<?php echo esc_url($quotation_url); ?>" class="text-blue-600 font-semibold hover:underline">جرّب الحاسبة الآن</a>
            </div>
            <div class="bg-white rounded-2xl p-6 border border-gray-100">
                <h3 class="font-bold text-gray-900 mb-2">معرض لوحات الإلهام (Moodboards)</h3>
                <p class="text-gray-600 mb-4">استلهم أفكارًا جديدة! تصفح معرضنا التفاعلي للوحات الإلهام حسب الأسلوب (مودرن، كلاسيك، بسيط) لترى كيف يمكننا تحويل مساحتك.</p>
                <a href="<?php echo esc_url(home_url('/#services')); ?>" class="text-blue-600 font-semibold hover:underline">تصفح المعرض</a>
            </div>
            <div class="bg-white rounded-2xl p-6 border border-gray-100">
                <h3 class="font-bold text-gray-900 mb-2">نموذج قائمة التجهيزات (Spec Sheet)</h3>
                <p class="text-gray-600 mb-4">هل تريد أن تعرف كيف نبني الجودة؟ قم بتحميل نموذج لقائمة التجهيزات لترى مستوى التفاصيل والدقة الذي نتبعه في اختيار المواد.</p>
                <a href="<?php echo esc_url($contact_url); ?>" class="text-blue-600 font-semibold hover:underline">اطلب النموذج</a>
            </div>
        </div>
    </div>
</section>

<!-- دراسات حالة -->
<section class="py-16 md:py-20 bg-white">
    <div class="container px-4 sm:px-6 max-w-4xl mx-auto text-right">
        <h2 class="text-2xl md:text-3xl font-bold text-blue-600 mb-10">دراسات حالة مختصرة</h2>
        <div class="grid md:grid-cols-2 gap-8">
            <div class="bg-gray-50 rounded-2xl p-6 border border-gray-100">
                <h3 class="font-bold text-gray-900 mb-4">فيلا النخيل – سكني</h3>
                <p class="text-gray-700 text-sm mb-2"><strong>التحدّي:</strong> مساحة مفتوحة مع ضوء طبيعي محدود.</p>
                <p class="text-gray-700 text-sm mb-2"><strong>حلّنا:</strong> مخطط فراغات ذكي، معالجة إضاءة متعددة الطبقات، خامات فاتحة مع خشب دافئ.</p>
                <p class="text-gray-700 text-sm mb-4"><strong>الأثر:</strong> رضا عالٍ للعميل، تسليم قبل الموعد بـ 5%، وفورات تشطيبات 12%.</p>
                <a href="<?php echo esc_url($contact_url); ?>" class="text-blue-600 font-semibold text-sm hover:underline">تحميل دراسة حالة PDF</a>
            </div>
            <div class="bg-gray-50 rounded-2xl p-6 border border-gray-100">
                <h3 class="font-bold text-gray-900 mb-4">مكتب شركة لوجستية – تجاري</h3>
                <p class="text-gray-700 text-sm mb-2"><strong>التحدّي:</strong> زيادة محطات العمل دون فقد الراحة.</p>
                <p class="text-gray-700 text-sm mb-2"><strong>حلّنا:</strong> توزيع مرن، هوية بصرية هادئة، معالجة صوتية.</p>
                <p class="text-gray-700 text-sm mb-4"><strong>الأثر:</strong> زيادة كثافة الاستخدام +18%، تحسّن رضا الموظفين +24%.</p>
                <a href="<?php echo esc_url($contact_url); ?>" class="text-blue-600 font-semibold text-sm hover:underline">تحميل دراسة حالة PDF</a>
            </div>
        </div>
    </div>
</section>

<!-- الأسئلة الشائعة (FAQ) -->
<section class="py-16 md:py-20 bg-gray-50" id="faq">
    <div class="container px-4 sm:px-6 max-w-4xl mx-auto text-right">
        <h2 class="text-2xl md:text-3xl font-bold text-blue-600 mb-10">الأسئلة الشائعة</h2>
        <div class="space-y-6">
            <?php
            $faq_items = array(
                array('كم تستغرق عملية التصميم والتنفيذ؟', 'تعتمد المدة على حجم المشروع وتعقيده. بشكل عام، قد يستغرق مشروع إعادة تصميم منزل بالكامل ما بين 10 إلى 12 شهرًا من الفكرة الأولية حتى التسليم النهائي.'),
                array('كيف تضمنون الالتزام بالميزانية؟', 'نحن نعمل بشفافية كاملة. بعد تحديد الميزانية في المرحلة الأولى، نقدم لك جدول كميات مفصل، ونحصل على موافقتك قبل أي عملية شراء. كما نخصص دائمًا 10-15% كبند للطوارئ لتجنب أي مفاجآت.'),
                array('ما هو أسلوب التصميم الذي تتبعه "قيمة جروب"؟', 'نحن نتميز بالمرونة، لكن أسلوبنا يميل إلى التصاميم العصرية والبسيطة التي تركز على الراحة والوظيفة، مع ابتكار أفكار متجددة لتلبية مختلف الأذواق.'),
                array('هل الـ3D يطابق الواقع؟', 'نعم—نستخدم لوحات خامات وموديلات دقيقة، مع جلسة مطابقة ألوان وإضاءة قبل الشراء.'),
                array('ماذا يشمل السعر؟', 'نتبع الشفافية في التسعير، يتم تسعير كل مرحلة منفصلة بسعر مستقل لدعم اتخاذ القرار.'),
                array('هل تقدّمون ضمانًا؟', 'ضمان تشطيبات لمدة 12 شهر على التركيب، مع زيارة متابعة بعد 30 يومًا من التسليم.'),
            );
            foreach ($faq_items as $faq) : ?>
                <div class="bg-white rounded-xl p-5 border border-gray-100">
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
        <h2 class="text-2xl md:text-3xl font-bold text-white mb-4">حوّل مساحتك إلى تجربة مُلهِمة</h2>
        <div class="flex flex-wrap justify-center gap-4 mt-8">
            <a href="<?php echo esc_url($quotation_url); ?>" class="inline-flex items-center gap-2 px-6 py-3 rounded-xl font-bold bg-white text-blue-600 hover:bg-blue-50 transition">احسب ميزانيتك التقديرية الآن</a>
            <a href="<?php echo esc_url($contact_url); ?>" class="inline-flex items-center gap-2 px-6 py-3 rounded-xl font-bold border-2 border-white text-white hover:bg-white/10 transition">احجز استشارة مجانية</a>
            <a href="<?php echo esc_url($contact_url); ?>" class="inline-flex items-center gap-2 px-6 py-3 rounded-xl font-bold border-2 border-white text-white hover:bg-white/10 transition">ارفع مخططاتك لمراجعة سريعة</a>
        </div>
    </div>
</section>

<?php
// FAQPage Schema لتحسين ظهور الأسئلة الشائعة في البحث
$faq_schema = array(
    '@context' => 'https://schema.org',
    '@type' => 'FAQPage',
    'mainEntity' => array(
        array('@type' => 'Question', 'name' => 'كم تستغرق عملية التصميم والتنفيذ؟', 'acceptedAnswer' => array('@type' => 'Answer', 'text' => 'تعتمد المدة على حجم المشروع وتعقيده. بشكل عام، قد يستغرق مشروع إعادة تصميم منزل بالكامل ما بين 10 إلى 12 شهرًا من الفكرة الأولية حتى التسليم النهائي.')),
        array('@type' => 'Question', 'name' => 'كيف تضمنون الالتزام بالميزانية؟', 'acceptedAnswer' => array('@type' => 'Answer', 'text' => 'نحن نعمل بشفافية كاملة. بعد تحديد الميزانية في المرحلة الأولى، نقدم لك جدول كميات مفصل، ونحصل على موافقتك قبل أي عملية شراء. كما نخصص دائمًا 10-15% كبند للطوارئ لتجنب أي مفاجآت.')),
        array('@type' => 'Question', 'name' => 'ما هو أسلوب التصميم الذي تتبعه "قيمة جروب"؟', 'acceptedAnswer' => array('@type' => 'Answer', 'text' => 'نحن نتميز بالمرونة، لكن أسلوبنا يميل إلى التصاميم العصرية والبسيطة التي تركز على الراحة والوظيفة، مع ابتكار أفكار متجددة لتلبية مختلف الأذواق.')),
        array('@type' => 'Question', 'name' => 'هل الـ3D يطابق الواقع؟', 'acceptedAnswer' => array('@type' => 'Answer', 'text' => 'نعم—نستخدم لوحات خامات وموديلات دقيقة، مع جلسة مطابقة ألوان وإضاءة قبل الشراء.')),
        array('@type' => 'Question', 'name' => 'ماذا يشمل السعر؟', 'acceptedAnswer' => array('@type' => 'Answer', 'text' => 'نتبع الشفافية في التسعير، يتم تسعير كل مرحلة منفصلة بسعر مستقل لدعم اتخاذ القرار.')),
        array('@type' => 'Question', 'name' => 'هل تقدّمون ضمانًا؟', 'acceptedAnswer' => array('@type' => 'Answer', 'text' => 'ضمان تشطيبات لمدة 12 شهر على التركيب، مع زيارة متابعة بعد 30 يومًا من التسليم.')),
    ),
);
?>
</div>
<script type="application/ld+json"><?php echo wp_json_encode($faq_schema); ?></script>

<?php
/**
 * محتوى الشروط والأحكام فقط — لا يُستخدم لسياسة الخصوصية
 * يُستدعى من page-terms.php فقط
 */
if (!defined('ABSPATH')) exit;
$terms_updated = isset($terms_updated) ? $terms_updated : '1 يناير 2025';
$terms_email  = isset($terms_email) ? $terms_email : get_bloginfo('admin_email');
$terms_phone  = isset($terms_phone) ? $terms_phone : '';
$terms_address = isset($terms_address) ? $terms_address : '';
?>
<section class="py-12 md:py-20 bg-white">
    <div class="container px-4 sm:px-6 max-w-4xl mx-auto text-right">
        <p class="text-sm text-gray-500 mb-10">تاريخ آخر تحديث: <strong><?php echo esc_html($terms_updated); ?></strong></p>

        <p class="text-lg md:text-xl text-gray-700 leading-relaxed mb-10">
            مرحباً بك في موقع قيمة جروب. استخدامك لهذا الموقع أو لخدماتنا يشكل موافقتك على الشروط والأحكام التالية. يرجى قراءتها بعناية قبل تقديم أي طلب أو استخدام الموقع.
        </p>

        <div class="space-y-10">
            <div class="bg-white rounded-2xl border border-gray-200 p-6 md:p-8">
                <h2 class="text-xl font-bold text-blue-600 mb-4 pb-2 border-b border-gray-200">1) القبول بالشروط</h2>
                <p class="text-gray-700 leading-relaxed mb-3">باستخدامك موقع قيمة جروب أو التواصل معنا لطلب عروض أسعار أو خدمات (تصميم معماري/إنشائي، MEP، مساحة، تصميم داخلي، إشراف، استشارات)، فإنك توافق على الالتزام بهذه الشروط والأحكام. إذا كنت لا توافق عليها، يرجى عدم استخدام الموقع أو تقديم أي طلبات.</p>
            </div>

            <div class="bg-white rounded-2xl border border-gray-200 p-6 md:p-8">
                <h2 class="text-xl font-bold text-blue-600 mb-4 pb-2 border-b border-gray-200">2) الخدمات</h2>
                <p class="text-gray-700 leading-relaxed mb-3">قيمة جروب تقدم خدمات هندسية تشمل — على سبيل المثال لا الحصر — التصميم المعماري والإنشائي، التصميم الداخلي والتشطيبات، أنظمة MEP (ميكانيكال/كهرباء/سباكة)، هندسة المساحة والرفع الطبوغرافي، والإشراف الهندسي. نطاق أي خدمة يحدده العقد أو خطاب التكليف أو عرض السعر المعتمد بينك وبين الشركة، وليس مجرد وصف الخدمات على الموقع.</p>
            </div>

            <div class="bg-white rounded-2xl border border-gray-200 p-6 md:p-8">
                <h2 class="text-xl font-bold text-blue-600 mb-4 pb-2 border-b border-gray-200">3) استخدام الموقع</h2>
                <p class="text-gray-700 leading-relaxed mb-3">تتعهد بعدم استخدام الموقع لأي غرض غير قانوني أو مخالف للآداب العامة، وبعدم إدخال فيروسات أو برمجيات ضارة، أو محاولة الوصول غير المصرح به إلى أنظمتنا أو بيانات العملاء. نحتفظ بحق تقييد أو منع الوصول لأي مستخدم يخالف هذه الشروط.</p>
            </div>

            <div class="bg-white rounded-2xl border border-gray-200 p-6 md:p-8">
                <h2 class="text-xl font-bold text-blue-600 mb-4 pb-2 border-b border-gray-200">4) الملكية الفكرية</h2>
                <p class="text-gray-700 leading-relaxed mb-3">جميع محتويات الموقع (نصوص، شعارات، صور، تصاميم، واجهات) هي ملك لقيمة جروب أو مرخّصة لها، ولا يجوز نسخها أو إعادة استخدامها دون إذن كتابي. المخرجات الهندسية (مخططات، تقارير، نماذج) المُسلّمة بموجب عقد تكون ملكيتها وحق استخدامها وفق ما ينص عليه العقد المبرم معك.</p>
            </div>

            <div class="bg-white rounded-2xl border border-gray-200 p-6 md:p-8">
                <h2 class="text-xl font-bold text-blue-600 mb-4 pb-2 border-b border-gray-200">5) عروض الأسعار والعقود</h2>
                <p class="text-gray-700 leading-relaxed mb-3">عروض الأسعار المقدمة عبر الموقع أو البريد أو أي قناة أخرى لا تُلزم قيمة جروب إلا بعد التوقيع على عقد أو خطاب تكليف وتستيف الشروط المالية والإجرائية المتفق عليها. الأسعار والجدول الزمني قد تتغير حسب تغيّر نطاق العمل أو المتطلبات الإضافية.</p>
            </div>

            <div class="bg-white rounded-2xl border border-gray-200 p-6 md:p-8">
                <h2 class="text-xl font-bold text-blue-600 mb-4 pb-2 border-b border-gray-200">6) المسؤولية والضمان</h2>
                <p class="text-gray-700 leading-relaxed mb-3">نلتزم بتقديم خدماتنا وفق المعايير المهنية المعتمدة وفي إطار نطاق العقد. لا نتحمل مسؤولية عن أضرار غير متوقعة أو غير مباشرة ناتجة عن استخدام الموقع أو تأخير خارج عن إرادتنا. أي ضمانات إضافية تُذكر صراحة في العقد المبرم مع العميل.</p>
            </div>

            <div class="bg-white rounded-2xl border border-gray-200 p-6 md:p-8">
                <h2 class="text-xl font-bold text-blue-600 mb-4 pb-2 border-b border-gray-200">7) الروابط الخارجية</h2>
                <p class="text-gray-700 leading-relaxed mb-3">قد يحتوي الموقع على روابط لمواقع أو موارد تابعة لأطراف ثالثة. نحن غير مسؤولين عن محتوى أو ممارسات تلك المواقع، ويُفضّل مراجعة شروطهم وخصوصيتهم قبل التعامل معهم.</p>
            </div>

            <div class="bg-white rounded-2xl border border-gray-200 p-6 md:p-8">
                <h2 class="text-xl font-bold text-blue-600 mb-4 pb-2 border-b border-gray-200">8) التعديلات على الشروط</h2>
                <p class="text-gray-700 leading-relaxed mb-3">قد نقوم بتحديث هذه الشروط من وقت لآخر. سيتم نشر أي تعديل على هذه الصفحة مع تحديث تاريخ "آخر تحديث". استمرار استخدامك للموقع أو الخدمات بعد التعديلات يعني موافقتك على النسخة المحدثة.</p>
            </div>

            <div class="bg-white rounded-2xl border border-gray-200 p-6 md:p-8">
                <h2 class="text-xl font-bold text-blue-600 mb-4 pb-2 border-b border-gray-200">9) القانون الحاكم وتسوية المنازعات</h2>
                <p class="text-gray-700 leading-relaxed mb-3">تخضع هذه الشروط والأحكام للقانون المعمول به في جمهورية مصر العربية. أي نزاع ينشأ عن استخدام الموقع أو الخدمات يُفضّل حله ودياً؛ وإلا فالمحاكم المختصة في جمهورية مصر العربية هي الجهة صاحبة الاختصاص.</p>
            </div>

            <div class="bg-white rounded-2xl border border-gray-200 p-6 md:p-8">
                <h2 class="text-xl font-bold text-blue-600 mb-4 pb-2 border-b border-gray-200">10) التواصل معنا</h2>
                <p class="text-gray-700 leading-relaxed mb-3">لأي استفسار حول هذه الشروط أو خدماتنا، يمكنك التواصل معنا عبر:</p>
                <ul class="space-y-1 text-gray-700 text-sm md:text-base">
                    <li>البريد الإلكتروني: <?php echo $terms_email ? '<a href="mailto:' . esc_attr($terms_email) . '" class="text-blue-600 hover:underline">' . esc_html($terms_email) . '</a>' : '(أضف البريد في إعدادات الموقع)'; ?></li>
                    <li>رقم الهاتف: <?php echo $terms_phone ? esc_html($terms_phone) : '(أضف رقم الهاتف)'; ?></li>
                    <li>العنوان: <?php echo $terms_address ? esc_html($terms_address) : '(أضف العنوان)'; ?></li>
                </ul>
            </div>
        </div>
    </div>
</section>

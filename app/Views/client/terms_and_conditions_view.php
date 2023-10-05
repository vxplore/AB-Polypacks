<?php if (!empty($page_contents)) {

    if (!empty($page_contents->page_background_image)) {
        $page_background_image = base_url($page_contents->page_background_image);
    } else {
        $page_background_image = "";
    }

    if (!empty($page_contents->page_heading)) {
        $page_heading = $page_contents->page_heading;
    } else {
        $page_heading = "";
    }

} ?>

<section class="innerpagebanner position-relative" style="
background-image: url(<?=$page_background_image?>); 
background-size: cover; 
background-repeat: no-repeat; padding: 120px 0;">
    <div class="container py-4">
        <h1 class="mb-3 text-center fadeUp"><?=$page_heading?></h1>
        <nav class="fadeUp" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Terms & Conditions</li>
            </ol>
        </nav>
    </div>
    <a href="#scrollsec" class="scrollclk">
        <div id="mouse-scroll">
            <div class="mouse">
            <div class="mouse-in"></div>
            </div>
            <div>
                <span class="down-arrow-1"></span>
                <span class="down-arrow-2"></span>
                <span class="down-arrow-3"></span>
            </div>
        </div>
    </a>
</section>
<section class="py-5" id="scrollsec">
    <div class="container">
        <p>Creating comprehensive terms and conditions for a website is a legal process that should ideally involve consultation with a legal professional to ensure compliance with applicable laws and regulations. Below is a general template for terms and conditions for A.B. Polypacks PVT. LTD's website (<a href="https://abpolypacks.com/">https://abpolypacks.com/</a> ). However, it is strongly recommended to consult with a legal expert to tailor these terms to your specific business needs and legal requirements:            </p>
        <p><b>**Terms and Conditions of Use**            </b></p>
        <p>**Last Updated:** [03-10-2023]            </p>
        <p><b>**1. Acceptance of Terms**            </b></p>
        <p>By accessing and using the website <a href="https://abpolypacks.com/">https://abpolypacks.com/</a> (hereinafter referred to as the "Website"), you agree to comply with and be bound by these Terms and Conditions of Use. If you do not agree to these terms, please do not use this Website.            </p>
        <p><b>**2. Changes to Terms**</b></p>
        <p>A.B. Polypacks PVT. LTD (hereinafter referred to as "AB Polypacks") reserves the right to modify, amend, or update these Terms and Conditions at any time without prior notice. Your continued use of the Website after any such changes indicates your acceptance of the modified terms.            </p>
        <p><b>**3. Privacy Policy**
        </b></p>
        <p>Your use of this Website is also governed by our Privacy Policy, which can be found at <a href="https://abpolypacks.com/privacy-policy">https://abpolypacks.com/privacy-policy</a>. Please review our Privacy Policy to understand how we collect, use, and protect your personal information.            </p>
        <p><b>**4. Intellectual Property**            </b></p>
        <p>All content on the Website, including but not limited to text, images, graphics, logos, trademarks, and software, is the property of AB Polypacks or its licensors and is protected by copyright, trademark, and other intellectual property laws. You may not use, reproduce, distribute, or modify any content from this Website without prior written consent from AB Polypacks.        </p>
        <p><b>**5. Use of the Website**            </b></p>
        <p>You agree to use the Website for lawful purposes only and in a manner consistent with all applicable laws and regulations. You may not engage in any activities that could harm, disrupt, or interfere with the Website's functionality or security.            </p>
        <p><b>**6. Links to Third-Party Websites**            </b></p>
        <p>The Website may contain links to third-party websites. AB Polypacks is not responsible for the content, accuracy, or security of these third-party websites. Your use of third-party websites is at your own risk and is subject to their respective terms and conditions.            </p>
        <p><b>**7. Limitation of Liability**
        </b></p>
        <p>AB Polypacks shall not be liable for any direct, indirect, incidental, special, or consequential damages arising from or related to your use of the Website or any content or services provided through the Website.            </p>
        <p><b>**8. Indemnification**            </b></p>
        <p>You agree to indemnify and hold AB Polypacks, its affiliates, officers, directors, employees, and agents harmless from any claims, losses, damages, liabilities, and expenses (including attorneys' fees) arising out of or related to your use of the Website or any violation of these Terms and Conditions.
        </p>
        <p><b>**9. Termination**
        </b></p>
        <p>AB Polypacks reserves the right to terminate or suspend your access to the Website at its sole discretion, with or without notice, for any reason, including if you violate these Terms and Conditions.
        </p>
        <p><b>**10. Governing Law**
        </b></p>
        <p>These Terms and Conditions are governed by and construed in accordance with the laws of Howrah, West Bengal, without regard to its conflict of law principles.
        </p>
        <p><b>**11. Contact Information**
        </b></p>
        <p>If you have any questions or concerns about these Terms and Conditions, please contact us at  <a href="mailto:info@abpolypacks.com">info@abpolypacks.com</a>.
        </p>
    </div>
</section>
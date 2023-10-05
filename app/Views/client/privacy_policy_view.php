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
                <li class="breadcrumb-item active" aria-current="page">Privacy Policy</li>
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
        <p><b>**Privacy Policy**        </b></p>
        <p>**Last Updated:** [03-10-2023]        </p>
        <p><b>**1. Introduction**
    </b></p>
    <p>A.B. Polypacks PVT. LTD (hereinafter referred to as "AB Polypacks," "we," "us," or "our") respects your privacy and is committed to protecting your personal information. This Privacy Policy outlines how we collect, use, disclose, and safeguard your personal information when you visit our website at [https://abpolypacks.com/] (hereinafter referred to as the "Website").
    </p>
    <p><b>**2. Information We Collect**        </b></p>
    <p><b>We may collect the following types of personal information when you visit our Website:
    </b></p>
    <p><b>- **Information You Provide:**</b> When you use our contact forms or interact with our website, you may provide us with personal information such as your name, email address, phone number, and any other information you voluntarily submit. <br>
        <b> - **Automatically Collected Information:**</b> We may collect certain information automatically, including your IP address, browser type, operating system, and browsing activity on our Website. We may use cookies and similar tracking technologies to collect this information.

    </p>
    <p><b>**3. How We Use Your Information**
    </b></p>
    <p><b>We may use your personal information for the following purposes:
    </b></p>
    <ul>
        <li> - To respond to your inquiries and provide customer support.</li>
        <li>- To send you updates, newsletters, and marketing communications if you have opted in to receive them.</li>
        <li>- To improve our Website's functionality and user experience.</li>
        <li>- To analyze and monitor Website usage and trends.</li>
        <li>- To comply with legal obligations and enforce our terms and policies.</li>
    </ul>
    <p><b>**4. Disclosure of Your Information**
    </b></p>
    <p><b>We may share your personal information with third parties in the following circumstances:
    </b></p>
    <ul>
        <li>  - With our service providers and vendors who assist us in providing and improving our Website.</li>
        <li>- When required by law or to protect our legal rights.</li>
        <li>- In connection with a merger, acquisition, or sale of all or part of our assets.</li>
    </ul>
    <p><b>**5. Your Choices**
    </b></p>
    <p><b>You have the following choices regarding your personal information:
    </b></p>
    <ul>
        <li>- You can opt out of receiving marketing communications from us by following the instructions in our emails.
        </li>
        <li>- You can disable cookies in your browser settings, although this may affect your ability to use some features of our Website.
        </li>
    </ul>
    <p><b>**6. Security**
    </b></p>
    <P>We use reasonable security measures to protect your personal information from unauthorized access, disclosure, alteration, or destruction. However, no data transmission over the internet can be guaranteed to be completely secure, so we cannot guarantee the security of your information.
    </P>
    <P><b>**7. Updates to This Privacy Policy**
    </b></P>
    <p>We may update this Privacy Policy from time to time to reflect changes in our practices or for other operational, legal, or regulatory reasons. We will post any changes to this Privacy Policy on this page with a revised "Last Updated" date.
    </p>
    <p><b>**8. Contact Us**
    </b></p>
    <p>If you have any questions, concerns, or requests regarding this Privacy Policy or your personal information, please contact us at:
    </p>
    <div>Email: <a href="mailto:info@abpolypacks.com ">info@abpolypacks.com </a></div>

    </div>
</section>
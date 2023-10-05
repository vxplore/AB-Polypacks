<?php
  $URL_path = uri_string();
  $URL_segment = explode("/", $URL_path);
?>

<header class="header fixed">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo">
                <img src="<?=base_url('assets/client/images/logo.png')?>" alt="AB Polypacks Logo" width="80">
            </a>
            <div class="d-flex align-items-center mnuwrp gap-4">
                <nav class="nav">
                    <div class="menu-main-menu-container">
                        <ul class="primary-menu">
                            <li>
                                <a <?=(empty($URL_segment["0"]) || $URL_segment["0"] == "home") ? "class='active'" : ''?> href="<?=base_url('home')?>">Home</a>
                            </li>
                            <li>
                                <a <?=(!empty($URL_segment["0"]) && $URL_segment["0"] == "products") ? "class='active'" : ''?> href="<?=base_url('products')?>">Our Products</a>
                                <?php if (!empty($list_of_product_categories)) { ?>
                                    <ul>
                                        <?php foreach ($list_of_product_categories as $i => $category_details) { 
                                        $slug = (!empty($category_details->slug)) ? $category_details->slug : '';
                                        $category_name = (!empty($category_details->name)) ? $category_details->name : ''; ?>
                                            <li>
                                                <a href="<?=base_url('products/'.$slug)?>"><?=$category_name?></a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                    <img src="<?=base_url('assets/client/images/down.svg')?>" alt="" width="17">
                                <?php } ?>
                            </li>
                            <li>
                                <a <?=(!empty($URL_segment["0"]) && $URL_segment["0"] == "infrastructure") ? "class='active'" : ''?> href="<?=base_url('infrastructure')?>">Infrastructure </a>
                                <ul>
                                    <li>
                                        <a href="<?=base_url('infrastructure')?>#QualityControlLab">Quality Control Lab</a>
                                    </li>
                                    <li>
                                        <a href="<?=base_url('infrastructure')?>#BlownPolyFilmUnit">Blown Poly Film Unit</a>
                                    </li>
                                    <li>
                                        <a href="<?=base_url('infrastructure')?>#PrintingUnit">Printing Unit</a>
                                    </li>
                                    <li>
                                        <a href="<?=base_url('infrastructure')?>#LaminationUnit">Lamination Unit</a>
                                    </li>
                                    <li>
                                        <a href="<?=base_url('infrastructure')?>#SlittingUnit">Slitting Unit</a>
                                    </li>
                                    <li>
                                        <a href="<?=base_url('infrastructure')?>#ShrinkSleeveUnit">Shrink Sleeve Unit</a>
                                    </li>
                                    <li>
                                        <a href="<?=base_url('infrastructure')?>#PouchingUnit">Pouching Unit</a>
                                    </li>
                                    
                                </ul>
                                <img src="<?=base_url('assets/client/images/down.svg')?>" alt="" width="17">
                            </li>
                            
                            <li>
                                <a <?=(!empty($URL_segment["0"]) && $URL_segment["0"] == "career") ? "class='active'" : ''?> href="<?=base_url('career')?>">Career</a>
                            </li>
                            <li>
                                <a <?=(!empty($URL_segment["0"]) && $URL_segment["0"] == "contact-us") ? "class='active'" : ''?> href="<?=base_url('contact-us')?>">Contact Us</a>
                            </li>
                            
                        </ul>
                    </div>
                    <div class="mnucls"></div>
                </nav>
                <div class="gap-3 d-flex align-items-center">
                    <?php if (!empty($office_contact_info->email)) { ?>
                        <a href="mailto:<?=$office_contact_info->email?>" class="mailbtn">
                            <svg id="style_fill" data-name="style=fill" width="16" height="16" viewBox="0 0 19.503 16.782">
                                <g id="email" transform="translate(0 0)">
                                    <path id="Subtract" d="M6.466,2.75A5.367,5.367,0,0,0,2.715,4.009,5.17,5.17,0,0,0,1.25,7.966v6.35a5.17,5.17,0,0,0,1.465,3.957,5.367,5.367,0,0,0,3.751,1.259h9.071a5.367,5.367,0,0,0,3.751-1.259,5.169,5.169,0,0,0,1.465-3.957V7.966a5.17,5.17,0,0,0-1.465-3.957A5.367,5.367,0,0,0,15.537,2.75ZM17.559,7.841a.68.68,0,0,0-.832-1.077l-5.032,3.888a1.134,1.134,0,0,1-1.387,0L5.276,6.764a.68.68,0,1,0-.832,1.077l5.032,3.888a2.5,2.5,0,0,0,3.051,0Z" transform="translate(-1.25 -2.75)" fill="#fff" fill-rule="evenodd"></path>
                                </g>
                            </svg>
                        </a>
                    <?php } ?>

                    <?php if (!empty($office_contact_info->phone)) { ?>
                        <a href="tel:<?=$office_contact_info->phone?>" class="callbtn">
                            <svg width="16" height="16" viewBox="0 0 19.957 19.957">
                                <path id="Path_105" data-name="Path 105" d="M16.921,15.8l-.505.532s-1.2,1.264-4.477-2.186S9.864,9.436,9.864,9.436l.318-.335a2.48,2.48,0,0,0,.174-3.115l-1.4-1.977a2.221,2.221,0,0,0-3.45-.334L3.767,5.507A2.558,2.558,0,0,0,3,7.4c.1,1.862.9,5.868,5.336,10.543,4.708,4.957,9.126,5.154,10.933,4.976a2.373,2.373,0,0,0,1.469-.786l1.575-1.658a2.5,2.5,0,0,0-.6-3.821L19.6,15.431A2.166,2.166,0,0,0,16.921,15.8Z" transform="translate(-3 -3)" fill="#fff"></path>
                            </svg>
                        </a>
                    <?php } ?>

                    <a href="JavaScript:Void(0);" class="mnutog">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="4" y1="12" x2="20" y2="12"></line>
                            <line x1="4" y1="6" x2="20" y2="6"></line>
                            <line x1="4" y1="18" x2="20" y2="18"></line>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>
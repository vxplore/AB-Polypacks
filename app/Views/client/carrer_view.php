<section class="innerpagebanner py-5 position-relative" style="
background-image: url(<?=base_url('assets/client/images/homehero-bg.jpg')?>); 
background-size: cover; 
background-repeat: no-repeat;">
    <div class="container py-4">
        <h1 class="mb-3 text-center fadeUp">Career</h1>
        <nav class="fadeUp" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="<?=base_url()?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Career</li>
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
        <div class="row align-items-center">
            <div class="col-lg-6 fadeLeft">
                <div class="p-4 bg-light">
                <form class="d-block" action="#" method="post">
                    <div class="mb-3">
                        <small class="d-block">Name*</small>
                        <input type="text" class="form-control" placeholder="" required>
                    </div>
                    <div class="mb-3">
                        <small class="d-block">Email id*</small>
                        <input type="email" class="form-control" placeholder="" required>
                    </div>
                    <div class="mb-3">
                        <small class="d-block">Phone no*</small>
                        <input type="tel" class="form-control" placeholder="" required>
                    </div>
                    <div class="mb-3">
                        <small class="d-block">Gender*</small>
                        <select class="form-control">
                            <option>Male</option>
                            <option>Female</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <small class="d-block">Location*</small>
                        <input type="text" class="form-control" placeholder="" required>
                    </div>
                    <div class="mb-3">
                        <small class="d-block">Area of Interest*</small>
                        <select class="form-control">
                            <option>HR/Admin</option>
                            <option>R & D</option>
                            <option>IT</option>
                            <option>Sales</option>
                            <option>Operations/Purchase/ Packaging/Logistics</option>
                            <option>Finance/Legal/Internal Audit</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <small class="d-block">Upload Resume*</small>
                        <input type="file" class="form-control" placeholder="" required>
                    </div>
                    <button class="btnred border-0" type="submit">
                        <span>SUBMIT</span> 
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.5 5L11.7929 11.2929C12.1834 11.6834 12.1834 12.3166 11.7929 12.7071L5.5 19" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M13.5 5L19.7929 11.2929C20.1834 11.6834 20.1834 12.3166 19.7929 12.7071L13.5 19" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </button>
                </form>
                </div>
            </div>
            <div class="col-lg-6 p-3 fadePopup">
                <img src="<?=base_url('assets/client/images/career_development.jpg')?>" alt="" class="w-100">
            </div>
        </div>
    </div>
</section>
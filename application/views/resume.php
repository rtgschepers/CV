<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <!-- Title -->
    <title>CV <?= $personal_details->name; ?></title>

    <!-- Favicons -->
    <link rel="shortcut icon" href="<?= asset_url() ?>img/favicon.ico">

    <!-- Google Web Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,700,500,300,100' rel='stylesheet' type='text/css'>

    <!-- CSS Styles -->
    <link rel="stylesheet" href="<?= asset_url() ?>css/styles.css">

    <!-- CSS Template -->
    <link rel="stylesheet" href="<?= asset_url() ?>css/theme.min.css">
    <link rel="stylesheet" href="<?= asset_url() ?>css/fontawesome/all.min.css">
    <link rel="stylesheet" href="<?= asset_url() ?>css/color/blue-beige.css" id="color">
</head>

<body class="header-vertical">

<!-- Loader -->
<div id="page-loader" class="bg-white"></div>

<!-- Header -->
<header id="header" class="bg-white hidden-sm hidden-xs">

    <!-- Photo -->
    <div class="photo">
        <img src="<?= asset_url(); ?>img/photos/<?= $resume_id; ?>.jpg" alt="...">
    </div>

    <!-- Navigation -->
    <nav id="main-menu">
        <ul class="nav nav-vertical">
            <li><a href="#start"><span>Start</span></a></li>
            <li><a href="#resume"><span>Resume</span></a></li>
            <li><a href="#contact"><span>Contact</span></a></li>
        </ul>
    </nav>
</header>

<!-- Content -->
<div id="content" class="bg-white">

    <!-- Section - Home -->
    <section id="start" class="section fullheight bg-secondary dark padding-v-60">
        <!-- BG Image -->
        <div class="bg-image animated infinite zooming">
            <img src="<?= asset_url() ?>img/photos/it-bg01.jpg" alt="...">
        </div>

        <!-- Top -->
        <div class="container container-wide text-md">
            <i class="icon-before fa fa-comments text-primary"></i><?= $resume->note; ?>
        </div>

        <!-- Middle -->
        <div class="container container-wide v-bottom padding-v-80">
            <h1 class="text-lg margin-b-0"><?= $resume->title; ?></h1>
            <h5 class="text-tertiary margin-b-40"><?= $resume->subtitle; ?></h5>
            <a href="#resume" class="btn btn-lg btn-primary animated" data-animation="bounceIn"
               data-target="local-scroll">
                <span>Scroll naar mijn CV!</span><i class="ti-arrow-down"></i>
            </a>
            <a href="<?= base_url() ?>download" class="btn btn-link download" target="_blank">
                <span>Download mijn CV</span><i class="ti-file"></i>
            </a>
            <a href="https://portfolio.rtgschepers.nl" class="btn btn-link" target="_blank">
                <span>Bekijk mijn Portfolio</span><i class="ti-arrow-top-right"></i>
            </a>
        </div>

    </section>

    <!-- Section - Resume -->
    <section id="resume" class="section padding-v-60">
        <!-- Content -->
        <div class="container container-wide">
            <h6 class="margin-b-50">Curriculum Vitae</h6>
            <div class="row padding-lg">
                <div class="col-md-4 col-sm-6 col-xs-12">

                    <!-- Resume Box / About -->
                    <div class="resume-box">
                        <span class="icon animated" data-animation="fadeInDown"><i
                                    class="ti-comment-alt text-tertiary"></i></span>
                        <h4><strong>Over</strong> Mij</h4>
                        <p><?= $resume->description; ?></p>
                    </div>

                    <!-- Resume Box / Languages -->
                    <div class="resume-box">
                        <span class="icon animated" data-animation="fadeInDown"><i
                                    class="ti-cup text-tertiary"></i></span>
                        <h4><strong>Taal</strong> vaardigheden</h4>

                        <!-- Skill -->
                        <? foreach ($skills as $skill): ?>
                            <div class="skill">
                                <div class="progress progress-animated">
                                    <div class="progress-bar progress-bar-primary" role="progressbar"
                                         aria-valuenow="<?= $skill->level; ?>"
                                         aria-valuemin="0" aria-valuemax="100">
                                        <span></span>
                                    </div>
                                </div>
                                <strong><?= $skill->name; ?></strong>
                            </div>
                        <? endforeach; ?>
                    </div>

                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">

                    <!-- Resume Box / Education and Jobs -->
                    <div class="resume-box">
                        <span class="icon animated" data-animation="fadeInDown"><i
                                    class="ti-calendar text-tertiary"></i></span>
                        <h4>Opleiding &amp; Werk <strong>Ervaringen</strong></h4>
                        <div class="timeline">
                            <!-- Single event -->
                            <? foreach ($events as $event): ?>
                                <div class="timeline-event te-primary">
									<span
                                            class="event-date"><?= $event->date_started; ?>
                                        - <?= $event->date_ended; ?></span>
                                    <span class="event-name"><?= $event->name; ?></span>
                                    <span class="event-description"><?= $event->description; ?></span>
                                </div>
                            <? endforeach; ?>
                        </div>
                    </div>

                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">

                    <!-- Resume Box / Specialties -->
                    <div class="resume-box">
                        <span class="icon animated" data-animation="fadeInDown"><i
                                    class="ti-bookmark text-tertiary"></i></span>
                        <h4>Behaalde <strong>Diploma's &amp; Certificaten</strong></h4>

                        <!-- Speciality -->
                        <? foreach ($specialties as $specialty): ?>
                            <div class="speciality">
                                <? if ($specialty->type == 'certificate'): ?>
                                    <span class="speciality-icon"><i class="text-muted-2x ti-bookmark-alt"></i></span>
                                <? elseif ($specialty->type == 'diploma'): ?>
                                    <span class="speciality-icon"><i class="text-muted-2x ti-book"></i></span>
                                <? endif ?>
                                <div class="speciality-content">
                                    <h5 class="margin-b-0"><?= $specialty->title; ?></h5>
                                    <p class="speciaity-description"><?= $specialty->description; ?></p>
                                </div>
                            </div>
                        <? endforeach; ?>
                    </div>

                    <!-- Resume Box / Hobbies -->
                    <div class="resume-box">
                        <span class="icon animated" data-animation="fadeInDown"><i
                                    class="ti-music-alt text-tertiary"></i></span>
                        <h4><strong>Hobby's</strong> &amp; Interesses</h4>
                        <ul class="list-inline">

                            <!-- Hobby -->
                            <? foreach ($hobbies as $hobby): ?>
                                <li>
                                    <div class="icon-box text-center">
										<span class="icon icon-sm icon-circle icon-primary icon-filled">
											<i class="fas fa-<?= $hobby->icon; ?>"></i>
										</span>
                                        <span class="title"><?= $hobby->description; ?></span>
                                    </div>
                                </li>
                            <? endforeach; ?>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- Section - Contact -->
    <section id="contact" class="section padding-v-60 min-fullheight">
        <!-- BG Map -->
        <div id="google-map" class="bg-image" data-latitude="51.956560" data-longitude="5.849630"
             data-style="light"></div>

        <!-- Contact Box -->
        <div class="contact-box bg-secondary dark animated" data-animation="flipInY">
            <h1>Twijfel niet om mij <strong>te contacteren</strong>!</h1>

            <!-- Contact List -->
            <ul class="list-unstyled list-unstyled-icons">
                <li>
                    <i class="inline-icon icon-before-and-after text-primary fa fa-map-marker"></i>
                    <?= $personal_details->address; ?><br><?= $personal_details->zip_code; ?>
                    , <?= $personal_details->city; ?>
                </li>
                <li>
                    <i class="inline-icon icon-before-and-after text-primary fa fa-comment"></i>
                    <? if (isset($personal_details->personal_email)): ?>
                        <a href="mailto:<?= $personal_details->personal_email; ?>"><?= $personal_details->personal_email; ?></a>
                        <br>
                    <? endif; ?>
                    <? if (isset($personal_details->business_email)): ?>
                        <a href="<?= $personal_details->business_email; ?>"><?= $personal_details->business_email; ?></a>
                        <br/>
                    <? endif; ?>
                </li>
                <li>
                    <i class="inline-icon icon-before-and-after text-primary fa fa-phone"></i>
                    <? if (isset($personal_details->personal_phone)): ?>
                        <a href="tel:<?= $personal_details->personal_phone; ?>"><?= $personal_details->personal_phone; ?></a>
                        <br/>
                    <? endif; ?>
                    <? if (isset($personal_details->business_phone)): ?>
                        <a href="tel:<?= $personal_details->business_phone; ?>"><?= $personal_details->business_phone; ?></a>
                        <br/>
                    <? endif; ?>
                </li>
            </ul>
            <a href="<?= base_url() ?>download" class="btn btn-link download" target="_blank">
                <span>Download mijn CV</span><i class="ti-file"></i>
            </a>
            <a href="https://portfolio.rtgschepers.nl" class="btn btn-link margin-t-10" target="_blank">
                <span>Bekijk mijn Portfolio</span><i class="ti-arrow-top-right"></i>
            </a>
        </div>
    </section>
</div>

<!-- Mobile Navigation -->
<a href="#" id="mobile-nav-toggle" class="icon icon-circle icon-sm icon-primary icon-hover visible-xs visible-sm"
   data-target="mobile-nav">
    <i class="ti-menu"></i>
</a>
<nav id="mobile-nav" class="bg-white">
    <div class="mobile-nav-wrapper">

        <!-- Avatar -->
        <img src="<?= asset_url(); ?>img/photos/<?= $resume_id; ?>-96x96.jpg" alt="..." class="img-circle margin-b-30">

        <!-- Nav -->
        <ul class="nav nav-vertical">
            <li><a href="#start"><span>Start</span></a></li>
            <li><a href="#resume"><span>Curriculum Vitae</span></a></li>
            <li><a href="#contact"><span>Contact</span></a></li>
        </ul>
    </div>
    <a href="#" class="mobile-nav-close icon icon-hover icon-xs icon-circle icon-primary" data-target="mobile-nav">
        <i class="fa fa-times"></i>
    </a>
</nav>

<!-- Ajax Wrapper & Loader -->
<div id="ajax-modal"></div>
<div id="ajax-loader"><i class="fa fa-spinner fa-spin"></i></div>

<!-- JS Libraries -->
<script src="<?= asset_url() ?>js/jquery-1.11.3.min.js"></script>

<!-- JS Plugins -->
<script>
    window.paceOptions = {
        target: '#page-loader',
        ajax: false
    };
</script>
<script src="<?= asset_url() ?>js/plugins.js"></script>
<script src="<?= asset_url() ?>js/scroller.js"></script

<!-- JS Core -->
<script src="<?= asset_url() ?>js/core.js"></script>

<!-- Google Map API -->
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyC6RIlO-6w3um2PkkToaCGGtWBVXgJL0Ww"></script>
</body>
</html>

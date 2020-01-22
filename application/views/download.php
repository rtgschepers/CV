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

    <!-- CSS Important -->
    <link rel="stylesheet" href="<?= asset_url() ?>css/pdf.css">
</head>

<body class="header-vertical">

<!-- Loader -->
<div id="page-loader" class="bg-white"></div>

<div id="pdf_content">
    <!-- Header -->
    <header id="header" class="bg-white hidden-sm hidden-xs">

        <!-- Photo -->
        <div class="photo">
            <img src="<?= asset_url(); ?>img/photos/<?= $resume_id; ?>.jpg" alt="...">
        </div>

        <!-- Navigation -->
        <nav id="main-menu">
            <ul class="nav nav-vertical">
                <h4><strong>Personalia</strong></h4>
                <? foreach ($personal_details as $key => $value): ?>
                    <li><a><span><?= $value; ?></span></a></li>
                <? endforeach; ?>
            </ul>
        </nav>
    </header>

    <!-- Content -->
    <div id="content" class="bg-white">

        <!-- Section - Resume -->
        <section id="resume" class="section padding-v-60">
            <!-- Content -->
            <div class="container container-wide">
                <div class="row padding-lg">
                    <div class="col-md-4 col-sm-6 col-xs-12">

                        <!-- Resume Box / About -->
                        <div class="resume-box">
                        <span class="icon"><i
                                    class="ti-comment-alt text-tertiary"></i></span>
                            <h4><strong>Over</strong> Mij</h4>
                            <p><?= $resume->description; ?></p>
                        </div>

                        <!-- Resume Box / Languages -->
                        <div class="resume-box">
                        <span class="icon"><i
                                    class="ti-cup text-tertiary"></i></span>
                            <h4><strong>Taal</strong> vaardigheden</h4>

                            <!-- Skill -->
                            <? foreach ($skills as $skill): ?>
                                <div class="skill">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-primary" role="progressbar"
                                             aria-valuenow="<?= $skill->level; ?>"
                                             aria-valuemin="0" aria-valuemax="100"
                                             style="width: <?= $skill->level; ?>%;">
                                            <span><?= $skill->level; ?></span>
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
                        <span class="icon"><i
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
                        <span class="icon"><i
                                    class="ti-bookmark text-tertiary"></i></span>
                            <h4>Behaalde <strong>Diploma's &amp; Certificaten</strong></h4>

                            <!-- Speciality -->
                            <? foreach ($specialties as $specialty): ?>
                                <div class="speciality">
                                    <? if ($specialty->type == 'certificate'): ?>
                                        <span class="speciality-icon"><i
                                                    class="text-muted-2x ti-bookmark-alt"></i></span>
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
                        <span class="icon"><i
                                    class="ti-music-alt text-tertiary"></i></span>
                            <h4><strong>Hobby's</strong> &amp; Interesses</h4>
                            <ul class="list-inline">

                                <!-- Hobby -->
                                <? foreach ($hobbies as $hobby): ?>
                                    <li>
                                        <div class="icon-box text-center">
										<span class="icon icon-sm icon-circle icon-primary icon-filled">
											<i class="ti fa-<?= $hobby->icon; ?>"></i>
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
    </div>
</div>
<!-- JS Libraries -->
<script src="<?= asset_url() ?>js/jquery-1.11.3.min.js"></script>
<script src="<?= asset_url() ?>js/plugins.js"></script>
<script src="<?= asset_url() ?>js/html2canvas.js"></script>
<script src="https://unpkg.com/jspdf@latest/dist/jspdf.min.js"></script>
<script>
    function print() {
        const filename = "CV_<?= str_replace(" ", "_", $personal_details->name); ?>";
        const html = document.getElementById('pdf_content');

        html2canvas(html, {scale: 1}).then(canvas => {
            const pdf = new jsPDF('l', 'mm', 'a4');
            pdf.addImage(canvas.toDataURL('image/png'), 'PNG', 0, 0, 310, 219);
            pdf.save(filename);
			setTimeout(() => {
                window.close();
            }, 500);
        });
    }

    print();
</script>

<!-- JS Core -->
<script src="<?= asset_url() ?>js/core.js"></script>

</body>
</html>

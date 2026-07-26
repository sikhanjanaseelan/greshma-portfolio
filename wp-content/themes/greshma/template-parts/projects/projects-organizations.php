<?php
/**
 * Projects Page — Organizations I Serve.
 *
 * IMAGE ASSETS REQUIRED LATER:
 *
 * assets/images/projects/projects-org-okc-logo.png
 * assets/images/projects/projects-org-okc-image.png
 *
 * assets/images/projects/projects-org-uri-logo.png
 * assets/images/projects/projects-org-uri-image.png
 *
 * assets/images/projects/projects-org-unep-logo.png
 * assets/images/projects/projects-org-unep-image.png
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;

$organizations = [

    [
        'name'        => 'Our Kids’ Climate',
        'role'        => 'Community & Fellowship Manager',
        'description' => 'Managing an international fellowship program, fostering youth leadership for climate justice through training, mentoring and global collaboration.',
        'logo'        => 'projects-org-okc-logo.png',
        'image'       => 'projects-org-okc-image.png',
    ],

    [
        'name'        => 'United Religions Initiative',
        'role'        => 'Global Council Trustee',
        'description' => 'Serving on the Global Council to support governance, strategy and collaboration for interfaith peacebuilding and global transformation.',
        'logo'        => 'projects-org-uri-logo.png',
        'image'       => 'projects-org-uri-image.png',
    ],

    [
        'name'        => 'UNEP Faith for Earth Initiative',
        'role'        => 'Global Youth Contributor',
        'description' => 'Collaborating with a global network of faith-based leaders and organisations for environmental action and sustainability.',
        'logo'        => 'projects-org-unep-logo.png',
        'image'       => 'projects-org-unep-image.png',
    ],

];
?>

<div class="projects-organizations">

    <div class="projects-subsection-label">
        2. Organizations I Serve
    </div>


    <div class="projects-organizations__list">

        <?php foreach ( $organizations as $organization ) : ?>

            <article class="projects-organization-card">


                <!-- ==============================
                     LEFT CONTENT
                =============================== -->

                <div class="projects-organization-card__content">

                    <div class="projects-organization-card__header">


                        <!--
                        FINAL LOGO:

                        assets/images/projects/<?php
                        echo esc_html( $organization['logo'] );
                        ?>
                        -->

                        <div class="projects-organization-card__logo">
                            LOGO
                        </div>


                        <div class="projects-organization-card__heading">

                            <h3>
                                <?php
                                echo esc_html(
                                    $organization['name']
                                );
                                ?>
                            </h3>

                            <span>
                                <?php
                                echo esc_html(
                                    $organization['role']
                                );
                                ?>
                            </span>

                        </div>

                    </div>


                    <p>
                        <?php
                        echo esc_html(
                            $organization['description']
                        );
                        ?>
                    </p>


                    <a href="#">
                        View My Role
                        <span aria-hidden="true">→</span>
                    </a>

                </div>


                <!-- ==============================
                     RIGHT IMAGE
                =============================== -->

                <!--
                FINAL IMAGE:

                assets/images/projects/<?php
                echo esc_html( $organization['image'] );
                ?>
                -->

                <div class="projects-organization-card__image">

                    <span>
                        <?php
                        echo esc_html(
                            $organization['image']
                        );
                        ?>
                    </span>

                </div>

            </article>

        <?php endforeach; ?>

    </div>

</div>
<?php
/**
 * Speaking Page — Keynote & Speaking Topics.
 *
 * Uses inline SVG line icons to match the approved UI.
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;

$topics = [

    [
        'title'       => 'Peacebuilding & Dialogue',
        'description' => 'Building inclusive communities through listening, empathy, and collaboration.',
        'icon'        => 'peace',
    ],

    [
        'title'       => 'Climate Action & Sustainability',
        'description' => 'Empowering youth and communities to care for our planet and create lasting change.',
        'icon'        => 'climate',
    ],

    [
        'title'       => 'Interfaith Harmony',
        'description' => 'Bridging faiths, cultures, and perspectives for shared humanity and mutual respect.',
        'icon'        => 'interfaith',
    ],

    [
        'title'       => 'Youth Leadership & Empowerment',
        'description' => 'Nurturing young leaders to become changemakers in their communities and beyond.',
        'icon'        => 'leadership',
    ],

    [
        'title'       => 'Education & Values',
        'description' => 'Integrating values, compassion, and ethics into learning and everyday life.',
        'icon'        => 'education',
    ],

    [
        'title'       => 'Social Innovation & Community',
        'description' => 'Designing people-centered, inclusive solutions that create meaningful social impact.',
        'icon'        => 'community',
    ],

];
?>

<section class="speaking-topics">

    <div class="container">


        <!-- ==========================================
             SECTION HEADING
        =========================================== -->

        <div class="speaking-topics__heading">

            <div class="speaking-topics__heading-row">

                <h2>
                    Keynote &amp; Speaking Topics
                </h2>

                <span
                    class="speaking-topics__leaf"
                    aria-hidden="true"
                >
                    ❧
                </span>

            </div>


            <p>
                Themes I speak about, grounded in experience
                and driven by impact.
            </p>


            <span
                class="speaking-topics__line"
                aria-hidden="true"
            ></span>

        </div>


        <!-- ==========================================
             TOPIC CARDS
        =========================================== -->

        <div class="speaking-topics__grid">

            <?php foreach ( $topics as $topic ) : ?>

                <article class="speaking-topic-card">


                    <!-- ==================================
                         ICON
                    =================================== -->

                    <div
                        class="speaking-topic-card__icon"
                        aria-hidden="true"
                    >


                        <?php if ( 'peace' === $topic['icon'] ) : ?>

                            <!-- Peacebuilding / Dove -->

                            <svg viewBox="0 0 64 64">

                                <path
                                    d="
                                        M13 35
                                        C21 33 26 28 30 21
                                        C32 28 36 32 42 34
                                        C47 36 51 35 55 33
                                        C52 40 46 45 38 46
                                        C30 48 22 45 17 39
                                        L9 43
                                        L13 35
                                        Z
                                    "
                                />

                                <path
                                    d="
                                        M30 21
                                        C30 14 32 8 37 3
                                        C37 12 40 18 46 23
                                    "
                                />

                                <path
                                    d="
                                        M22 38
                                        C25 46 31 51 40 53
                                    "
                                />

                            </svg>


                        <?php elseif ( 'climate' === $topic['icon'] ) : ?>

                            <!-- Climate / Plant -->

                            <svg viewBox="0 0 64 64">

                                <path
                                    d="M32 55V24"
                                />

                                <path
                                    d="
                                        M32 36
                                        C21 35 15 29 14 18
                                        C25 19 31 25 32 36
                                        Z
                                    "
                                />

                                <path
                                    d="
                                        M32 30
                                        C34 20 41 14 51 12
                                        C51 23 45 29 32 31
                                        Z
                                    "
                                />

                                <path
                                    d="
                                        M23 55H41
                                    "
                                />

                            </svg>


                        <?php elseif ( 'interfaith' === $topic['icon'] ) : ?>

                            <!-- Interfaith / People -->

                            <svg viewBox="0 0 64 64">

                                <circle
                                    cx="32"
                                    cy="17"
                                    r="6"
                                />

                                <circle
                                    cx="15"
                                    cy="25"
                                    r="5"
                                />

                                <circle
                                    cx="49"
                                    cy="25"
                                    r="5"
                                />

                                <path
                                    d="
                                        M23 47
                                        V39
                                        C23 32 27 28 32 28
                                        C37 28 41 32 41 39
                                        V47
                                    "
                                />

                                <path
                                    d="
                                        M7 47
                                        V40
                                        C7 34 11 31 15 31
                                        C19 31 22 33 24 36
                                    "
                                />

                                <path
                                    d="
                                        M57 47
                                        V40
                                        C57 34 53 31 49 31
                                        C45 31 42 33 40 36
                                    "
                                />

                                <path
                                    d="M11 47V54"
                                />

                                <path
                                    d="M19 47V54"
                                />

                                <path
                                    d="M28 47V54"
                                />

                                <path
                                    d="M36 47V54"
                                />

                                <path
                                    d="M45 47V54"
                                />

                                <path
                                    d="M53 47V54"
                                />

                            </svg>


                        <?php elseif ( 'leadership' === $topic['icon'] ) : ?>

                            <!-- Youth Leadership -->

                            <svg viewBox="0 0 64 64">

                                <circle
                                    cx="32"
                                    cy="15"
                                    r="6"
                                />

                                <path
                                    d="
                                        M21 40
                                        C22 31 26 26 32 26
                                        C38 26 42 31 43 40
                                    "
                                />

                                <path
                                    d="
                                        M11 48
                                        L17 43
                                        L24 46
                                    "
                                />

                                <path
                                    d="
                                        M53 48
                                        L47 43
                                        L40 46
                                    "
                                />

                                <path
                                    d="
                                        M32 34
                                        L35 40
                                        L42 41
                                        L37 46
                                        L38 53
                                        L32 50
                                        L26 53
                                        L27 46
                                        L22 41
                                        L29 40
                                        Z
                                    "
                                />

                            </svg>


                        <?php elseif ( 'education' === $topic['icon'] ) : ?>

                            <!-- Education / Open Book -->

                            <svg viewBox="0 0 64 64">

                                <path
                                    d="
                                        M8 14
                                        C17 12 25 14 32 20
                                        V54
                                        C25 48 17 46 8 48
                                        Z
                                    "
                                />

                                <path
                                    d="
                                        M56 14
                                        C47 12 39 14 32 20
                                        V54
                                        C39 48 47 46 56 48
                                        Z
                                    "
                                />

                                <path
                                    d="
                                        M32 20V54
                                    "
                                />

                                <path
                                    d="
                                        M13 20
                                        C19 19 24 21 28 24
                                    "
                                />

                                <path
                                    d="
                                        M51 20
                                        C45 19 40 21 36 24
                                    "
                                />

                            </svg>


                        <?php elseif ( 'community' === $topic['icon'] ) : ?>

                            <!-- Social Innovation / Conversation -->

                            <svg viewBox="0 0 64 64">

                                <path
                                    d="
                                        M9 14
                                        H55
                                        V44
                                        H31
                                        L19 54
                                        L22 44
                                        H9
                                        Z
                                    "
                                />

                                <circle
                                    cx="22"
                                    cy="29"
                                    r="2"
                                />

                                <circle
                                    cx="32"
                                    cy="29"
                                    r="2"
                                />

                                <circle
                                    cx="42"
                                    cy="29"
                                    r="2"
                                />

                            </svg>

                        <?php endif; ?>

                    </div>


                    <!-- ==================================
                         TITLE
                    =================================== -->

                    <h3>
                        <?php
                        echo esc_html(
                            $topic['title']
                        );
                        ?>
                    </h3>


                    <!-- ==================================
                         DESCRIPTION
                    =================================== -->

                    <p>
                        <?php
                        echo esc_html(
                            $topic['description']
                        );
                        ?>
                    </p>


                    <!-- ==================================
                         LINK
                    =================================== -->

                    <a
                        href="#"
                        class="speaking-topic-card__link"
                    >
                        Explore

                        <span aria-hidden="true">
                            →
                        </span>
                    </a>

                </article>

            <?php endforeach; ?>

        </div>

    </div>

</section>
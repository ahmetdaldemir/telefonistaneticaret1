@extends('layout.repair')

@section('content')
    <style>/* BEGIN breadcrumb */
        .cpr__issues-article-breadcrumb__container {
            display: flex;
            width: 100%;
            margin: auto;
            justify-content: center;
            margin-top: 10px;
        }

        .cpr__issues-article-breadcrumb-content__container {
            display: flex;
            width: 100%;
            max-width: 1040px;
        }

        .cpr__breadcrumb-btn .cpr__btn-lbl {
            font-family: 'Avenir';
            font-style: normal;
            font-weight: 200;
            font-size: 12px;
            line-height: 16px;
            text-transform: uppercase;
            color: #1A202A;
        }
        /* ENDS breadcrumb */

        /* Article content */
        .cpr__issues-article__container {
            display: flex;
            width: 100%;
            margin: auto;
            justify-content: center;
            margin-top: 50px;
        }

        .cpr__issues-article-content__container {
            display: flex;
            width: 100%;
            max-width: 1040px;
            flex-direction: column;
            align-items: center;
        }


        .cpr__issues-article-title {
            display: block;
            font-family: 'Avenir';
            font-style: normal;
            font-weight: 500;
            font-size: 30px;
            line-height: 41px;
            color: #F15F5E;
         }

        .cpr__issues-article-content {
            display: inline-flex;
            column-gap: 28px;
            margin-top: 32px;
        }

        .cpr__issues-article {
            display: flex;
            flex-direction: column;
         }

        .cpr__issues-article-header {
            display: inline-flex;
            column-gap: 25px;
        }

        .cpr__issues-article-description {
            font-family: 'Avenir';
            font-style: normal;
            font-weight: 200;
            font-size: 16px;
            line-height: 22px;
            text-align: justify;
            color: #4E4E50;
        }

        .cpr__issues-article-img {
            border-radius: 20px;
            overflow: hidden;
            float: right;
            margin: 0px;
            padding: 25px;
            padding-top: 0;
            padding-right: 0;
            max-height: 186px;
            max-width: 201px;
            width: auto;
            height: auto;
        }

        .cpr__issues-article-img img {
            height: 100%;
        }

        .cpr__issues-article-subtitle1 {
            margin: 25px 0px;
            font-family: 'Avenir';
            font-style: normal;
            font-weight: 500;
            font-size: 20px;
            line-height: 27px;
            text-align: justify;
            color: #2D2D3B;
        }

        .cpr__issues-article-subtitle2 {
            font-family: 'Avenir';
            font-style: normal;
            font-weight: 500;
            font-size: 16px;
            line-height: 22px;
            color: #4E4E50;
            margin: 25px 0px;
        }

        .cpr__issues-article-text {
            font-family: 'Avenir';
            font-style: normal;
            font-weight: 200;
            font-size: 16px;
            line-height: 22px;
            text-align: justify;
            color: #4E4E50;
        }

        .article-link-text,
        .cpr__issues-article-more  .cpr__btn-lbl {
            color: #F15F5E;
        }

        .cpr__issues-article-more {
            width: 243px;
        }

        .cpr__issues-article-more .cpr__btn {
            pointer-events: initial;
        }

        .cpr__issues-more-title {
            font-family: 'Avenir';
            font-style: normal;
            font-weight: 500;
            font-size: 16px;
            line-height: 22px;
            display: flex;
            align-items: center;
            color: #4E4E50;
            padding-bottom: 16px;
            border-bottom: 2px solid #F15F5E;
        }

        .cpr__issues-more-link {
            display: inline-flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            padding: 20px 0px;
            border-bottom: 2px solid #B9BDCB;
        }

        .cpr__issues-more-link svg {
            margin-right: 10px;
            min-width: 12px;
        }

        .cpr__issues-more-link .cpr__btn-lbl {
            font-family: 'Avenir';
            font-style: normal;
            font-weight: 200;
            font-size: 16px;
            line-height: 22px;
            color: #4E4E50;
            text-align: initial;
            text-transform: none;
        }

        .cpr__issues-more-link:last-of-type {
            border: none;
        }

        .cpr__issues-more-title:last-of-type {
            border: none;
            padding: initial;
            margin-top: 30px;
        }

        /* .wgt-revws__reviews-list {
            display: flex;
            flex-direction: column;
            row-gap: 15px;
            margin-top: 15px;
        } */

        .cpr__revws--list {
            display: flex;
            flex-direction: column;
            row-gap: 15px;
            margin-top: 15px;
        }

        .wgt-revws__reviews-item {
            display: flex !important;
            flex-direction: column;
            width: 100%;
            background: #FFFFFF;
            border-radius: 20px;
            padding: 15px;
            box-sizing: border-box;
            z-index: 1;
            border: 0.703478px solid #B9BDCB;
            /* margin: 15px 0px; */
        }

        .wgt-revws__reviews-item-header {
            display: flex;
            align-items: center;
            column-gap: 12px;
        }

        .wgt-revws__reviews-header-avatar {
            width: 22px;
            border-radius: 50%;
        }

        .wgt-revws__reviews-header-customer {
            display: flex;
            flex-direction: column;
            flex: auto;
        }

        .wgt-revws__reviews-customer-name {
            font-family: 'Avenir';
            font-style: normal;
            font-weight: 500;
            font-size: 16px;
            line-height: 28px;
            color: #4E4E50;
        }

        .wgt-revws__reviews-customer-platform {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 200;
            font-size: 13px;
            line-height: 17px;
            letter-spacing: 0.2px;
            color: rgba(0, 0, 0, 0.54);
        }

        .wgt-revws__reviews-date {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 200;
            font-size: 14px;
            line-height: 19px;
            letter-spacing: 0.2px;
            color: rgba(0, 0, 0, 0.54);
        }

        .wgt-revws__reviews-item-raiting {
            display: flex;
            align-items: center;
            column-gap: 3px;
        }

        .wgt-revws__review-text {
            font-family: 'Avenir';
            font-style: normal;
            font-weight: 200;
            font-size: 14px;
            line-height: 16px;
            color: #4E4E50;
            overflow-y: auto;
            margin-top: 2px;
        }

        .review-date {
            font-family: 'Avenir';
            font-style: normal;
            font-weight: 200;
            font-size: 9px;
            line-height: 12px;
            color: #4E4E50;
        }
        /* ENDS article content */

        /* BEGIN article links */
        .cpr__issues-article-links__container {
            display: flex;
            width: 100%;
            margin: auto;
            justify-content: center;
            margin-top: 53px;
            margin-bottom: 60px;
        }

        .cpr__issues-article-links-content__container {
            display: flex;
            width: 100%;
            max-width: 1040px;
            align-items: center;
            column-gap: 26px;
            justify-content: center;
        }

        .cpr__issues-article-link__container {
            width: 418px;
            height: 99px;
            border: 1px solid #F15F5E;
            border-radius: 15px;
            padding: 20px;
            box-sizing: border-box;
            position: relative;
            display: flex;
            justify-content: flex-end;
        }

        .cpr__issues-article-link-text__container {
            display: flex;
            flex-direction: column;
            max-width: 290px;
            row-gap: 9px;
        }


        .cpr__issues-article-link-text__container .cpr__btn-lbl {
            color: #F15F5E;
            cursor: pointer;
            pointer-events: initial;
        }

        .cpr__issues-article-link-text {
            font-family: 'Avenir';
            font-style: normal;
            font-weight: 500;
            font-size: 22px;
            line-height: 30px;
            color: #4E4E50;
        }

        .cpr__issues-article-link {
            display: inline-flex;
            column-gap: 10px;
            align-items: center;
        }

        .cpr__issues-article-link .cpr__btn-lbl {
            font-family: 'Avenir';
            font-style: normal;
            font-weight: 500;
            font-size: 16px;
            line-height: 22px;
            color: #F15F5E;
        }

        .cpr__issues-article-left-img {
            position: absolute;
            bottom: 0;
            right: 15px;
            max-height: 125px;
        }

        .cpr__issues-article-right-img {
            position: absolute;
            bottom: 0;
            left: 0;
            max-width: 80px;
            max-height: 125px;
        }

        .left-container {
            justify-content: left;
        }

        .right-container {
            justify-content: right;
            max-width: 310px !important;
            align-items: flex-end;
        }
        /* ENDS article links */

        :root {
            --star-size: 14.98px;
            --star-color: #C4C4C4;
            --star-background: #fc0;
        }
        .stars {
            --percent: calc(var(--rating) / 5 * 100%);
            display: inline-block;
            font-size: var(--star-size);
            font-family: Times;
            line-height: 1;
            /* border-left: 1px solid #1A202A; */
            /* padding: 0px 10px; */
            padding-right: 0px;
        }
        .stars::before {
            content: '\2605\2605\2605\2605\2605';
            letter-spacing: 3px;
            background: linear-gradient(90deg, var(--star-background) var(--percent), var(--star-color) var(--percent));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /*Desktop ultra wide*/
        @media (min-width: 1294px) {}

        /*Tablet / iPads*/
        @media (min-width: 763px) and (max-width: 1293px) {
            .cpr__issues-article-link svg {
                width: 9px;
                height: auto;
            }

            .cpr__issues-article-breadcrumb-content__container {
                max-width: 528px;
            }

            .cpr__issues-article__container {
                margin-top: 30px;
            }

            .cpr__issues-article-content__container {
                max-width: 528px;
            }

            .cpr__issues-article-title__container {
                font-size: 18.3871px;
                line-height: 25px;
                margin-right: auto;
                width: 364.68px;
            }

            .cpr__issues-article {
                width: 364.68px;
            }

            .cpr__issues-article-content {
                column-gap: 16px;
                margin-top: 20px;
            }

            .cpr__issues-article-header {
                column-gap: 15px;
            }

            .cpr__issues-article-description {
                font-size: 9.80645px;
                line-height: 13px;
            }

            .cpr__issues-article-img {
                object-fit: cover;
                padding: 20px;
                max-height: 96px;
                max-width: 95px;
                width: auto;
                height: auto;
            }

            /* More column */
            .cpr__issues-article-more {
                width: 147.1px;
            }

            .cpr__issues-more-title {
                font-size: 9.80645px;
                line-height: 13px;
            }

            .cpr__issues-more-link {
                column-gap: 10px;
                padding: 13px 0;
            }

            .cpr__issues-more-link .cpr__btn-lbl {
                font-size: 9.80645px;
                line-height: 13px;
            }

            .cpr__issues-more-link svg {
                min-width: 9px;
            }

            .cpr__issues-more-title:last-of-type {
                margin-top: 20px;
            }

            .cpr__revws--list {
                margin-top: 10px;
                row-gap: 9px;
            }

            .wgt-revws__reviews-item {
                border-radius: 8.62328px;
            }

            .wgt-revws__reviews-customer-name {
                font-size: 9.80645px;
                line-height: 13px;
            }

            .wgt-revws__review-text {
                font-size: 8.58065px;
                line-height: 12px;
            }

            .review-date {
                font-size: 5.51613px;
                line-height: 8px;
            }
            /* End More column */

            /* Links */
            .cpr__issues-article-links__container {
                margin-top: 33px;
            }

            .cpr__issues-article-links-content__container {
                column-gap: 15px;
                max-width: 528px;
            }

            .cpr__issues-article-link__container {
                height: 60.68px;
                padding: 12px;
                width: 256.19px;
            }

            .cpr__issues-article-link-text__container {
                max-width: 191.23px !important;
                row-gap: 5px;
            }

            .cpr__issues-article-link-text__container .cpr__btn-lbl {
                column-gap: 6px;
                font-size: 9.80645px;
                line-height: 13px;
            }

            .cpr__issues-article-link-text__container .cpr__btn-lbl svg {
                height: 9.5px;
            }

            .cpr__issues-article-link-text {
                font-size: 13.4839px;
                line-height: 18px;
            }

            .cpr__issues-article-left-img {
                height: 80.29px;
            }

            .cpr__issues-article-right-img {
                max-height: 76.61px;
                max-width: 49.53px;
            }
            /* End Links */

            :root {
                --star-size: 9.98px;
            }
        }
        /*Tablet - Mobile*/
        @media (min-width: 1px) and (max-width: 762px) {
            .cpr__issues-article-breadcrumb-content__container {
                margin: 0 16px;
            }
            /* Article content */
            .cpr__issues-article__container {
                margin-top: 30px;
            }

            .cpr__issues-article-content__container {
                margin: 0 16px;
                max-width: 375px;
            }

            .cpr__issues-article-title__container {
                width: auto;
            }

            .cpr__issues-article-title {
                font-size: 25px;
                line-height: 34px;
                width: 100%;
            }

            .cpr__issues-article-content {
                flex-wrap: wrap;
            }

            .cpr__issues-article {
                flex-wrap: wrap;
                width: auto;
            }

            .cpr__issues-article-header {
                display: flex;
                flex-wrap: wrap;
                row-gap: 25px;
            }

            .cpr__issues-article-description {
                width: auto;
            }

            .cpr__issues-article-img {
                border-radius: 20px 20px 0px 0px;
                order: -1;
                padding: 15px;
                max-height: 159px;
                max-width: 113px;
                width: auto;
                height: auto;
            }

            .cpr__issues-article-img img {
                height: auto;
                transform: translate(0, -25%);
                width: 100%;
            }

            .cpr__issues-article-more {
                width: 100%;
            }

            .cpr__issues-more-title {
                justify-content: center;
            }

            .cpr__issues-more-link {
                justify-content: center;
                column-gap: 24px;
            }

            .cpr__issues-more-link svg {
                justify-self: flex-end;
            }

            /* .wgt-revws__reviews-list {
                flex-wrap: wrap;
                height: 200px;
                overflow: hidden;
                overflow-x: visible;
                width: 100%;
                column-gap: 20px;
            } */

            /* .wgt-revws__reviews-item {
                height: 100%;
            } */

            .cpr__revws--list {
                /* flex-direction: row; */
                height: 300px !important;
                flex-wrap: wrap;
                column-gap: 15px;
            }

            .swiper {
                box-sizing: border-box;
                /* margin: 0 16px !important; */
                padding: 0 16px 35px !important;
                width: 100%;
            }

            .swiper-slide {
                height: 100% !important;
                width: 333px !important;
            }

            .swiper-pagination {
                display: block !important;
            }

            .swiper-pagination-bullet {
                width: 20.62px !important;
                height: 0px !important;
                border: 2px solid #B9BDCB;
                border-radius: 0px !important;
            }

            .swiper-pagination-bullet-active {
                border-color: #F15F5E !important;
            }
            /* End Article content */

            /* Links */
            .cpr__issues-article-links {
                margin: 30px 0;
                width: 100%;
            }

            .cpr__issues-article-links-content__container {
                flex-direction: column;
                row-gap: 32px   ;
            }

            .cpr__issues-article-link__container {
                align-items: center;
                padding: 10px 20px;
                width: 100%;
            }

            .cpr__issues-article-link-text__container {
                row-gap: 0;
            }

            .cpr__issues-article-link-text {
                font-size: 17px;
                line-height: 27px;
                width: auto;
                margin-bottom: 8px;
            }

            .cpr__issues-article-link {
                font-size: 14px;
                line-height: 19px;
            }

            .right-container {
                align-items: flex-start;
            }

            .cpr__issues-article-link .cpr__btn-lbl {
                font-size: 14px;
            }
            /* End Links */
        }</style>
    <section class="cpr__issues-article-breadcrumb__container">
        <div class="cpr__issues-article-breadcrumb-content__container">
            <a onclick="goBack()" class="cpr__breadcrumb-btn" aria-label="BACK" title="BACK">
                <svg width="8" height="10" viewBox="0 0 8 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2.25537 2.80157L4.87067 0.250976L7.1242 2.44904L4.50929 4.99964L7.125 7.55062L4.87067 9.74907L2.25497 7.19809L0.00143534 5.00002L2.25537 2.80157Z" fill="#F15F5E"></path>
                </svg><label class="cpr__btn-lbl" type-tag="label" id="common_issues_article_0">GERİ</label> </a>
        </div>
    </section>
    <section class="cpr__issues-article__container">
        <div class="cpr__issues-article-content__container">
            <div class="cpr__issues-article-title__container">
                <h1 class="cpr__issues-article-title" id="common_issues_article_title">Cihaz Bakımı Hakkında Bilgi</h1>
            </div>
            <div class="cpr__issues-article-content">
                <div class="cpr__issues-article">
                    <div class="cpr__issues-article-header">
                        <section class="cpr__issues-article-description cpr__rich-text--standard" id="common_issues_article_description">

                            <p>Elektronik cihaz bakımı, cihazın düzgün çalışmasını sağlamak ve ömrünü uzatmak için yapılan düzenli işlemleri içerir. İyi bir bakım programı, cihazın performansını artırabilir, arızaları önleyebilir ve güvenliği sağlayabilir. İşte elektronik cihaz bakımı hakkında bazı genel bilgiler:</p>

                            <p><b>Temizlik ve Tozdan Arındırma: </b>Elektronik cihazların düzenli olarak temizlenmesi ve tozdan arındırılması önemlidir. Toz birikimi, cihazın soğutma sistemini etkileyebilir ve iç bileşenlerin aşırı ısınmasına neden olabilir.</p>

                            <p><b>Güncelleme ve Yazılım Bakımı: </b> Cihazın çalıştığı yazılımın ve sürücülerin düzenli olarak güncellenmesi önemlidir. Bu güncellemeler, performansı artırabilir, güvenlik açıklarını kapatır ve cihazın uyumluluğunu sağlar.</p>

                            <p><b>Donanım Kontrolleri: </b> Elektronik cihazların donanım bileşenlerinin periyodik olarak kontrol edilmesi ve test edilmesi önemlidir. Bu, potansiyel arızaların tespit edilmesine ve önlenmesine yardımcı olabilir.</p>

                            <p><b>Yedek Parça ve Bakım Talimatları:  </b>Cihazların bakımı için üretici tarafından sağlanan talimatlar ve önerileri takip etmek önemlidir. Ayrıca, yedek parçaların düzenli olarak kontrol edilmesi ve gerektiğinde değiştirilmesi önemlidir.</p>

                            <p><b>Güç ve Bağlantı Kontrolleri:  </b>Elektronik cihazların güç kaynakları ve bağlantıları periyodik olarak kontrol edilmelidir. Kablo bağlantılarının gevşek olmaması ve güç kaynaklarının düzgün çalıştığından emin olunmalıdır.</p>

                            <p><b>Ortam Koşullarının Kontrolü: </b> Elektronik cihazların çalıştığı ortamın sıcaklık, nem ve diğer faktörler açısından uygun olduğundan emin olunmalıdır. Aşırı sıcaklık, nem veya tozlu ortamlar cihazların performansını olumsuz etkileyebilir.</p>

                            <p> Bu genel bakım prensiplerini izleyerek, elektronik cihazlarınızın düzgün çalışmasını ve ömrünü uzatmasını sağlayabilirsiniz. Özellikle endüstriyel veya ticari cihazlar için, düzenli bakım rutinleri belirlenmeli ve bu rutinlere uyulmalıdır. Ayrıca, özel bir cihazın bakımıyla ilgili olarak üreticinin sağladığı talimatları dikkate almak önemlidir.</p>

                        </section>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

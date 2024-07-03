@extends('layout.repair')

@section('content')
    <style>

        .cpr__repair-article-banner__container {
            display: flex;
            width: 100%;
            margin: auto;
            justify-content: center;
            margin-top: 55px;
        }

        .cpr__repair-article-banner-content__container {
            display: flex;
            width: 100%;
            max-width: 1040px;
            flex-direction: column;
        }

        .cpr__repair-article-title {
            font-family: 'Avenir';
            font-style: normal;
            font-weight: 500;
            font-size: 45px;
            line-height: 61px;
            color: #F15F5E;
            max-width: 670px;
            box-sizing: border-box;
        }

        .cpr__repair-article-banner {
            display: flex;
            background: #F3F2F2;
            border-radius: 30px;
            padding: 30px 43px;
            box-sizing: border-box;
            position: relative;
            margin-top: 27px;
            min-height: 201px;
            align-items: center;
        }

        .cpr__repair-article-banner-text {
            font-family: 'Avenir';
            font-style: normal;
            font-weight: 200;
            font-size: 16px;
            line-height: 22px;
            color: #4E4E50;
            width: 571px;
            flex-direction: column;
            row-gap: 5px;
        }

        .cpr__repair-article-description-text h2 {
            margin: 10px 0px;
        }

        .cpr__repair-article-banner-img {
            mix-blend-mode: darken;
            position: absolute;
            bottom: 50%;
            right: 35px;
            max-width: 297px;
            max-height: 268px;
            height: auto;
            width: auto;
            transform: translate(0, 50%);
        }
        /* ENDS banner section */

        /* BEGIN description section */
        .cpr__repair-article-description {
            float: left;
            width: 668px;
        }

        .cpr__repair-article-card__container {
            float: right;
        }

        .cpr__repair-article-information__container {
            display: flex;
            width: 100%;
            margin: auto;
            justify-content: center;
            margin-top: 46px;
        }

        .cpr__repair-article-information-content__container {
            width: 100%;
            max-width: 1040px;
            justify-content: space-between;
        }

        .cpr__repair-article-description-text {
            font-family: 'Avenir';
            font-style: normal;
            font-weight: 200;
            font-size: 16px;
            line-height: 22px;
            text-align: justify;
            color: #4E4E50;
        }

        .cpr__repair-article-description-text .cpr__repair-article--s {
            color: #2D2D3B; font-weight: 500; font-size: 22px; line-height: 30px;
        }

        .cpr__repair-article-card {
            border: 1px solid #EEEEEE;
            border-radius: 30px;
            display: flex;
            flex-direction: column;
            justify-content: start;
            align-items: center;
            width: 330px;
            height: auto;
            padding-bottom: 20px;
        }

        .cpr__repair-article-card-img {
            width: 330px;
            border-radius: 30px 30px 0px 0px;
        }

        .cpr__repair-article-card-title {
            font-family: 'Avenir';
            font-style: normal;
            font-weight: 500;
            font-size: 22px;
            line-height: 30px;
            color: #2D2D3B;
            padding: 24px 24px 0px 24px;
            box-sizing: border-box;
        }

        .cpr__repair-article-card-text__container {
            margin-top: 8px;
            padding: 0px 24px 24px 24px;
            box-sizing: border-box;
        }

        .cpr__repair-article-card-text {
            font-family: 'Avenir';
            font-style: normal;
            font-weight: 200;
            font-size: 16px;
            line-height: 22px;
            color: #4E4E50;
        }
        /* ENDS description section */

        /* BEGIN more links section */
        .cpr__repair-article-more__container {
            display: flex;
            width: 100%;
            margin: auto;
            justify-content: center;
            margin-top: 60px;
        }

        .cpr__repair-article-more-content__container {
            display: flex;
            width: 100%;
            max-width: 1040px;
            justify-content: space-between;
        }

        .cpr__repair-article-more {
            border: 1px solid #F15F5E;
            border-radius: 15px;
            height: 99px;
            position: relative;
            width: 506px;
            padding: 20px 40px 10px 40px;
            box-sizing: border-box;
        }

        .right-img-content .cpr__repair-article-more-info {
            width: 280px;
        }

        .cpr__repair-article-more-info {
            display: flex;
            flex-direction: column;
        }

        .cpr__repair-article-banner-title {
            font-family: 'Avenir';
            font-style: normal;
            font-weight: 500;
            font-size: 22px;
            line-height: 30px;
            color: #4E4E50;
        }

        .cpr__repair-article-more-link {
            display: inline-flex;
            column-gap: 10px;
            align-items: center;
            font-weight: 500;
            color: #F15F5E;
        }

        .cpr__repair-article-more-link svg {
            width: 11.62px;
            height: 15.5px;
        }

        .cpr__repair-article-more-link label {
            font-family: 'Avenir';
            font-style: normal;
            font-weight: 500;
            font-size: 16px;
            line-height: 39px;
            text-transform: capitalize;
            color: #F15F5E;
        }

        .cpr__repair-article-more-right-img {
            position: absolute;
            bottom: -20px;
            right: 35px;
            width: 146.8px;
        }

        .left-img-content .cpr__repair-article-more-info {
            display: flex;
            justify-content: flex-end;
        }

        .left-img-content .cpr__repair-article-more-link {
            justify-content: flex-end;
        }

        .left-img-content {
            display: flex;
            justify-content: flex-end;
        }

        .cpr__repair-article-more-left-img {
            position: absolute;
            bottom: -20px;
            left: 24px;
            width: 144px;
        }
        /* ENDS more links section */

        /* BEGIN services section */
        .cpr__repair-article-services__container {
            display: flex;
            width: 100%;
            margin: auto;
            justify-content: center;
            margin-top: 60px;
        }

        .cpr__repair-article-services-content__container {
            display: flex;
            width: 100%;
            max-width: 1040px;
            flex-direction: column;
        }

        .cpr__repair-article-services-title {
            font-family: 'Avenir';
            font-style: normal;
            font-weight: 500;
            font-size: 30px;
            line-height: 41px;
            text-align: center;
            color: #2D2D3B;
        }

        .cpr__repair-article-services,
        .cpr__repair-article-services__container ul {
            margin-top: 36px;
            display: flex;
            flex-wrap: wrap;
            column-gap: 24px;
            width: 100%;
            row-gap: 20px;
        }

        .cpr__repair-article-service-item-link,
        .cpr__repair-article-services-content__container li {
            width: 242px;
            height: 68px;
            background: #F3F2F2;
            border-radius: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .cpr__repair-article-service-item-title,
        .cpr__repair-article-services-content__container li {
            font-family: 'Avenir';
            font-style: normal;
            font-weight: 500;
            font-size: 16px;
            line-height: 22px;
            text-align: center;
            color: #4E4E50;
            box-sizing: border-box;
            padding: 5px 25px;
        }

        .red-text {
            color: #F15F5E !important;
        }
        /* ENDS services section */

        /* BEGIN issues section */
        .cpr__repair-article-issues__container {
            display: flex;
            width: 100%;
            margin: auto;
            justify-content: center;
            margin-top: 60px;
        }

        .cpr__repair-article-issues-content__container {
            display: flex;
            width: 100%;
            max-width: 1040px;
            flex-direction: column;
        }

        .cpr__repair-article-issues {
            margin-top: 21px;
            display: flex;
            flex-wrap: wrap;
            column-gap: 27px;
            margin-top: 21px;
            row-gap: 10px;
        }

        .cpr__repair-article-issue-link {
            display: inline-flex;
            width: 328px;
            justify-content: space-between;
            padding-right: 10px;
            box-sizing: border-box;
            padding-bottom: 16px;
            border-bottom: 2px solid #F15F5E;
            padding-top: 10px;
            align-items: center;
        }

        .cpr__repair-article-issue-title {
            font-family: 'Avenir';
            font-style: normal;
            font-weight: 200;
            font-size: 16px;
            line-height: 22px;
            color: #2D2D3B;
            cursor: pointer;
        }
        /* ENDS issues section */

        /* BEGIN find store section */
        .cpr__repair-article-find-store__container {
            display: flex;
            width: 100%;
            margin: auto;
            justify-content: center;
            margin: 73px 0px 60px 0px;
        }

        .cpr__repair-article-find-store-content__container {
            display: inline-flex;
            width: 100%;
            max-width: 1040px;
            background: #F8F8F8;
            border-radius: 15px;
            position: relative;
            min-height: 302px;
            padding: 31px;
            box-sizing: border-box;
        }

        .cpr__repair-article-find-store-info {
            display: flex;
            flex-direction: column;
            justify-content: center;
            width: 400px;
        }

        .cpr__repair-article-find-store-title {
            font-family: 'Avenir';
            font-style: normal;
            font-weight: 500;
            font-size: 30px;
            line-height: 41px;
            color: #4E4E50;
        }

        .cpr__repair-article-find-store-info .cpr__btn {
            margin-top: 32px
        }

        .cpr__repair-article-banner-bg-img {
            position: absolute;
            right: 55px;
            top: 0;
        }

        .cpr__repair-article-banner-pin-img {
            position: absolute;
            right: 174px;
            top: 15px;
        }
        /* ENDS find store section */

        /*Desktop ultra wide - Desktop 13"*/
        @media (min-width: 1294px) {
            .cpr__repair-article-issues .cpr__repair-article-issue-link:nth-last-child(1),
            .cpr__repair-article-issues .cpr__repair-article-issue-link:nth-last-child(2),
            .cpr__repair-article-issues .cpr__repair-article-issue-link:nth-last-child(3),
            .cpr__repair-article-issues .cpr__repair-article-issue-link:nth-last-child(4) {
                border: none;
            }
        }
        /*Tablet / iPads*/
        @media (min-width: 763px) and (max-width: 1293px) {
            .cpr__repair-article-issues .cpr__repair-article-issue-link:nth-last-child(1),
            .cpr__repair-article-issues .cpr__repair-article-issue-link:nth-last-child(2),
            .cpr__repair-article-issues .cpr__repair-article-issue-link:nth-last-child(3),
            .cpr__repair-article-issues .cpr__repair-article-issue-link:nth-last-child(4) {
                border: none;
            }

            /* BEGIN banner section */
            .cpr__repair-article-banner__container {
                display: flex;
                width: 100%;
                margin: auto;
                justify-content: center;
                margin-top: 33.71px;
            }

            .cpr__repair-article-banner-content__container {
                display: flex;
                width: 100%;
                max-width: 637.42px;
                flex-direction: column;
            }

            .cpr__repair-article-title {
                font-family: 'Avenir';
                font-style: normal;
                font-weight: 500;
                font-size: 27.58px;
                line-height: 37.39px;
                color: #F15F5E;
                max-width: 408px;
            }

            .cpr__repair-article-banner {
                display: flex;
                background: #F3F2F2;
                border-radius: 18.39px;
                padding: 18.39px 24px;
                box-sizing: border-box;
                position: relative;
                margin-top: 16.55px;
                min-height: 123.19px;
            }

            .cpr__repair-article-banner-text {
                font-family: 'Avenir';
                font-style: normal;
                font-weight: 200;
                font-size: 9.81px;
                line-height: 13.48px;
                color: #4E4E50;
                width: 394.71px;
            }

            .cpr__repair-article-banner-img {
                position: absolute;
                bottom: 50%;
                right: 17px;
                max-width: 402px;
                max-height: 155px;
                height: auto;
                width: auto;
                transform: translate(0, 50%);
            }
            /* ENDS banner section */

            /* BEGIN description section */
            .cpr__repair-article-description {
                width: 409.42px;
            }

            .cpr__repair-article-information__container {
                display: flex;
                width: 100%;
                margin: auto;
                justify-content: center;
                margin-top: 28.19px;
            }

            .cpr__repair-article-information-content__container {
                width: 100%;
                max-width: 637.42px;
                justify-content: space-between;
            }

            .cpr__repair-article-description-text {
                font-family: 'Avenir';
                font-style: normal;
                font-weight: 200;
                font-size: 9.81px;
                line-height: 13.48px;
                text-align: justify;
                color: #4E4E50;
            }

            .cpr__repair-article-description-text .cpr__repair-article--s {
                color: #2D2D3B; font-weight: 500; font-size: 13.48px; line-height: 18.39px;
            }

            .cpr__repair-article-card {
                border: 1px solid #EEEEEE;
                border-radius: 18.39px;
                display: flex;
                flex-direction: column;
                justify-content: start;
                align-items: center;
                width: 202.26px;
                height: auto;
            }

            .cpr__repair-article-card-img {
                width: 202.26px;
                border-radius: 18.39px 18.39px 0px 0px;
            }

            .cpr__repair-article-card-title {
                font-family: 'Avenir';
                font-style: normal;
                font-weight: 500;
                font-size: 13.48px;
                line-height: 18.39px;
                color: #2D2D3B;
                padding: 14.71px 14px 0px 14px;
                box-sizing: border-box;
            }

            .cpr__repair-article-card-text__container {
                box-sizing: border-box;
                margin-top: 4.90px;
                padding: 0.00px 14px 14px 14px;
            }

            .cpr__repair-article-card-text {
                font-family: 'Avenir';
                font-style: normal;
                font-weight: 200;
                font-size: 9.81px;
                line-height: 13.48px;
                color: #4E4E50;
            }
            /* ENDS description section */

            /* BEGIN more links section */
            .cpr__repair-article-more__container {
                display: flex;
                width: 100%;
                margin: auto;
                justify-content: center;
                margin-top: 36.77px;
            }

            .cpr__repair-article-more-content__container {
                display: flex;
                width: 100%;
                max-width: 637.42px;
                justify-content: space-between;
            }

            .cpr__repair-article-more {
                border: 1px solid #F15F5E;
                border-radius: 9.19px;
                height: 60.68px;
                position: relative;
                width: 310.13px;
                padding: 12.26px 40px 10px 40px;
                box-sizing: border-box;
            }

            .right-img-content .cpr__repair-article-more-info {
                width: 171.61px;
            }

            .cpr__repair-article-more-info {
                display: flex;
                flex-direction: column;
            }

            .cpr__repair-article-banner-title {
                font-family: 'Avenir';
                font-style: normal;
                font-weight: 500;
                font-size: 13.48px;
                line-height: 18.39px;
                color: #4E4E50;
            }

            .cpr__repair-article-more-link {
                display: inline-flex;
                column-gap: 6.13px;
                align-items: center;
            }

            .cpr__repair-article-more-link .cpr__btn-lbl {
                font-family: 'Avenir';
                font-style: normal;
                font-weight: 500;
                font-size: 9.81px;
                line-height: 23.90px;
                text-transform: capitalize;
                color: #F15F5E;
            }

            .cpr__repair-article-more-right-img {
                position: absolute;
                bottom: -20px;
                right: 21.45px;
                width: 89.48px;
            }

            .left-img-content .cpr__repair-article-more-info {
                display: flex;
                justify-content: flex-end;
            }

            .left-img-content .cpr__repair-article-more-link {
                justify-content: flex-end;
            }

            .left-img-content {
                display: flex;
                justify-content: flex-end;
            }

            .cpr__repair-article-more-left-img {
                position: absolute;
                bottom: -20px;
                left: 14.71px;
                width: 88.26px;
            }
            /* ENDS more links section */

            /* BEGIN services section */
            .cpr__repair-article-services__container {
                display: flex;
                width: 100%;
                margin: auto;
                justify-content: center;
                margin-top: 36.77px;
            }

            .cpr__repair-article-services-content__container {
                display: flex;
                width: 100%;
                max-width: 637.42px;
                flex-direction: column;
            }

            .cpr__repair-article-services-title {
                font-family: 'Avenir';
                font-style: normal;
                font-weight: 500;
                font-size: 18.39px;
                line-height: 25.13px;
                text-align: center;
                color: #2D2D3B;
            }

            .cpr__repair-article-services,
            ul {
                margin-top: 22.06px;
                display: flex;
                flex-wrap: wrap;
                column-gap: 14.71px;
                row-gap: 17.16px !important;
            }

            .cpr__repair-article-service-item-link,
            .cpr__repair-article-services-content__container li {
                width: 148.32px;
                height: 41.68px;
                background: #F3F2F2;
                border-radius: 6.13px;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .cpr__repair-article-service-item-title,
            .cpr__repair-article-services-content__container li {
                font-family: 'Avenir';
                font-style: normal;
                font-weight: 500;
                font-size: 9.81px;
                line-height: 13.48px;
                text-align: center;
                color: #4E4E50;
                box-sizing: border-box;
                padding: 3.06px 25px;
            }
            /* ENDS services section */

            /* BEGIN issues section */
            .cpr__repair-article-issues__container {
                display: flex;
                width: 100%;
                margin: auto;
                justify-content: center;
                margin-top: 36.77px;
            }

            .cpr__repair-article-issues-content__container {
                display: flex;
                width: 100%;
                max-width: 637.42px;
                flex-direction: column;
            }

            .cpr__repair-article-issues {
                margin-top: 12.87px;
                display: flex;
                flex-wrap: wrap;
                column-gap: 16.55px;
                margin-top: 12.87px;
            }

            .cpr__repair-article-issue-link {
                display: inline-flex;
                width: 201.03px;
                justify-content: space-between;
                padding-right: 6.13px;
                box-sizing: border-box;
                padding-bottom: 9.81px;
                border-bottom: 1.23px solid #F15F5E;
                padding-top: 6.13px;
                align-items: center;
            }

            .cpr__repair-article-issue-title {
                font-family: 'Avenir';
                font-style: normal;
                font-weight: 200;
                font-size: 9.81px;
                line-height: 13.48px;
                color: #2D2D3B;
            }
            /* ENDS issues section */

            /* BEGIN find store section */
            .cpr__repair-article-find-store__container {
                display: flex;
                width: 100%;
                margin: auto;
                justify-content: center;
                margin: 44.74px 0px 60px 0px;
            }

            .cpr__repair-article-find-store-content__container {
                display: inline-flex;
                width: 100%;
                max-width: 637.42px;
                background: #F8F8F8;
                border-radius: 9.19px;
                position: relative;
                min-height: 185.10px;
                padding: 19.00px;
                box-sizing: border-box;
            }

            .cpr__repair-article-find-store-info {
                display: flex;
                flex-direction: column;
                justify-content: center;
                width: 245.16px;
            }

            .cpr__repair-article-find-store-title {
                font-family: 'Avenir';
                font-style: normal;
                font-weight: 500;
                font-size: 18.39px;
                line-height: 25.13px;
                color: #4E4E50;
            }

            .cpr__repair-article-find-store-info .cpr__btn {
                margin-top: 19.61px
            }

            .cpr__repair-article-banner-bg-img {
                position: absolute;
                right: 33.71px;
                top: 0;
                width: 366px;
            }

            .cpr__repair-article-banner-pin-img {
                position: absolute;
                right: 106.65px;
                top: 9.19px;
                width: 164px;
            }
            /* ENDS find store section */

        }
        /*Tablet - Mobile*/
        @media (min-width: 1px) and (max-width: 762px) {
            .cpr__breadcrumb__container {
                margin: 0 16px;
                transform: translate(0, 30px);
                width: auto;
            }
            /* Banner */
            .cpr__repair-article-banner__container {
                margin: 0;
                padding: 30px 0 0 0;
                pointer-events: none;
            }

            .cpr__repair-article-banner-content__container {
                padding: 0 16px;
                max-width: 375px;
                display: flex;
                flex-direction: row;
                align-items: center;
                align-content: space-between;
                flex-wrap: wrap;
                margin: auto;
            }

            .cpr__repair-article-title {
                font-size: 25px;
                line-height: 34px;
                width: 200px;
            }

            .cpr__repair-article-banner {
                background: #FFFFFF;
                min-height: auto;
                margin: auto;
                padding: 0;
                align-items: center;
            }

            .cpr__repair-article-banner-img {
                bottom: inherit;
                right: 0;
                width: 140.68px;
                position: inherit;
                height: auto;
                transform: inherit;
                max-width: 402px;
                max-height: 155px;
                height: auto;
                width: auto;
            }
            /* End Banner */

            /* Information */
            .cpr__repair-article-information__container {
                margin: 30px 0;
            }

            .cpr__repair-article-information-content__container {
                box-sizing: border-box;
                flex-direction: column;
                padding: 0 16px;
                max-width: 375px;
            }

            .cpr__repair-article-card-text {
                font-family: 'Avenir';
                font-style: normal;
                font-weight: 200;
                font-size: 16px;
                line-height: 22px;
                color: #4E4E50;
                text-align: revert;
            }

            .cpr__repair-article-description {
                width: auto;
            }

            .cpr__repair-article-card {
                height: auto;
                width: auto;
            }

            .cpr__repair-article-card-img {
                width: 100%;
            }

            .cpr__repair-article-card-title {
                font-size: 20px;
                line-height: 27px;
            }
            /* End Information */

            /* More */
            .cpr__repair-article-more-content__container {
                box-sizing: border-box;
                flex-direction: column;
                row-gap: 32px;
                padding: 0 16px;
                max-width: 375px;
            }

            .cpr__repair-article-more {
                height: auto;
                padding: 20px 10px;
                width: auto;
            }

            .cpr__repair-article-more-info {
                align-items: start;
                max-width: 184px;
            }

            .cpr__repair-article-banner-title {
                font-size: 20px;
                line-height: 27px;
            }

            .cpr__repair-article-more-link {
                font-size: 14px;
                line-height: 19px;
            }

            .cpr__repair-article-more-link .cpr__btn-lbl {
                font-size: 14px;
                line-height: 19px;
            }

            .cpr__repair-article-more-right-img {
                right: -2px;
                width: 144px;
            }

            .cpr__repair-article-more-left-img {
                bottom: 50%;
                left: 0;
                margin-bottom: -69px;
                width: 142px;
            }
            /* End More */

            /* Services */
            .cpr__repair-article-services__container {
                margin-top: 30px;
            }

            .cpr__repair-article-services-title {
                font-size: 20px;
                line-height: 27px;
                margin-bottom: 15px;
            }

            .cpr__repair-article-services,
            ul {
                column-gap: 11px;
                flex-direction: row;
                margin-top: 21px;
                padding: 0 16px;
                box-sizing: border-box;
                row-gap: 20px !important;
                width: initial;
                max-width: 375px;
                margin: 0 auto;
            }


            .cpr__repair-article-issues-content__container {
                max-width: 375px;
            }

            .cpr__repair-article-service-item-link,
            .cpr__repair-article-services-content__container li  {
                flex: 1 0 48%;
            }

            .cpr__repair-article-service-item-title,
            .cpr__repair-article-services-content__container li {
                font-size: 14px;
                line-height: 19px;
                padding: 5px 17px;
            }
            /* End Services */

            /* Issues */
            .cpr__repair-article-issues__container {
                margin-top: 30px;
            }

            .cpr__repair-article-issues {
                padding: 0 16px;
            }

            .cpr__repair-article-issue-link {
                width: 100%;
            }

            .cpr__repair-article-issues a:nth-last-child(2) {
                border-bottom: none;
            }
            /* End Issues */

            /* Find */
            .cpr__repair-article-find-store__container {
                margin: 30px 0;
            }

            .cpr__repair-article-find-store-content__container {
                flex-direction: column;
                min-height: auto;
                padding: 0;
                max-width: 375px;
            }

            .cpr__repair-article-find-store-info {
                align-items: center;
                padding: 16px 16px 7px;
                text-align: center;
                width: auto;
            }

            .cpr__repair-article-find-store-info .cpr__btn {
                margin: 7px 0 13px;
            }

            .cpr__repair-article-find-store-info .cpr__btn-lbl {
                font-size: 12px;
                line-height: 16px;
            }

            .cpr__repair-article-find-store-title {
                font-size: 20px;
                line-height: 27px;
            }

            .cpr__repair-article-banner-bg-img {
                left: 0;
                position: relative;
                right: 0;
                width: 100%;
            }

            .cpr__repair-article-banner-pin-img {
                bottom: 18px;
                margin-right: -52px;
                right: 50%;
                top: auto;
                width: 105.96px;
            }
            /* End Find */

            .cpr__repair-article-card-text__container {
                box-sizing: border-box;
                margin-top: 4.90px;
                padding: 0.00px 14px 14px 14px;
            }
        }

        @media (min-width: 1px) and (max-width: 360px) {
            .cpr__repair-article-title {
                margin: auto;
                text-align: center;
            }
        }
    </style>
    <main class="cpr__models-repairs">
        <section class="cpr__breadcrumb__container">
            <div class="cpr__breadcrumb-content__container">
                <a onclick="goBack()" class="cpr__breadcrumb-btn" aria-label="BACK" title="BACK">
                    <svg width="8" height="10" viewBox="0 0 8 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.25537 2.80157L4.87067 0.250976L7.1242 2.44904L4.50929 4.99964L7.125 7.55062L4.87067 9.74907L2.25497 7.19809L0.00143534 5.00002L2.25537 2.80157Z" fill="#F15F5E"></path>
                    </svg><label class="cpr__btn-lbl" type-tag="label" id="models_repairs_0">GERİ</label> </a>
            </div>
        </section>

        <?php $brandName =  \App\Models\Brand::find($repairarray['brand_id'])->name; ?>
        <section class="cpr__repair-article-banner__container">
            <div class="cpr__repair-article-banner-content__container">
                <h1 class="cpr__repair-article-title">
                {{$brandName}} {{\App\Models\Version::find($repairarray['version_id'])->name}} Teknik Servis
                </h1>
                <div class="cpr__repair-article-banner">
                    <section class="cpr__repair-article-banner-text desktop tablet" id="repair_article_description">
                        <p>Phone Hospital olarak, {{$brandName}} sahipleri için kapsamlı teknik servis hizmetleri sunan uzman ekibiz.
                            Cihazınızın performansını artırmak, hasarları gidermek ve uzun ömürlü kullanımını sağlamak için orijinal parçalar kullanarak profesyonel onarım ve bakım hizmetleri sunuyoruz.</p>
                     </section><img class="cpr__repair-article-banner-img" src="{{asset('repair/assets/img/home/14series.webp')}}" alt="banner image" id="image_repair_article_0">
                </div>
            </div>
        </section>
        <section class="cpr__repair-article-information__container">
            <div class="cpr__repair-article-information-content__container">
                <div class="cpr__repair-article-description">
                    <section class="cpr__rich-text--standard" type-tag="et" id="repair_article_1">

                        @foreach($site_technical_category as $item)
                        <h2>{{$item->title}}   <span style="float: right;
    color: #f00;
     padding: 3px;
    font-size: 14px;
    margin: 1px;">Tahmini Servis Ücreti {{number_format($item->price,2,",",".")}} ₺</span></h2>
                        <hr>
                            {!! $item->description !!}
                         @endforeach
                    </section>
                </div>
                <div class="cpr__repair-article-card__container desktop tablet">
                    <div class="cpr__repair-article-card">
                        <img class="cpr__repair-article-card-img" src="{{asset('repair/assets/img/home/14series.webp')}}" alt="banner image" id="image_repair_article_1">
                        <a class="cpr__btn cpr__btn-primary fit" href="{{route('ariza_form')}}" title="Cihazımı Tamir Et" >
                            <label class="cpr__btn-lbl" type-tag="label">Cihazımı Tamir Et</label>
                            <svg class="cpr__btn-icon" width="12" height="16" viewBox="0 0 12 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.94581 11.5873L3.6784 15.7491L0.00130729 12.1625L4.26807 8.00066L0 3.83821L3.6784 0.250994L7.94647 4.41344L11.6236 8.00004L7.94581 11.5873Z" fill="white"></path>
                            </svg>
                        </a>
                        <!--
                        <h2 class="cpr__repair-article-card-title" type-tag="h2" id="repair_article_1">How Much Will It Cost?</h2>
                        <div class="cpr__repair-article-card-text__container">
                            <p class="cpr__repair-article-card-text" type-tag="p" id="repair_article_2">At CPR Cell Phone Repair, iPhone 6s Plus Repair Services repair services don’t have to break the bank. Our services are both fast and budget-friendly. Depending on the type of damage and the extent of the damage to your iPhone 6s Plus Repair Services, repair costs will vary. For an accurate estimate on your iPhone 6s Plus Repair Services, please</p><a page-type="LOCATOR" class="red-text" id="repair_article_3" href="/locations" title="contact your local CPR store." aria-label="contact your local CPR store."><label class="cpr__repair-article-card-text" style="color: #F15F5E;">contact your local CPR store.</label></a>
                        </div>
                        -->
                    </div>
                </div>
            </div>
        </section>



    </main>
@endsection

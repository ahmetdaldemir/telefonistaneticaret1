@extends('layout.repair')

@section('content')
    <style>.cpr__models-repairs {
            color: #4E4E50;
            font-family: 'Avenir';
            font-size: 16px;
            font-weight: 200;
            margin: 0 auto;
            width: 1039px;
        }

        .cpr__models-repairs input {
            font-family: 'Avenir';
        }

        /* Title */
        .cpr__models-repairs--title {
            color: #F15F5E;
            display: block;
            font-size: 45px;
            font-weight: 500;
            line-height: 61px;
            margin-bottom: 27px;
            margin-top: 33px;
        }

        /* End Title */

        /* Subtitle */
        .cpr__models-repairs--subtitle {
            color: #4E4E50;
            font-size: 30px;
            font-weight: 500;
            /* max-width: 441px; */
            margin-bottom: 10px;
        }

        /* End Subtitle */

        /* Banner */
        .cpr__models-repairs--banner {
            background-color: #F3F2F2;
            border-radius: 30px;
            display: flex;
            flex-flow: row wrap;
            justify-content: space-between;
            margin-bottom: 60px;
            padding: 23px 45px;
            min-height: 367px;
            box-sizing: border-box;
        }

        .cpr__models-repairs--banner .cpr__models-repairs--subtitle {
            max-width: 441px;
        }

        .cpr__models-repairs--banner-info {
            display: flex;
            flex-direction: column;
            width: 495px;
            justify-content: center;
        }

        .cpr__models-repairs--banner-resumen {
            line-height: 21.86px;
            margin-bottom: 20px;
        }

        .cpr__models-repairs--banner-notify {
            font-size: 14px;
            line-height: 19.12px;
            margin-bottom: 20px;
        }

        .cpr__models-repairs--banner-zip {
            background: #fff;
            border-radius: 167.534px;
            box-sizing: border-box;
            display: flex;
            height: 60.73px;
            isolation: isolate;
            padding: 10.4709px 17.4709px 10.4709px 31.4126px;
            width: 416.74px;
        }

        .cpr__models-repairs--banner-zip-input {
            border: none;
            color: #4E4E50;
            font-weight: 500;
            font-size: 16px;
            line-height: 22px;
            width: 100%;
        }

        .cpr__models-repairs--banner-zip-btn {
            width: 68.59px;
            height: 39.79px;
            background: #F15F5E;
            border-radius: 19.8946px;
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        .cpr__models-repairs--banner-zip-btn:hover {
            background: #CD5150;
        }

        .cpr__models-repairs--banner-image {
            flex: 1 0 0%;
            position: relative;
        }

        .cpr__models-repairs--banner-image img {
            bottom: -23px;
            right: -10px;
            position: absolute;
            width: 430px;
            height: 100%;
            object-fit: contain;
            mix-blend-mode: darken;
        }

        /* End Banner */

        /* Categories list */
        .cpr__models-repairs--list {
            align-items: flex-start;
            column-gap: 21px;
            display: flex;
            flex-wrap: wrap;
            padding: 18px 6px;
            margin-bottom: 60px;
            row-gap: 31px;
        }

        .cpr__models-repairs--item {
            box-sizing: border-box;
            border: 1px solid #B9BDCB;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            height: 177.56px;
            padding: 18px 6px;
            width: 153px;
        }

        .cpr__models-repairs--item .cpr__btn-lbl {
            font-family: 'Avenir';
            font-style: normal;
            font-weight: 200;
            font-size: 16px;
            line-height: 22px;
            color: #4E4E50;
            text-transform: initial;
        }

        .cpr__models-repairs--item>img {
            margin: 0 auto 10px;
        }

        .cpr__models-repairs--item-title {
            line-height: 17px;
            margin-bottom: 10px;
            text-align: center;
            font-family: 'Avenir';
            font-style: normal;
            font-weight: 200;
            font-size: 16px;
            line-height: 17px;
        }

        .cpr__models-repairs--item-link {
            align-items: baseline;
            column-gap: 6px;
            cursor: pointer;
            font-size: 12px;
            font-weight: 500;
            line-height: 16px;
            justify-content: center;
            text-transform: uppercase;
            display: inline-flex;
        }

        .cpr__models-repairs--item-link svg {
            fill: #F15F5E;
        }

        .cpr__models-repairs--item-link:hover {
            text-decoration: underline;
        }

        .cpr__models-repairs--item:hover {
            border-color: #F15F5E;
        }

        .cpr__models-repairs--item img {
            width: 109px;
            height: 72.56px;
            object-fit: contain;
        }
        /* End Categories list */

        /* Issues */
        .cpr__models-repairs--issues {
            margin-bottom: 60px;
        }

        .cpr__models-repairs--issues .cpr__models-repairs--subtitle {
            display: block;
            text-align: center;
        }

        .cpr__models-repairs--issues-description {
            display: block;
            margin: 0 auto 10px;
            text-align: center;
            width: 961px;
        }

        .cpr__models-repairs--issues-links {
            display: flex;
            flex-wrap: wrap;
            column-gap: 24px;
            margin-bottom: 70px;
        }

        .cpr__models-repairs--issues-links-item {
            align-items: center;
            border-bottom: 2px solid #F15F5E;
            box-sizing: border-box;
            color: #2D2D3B;
            font-size: 14px;
            display: flex;
            justify-content: space-between;
            padding: 20px 20px 20px 0;
            width: 330px;
        }

        .cpr__models-repairs--issues-links-item a,
        .cpr__models-repairs--issues-links-item p,
        .cpr__models-repairs--issues-links-item label {
            color: #2D2D3B;
            font-size: 14px;
            line-height: 19px;
        }

        .cpr__models-repairs--issues-links-item label {
            cursor: pointer;
        }

        .cpr__models-repairs--issues-links-item svg {
            fill: #F15F5E;
        }

        .cpr__models-repairs--issues-links .cpr__models-repairs--issues-links-item:last-child,
        .cpr__models-repairs--issues-links .cpr__models-repairs--issues-links-item:nth-last-child(-n+2) {
            border: none;
        }

        .cpr__models-repairs--issues-links-item.links--btn {
            /* border: none !important; */
            justify-content: flex-end;
            height: auto;
            padding-bottom: 0;
            padding-top: 18px;
        }

        .cpr__models-repairs--issues-links.links-opened .links--btn {
            border: none;
            justify-content: center;
        }

        .cpr__models-repairs-expand__container {
            padding-right: 16px;
            width: 314px;
        }

        .cpr__models-repairs--issues-links .cpr__btn {
            text-decoration: underline !important;
        }

        .cpr__models-repairs--issues-cards {
            display: flex;
            column-gap: 22px;
        }

        .cpr__models-repairs--issues-card {
            border: 1px solid #B9BDCB;
            border-radius: 30px;
            text-align: center;
            width: 328px;
        }

        .cpr__models-repairs--issues-card-cover img {
            width: 100%;
        }

        .cpr__models-repairs--issues-card-content {
            padding: 24px 16px;
        }

        .cpr__models-repairs--issues-card-title {
            color: #2D2D3B;
            display: block;
            font-size: 22px;
            font-weight: 500;
            line-height: 30px;
            margin-bottom: 8px;
        }

        .cpr__models-repairs--issues-card-description {
            line-height: 21.86px;
        }

        /* End Issues */

        /* Locale */
        .cpr__locate {
            width: 1043px;
            height: 302px;
            background: #F8F8F8;
            border-radius: 26.089px;
            margin: 0 auto;
            margin-bottom: 65px;
            display: flex;
            position: relative;
        }

        .cpr__locate-details {
            display: flex;
            flex-direction: column;
            margin: auto 0;
            margin-left: 37px;
        }

        .cpr__locate-details-t {
            font-family: 'Avenir';
            font-style: normal;
            font-weight: 500;
            font-size: 30px;
            line-height: 46px;
            color: #404245;
        }

        .cpr__locate-details-bullets {
            display: flex;
            flex-direction: column;
            row-gap: 10px;
            padding-left: 32px;
            box-sizing: border-box;
            margin-top: 13px;
            margin-bottom: 22px;
        }

        .cpr__locate-details-item {
            display: flex;
            align-items: center;
            column-gap: 5px;
        }

        .cpr__locate-details-item-t {
            font-family: 'Avenir';
            font-style: normal;
            font-weight: 200;
            font-size: 16px;
            color: #2D2E2E;
        }

        .cpr__locate-details-btn {
            width: 405px;
        }

        .cpr__locate-details-map {
            position: absolute;
            right: 65px;
            top: 0;
            z-index: 0;
            pointer-events: none;
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

        /* End Locate */

        .hide {
            display: none !important;
        }

        @media (min-width: 763px) and (max-width: 1293px) {
            .cpr__models-repairs {
                width: 100%;
            }

            .cpr__models-repairs--title {
                font-family: 'Avenir';
                font-style: normal;
                font-weight: 500;
                font-size: 27.5806px;
                line-height: 38px;
                display: flex;
                align-items: center;
                position: relative;
                width: 636.8px;
                margin: 33px auto 27px;
            }

            /* banner */

            .cpr__models-repairs--banner {
                width: 581.65px;
                /* width: 83.8%; */
                padding: 14px 27.58px;
                margin: 0 auto 37px;
                min-height: auto;
                position: relative;
            }

            .cpr__models-repairs--banner .cpr__location-wrap {
                margin-left: 24px;
            }

            .cpr__models-repairs--subtitle {
                font-size: 18.3871px;
                line-height: 25px;
                width: 270px;
            }

            .cpr__models-repairs--banner-resumen {
                font-size: 9.80645px;
                line-height: 13px;
                width: 275px;
            }

            .cpr__models-repairs--banner-notify {
                font-size: 9.80645px;
                line-height: 13px;
                width: 303px;
            }

            .cpr__models-repairs--banner-zip {
                width: 255.42px;
                height: 37.22px;
                align-items: center;
            }

            .cpr__models-repairs--banner-zip-input {
                font-size: 9.80645px;
                line-height: 13px;
            }

            .cpr__models-repairs--banner-zip-btn {
                width: 35.3px;
                height: 24.39px;
            }

            .cpr__models-repairs--banner-zip-btn svg {
                max-width: 15px;
            }

            .cpr__models-repairs--banner-image {
                bottom: 10px;
            }

            .cpr__models-repairs--banner-image img {
                bottom: -23px;
                right: -10px;
                position: absolute;
                width: 220px;
                height: 100%;
                object-fit: contain;
                mix-blend-mode: darken;
            }

            /* products list */
            .cpr__models-repairs--list {
                width: 636.19px;
                padding: 0 0;
                column-gap: 14px;
                row-gap: 19px;
                margin: 0 auto 37px;
            }

            .cpr__models-repairs--item {
                width: 93.77px;
                height: 103.92px;
                padding: 11px 3.65px;
            }

            .cpr__models-repairs--item img {
                width: 37.31px;
                height: 44.47px;
                margin: 0 auto 6px;
            }

            .cpr__models-repairs--item-title {
                font-size: 9.80645px;
                line-height: 10px;
                margin-bottom: 7.8px;
            }

            .cpr__models-repairs--item-link {
                font-size: 7.2239px;
                line-height: 10px;
                margin: 0 auto;
            }

            .cpr__models-repairs--item-link svg {
                width: 3.91px;
                height: 5.21px;
            }

            /* common issues */
            .cpr__models-repairs--issues {
                width: 637.42px;
                margin: 0 auto 37px;
            }

            .cpr__models-repairs--issues-header {
                width: 590px;
                margin: 0 auto;
            }

            .cpr__models-repairs--issues-header .cpr__models-repairs--subtitle {
                margin: 0 auto;
            }

            .cpr__models-repairs--issues-header .cpr__models-repairs--issues-description {
                font-size: 9.80645px;
                line-height: 13px;
                width: 534px;
                margin: 12px auto 20px;
            }

            .cpr__models-repairs--issues-links {
                margin-bottom: 43px;
                column-gap: 15px;
            }

            .cpr__models-repairs--issues-links-item {
                width: 202px;
                /* height: 25px; */
                font-size: 8.58065px;
                line-height: 12px;
                padding: 12px 12px 12px 0;
            }

            .cpr__models-repairs--issues-links-item.links--btn {
                padding-top: 8px;
                padding-right: 0;
            }

            .cpr__models-repairs--issues-links-item svg {
                width: 7.12px;
                height: 9.5px
            }

            .cpr__models-repairs-expand__container {
                width: 202px;
                height: 25px;
            }

            .cpr__models-repairs-expand__container svg {
                color: #fff;
            }

            .cpr__models-repairs-more-text,
            .cpr__models-repairs-less-text {
                font-size: 9.80645px;
                line-height: 13px;
                color: #fff;
                text-decoration: none;
            }

            .cpr__models-repairs--issues-cards {
                column-gap: 16px;
            }

            .cpr__models-repairs--issues-card {
                width: 202px;
            }

            .cpr__models-repairs--issues-card-content {
                padding: 14.71px;
            }

            .cpr__models-repairs--issues-card-title {
                font-size: 13.3px;
                line-height: 18px;
                font-weight: 500;
                margin-bottom: 4.9px;
            }

            .cpr__models-repairs--issues-card-description {
                font-size: 9.80645px;
                line-height: 13px;
            }

            /* locate */

            .cpr__locate {
                width: 634px;
            }

            .cpr__locate-details {
                width: 215px;
            }

            .cpr__locate-details-t {
                font-weight: 700;
                font-size: 18.3871px;
                line-height: 28px;
            }

            .cpr__locate-details-bullets {
                padding-left: 20px;
                margin-top: 8px;
                margin-bottom: 10px;
            }

            .cpr__locate-details-item {
                width: 155px;
            }

            .cpr__locate-details-item svg {
                width: 10.5px;
                height: 10.5px;
            }

            .cpr__locate-details-item-t {
                font-size: 9.80645px;
                line-height: 27px;
            }

            .cpr__repair-article-banner-bg-img {
                width: 375px;
                height: 185px;
                right: 20px;
            }

            .cpr__repair-article-banner-pin-img {
                width: 160px;
                height: 161px;
                top: 10px;
                right: 92px;
            }

            .cpr__models-repairs--item .cpr__btn-lbl {
                font-size: 9.80645px;
                line-height: 10px;
            }
        }

        @media (min-width: 1px) and (max-width: 762px) {
            .cpr__models-repairs {
                display: flex;
                flex-direction: column;
                width: 100%;
                align-items: center;
            }

            .cpr__models-repairs--banner {
                background-color: #fff;
                margin: 0px;
                padding: 0px;
                max-width: 343px;
                row-gap: 20px;
            }

            .cpr__models-repairs--banner .cpr__location-wrap {
                /* margin-top: -8px; */
            }

            .cpr__models-repairs--banner-header {
                display: inline-flex;
                width: 100%;
            }

            .cpr__models-repairs--banner-information {
                width: 200px;
            }

            .cpr__models-repairs--title {
                font-size: 25px;
                line-height: 34px;
                margin: 0px;
            }

            .cpr__models-repairs--subtitle {
                font-size: 16px;
                line-height: 22px;
            }

            .cpr__models-repairs--banner-header img {
                width: 180px;
                position: relative;
                top: -30px;
                object-fit: cover;
            }

            .cpr__models-repairs--banner-zip,
            .cpr__models-repairs--banner-zip-input {
                background: #F3F2F2;
            }

            .cpr__models-repairs--banner-zip {
                height: 53px;
            }

            .cpr__models-repairs--banner-zip-input {
                font-weight: 200;
                font-size: 14px;
                line-height: 19px;
                color: #4E4E50;
            }

            .input__container {
                width: 100%;
            }

            .locator-search::placeholder {
                font-family: 'Avenir';
                font-style: normal;
                font-weight: 200;
                font-size: 18px;
                line-height: 25px;
                color: #4E4E50;
            }

            .locator-search {
                background: #F3F2F2;
                border-radius: 167.534px;
                height: 53px;
                width: 100%;
                border: none;
                outline: none;
                font-family: 'Avenir';
                font-style: normal;
                font-weight: 200;
                font-size: 14px;
                line-height: 19px;
                color: #4E4E50;
                padding: 10px 75px 10px 30px;
                box-sizing: border-box;
            }

            .input__container {
                position: relative;
            }

            #locator-search::placeholder {
                font-family: 'Avenir';
                font-style: normal;
                font-weight: 500;
                font-size: 16px;
                line-height: 22px;
                color: #4E4E50;
            }

            .locator-search-button {
                position: absolute;
                background: #F15F5E;
                border-radius: 19.8946px;
                border: none;
                width: 57.59px;
                height: 39.79px;
                left: initial;
                right: 10px;
                top: 7px;
                cursor: pointer;
            }

            .search-location-button {
                font-family: 'Avenir';
                font-style: normal;
                font-weight: 500;
                font-size: 18px;
                line-height: 39px;
                display: flex;
                align-items: center;
                text-transform: uppercase;
                color: #FFFFFF;
                text-decoration: none;
                cursor: pointer;
            }

            .cpr__models-repairs--banner .cpr__location-wrap {
                margin-top: -8px;
            }

            .cpr__models-repairs--list {
                padding: 0px;
                margin-top: 20px;
                column-gap: 11px;
                row-gap: 10px;
                width: 100%;
                max-width: 343px;
                margin-bottom: 0px;
            }

            .cpr__models-repairs--item {
                width: 166px;
            }

            .cpr__models-repairs--item.item-mobile {
                display: none;
            }
            .cpr__models-repairs--item.item-mobile.visible {
                display: flex;
            }

            .cpr__more-models-btn__container {
                max-width: 343px;
                width: 100%;
                margin: 38px 0px 30px 0px;
                display: flex;
                justify-content: center;
            }

            #handle-models-repairs {
                display: flex;
                flex-direction: column !important;
            }

            .cpr__models-repairs--issues {
                margin-bottom: 0px;
                max-width: 343px;
                width: 100%;
            }

            .cpr__models-repairs--issues .cpr__models-repairs--subtitle {
                font-weight: 500;
                font-size: 20px;
                line-height: 27px;
            }

            .cpr__models-repairs--issues-description {
                text-align: start;
                width: 100%;
            }

            .cpr__models-repairs--issues-links-item {
                padding-left: 16px;
                width: 343px;
            }

            .cpr__models-repairs--issues-links-item.links--btn {
                flex-direction: column;
                flex-wrap: nowrap;
                justify-content: center;
                margin-bottom: 30px;
            }

            .cpr__models-repairs--issues-links {
                margin: 0;
            }

            .cpr__models-repairs-expand__container {
                justify-content: center;
                margin-top: 24px;
                width: 100%;
            }

            .cpr__models-repairs-more-text,
            .cpr__models-repairs-less-text {
                font-family: 'Avenir';
                font-style: normal;
                font-weight: 200;
                font-size: 12px;
                line-height: 12px;
                text-decoration-line: underline;
                color: #4E4E50;
            }

            .cpr__models-repairs-expand__container button {
                background: none;
                border: none;
            }

            .cpr__models-repairs--issues-cards {
                margin: 13px 0px 30px 0px;
                max-width: 343px;
                width: 100%;
                flex-direction: column;
                row-gap: 26px;
            }

            .cpr__models-repairs--issues-card {
                width: 343px;
            }

            .cpr__models-repairs--issues-card-title {
                font-size: 20px;
                line-height: 27px;
            }

            .cpr__locate {
                width: 100%;
                margin-bottom: 30px;
                height: auto;
                flex-direction: column;
                align-items: center;
            }

            .cpr__locate-details {
                align-items: center;
                max-width: 343px;
                width: 100%;
                margin: 0px;
                margin-bottom: 16px;
            }

            .cpr__locate-details-t {
                font-size: 20px;
                line-height: 27px;
                text-align: center;
                margin-top: 16px;
            }

            .cpr__locate-details-bullets {
                width: 240px;
                padding: 0px;
            }

            .cpr__locate-details .cpr__btn-lbl {
                font-size: 12px;
                line-height: 16px;
            }

            .cpr__repair-article-banner-bg-img {
                position: initial;
            }

            .cpr__repair-article-banner-pin-img {
                top: initial;
                right: initial;
                bottom: 20px;
                width: 105.96px;
            }

            .cpr__repair-article-banner-bg-img {
                position: initial;
                width: 100%;
            }

            .cpr__models-repairs--item img {
                width: 60.88px;
                height: 72.56px;
            }

            .cpr__more-models-btn__container .cpr__btn-lbl {
                text-decoration: underline !important;
            }
        }</style>
    <main class="cpr__models-repairs">
        <section class="cpr__breadcrumb__container">
            <div class="cpr__breadcrumb-content__container">
                <a onclick="goBack()" class="cpr__breadcrumb-btn" aria-label="BACK" title="BACK">
                    <svg width="8" height="10" viewBox="0 0 8 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.25537 2.80157L4.87067 0.250976L7.1242 2.44904L4.50929 4.99964L7.125 7.55062L4.87067 9.74907L2.25497 7.19809L0.00143534 5.00002L2.25537 2.80157Z" fill="#F15F5E"></path>
                    </svg><label class="cpr__btn-lbl" type-tag="label" id="models_repairs_0">BACK</label> </a>
            </div>
        </section>
        <section id="models-repairs-list" class="cpr__models-repairs--list">
            @foreach($versions as $item)
            <div class="cpr__models-repairs--item">
                <img src="{{asset('repair/assets/img/home/14series.webp')}}" alt="{{$name}}  {{$item->name}} Teknik Servis" id="image_models_repairs_3">
                <h2 class="cpr__models-repairs--item-title">{{$name}}   {{$item->name}} </br> Teknik Servis</h2><a class="cpr__models-repairs--item-link"  href="{{route('ariza',['id' => $item->id])}}" title="Model Seçiniz" aria-label="Model Seçiniz">
                    <label class="cpr__btn-lbl">Arıza Seçiniz</label>
                    <svg width="7" height="9" viewBox="0 0 7 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.66944 6.52849L2.32948 8.81055L0.313217 6.8439L2.65282 4.56184L0.3125 2.27944L2.32948 0.312456L4.6698 2.59486L6.68607 4.5615L4.66944 6.52849Z"></path>
                    </svg></a>
            </div>
            @endforeach
        </section>



    </main>
@endsection

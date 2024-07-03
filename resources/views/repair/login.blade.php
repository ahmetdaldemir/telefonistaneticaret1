@extends('layout.repair')

@section('content')
    <style>
        .cpr__booking-search--input {
            font-family: 'Avenir';
            font-style: normal;
            font-weight: 200;
            font-size: 16px;
            line-height: 22px;
            color: #4E4E50;
            flex: 1;
            border: none;
        }

        .cpr__booking-search-input--content {
            width: 100%;
            height: 53px;
            background: #FFFFFF;
            border-radius: 145.126px;
            display: flex;
            align-items: center;
            padding: 15px 9px 15px 27px;
            box-sizing: border-box;
            border: 1px solid #ccc;
        }

        .cpr__form--lbl-content {
            color: #F15F5E !important;
            font-family: Avenir;
            font-size: 15px;
            height: 14px;
            font-weight: 500;
            line-height: 19px;
            letter-spacing: 0em;
            display: flex;
            align-items: baseline;
            column-gap: 4px;
            height: 20px;
        }

        .cpr__form--input-group.width-100 {
            width: 100%;
        }

        .cpr__form--input-group {
            display: flex;
            flex-direction: column;
            row-gap: 4px;
            width: 50%;
            padding: 0px 10px;
            box-sizing: border-box;
            /* justify-content: flex-end; */
        }

        .cpr__booking-customer-form--content .cpr__form--input.textarea {
            height: 83px;
        }

        .cpr__booking-customer-form--content {
            row-gap: 18px;
            margin: 0 auto;
        }

        .cpr__form {
            display: flex;
            flex-wrap: wrap;
        }

        .cpr__store-right {
            display: flex;
            flex-direction: column;
            row-gap: 15px;
            height: auto;
        }

        .cpr__store-card {
            border: 1px solid #2D2D3B;
            border-radius: 15px;
            display: flex;
            width: 100%;
            padding: 19px 21px;
            box-sizing: border-box;
            margin-top: 20px;
            column-gap: 10px;
            justify-content: space-between;
            flex-direction: column;
        }

        .cpr__store-card-title {
            font-family: 'Avenir';
            font-style: normal;
            font-weight: 500;
            font-size: 16px;
            line-height: 22px;
            color: #4E4E50;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box !important;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }

        .cpr__store-card-address {
            font-family: 'Avenir';
            font-style: normal;
            font-weight: 200;
            font-size: 16px;
            line-height: 22px;
            color: #4E4E50;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box !important;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }

        .cpr__store-left {
            font-family: 'Avenir';
            font-style: normal;
            font-weight: 200;
            font-size: 16px;
            line-height: 22px;
            color: #4E4E50;
            width: 170px;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            align-items: flex-start;
            margin-top: 17px;
        }

        .cpr__store-card.fr .cpr__store-left {
            width: auto;
        }

    </style>
    <style>
        .cpr__stores-location__container {
            display: flex;
            width: 100%;
            margin: auto;
            justify-content: center;
            margin-top: 53px;
            margin-bottom: 60px;
        }

        .cpr__view-all--opt {
            display: flex;
            align-items: center;
            column-gap: 7px;
        }

        .cpr__stores-location-content__container {
            display: flex;
            width: 100%;
            max-width: 1040px;
            flex-direction: column;
        }

        .cpr__stores-location-title {
            font-family: 'Avenir';
            font-style: normal;
            font-weight: 500;
            font-size: 45px;
            line-height: 61px;
            color: #F15F5E;
            text-align: center;
        }

        .cpr__franch-form--detail {
            font-family: 'Avenir';
            font-style: normal;
            font-weight: 200;
            font-size: 16px;
            line-height: 22px;
            color: #2D2D3B;
        }

        .cpr__input--error .cpr__franch-form--detail, .cpr__input--error .selected {
            color: #F15F5E;
        }
        .cpr__stores-location-initial {
            display: flex;
            column-gap: 25px;
            margin-top: 29px;
            justify-content: center;
            flex-direction: row;
        }
        .cpr__stores-location-filter__container {
            width: 419px;
            display: flex;
            flex-direction: column;
            row-gap: 17px;
        }

        .cpr__select {
            width: 100% !important;
        }
        .cpr__stores-location-map {
            display: flex;
            width: 596px;
            height: 432px;
            position: relative;
            background: #F3F2F2;
            border-radius: 17.7752px;
            gap: 27px;
            flex-wrap: wrap;
            flex-direction: row-reverse;
            justify-content: center;
        }



        .cpr__stores-location-signs-img {
            position: absolute;
            top: 31px;
            left: 39px;
        }

        .cpr__stores-location-map-img {
            position: absolute;
            left: 41px;
            top: 60px;
        }

        .cpr__state-stores-link {
            display: inline-flex;
            column-gap: 8px;
            align-items: center;
            margin-bottom: 25px;
        }

        .cpr__state-stores-link-text {
            font-family: 'Avenir';
            font-style: normal;
            font-weight: 200;
            font-size: 12px;
            line-height: 20px;
            text-decoration-line: underline;
            text-transform: capitalize;
            color: #4E4E50;
            cursor: pointer;
        }

        .cpr__stores-location-right {
            width: 596px;
        }

        .cpr__store-desctiption {
            display: flex;
            flex-direction: column;
        }

        .cpr__store-title {
            font-family: 'Avenir';
            font-style: normal;
            font-weight: 200;
            font-size: 30px;
            line-height: 41px;
            color: #2D2D3B;
            margin-bottom: 20px;
        }

        .cpr__store-text {
            font-family: 'Avenir';
            font-style: normal;
            font-weight: 200;
            font-size: 16px;
            line-height: 22px;
            color: #4E4E50;
            margin-top: 8px;
        }

        /* BEGIN locations title section  */
        #cpr__stores-location-results-title {
            display: flex;
            justify-content: center;
            margin: 48px 0px 28px 0px;
            width: 100%;
        }

        .cpr__stores-location-results-title {
            font-family: 'Avenir';
            font-style: normal;
            font-weight: 200;
            font-size: 30px;
            line-height: 41px;
            text-align: center;
            color: #2D2D3B;
        }

        /* ENDS locations title section  */
        /* BEGIN one result section  */
        .cpr__stores-location-results__container {
            display: flex;
            width: 100%;
            margin: auto;
            justify-content: center;
            margin-top: 22px;
        }

        .cpr__stores-location-results-content__container {
            display: flex;
            width: 100%;
            max-width: 1040px;
            flex-direction: column;
        }

        .cpr__stores-location-one-result {
        }

        .cpr__store-card-map {
            height: 436px;
            width: 596px;
        }

        .cpr__stores-location-one-result__container {
            margin-top: 16px;
            display: flex;
            column-gap: 25px;
        }

        .cpr__store-card {
            width: 265px;
            float: left;
            background: #F3F2F2;
            border-radius: 15px;
            padding: 21px;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
        }

        .cpr__store-card-header {
            display: flex;
            justify-content: space-between;
            column-gap: 10px;
        }

        .cpr__store-card-title {
            font-family: 'Avenir';
            font-style: normal;
            font-weight: 500;
            font-size: 16px;
            line-height: 22px;
            color: #F15F5E;
            width: 305px;
        }

        .cpr__store-miles {
            background: #FFFFFF;
            border-radius: 17.5px;
            font-family: 'Avenir';
            font-style: normal;
            font-weight: 200;
            font-size: 12px;
            line-height: 16px;
            color: #9E9E9E;
            padding: 8px;
            box-sizing: border-box;
            height: 31px;
        }

        .cpr__store-card-address {
            font-family: 'Avenir';
            font-style: normal;
            font-weight: 200;
            font-size: 16px;
            line-height: 22px;
            color: #4E4E50;
            width: 200px;
        }

        .cpr__store-card-footer {
            display: inline-flex;
            align-items: center;
            justify-content: space-between;
            margin-top: auto;
        }

        .cpr__store-card-link {
            display: inline-flex;
            align-items: center;
            column-gap: 7px;
            pointer-events: initial !important;
        }

        .cpr__store-card-link .cpr__btn-lbl, .cpr__store-card-link {
            font-family: 'Avenir';
            font-style: normal;
            font-weight: 200;
            font-size: 16px;
            line-height: 22px;
            text-decoration-line: underline;
            color: #4E4E50;
            text-transform: none;
            pointer-events: initial !important;
            cursor: pointer !important;
        }

        .cpr__store-card-footer .cpr__btn {
            height: 40px;
            min-width: initial;
        }

        .cpr__store-card-footer .cpr__btn .cpr__btn-lbl {
            font-family: 'Avenir';
            font-style: normal;
            font-weight: 500;
            font-size: 16px;
            line-height: 22px;
            text-transform: uppercase;
            color: #FFFFFF;
        }

        /* ENDS one result section  */
        /* BEGIN many results section */
        .cpr__stores-location-many-results {
            margin-top: 24px;
            display: flex;
            align-items: center;
            flex-direction: column;
        }

        .cpr__stores-location-results {
            column-gap: 24px;
            row-gap: 20px;
            display: flex;
            flex-wrap: wrap;
            margin-top: 10px;
        }

        .cpr__stores-location-results .cpr__store-card {
            height: 163px;
            width: 508px;
        }

        .cpr__stores-location-many-results .cpr__store-card:nth-child(n+2) {
            border: 1px solid #4E4E50;
            background: #FFFFFF;
        }

        .cpr__stores-location-many-results .cpr__store-card:nth-child(n+2) .cpr__store-card-title {
            color: #4E4E50;
        }

        .cpr__stores-location-many-results .cpr__store-card:nth-child(n+2) .cpr__btn {
            background: #4E4E50;
        }

        /* ENDS many results section */
        /* BEGIN similar repairs section */
        .cpr__stores-location-similar-repairs__container {
            display: flex;
            width: 100%;
            margin: auto;
            justify-content: center;
            margin-top: 32px;
        }

        .cpr__stores-location-similar-repairs-content__container {
            display: flex;
            width: 100%;
            max-width: 1040px;
            flex-direction: column;
        }

        .cpr__stores-location-similar-repairs-title {
            font-family: 'Avenir';
            font-style: normal;
            font-weight: 200;
            font-size: 25px;
            line-height: 34px;
            text-align: center;
            color: #4E4E50;
        }

        .cities-information__container {
            margin-top: 25px;
            display: flex;
            column-gap: 27px;
            align-items: center;
        }

        .cpr__stores-location-other-img {
            width: 241px;
        }

        .cpr__stores-location-similar-repairs {
            margin-top: 21px;
            display: flex;
            column-gap: 35px;
            margin-top: 21px;
            flex-flow: column wrap;
            max-height: 150px;
            width: 100%;
        }

        .cpr__stores-location-similar-repair-link {
            display: inline-flex;
            width: 368px;
            justify-content: space-between;
            padding-right: 10px;
            box-sizing: border-box;
            padding-bottom: 16px;
            border-bottom: 2px solid #F15F5E;
            padding-top: 10px;
            align-items: center;
        }

        .cpr__stores-location-similar-repair-title {
            font-family: 'Avenir';
            font-style: normal;
            font-weight: 200;
            font-size: 16px;
            line-height: 22px;
            color: #2D2D3B;
        }

        .cpr__stores-location-similar-repairs .cpr__stores-location-similar-repair-link:nth-child(3n), .cpr__stores-location-similar-repairs .cpr__stores-location-similar-repair-link:nth-last-child(1) {
            border: none;
        }

        /* ENDS similar repairs section */
        /* BEGIN other cities section */
        .cpr__stores-location-other-cities__container {
            display: flex;
            width: 100%;
            margin: auto;
            justify-content: center;
            margin-top: 74px;
            background: #F15F5E;
            padding: 22px 0px;
        }

        .cpr__stores-location-other-cities-content__container {
            display: flex;
            width: 100%;
            max-width: 1040px;
            flex-wrap: wrap;
            justify-content: center;
            flex-direction: column;
        }

        .cpr__stores-location-other-cities-title {
            font-family: 'Avenir';
            font-style: normal;
            font-weight: 550;
            font-size: 30px;
            line-height: 41px;
            text-align: center;
            color: #FFFFFF;
        }

        .cpr__stores-location-other-cities {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 25px;
            column-gap: 77px;
            width: 100%;
        }

        .cpr__stores-location-other-city-link {
            display: inline-flex;
            width: 368px;
            justify-content: space-between;
            padding-right: 10px;
            box-sizing: border-box;
            padding-bottom: 16px;
            padding-top: 10px;
            align-items: center;
        }

        .cpr__stores-location-other-city-title {
            font-family: 'Avenir';
            font-style: normal;
            font-weight: 500;
            font-size: 16px;
            line-height: 22px;
            text-transform: uppercase;
            color: #FFFFFF;
        }

        /* ENDS other cities section */
        .hide {
            display: none !important;
        }

        /* BEGIN right skeleton section */
        #cpr__stores-location-right-skeleton {
            display: flex;
            flex-direction: column;
            row-gap: 16px;
            width: 100%;
        }

        .cpr__stores-location-right-item-skeleton {
            background: #F3F2F2;
            border-radius: 5px;
            height: 22px;
            /* width: 255px; */
            width: 100%;
        }

        .cpr__stores-location-right-item-skeleton:first-of-type {
            width: 40%;
        }

        /* ENDS right skeleton section */
        /* BEGIN results card skeleton section  */
        #cpr__stores-location-results-skeleton {
            display: flex;
            flex-wrap: wrap;
            column-gap: 24px;
            row-gap: 25px;
            width: 100%;
            margin-bottom: 60px;
        }

        .cpr__stores-location-card-result-skeleton {
            width: 508px;
            height: 163px;
            background: rgba(243, 242, 242, 0.7);
            border-radius: 15px;
            padding: 15px;
            box-sizing: border-box;
            display: flex;
            justify-content: space-between;
        }

        .cpr__stores-location-results-left-skeleton {
            display: flex;
            flex-direction: column;
        }

        .cpr__stores-location-results-right-skeleton {
            display: flex;
            align-items: end;
        }

        .cpr__stores-location-card1-skeleton {
            width: 170px;
            height: 22px;
            background: #FFFFFF;
            border-radius: 5px;
        }

        .cpr__stores-location-card2-skeleton {
            width: 241px;
            height: 51px;
            background: #FFFFFF;
            border-radius: 5px;
            margin: 15px 0px 29px 0px;
        }

        .cpr__stores-location-card3-skeleton {
            width: 122px;
            height: 22px;
            background: #FFFFFF;
            border-radius: 5px;
        }

        .cpr__stores-location-card4-skeleton {
            width: 170px;
            height: 40px;
            background: #FFFFFF;
            border-radius: 5px;
        }

        /* ENDS results card skeleton section  */
        /* BEGIN state results section  */
        #cpr__stores-location-state-no-city {
            width: 100%;
            height: 517px;
            left: 0px;
            top: 0px;
            background: #FFFFFF;
            border-radius: 20px;
            border: 1px solid #B9BDCB;
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin: 30px 0px 60px 0px
        }

        .cpr__stores-location-state-bg-img {
            position: absolute;
            height: 517px;
        }

        .cpr__stores-location-state-results {
            width: 452px;
            height: 208px;
            background: #F15F5E;
            border-radius: 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: relative;
            row-gap: 17px;
        }

        .cpr__stores-location-state-results .cpr__btn-lbl {
            font-family: 'Avenir';
            font-style: normal;
            font-weight: 500;
            font-size: 30px;
            line-height: 41px;
            color: #FFFFFF;
            text-transform: none;
        }

        .cpr__stores-location-state-results .cpr__btn {
            background: #FFFFFF;
        }

        .cpr__stores-location-state-results .cpr__btn .cpr__btn-lbl {
            font-size: 16px;
            line-height: 22px;
            color: #F15F5E;
        }

        .cpr__stores-location-state-results .cpr__btn path {
            fill: #F15F5E;
        }

        .cpr__stores-location-state-map-img {
            width: 596px;
            height: 432px;
            border-radius: 17.7752px;
            object-fit: cover;
        }

        /* ENDS state results section  */
        /* BEGIN country results section  */
        #cpr__stores-location-country {
            background: #F3F2F2;
            border-radius: 20px;
            height: 517px;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 40px;
        }

        .cpr__stores-location-country-information {
            display: flex;
            flex-direction: column;
            row-gap: 24px;
            align-items: center;
        }

        .cpr__stores-location-country {
            font-family: 'Avenir';
            font-style: normal;
            font-weight: 200;
            font-size: 25px;
            line-height: 34px;
            text-align: center;
            color: #2D2D3B;
        }

        .cpr__stores-location-country-information .cpr__stores-location-signs-img {
            position: relative;
            top: initial;
            left: initial;
        }

        /* ENDS country results section  */
        /* BEGIN country right filter section  */
        #cpr__stores-location-right-country {
            background: #F3F2F2;
            border-radius: 20px;
            height: 427px;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .cpr__store-country-title {
            font-family: 'Avenir';
            font-style: normal;
            font-weight: 200;
            font-size: 30px;
            line-height: 41px;
            color: #2D2D3B;
        }

        /* ENDS country right filter section  */
        .city-option-link {
            padding: 3px 7px;
            box-sizing: border-box;
            cursor: pointer;
            font-family: 'Avenir';
            font-style: normal;
            font-weight: 200;
            font-size: 14px;
            line-height: 19px;
            display: flex;
            align-items: center;
            color: #000000;
        }

        .city-option-link:hover {
            background-color: #ED6A5E;
            color: #FFFFFF;
        }

        /*Tablet / iPads*/
        @media (min-width: 763px) and (max-width: 1293px) {
            .cpr__stores-location__container {
                margin-top: 25px;
            }

            .cpr__stores-location-content__container {
                max-width: 640px;
            }

            .cpr__stores-location-title {
                font-size: 27.9711px;
                line-height: 38px;
            }

            .cpr__stores-location-filter__container {
                width: 260.44px;
            }

            .cpr__stores-location-right {
                width: 370.46px;
            }

            .cpr__stores-location-map {
                width: 370.46px;
                height: 268.52px;
            }

            .cpr__stores-location-map-img {
                left: 0px !important;
                top: 20px !important;
                width: 100%;
            }

            .cpr__stores-location-signs-img {
                width: 97.08px;
            }

            .cpr__stores-location-state-map-img {
                width: 366.21px;
                height: 265.44px;
            }

            .cpr__franch-form--detail {
                font-size: 9.83103px;
                line-height: 13px;
            }

            .cpr__state-stores-link-text {
                font-size: 7.37327px;
                line-height: 13px;
            }

            .cpr__state-stores-link svg {
                width: 6.76px;
                height: 7.37px;
            }

            .cpr__state-stores-link {
                margin-bottom: 0px;
            }

            .cpr__store-title {
                font-size: 18.3789px;
                line-height: 25px;
                margin-bottom: 0px;
            }

            .cpr__store-text {
                font-size: 9.80208px;
                line-height: 13px;
            }

            .cpr__stores-location-right-item-skeleton {
                height: 17px;
            }

            #cpr__stores-location-right-country {
                height: 263.43px;
            }

            .cpr__store-country-title {
                font-size: 18.5081px;
                line-height: 25px;
            }

            .cpr__stores-location-results-content__container {
                max-width: 640px;
            }

            #cpr__stores-location-results-title {
                margin: 30px 0px 20px 0px;
            }

            .cpr__stores-location-results-title {
                font-size: 18.3998px;
                line-height: 25px;
            }

            .cpr__stores-location-card-result-skeleton {
                width: 311.57px;
                height: 99.97px;
            }

            .cpr__stores-location-card1-skeleton {
                width: 104.27px;
                height: 13.49px;
            }

            .cpr__stores-location-card2-skeleton {
                width: 147.81px;
                height: 31.28px;
                margin: 10px 0px 15px 0px;
            }

            .cpr__stores-location-card3-skeleton {
                width: 74.83px;
                height: 13.49px;
            }

            .cpr__stores-location-card4-skeleton {
                width: 104.27px;
                height: 24.53px;
            }

            #cpr__stores-location-results-skeleton {
                column-gap: 16px;
            }

            .cpr__store-card {
                width: 257.09px;
                height: 107.38px;
                padding: 12px;
            }

            .cpr__store-card-title, .cpr__store-card-address, .cpr__store-card-link {
                font-size: 9.81723px;
                line-height: 13px;
                width: 100%;
                pointer-events: initial !important;
            }

            .cpr__store-card-footer .cpr__btn {
                width: auto;
                height: auto;
                padding: 5.80645px 7.6129px;
            }

            .cpr__store-card-footer .cpr__btn-lbl {
                font-size: 9.81723px !important;
                line-height: 13px !important;
            }

            .cpr__store-card-footer svg {
                width: 11.81px;
                height: 11.81px;
            }

            .cpr__store-card-map {
                width: 365.69px;
                height: 265.07px;
            }

            .cpr__stores-location-results .cpr__store-card {
                width: 311.22px;
                height: 99.86px;
            }

            .cpr__stores-location-results {
                column-gap: 17px;
            }

            .cpr__stores-location-state-results .cpr__btn-lbl {
                font-size: 18.5058px !important;
                line-height: 25px !important;
            }

            .cpr__stores-location-state-results {
                width: 278.82px;
                height: 128.31px;
            }

            #cpr__stores-location-state-no-city {
                height: 318.92px;
            }

            .cpr__stores-location-state-bg-img {
                border-radius: 20px;
                height: 100%;
            }

            #cpr__stores-location-country {
                height: 318.96px;
            }

            .cpr__stores-location-country {
                font-size: 15.4234px;
                line-height: 21px;
            }

            .cpr__stores-location-similar-repairs-content__container {
                max-width: 640px;
            }

            .cpr__stores-location-similar-repairs-title {
                font-size: 15.3157px;
                line-height: 21px;
            }

            .cpr__stores-location-other-img {
                width: 201.56px;
                height: 98.02px;
            }

            .cpr__stores-location-similar-repair-link {
                width: 200px;
            }

            .cpr__stores-location-similar-repairs {
                margin-top: 0px;
            }

            .cpr__stores-location-similar-repair-title {
                font-size: 9.80208px;
                line-height: 13px;
            }

            .cpr__stores-location-similar-repairs svg {
                width: 7.12px;
                height: 9.49px;
            }

            .cpr__stores-location-other-cities__container {
                margin-top: 30px;
            }

            .cpr__stores-location-other-cities-content__container {
                max-width: 640px;
            }

            .cpr__stores-location-other-cities-title {
                font-size: 18.3789px;
                line-height: 25px;
            }

            .cpr__stores-location-other-city-link {
                width: 221.16px;
            }

            .cpr__stores-location-other-city-title {
                font-size: 9.80208px;
                line-height: 13px;
            }

            .cpr__stores-location-other-city-link svg {
                width: 7.12px;
                height: 9.49px;
            }
        }

        @media (min-width: 1px) and (max-width: 762px) {
            /* BEGIN initial state container  */
            .cpr__stores-location__container {
                margin-top: 18px;
            }

            .cpr__stores-location-content__container {
                max-width: 343px;
            }

            .cpr__stores-location-title {
                font-size: 25px;
                line-height: 34px;
            }

            .cpr__stores-location-initial {
                flex-direction: column;
            }

            .cpr__stores-location-filter__container, .cpr__stores-location-state-map-img {
                width: 100%;
            }

            .cpr__stores-location-right {
                margin-top: 30px;
                width: 100%;
            }

            .cpr__stores-location-map-img {
                position: relative;
                left: initial;
                top: initial;
                width: 100%;
            }

            .cpr__stores-location-map {
                width: 100%;
                height: initial;
            }

            .cpr__state-stores-link {
                width: 100%;
                justify-content: center;
                margin-bottom: initial;
            }

            .cpr__franch-form--detail {
                display: none;
            }

            .cpr__stores-location-signs-img {
                width: 90px;
            }

            /* ENDS initial state container  */
            /* BEGIN one result section  */
            .cpr__stores-location-results-content__container {
                max-width: 343px;
            }

            .cpr__store-card {
                width: 100%;
            }

            .cpr__stores-location-one-result__container {
                row-gap: 30px;
                flex-direction: column;
            }

            .cpr__stores-location-similar-repairs-content__container {
                max-width: 343px;
            }

            .cpr__stores-location-similar-repairs {
                flex-direction: row;
                max-height: unset;
            }

            .cpr__stores-location-similar-repairs .cpr__stores-location-similar-repair-link:nth-child(3n) {
                border-bottom: 2px solid #F15F5E;
            }

            .cities-information__container {
                flex-direction: column-reverse;
            }

            .cpr__store-card-map {
                height: auto;
                width: 100%;
            }

            .cpr__stores-location-similar-repairs .cpr__stores-location-similar-repair-link:nth-last-child(1) {
                border: none;
            }

            .cpr__stores-location-other-img {
                width: 329px;
            }

            .cpr__stores-location-other-cities__container {
                margin: 30px 0px;
            }

            .cpr__stores-location-other-cities-content__container {
                max-width: 343px;
            }

            /* ENDS one result section  */
            /* BEGIN many results section  */
            .cpr__stores-location-many-results {
                margin-top: initial;
            }

            .cpr__store-title {
                text-align: center;
            }

            .cpr__stores-location-results .cpr__store-card {
                width: 100%;
            }

            .cpr__stores-location-results {
                width: 100%;
                height: 600px;
                overflow-y: auto;
                padding-right: 4px;
            }

            /* ENDS many results section  */
            /* BEGIN right skeleton section */
            #cpr__stores-location-right-skeleton {
                height: 440px;
            }

            #cpr__stores-location-right-country {
                height: 230px;
            }

            /* ENDS right skeleton section */
            /* BEGIN card skeleton section  */
            .cpr__stores-location-card-result-skeleton {
                width: 100%;
            }

            .cpr__stores-location-card1-skeleton {
                width: 130px;
            }

            .cpr__stores-location-card2-skeleton {
                width: 150px;
                height: 34px;
            }

            .cpr__stores-location-card3-skeleton {
                height: 32px;
            }

            #cpr__stores-location-results-skeleton {
                height: 370px;
                overflow: hidden;
            }

            /* ENDS card skeleton section  */
        }
    </style>
<style>
    .gsi-material-button {
        -moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
        -webkit-appearance: none;
        background-color: #131314;
        background-image: none;
        border: 1px solid #747775;
        -webkit-border-radius: 20px;
        border-radius: 20px;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        color: #e3e3e3;
        cursor: pointer;
        font-family: 'Roboto', arial, sans-serif;
        font-size: 14px;
        height: 40px;
        letter-spacing: 0.25px;
        outline: none;
        overflow: hidden;
        padding: 0 12px;
        position: relative;
        text-align: center;
        -webkit-transition: background-color .218s, border-color .218s, box-shadow .218s;
        transition: background-color .218s, border-color .218s, box-shadow .218s;
        vertical-align: middle;
        white-space: nowrap;
        width: auto;
        max-width: 400px;
        min-width: min-content;
        border-color: #8e918f;
    }

    .gsi-material-button .gsi-material-button-icon {
        height: 20px;
        margin-right: 12px;
        min-width: 20px;
        width: 20px;
    }

    .gsi-material-button .gsi-material-button-content-wrapper {
        -webkit-align-items: center;
        align-items: center;
        display: flex;
        -webkit-flex-direction: row;
        flex-direction: row;
        -webkit-flex-wrap: nowrap;
        flex-wrap: nowrap;
        height: 100%;
        justify-content: space-between;
        position: relative;
        width: 100%;
    }

    .gsi-material-button .gsi-material-button-contents {
        -webkit-flex-grow: 1;
        flex-grow: 1;
        font-family: 'Roboto', arial, sans-serif;
        font-weight: 500;
        overflow: hidden;
        text-overflow: ellipsis;
        vertical-align: top;
    }

    .gsi-material-button .gsi-material-button-state {
        -webkit-transition: opacity .218s;
        transition: opacity .218s;
        bottom: 0;
        left: 0;
        opacity: 0;
        position: absolute;
        right: 0;
        top: 0;
    }

    .gsi-material-button:disabled {
        cursor: default;
        background-color: #13131461;
        border-color: #8e918f1f;
    }

    .gsi-material-button:disabled .gsi-material-button-state {
        background-color: #e3e3e31f;
    }

    .gsi-material-button:disabled .gsi-material-button-contents {
        opacity: 38%;
    }

    .gsi-material-button:disabled .gsi-material-button-icon {
        opacity: 38%;
    }

    .gsi-material-button:not(:disabled):active .gsi-material-button-state,
    .gsi-material-button:not(:disabled):focus .gsi-material-button-state {
        background-color: white;
        opacity: 12%;
    }

    .gsi-material-button:not(:disabled):hover {
        -webkit-box-shadow: 0 1px 2px 0 rgba(60, 64, 67, .30), 0 1px 3px 1px rgba(60, 64, 67, .15);
        box-shadow: 0 1px 2px 0 rgba(60, 64, 67, .30), 0 1px 3px 1px rgba(60, 64, 67, .15);
    }

    .gsi-material-button:not(:disabled):hover .gsi-material-button-state {
        background-color: white;
        opacity: 8%;
    }
</style>
    <section class="cpr__breadcrumb__container desktop tablet">
        <div class="cpr__breadcrumb-content__container">
            <a class="cpr__breadcrumb-btn" aria-label="BACK" onclick="goBack()" title="BACK">
                <svg width="8" height="10" viewBox="0 0 8 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M2.25537 2.80157L4.87067 0.250976L7.1242 2.44904L4.50929 4.99964L7.125 7.55062L4.87067 9.74907L2.25497 7.19809L0.00143534 5.00002L2.25537 2.80157Z"
                        fill="#F15F5E"></path>
                </svg>
                <label class="cpr__btn-lbl" type-tag="label" id="stores_by_location_0">GERİ</label> </a>
        </div>
    </section>
    <section class="cpr__stores-location__container">
        <div class="cpr__stores-location-content__container">
            <h1 class="cpr__stores-location-title" type-tag="h1" id="stores_by_location_1">UYE OL</h1>
            <div class="cpr__stores-location-initial">
                <div class="cpr__stores-location-filter__container">
                    <div class="cpr__form--input-group width-100">
                        <a href="{{route('auth.google')}}" class="gsi-material-button" id="googleLogin">
                            <div class="gsi-material-button-state"></div>
                            <div class="gsi-material-button-content-wrapper">
                                <div class="gsi-material-button-icon">
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" xmlns:xlink="http://www.w3.org/1999/xlink" style="display: block;">
                                        <path fill="#EA4335" d="M24 9.5c3.54 0 6.71 1.22 9.21 3.6l6.85-6.85C35.9 2.38 30.47 0 24 0 14.62 0 6.51 5.38 2.56 13.22l7.98 6.19C12.43 13.72 17.74 9.5 24 9.5z"></path>
                                        <path fill="#4285F4" d="M46.98 24.55c0-1.57-.15-3.09-.38-4.55H24v9.02h12.94c-.58 2.96-2.26 5.48-4.78 7.18l7.73 6c4.51-4.18 7.09-10.36 7.09-17.65z"></path>
                                        <path fill="#FBBC05" d="M10.53 28.59c-.48-1.45-.76-2.99-.76-4.59s.27-3.14.76-4.59l-7.98-6.19C.92 16.46 0 20.12 0 24c0 3.88.92 7.54 2.56 10.78l7.97-6.19z"></path>
                                        <path fill="#34A853" d="M24 48c6.48 0 11.93-2.13 15.89-5.81l-7.73-6c-2.15 1.45-4.92 2.3-8.16 2.3-6.26 0-11.57-4.22-13.47-9.91l-7.98 6.19C6.51 42.62 14.62 48 24 48z"></path>
                                        <path fill="none" d="M0 0h48v48H0z"></path>
                                    </svg>
                                </div>
                                <span class="gsi-material-button-contents">Sign in with Google</span>
                                <span style="display: none;">Sign in with Google</span>
                            </div>
                        </a>
                    </div>
                    <div style="    width: 100%;
    height: 1px;
    text-align: center;
    margin: 10px 0px 20px 0px;">VEYA</div>
                    <form class="cpr__booking-customer-form--content cpr__form">
                        <div class="cpr__booking-search-input--content">
                            <input type="text" class="cpr__booking-search--input no-highlight"
                                   placeholder="İsim Soyisim">
                        </div>
                        <div class="cpr__booking-search-input--content">
                            <input type="text" class="cpr__booking-search--input no-highlight" placeholder="Telefon">
                        </div>


                        <div class="cpr__form--controls width-100">
                            <button id="customer-form-submit-button" role="button"
                                    class="cpr__btn cpr__btn-primary fit form-button">
                                <label class="cpr__btn-lbl" type-tag="label">UYE OL</label>

                            </button>
                            <p id="submit-confirmation-error" style="
                        display:none;
                        color: #F15F5E !important;
                        text-align: center;
                        padding-top: 8px;">Submit application failed, please try again</p>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>

@endsection

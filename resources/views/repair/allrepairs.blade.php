@extends('layout.repair')

@section('content')
    <style>
        .cpr__bst--topics {
            display: flex;
            width: 100%;
            margin-top: 47px;
            margin-bottom: 71px;
        }

        .cpr__bst-topics--content {
            width: 1080px;
            margin: 0 auto;
             column-gap: 24px;
            align-items: center;
        }

        .cpr__bst-topics--card {
            border: 1px solid #F3F2F2;
            border-radius: 30px;
            width: 32.333333%;
            height: 362px;
            /* float: left; */
            display: inline-grid;
            column-gap: 134px;
            gap: -7px;
        }
        .cpr__bst-card--t {
            font-family: 'Avenir';
            font-style: normal;
            font-weight: 500;
            font-size: 22px;
            line-height: 30px;
            color: #4E4E50;
            margin-top: 24px;
            margin-bottom: 7px;
        }

        .cpr__bst-card--d {
            font-family: 'Avenir';
            font-style: normal;
            font-weight: 200;
            font-size: 16px;
            line-height: 22px;
            color: #4E4E50;
        }

        .cpr__bst-card--t, .cpr__bst-card--d {
            padding: 0 25px;
            box-sizing: border-box;
        }
    </style>
    <section class="cpr__bst--topics">
        <div class="cpr__bst-topics--content">
            @foreach($site_technical_category as $item)
            <div class="cpr__bst-topics--card">
                <h2 class="cpr__bst-card--t"  ><a style="color: #484949;" href="{{route('detail',['id' => $item->id])}}">{{$item->title}}</a></h2>
                <p class="cpr__bst-card--d" ><a style="color: #484949;" href="{{route('detail',['id' => $item->id])}}">{!! $item->sort_description !!}</a></p>
            </div>
            @endforeach
        </div>
    </section>
@endsection

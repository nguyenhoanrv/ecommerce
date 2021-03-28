@extends('layouts.app')

@section('content')
    @include('layouts.slide_banner')
    @include('layouts.product')
    @include('layouts.mid_slider')
    @include('layouts.category_product')
    @include('layouts.brand_product')

    <script type="text/javascript">
        // var url = '/wishlist/store';
        // fetch(url, {
        //         method: 'POST', // or 'PUT'
        //         headers: {
        //             'Content-Type': 'application/json',
        //         },
        //         body: JSON.stringify(data),
        //     })
        //     .then(response => response.json())
        //     .then(data => {
        //         console.log('Success:', data);
        //     })
        //     .catch((error) => {
        //         console.error('Error:', error);
        //     });

    </script>



@endsection

@section('script')


@endsection

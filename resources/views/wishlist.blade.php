@extends('layouts.app')

@section('content')
    <div class="wishlist-area pt-60 pb-60">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="#">
                        <div class="table-content table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="li-product-remove">remove</th>
                                        <th class="li-product-thumbnail">images</th>
                                        <th class="cart-product-name">Product</th>
                                        <th class="li-product-price">Unit Price</th>
                                        <th class="li-product-stock-status">Stock Status</th>
                                        <th class="li-product-add-cart">add to cart</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($wl as $item)
                                        <tr id="{{ 'wishlist-' . $item->id }}">
                                            <td class="li-product-remove">
                                                <form method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <a href="#" data-id="{{ $item->id }}" title="delete-wishlist"><i
                                                            class="fa fa-times"></i></a>
                                                </form>
                                            </td>

                                            <td class="li-product-thumbnail"><a href="#"><img
                                                        src="{{ asset($item->image_one) }}" alt="" width="90px" ,
                                                        height="90px" style="object-fit: cover"></a>
                                            </td>
                                            <td class="li-product-name"><a href="#">{{ $item->product_name }}</a></td>
                                            <td class="li-product-price"><span
                                                    class="amount">{{ $item->discount_price ?? $item->selling_price }}</span>
                                            </td>
                                            <td class="li-product-stock-status">
                                                @if ($item->product_quantity > 0)
                                                    <span class="in-stock">In Stock</span>
                                                @else
                                                    <span class="out-stock">Out Stock</span>
                                                @endif
                                            </td>

                                            <td class="li-product-add-cart"><a href="#">add to cart</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $("[title=delete-wishlist]").click(function(e) {
            e.preventDefault();
            const id = $(this).attr('data-id');
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                }
            });
            $.ajax({
                type: "delete",
                url: "/wishlist/delete/" + id,
                cache: "false",
                dataType: "json",
                success: (res) => {
                    toastr[res.type](res.message)
                    $('#wishlist-' + id).remove();
                },
                error: function() {
                    toastr["error"]("Error!")
                }
            });

        });

    </script>
@endsection

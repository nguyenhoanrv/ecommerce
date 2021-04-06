@extends('layouts.app')

@section('content')
    <div class="Shopping-cart-area pt-60 pb-60">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="table-content table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="li-product-remove">remove</th>
                                    <th class="li-product-thumbnail">images</th>
                                    <th class="cart-product-name">Product</th>
                                    <th class="cart-product-name">Dimension</th>
                                    <th class="cart-product-name">Color</th>
                                    <th class="li-product-price">Unit Price</th>
                                    <th class="li-product-quantity">Quantity</th>
                                    <th class="li-product-subtotal">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cart as $item)
                                    <tr id="{{ 'cart-' . $item->rowId }}">
                                        <td class="li-product-remove" data-id="{{ $item->rowId }}"><a href=""><i
                                                    class="fa fa-times"></i></a></td>
                                        <td class="li-product-thumbnail"><a
                                                href="{{ route('product.detail', ['id' => $item->id]) }}"><img
                                                    src="{{ asset($item->options->image) }}" alt="Li's Product Image"
                                                    width="135px" height="135px" style="object-fit: cover"></a>
                                        </td>
                                        <td class="li-product-name"><a
                                                href="{{ route('product.detail', ['id' => $item->id]) }}">{{ $item->name }}</a>
                                        </td>
                                        <td class="li-product-dimension">
                                            <select class="form-select" aria-label="Default select example">
                                                @foreach ($products[$item->id]['product_size'] as $size)
                                                    <option value="{{ $size }}" @if ($size == $item->options->size) selected @endif>{{ $size }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <select class="form-select" aria-label="Default select example">
                                                @foreach ($products[$item->id]['product_color'] as $color)
                                                    <option value="{{ $color }}" @if ($color == $item->options->color) selected @endif>{{ $color }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td class="li-product-price"><span class="amount">${{ $item->price }}</span>
                                        </td>
                                        <td class="quantity">
                                            <label>Quantity</label>
                                            <div class="cart-plus-minus">
                                                <input class="cart-plus-minus-box" value="{{ $item->qty }}" type="text">
                                                <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                                <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                            </div>
                                        </td>
                                        <td class="product-subtotal"><span class="amount">${{ $item->subtotal }}</span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="coupon-all">
                                <div class="coupon">
                                    <form method="POST" action="{{ route('coupon.add') }}">
                                        @csrf
                                        <input id="coupon_code"
                                            class="input-text @error('coupon_name') is-invalid @enderror @if (session('error')) is-invalid @endif"
                                            name="coupon_name" placeholder="Coupon code" type="text"
                                            value="{{ old('coupon_name') }}">
                                        @if (session('error'))
                                            <span class="invalid-feedback">
                                                {{ session('error') }}
                                            </span>
                                        @endif
                                        @error('coupon_name')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror


                                        <input class="button" value="Apply coupon" type="submit">
                                    </form>
                                    <br>
                                    @if (session('coupon'))
                                        <div class="d-flex">
                                            <span style="background: rgb(93, 207, 58); font-weight: 600; font-size: 20px">
                                                {{ strtoupper(session('coupon')) }}({{ '-' . session('coupon_discount') . '%' }})
                                            </span>
                                            <button type="button" class="close ml-4" aria-label="Close">

                                                <a aria-hidden="true" style="font-size: 30px"
                                                    href="{{ route('coupon.remove') }}">&times;</a>
                                            </button>
                                        </div>
                                    @endif
                                </div>
                                {{-- <div class="coupon2">
                                        <input class="button" value="Update cart" type="submit">
                                    </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 ml-auto">
                            <div class="cart-page-total">
                                <h2>Cart totals</h2>

                                <ul>
                                    <li class="minicart-total">Total <span>${{ Cart::priceTotal() }}</span></li>
                                    <li class="minicart-total">
                                        Discount
                                        <span
                                            style="color: red">${{ number_format((float) str_replace(',', '', Cart::priceTotal()) - (float) str_replace(',', '', Cart::total()), 2) }}</span>
                                    </li>
                                    <br>
                                    <li class="minicart-total">Subtotal <span>${{ Cart::total() }}</span></li>

                                </ul>
                                <a href="#">Proceed to checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

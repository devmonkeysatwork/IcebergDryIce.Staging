<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order Invoice</title>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Inter:400,600,700');

        body {
            margin: 0;
            padding: 40px 0;
            -webkit-font-smoothing: antialiased;
            font-family: 'Inter', sans-serif;
        }

        table {
            border-collapse: collapse;
        }

        p {
            margin: 0;
        }

        .fullTable {
            width: 600px;
        }

        @media only screen and (max-width: 600px) {
            .fullTable { width: 96% !important; }
        }

        @media only screen and (max-width: 420px) {
            .fullTable { width: 100% !important; }
        }
    </style>
</head>

<body>

<!-- Header -->
<table align="center" class="fullTable" bgcolor="#ffffff" style="border-radius: 10px 10px 0 0;">
    <tr>
        <td style="padding: 20px;">
            <table width="100%">
                <tr>
                    <td style="vertical-align: top;">
                        <img src="{{asset('invoice-logo.jpg')}}" width="154" alt="logo" />
                        <p style="font-family: Helvetica, Arial, sans-serif;font-size: 10px;color:#5E6470;">329 Churchill Avenue</p>
                        <p style="font-family: Helvetica, Arial, sans-serif;font-size: 10px;color:#5E6470;">New Westminster BC V3L 4P5</p>
                        <p style="font-family: Helvetica, Arial, sans-serif;font-size: 10px;color:#5E6470;">Orders 604-524-0609</p>
                        <p style="font-family: Helvetica, Arial, sans-serif;font-size: 10px;color:#5E6470;">Office 604-524-0601</p>
                    </td>
                    <td style="vertical-align: top; text-align: right;padding-top: 30px;">
                        <p style="font-family: Helvetica, Arial, sans-serif;font-size: 36px; font-weight: 300; color:#022a7f; margin-top:10px;">Invoice</p>
                        <p style="font-family: Helvetica, Arial, sans-serif;font-size: 12px; font-weight: 900; color:#1a1a1a; margin-top:10px;">{{ \Carbon\Carbon::parse($order->created_at)->format('d-M-y') }}</p>
                        <p style="font-family: Helvetica, Arial, sans-serif;font-size: 12px; color:#5E6470;">Invoice Number: <strong style="font-weight: 900;">{{ $invoice_number }}</strong></p>
                        <p style="font-family: Helvetica, Arial, sans-serif;font-size: 12px; color:#5E6470;">Customer Number: <strong style="font-weight: 900;">{{ $order->customer_name ?? 'N/A' }}</strong></p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>

<!-- Billing Info -->
<table align="center" class="fullTable" bgcolor="#ffffff">
    <tr>
        <td style="padding: 20px;">
            <table width="100%">
                <tr>
                    <td style="vertical-align: top;">
                        {{--                        <p style="font-family: Helvetica, Arial, sans-serif;font-size: 10px;color:#5E6470;">Billed to</p>--}}
                        <p style="font-weight: 900;font-family: Helvetica, Arial, sans-serif;font-size: 10px;color:#1A1C21;">{{ $order->customer_name ?? 'N/A' }}</p>
                        <p style="font-family: Helvetica, Arial, sans-serif;font-size: 10px;color:#5E6470;">{{ $order->address ?? '' }}.</p>
                        <p style="font-family: Helvetica, Arial, sans-serif;font-size: 10px;color:#5E6470;">{{ $order->city ?? '' }} {{ $order->province ?? '' }}</p>
                        <p style="font-family: Helvetica, Arial, sans-serif;font-size: 10px;color:#5E6470;">{{ $order->postal_code ?? '' }}</p>
                    </td>
                    {{--                    <td style="vertical-align: top;">--}}
                    {{--                        <p style="font-family: Helvetica, Arial, sans-serif;font-size: 10px;color:#5E6470;">Invoice Date</p>--}}
                    {{--                        <p style="font-weight: 600;font-family: Helvetica, Arial, sans-serif;font-size: 10px;color:#1A1C21;">{{ \Carbon\Carbon::parse($invoice->invoice_date)->format('d.m.Y') }}</p>--}}
                    {{--                    </td>--}}
                    {{--                    <td style="vertical-align: top;text-align:right;">--}}
                    {{--                        <p style="font-family: Helvetica, Arial, sans-serif;font-size: 10px;color:#5E6470;">Amount</p>--}}
                    {{--                        <p style="color:#1A1C21;font-weight:700;font-family: Helvetica, Arial, sans-serif;font-size:20px;">--}}
                    {{--                            ${{ number_format($totalAmount, 2) }}--}}
                    {{--                        </p>--}}
                    {{--                    </td>--}}
                </tr>
            </table>
        </td>
    </tr>
</table>

<!-- Items Table -->
<table align="center" class="fullTable" bgcolor="#ffffff">
    <tr>
        <td style="padding: 20px;">
            <table width="100%" border="1" cellspacing="0" cellpadding="5" style="border-color:#D7DAE0;">
                <thead style="background-color:#f8f9fa;">
                <tr style="border-bottom: 3px solid #000;">
                    <th style="font-size: 9px; color:#5E6470; text-align:left;">#</th>
                    <th style="font-size: 9px; color:#5E6470; text-align:left;">Item</th>
                    <th style="font-size: 9px; color:#5E6470; text-align:center;">Unit Price</th>
                    <th style="font-size: 9px; color:#5E6470; text-align:center;">Quantity</th>
                    <th style="font-size: 9px; color:#5E6470; text-align:right;">Subtotal</th>
                    <th style="font-size: 9px; color:#5E6470; text-align:right;">GST</th>
                    <th style="font-size: 9px; color:#5E6470; text-align:right;">PST</th>
                </tr>
                </thead>
                <tbody>
                @foreach($order->items as $index => $item)
                    <tr>
                        <td style="font-size: 10px; color:#1A1C21;">{{ $index + 1 }}</td>
                        <td style="font-size: 10px; color:#1A1C21;">{{ $item->product->product_name ?? 'Product' }}</td>
                        <td style="font-size: 10px; color:#1A1C21; text-align:center;">${{ number_format($item->unit_price, 2) }}</td>
                        <td style="font-size: 10px; color:#1A1C21; text-align:center;">{{ $item->amount_of_items }} {{ $item->product->unit }}</td>
                        <td style="font-size: 10px; color:#1A1C21; text-align:right;">${{ number_format($item->total_price, 2) }}</td>
                        <td style="font-size: 10px; color:#1A1C21; text-align:right;">${{ number_format($item->gst, 2) }}</td>
                        <td style="font-size: 10px; color:#1A1C21; text-align:right;">${{ number_format($item->pst, 2) }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </td>
    </tr>
</table>

<!-- Totals -->
<table align="center" class="fullTable" bgcolor="#ffffff">
    <tr>
        <td style="padding-left: 20px;">
            <p style="font-family: Helvetica, Arial, sans-serif;font-size:10px;font-weight:900;color:#022a7f;">GST #82379 8541</p>
        </td>
    </tr>
    <tr>
        <td style="padding: 20px;">
            <table width="150px">
                <tr>
                    <td style="font-size:10px;font-weight:700;color:#1A1C21;">Subtotal</td>
                    <td style="font-size:10px;font-weight:700;color:#1A1C21;text-align:right;">${{ number_format($order->sub_total, 2) }}</td>
                </tr>
                @if($order->delivery_cost > 0)
                    <tr>
                        <td style="font-size:10px;font-weight:700;color:#1A1C21;">Delivery Cost</td>
                        <td style="font-size:10px;font-weight:700;color:#1A1C21;text-align:right;">${{ number_format($order->delivery_cost, 2) }}</td>
                    </tr>
                @endif
                <tr>
                    <td style="font-size:10px;font-weight:700;color:#1A1C21;">Tax</td>
                    <td style="font-size:10px;font-weight:700;color:#1A1C21;text-align:right;">${{ number_format($order->tax, 2) }}</td>
                </tr>
                <tr>
                    <td style="font-size:10px;font-weight:700;color:#1A1C21;">Hazmat Fee</td>
                    <td style="font-size:10px;font-weight:700;color:#1A1C21;text-align:right;">${{ number_format($order->hazmat, 2) }}</td>
                </tr>
                <tr>
                    <td style="font-size:10px;font-weight:700;color:#1A1C21;">Total</td>
                    <td style="font-size:10px;font-weight:700;color:#1A1C21;text-align:right;">${{ number_format($order->total_cost, 2) }}</td>
                </tr>
            </table>
        </td>
    </tr>
</table>

@if(!empty($invoice->notes))
    <!-- Notes -->
    <table align="center" class="fullTable" bgcolor="#ffffff">
        <tr>
            <td style="padding: 20px;">
                <p style="font-family: Helvetica, Arial, sans-serif;font-size:8px; font-weight:600; color:#5E6470;">Notes</p>
                <p style="border-top:1px solid #D7DAE0; margin:4px 0;"></p>
                <p style="font-family: Helvetica, Arial, sans-serif;font-size:10px;color:#5E6470;white-space:pre-line;">{{ $order->notes }}</p>
            </td>
        </tr>
    </table>
@endif
<!-- Terms -->
<table align="center" class="fullTable" bgcolor="#ffffff">
    <tr>
        <td style="padding: 20px;">
            <p style="font-family: Helvetica, Arial, sans-serif;font-size:11px; font-weight:900; color:rgba(2,42,127,0.87);">
                TERMS: Net 15 days, interest of 2% per month (24% per annum) charged on all overdue accounts.
            </p>
            {{--            <p style="border-top:1px solid #D7DAE0; margin:4px 0;"></p>--}}
            <p style="font-family: Helvetica, Arial, sans-serif;font-size:12px;color:#3c79fa;font-weight: 500;">
                All totes must be returned within two weeks of delivery unless arrangements have
                been made with Iceberg. Late fees will apply.
            </p>
            <p style="margin-top:20px;font-family: Helvetica, Arial, sans-serif;font-size:10px;color:#5E6470;">Thank you for your business!</p>
            <a href="https://www.icebergdryice.com/" style="margin-top:20px;font-family: Helvetica, Arial, sans-serif;font-size:10px;color:#010101;font-weight:900;text-decoration: none;">www.icebergdryice.com</a>
        </td>
    </tr>
</table>

<!-- Business Info -->
{{--<table align="center" class="fullTable" bgcolor="#ffffff" style="border-radius:0 0 10px 10px;">--}}
{{--    <tr>--}}
{{--        <td style="padding: 20px;">--}}
{{--            <p style="font-size:8px;font-weight:600;color:#5E6470;">Business Information</p>--}}
{{--            <p style="border-top:1px solid #D7DAE0;margin:4px 0;"></p>--}}
{{--            <table width="100%">--}}
{{--                <tr>--}}
{{--                    <td style="width:50%;">--}}
{{--                        <p style="font-size:8px;font-weight:600;color:#1A1C21;">GST #</p>--}}
{{--                        <p style="font-size:8px;color:#5E6470;">82379 8541</p>--}}
{{--                    </td>--}}
{{--                    <td>--}}
{{--                        <p style="font-size:8px;font-weight:600;color:#1A1C21;">Contact</p>--}}
{{--                        <p style="font-size:8px;color:#5E6470;text-decoration:underline;">admin@icebergdryice.com</p>--}}
{{--                    </td>--}}
{{--                </tr>--}}
{{--            </table>--}}
{{--        </td>--}}
{{--    </tr>--}}
{{--</table>--}}

</body>
</html>

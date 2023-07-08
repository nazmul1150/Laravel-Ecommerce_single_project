<!DOCETYPE>
<html lang="en">
	<head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <title>Order Confirmation</title>	
	</head>
	<body>
		<p>Hi {{$order->firstname}} {{$order->lastname}}</p>
		<p>Your order successfully placed.</p>
		<table style="widget:600px; text-align: right;">
			<thead>
				<tr>
					<th>Image</th>
					<th>Name</th>
					<th>Quantity</th>
					<th>Price</th>
				</tr>
			</thead>
			<tbody>
				@foreach($order->orderItems as $item)
				<tr>
					<td>
						<img src="{{asset('website/images/products')}}/{{$item->product->image}}" width="100">
					</td>
					<td>{{$item->product->name}}</td>
					<td>{{$item->quentity}}</td>
					<td>{{$item->price * $item->quentity}}</td>
				</tr>
				@endforeach
				<tr>
					<td colspan="3" style="border-top: 1px solid #ccc;"></td>
					<td style="font-size: 15px;font-weight: bold; border-top: 1px solid #ccc;">Subtotal : ${{$order->subtotal}}</td>
					<td colspan="3"></td>
					<td style="font-size: 15px;font-weight: bold; border-top: 1px solid #ccc;">Discount : ${{$order->discount}}</td>
					<td colspan="3"></td>
					<td style="font-size: 15px;font-weight: bold; border-top: 1px solid #ccc;">Tax : ${{$order->tax}}</td>
					<td colspan="3"></td>
					<td style="font-size: 15px;font-weight: bold; border-top: 1px solid #ccc;">Free Shipping</td>
					<td colspan="3"></td>
					<td style="font-size: 15px;font-weight: bold; border-top: 1px solid #ccc;">Total : ${{$order->total}}</td>
				</tr>
			</tbody>
		</table>
	</body>
</html>